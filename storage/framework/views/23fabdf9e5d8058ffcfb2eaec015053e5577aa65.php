
<?php $__env->startPush('css'); ?>
<style>
 .image-upload-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  position: relative;
}

.image-upload-container input[type="file"] {
  display: none;
}

.image-upload-container label {
  padding: 12px 20px;
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.image-upload-container label:hover {
  background-color: #45a049;
}

.upload-button {
  padding: 12px 20px;
  background-color: #3498db;
  color: white;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
  border: none;
}

.upload-button:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.image-preview-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
  gap: 15px;
  margin-top: 20px;
}

.image-preview {
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  z-index: 0; /* Ensure the container has no z-index issues */
}

.image-preview:hover {
  transform: scale(1.05);
}

.image-preview img {
  width: 100%;
  height: auto;
  display: block;
  z-index: -1; /* Make sure the image does not overlap the button */
}

.delete-btn {
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: #e74c3c;
  color: white;
  border: none;
  border-radius: 50%;
  padding: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
  z-index: 1; /* Ensure the delete button is above the image */
}

.delete-btn:hover {
  background-color: #c0392b;
}
  </style>
<?php $__env->stopPush(); ?>
<form id="prod_step3_frm" class="needs-validation" novalidate enctype="multipart/form-data">

   <div class="card-body lead-status">
        <div class="mb-5 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 me-4">
                <span class="d-block mb-2">Images:</span>
            </h5>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div id="frmimg"></div>
            </div>
            <div class="col-lg-12 mb-12">
          
            <div class="image-upload-container">
                <input type="file" id="image-input" name="images[]" accept="image/*" onchange="uploadAndPreviewImage(event)"/>
                
                <label for="image-input">Choose Images</label>
            </div>

            <div class="image-preview-container" id="image-preview-container"></div>

            </div>
         </div>

        </div>

</form>
<?php $__env->startPush('js'); ?>
<script>
    let selectedFiles = []; // Array to store selected files
    const imageLimit = 5;    // Maximum number of images that can be uploaded

    // Function to handle image upload and preview
    function uploadAndPreviewImage(event) {
      const file = event.target.files[0]; // Get the selected file
      const fileCount = selectedFiles.length;

      // Check if the number of files exceeds the limit
      if (fileCount >= imageLimit) {
        alert(`You can upload a maximum of ${imageLimit}  images.`)
        event.target.value = ''; // Clear the file input
        return; // Prevent further uploads
      }

      // Hide the limit message if the limit is not exceeded
  

      // Form data to send via AJAX
      const formData = new FormData($("#prod_step3_frm")[0]);
    $('.error_msg').removeClass('alert alert-danger').html('');
    $("#frmspec").removeClass('alert alert-danger');

    if (!$('#productid').val()) {
        $("#frmspec").addClass('alert alert-danger').text("Please create a product!");
        return false;
    }
      formData.append('image', file);
      formData.append('product_id', $('#productid').val());

      // Create an AJAX request to upload the image
      $.ajax({
        url: "<?php echo e(route('gallery-image.store')); ?>",  // Update this to your image upload route
        type: 'POST',
        data: formData,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),  // CSRF token
        },
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.status === 200) {
            // Get the image ID and path returned by the server
            const imageId = response.image_id;
            const imagePath = response.image_path;

            // Store the selected file in the array
            selectedFiles.push({ id: imageId, file: file });

            // Display the image preview with a delete button
            const previewContainer = document.createElement('div');
            previewContainer.classList.add('image-preview');
            previewContainer.id = `image-preview-${imageId}`;  // Use the image ID for the container's ID

            const img = document.createElement('img');
            img.src = imagePath;  // Set the image source to the uploaded image path
            previewContainer.appendChild(img);

            // Create delete button
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'x';
            deleteButton.classList.add('delete-btn');
            deleteButton.type = 'button'; 
            deleteButton.onclick = function() {
              // Call delete function with the image ID
                  removeImage(imageId, previewContainer);
            };
            previewContainer.appendChild(deleteButton);

            // Append the preview container to the DOM
            document.getElementById('image-preview-container').appendChild(previewContainer);
          } else {
            alert('Error uploading image');
          }
        },
        error: function(xhr, status, error) {
          alert('Error uploading image');
        }
      });
    }

    // Function to remove the image preview and delete from the database
    function removeImage(imageId, previewContainer) {
      // Find and remove the image file from the selected files array
      selectedFiles = selectedFiles.filter(file => file.id !== imageId);

      // Perform AJAX request to delete the image from the database
      $.ajax({
        url: "<?php echo e(route('gallery-image.delete',':id')); ?>".replace(':id', imageId),  // Route for deleting the image
        type: 'DELETE',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),  // CSRF token
          id: imageId  // Send the image ID to the server
        },
        success: function(response) {
          if (response.status === 200) {
            // Remove the image preview container from the DOM
            previewContainer.remove();
        //    alert('Image deleted successfully!');
          } else {
            alert('Error deleting image');
          }
        },
        error: function(xhr, status, error) {
          alert('Error deleting image');
        }
      });

      // If the number of images is less than the limit, show the upload button again
      if (selectedFiles.length < imageLimit) {
        document.getElementById('image-input').disabled = false;
      }
    }
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/products/_create/_gallery.blade.php ENDPATH**/ ?>
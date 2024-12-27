
<form id="prod_step2_frm" class="needs-validation" novalidate enctype="multipart/form-data">

   <div class="card-body lead-status">
        <div class="mb-5 d-flex align-items-center justify-content-between">
            <h5 class="fw-bold mb-0 me-4">
                <span class="d-block mb-2">Specifications:</span>
            </h5>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div id="frmspec"></div>
            </div>
            <div class="col-lg-4 mb-4">
                <label class="form-label">Specification</label>
                <select class="form-control" name="product_detail_id" id="product_detail_id">
                    <option selected disabled></option>
                    @foreach($product_details as $product_detail)
                    <option value="{{$product_detail->id}}">{{$product_detail->name}}</option>
                    @endforeach
                </select>    
        </div>
        <div class="col-lg-4 mb-4">
                <label class="form-label">Value</label>
                <input type="text" class="form-control" name="value" id="value">
        </div>
          
            <div class="col-lg-4 mb-4">

                <button type="button" class="btn btn-primary" id="spec-add">Add</button>
            </div>
            <div class="col-lg-12 mb-12"></div>
            <div class="col-lg-12 mb-12">
                 <table class="table table-hover mb-0" id="tbl-spec">
                        <thead>
                            <tr>
                  
                                <th scope="col" width="30%">Product Detail</th>
                                <th scope="col">Value</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                       </tbody>

                    </table>
                    </div>

            </div>

        </div>

</form>
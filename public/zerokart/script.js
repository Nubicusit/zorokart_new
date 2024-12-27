function toggleDropdown() {
  const dropdownMenu = document.getElementById('dropdown-menu');
  dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
}

function openMenu() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.add('show-sidebar');
  document.addEventListener('click', closeSidebarOnClickOutside);
}

function closeMenu() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.remove('show-sidebar');
  document.removeEventListener('click', closeSidebarOnClickOutside);
}

function closeSidebarOnClickOutside(event) {
  const sidebar = document.getElementById('sidebar');
  if (!sidebar.contains(event.target) && !event.target.classList.contains('menu-icon')) {
    closeMenu();
  }
}


// --------------- Banner-----------------------
let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
  slides.forEach((slide) => {
    slide.classList.remove('active'); // Remove active class from all slides
  });

  slideIndex++; // Increment slide index

  if (slideIndex >= slides.length) {
    slideIndex = 0; // Reset to first slide after the last one
  }

  slides[slideIndex].classList.add('active'); // Add active class to the current slide
}

// Call showSlides every 3 seconds
setInterval(showSlides, 3000); // Change slide every 3 seconds

// Initially show the first slide
showSlides();



// ----------------------------------------- Brands ---------------------------------------

const brandContainer = document.getElementById('brandContainer');
let scrollPosition = 0;

function autoScroll() {
    // Scroll to the right by 1 item width
    scrollPosition += 100;
    if (scrollPosition >= brandContainer.scrollWidth - brandContainer.clientWidth) {
        scrollPosition = 0; // Reset scroll to the start
    }
    brandContainer.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });
}

// Set interval to auto-scroll every 2 seconds
// setInterval(autoScroll, 2000);
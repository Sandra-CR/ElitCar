document.addEventListener("DOMContentLoaded", function() {
  const track = document.getElementById('carouselTrack');
  const slides = document.querySelectorAll('.readCar_carousel-slide');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  let currentIndex = 0;

  function showSlide(index) {
    const newPosition = -index * 100 + '%';
    track.style.transform = 'translateX(' + newPosition + ')';
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % (slides.length / 3);
    showSlide(currentIndex);
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length / 3) % (slides.length / 3);
    showSlide(currentIndex);
  }

  prevBtn.addEventListener('click', prevSlide);
  nextBtn.addEventListener('click', nextSlide);

  showSlide(currentIndex);
});

// Ici on fait la fonction qui me permet d'afficher le mot de passe 
function togglePasswordVisibility() {
  const passwordInput = document.getElementById("floatingPassword");
  const checkbox = document.getElementById("show_password");

        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
}

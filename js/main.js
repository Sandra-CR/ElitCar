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

  if(prevBtn){
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);
    showSlide(currentIndex);
  }

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
// 
function redirectToGoogle() {
  window.location.href = 'https://accounts.google.com/o/oauth2/auth?client_id=940497895444-tb4oe307ftrctvr8vl4mrnkvgtegpa35.apps.googleusercontent.com&redirect_uri=http://localhost/ElitCar/view/home&response_type=code&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email';
}

// bouton delete

const deleteBtn = document.getElementById('delete');
const bombs = document.querySelectorAll('.bomb');

for (link of bombs) {
    link.addEventListener('click', function(){
        let href = this.dataset.link;
        deleteBtn.href = href;
    })
}
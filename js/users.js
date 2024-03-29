// Sélection des éléments du DOM
const searchBar = document.querySelector(".search input"), // Champ de recherche
      searchIcon = document.querySelector(".search button"), // Bouton de recherche
      usersList = document.querySelector(".users-list"); // Liste des utilisateurs

// Événement de clic sur l'icône de recherche
searchIcon.onclick = () => {
  searchBar.classList.toggle("show"); // Basculer la classe 'show' pour afficher ou masquer le champ de recherche
  searchIcon.classList.toggle("active"); // Basculer la classe 'active' pour changer l'apparence de l'icône de recherche
  searchBar.focus(); // Donner le focus au champ de recherche
  if (searchBar.classList.contains("active")) { // Si le champ de recherche est actif
    searchBar.value = ""; // Réinitialiser la valeur du champ de recherche
    searchBar.classList.remove("active"); // Retirer la classe 'active' du champ de recherche
  }
}

// Événement de saisie dans le champ de recherche
searchBar.onkeyup = () => {
  let searchTerm = searchBar.value; // Récupérer le terme de recherche saisi par l'utilisateur
  if (searchTerm != "") { // Si le terme de recherche n'est pas vide
    searchBar.classList.add("active"); // Ajouter la classe 'active' pour activer le style du champ de recherche
  } else {
    searchBar.classList.remove("active"); // Sinon, retirer la classe 'active'
  }

  // Effectuer une requête AJAX pour rechercher des utilisateurs correspondant au terme de recherche
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "controller/messagerie/search.php", true); // Définir la méthode POST et l'URL de la requête
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) { // Vérifier si la requête est terminée
      if (xhr.status === 200) { // Vérifier si la requête a réussi
        let data = xhr.response; // Récupérer les données de la réponse
        usersList.innerHTML = data; // Mettre à jour la liste des utilisateurs avec les données reçues
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Définir le type de contenu de la requête
  xhr.send("searchTerm=" + searchTerm); // Envoyer les données de recherche au serveur
}

// Fonction pour mettre à jour dynamiquement la liste des utilisateurs à intervalles réguliers
setInterval(() => {
  let xhr = new XMLHttpRequest(); // Créer un nouvel objet XMLHttpRequest
  xhr.open("GET", "controller/messagerie/users.php", true); // Définir la méthode GET et l'URL de la requête
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) { // Vérifier si la requête est terminée
      if (xhr.status === 200) { // Vérifier si la requête a réussi
        let data = xhr.response; // Récupérer les données de la réponse
        if (!searchBar.classList.contains("active")) { // Vérifier si le champ de recherche n'est pas actif
          usersList.innerHTML = data; // Mettre à jour la liste des utilisateurs avec les données reçues
        }
      }
    }
  }
  xhr.send(); // Envoyer la requête
}, 500); // Répéter la requête toutes les 500 millisecondes (0.5 seconde)


// Attendez que le DOM soit entièrement chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function() {
  // Sélectionnez l'élément du DOM représentant le lien ou bouton de déclenchement pour l'animation
  const clickici = document.querySelector('.clickici');
  // Sélectionnez l'élément du DOM représentant la liste des utilisateurs pour l'animation
  const usersList = document.querySelector('.div-users');

  // Ajoutez un écouteur d'événements au clic sur le lien ou bouton de déclenchement
  clickici.addEventListener('click', function() {
    // Basculez la classe 'show' pour afficher ou masquer la liste des utilisateurs
    usersList.classList.toggle('show');
  });
});



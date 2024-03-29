const form = document.querySelector(".typing-area"), // Sélectionne le formulaire d'envoi de message
      incoming_id = form.querySelector(".incoming_id").value, // Récupère l'ID de l'utilisateur destinataire du message
      inputField = form.querySelector(".input-field"), // Sélectionne le champ de saisie du message
      sendBtn = form.querySelector("button"), // Sélectionne le bouton d'envoi du message
      chatBox = document.querySelector(".chat-box"); // Sélectionne la zone d'affichage des messages

// Empêche le formulaire de se soumettre lors de l'appui sur la touche "Entrée"
form.onsubmit = (e) => {
    e.preventDefault(); // Empêche l'action par défaut du formulaire
}

// Met le focus sur le champ de saisie du message lorsque la page est chargée
inputField.focus();

// Événement de saisie dans le champ de saisie du message
inputField.onkeyup = () => {
    if (inputField.value != "") { // Si le champ de saisie du message n'est pas vide
        sendBtn.classList.add("active"); // Ajoute la classe 'active' au bouton d'envoi
    } else {
        sendBtn.classList.remove("active"); // Sinon, retire la classe 'active' du bouton d'envoi
    }
}

// Événement de clic sur le bouton d'envoi du message
sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); // Crée un nouvel objet XMLHttpRequest
    xhr.open("POST", "controller/messagerie/insert-chat.php", true); // Configure la requête POST vers le script d'insertion de message
    xhr.onload = () => { // Callback exécutée lorsque la requête est terminée
        if (xhr.readyState === XMLHttpRequest.DONE) { // Vérifie si la requête est terminée
            if (xhr.status === 200) { // Vérifie si la requête a réussi
                inputField.value = ""; // Efface le contenu du champ de saisie du message après l'envoi
                scrollToBottom(); // Appelle la fonction pour faire défiler la boîte de chat jusqu'en bas
            }
        }
    }
    let formData = new FormData(form); // Récupère les données du formulaire
    xhr.send(formData); // Envoie les données du formulaire au serveur
}

// Événement lorsque la souris entre dans la zone de chat
chatBox.onmouseenter = () => {
    chatBox.classList.add("active"); // Ajoute la classe 'active' à la zone de chat
}

// Événement lorsque la souris quitte la zone de chat
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active"); // Retire la classe 'active' de la zone de chat
}

// Fonction pour récupérer les nouveaux messages à intervalles réguliers
setInterval(() => {
    let xhr = new XMLHttpRequest(); // Crée un nouvel objet XMLHttpRequest
    xhr.open("POST", "controller/messagerie/get-chat.php", true); // Configure la requête POST vers le script de récupération de message
    xhr.onload = () => { // Callback exécutée lorsque la requête est terminée
        if (xhr.readyState === XMLHttpRequest.DONE) { // Vérifie si la requête est terminée
            if (xhr.status === 200) { // Vérifie si la requête a réussi
                let data = xhr.response; // Récupère la réponse du serveur
                chatBox.innerHTML = data; // Met à jour la zone de chat avec les nouveaux messages
                if (!chatBox.classList.contains("active")) { // Si la zone de chat n'est pas active
                    scrollToBottom(); // Fait défiler la zone de chat jusqu'en bas
                }
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Configure l'en-tête de la requête
    xhr.send("incoming_id=" + incoming_id); // Envoie l'ID de l'utilisateur destinataire du message au serveur
}, 500); // Répète la requête toutes les 500 millisecondes (0.5 seconde)

// Fonction pour faire défiler la zone de chat jusqu'en bas
function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight; // Déplace la barre de défilement de la zone de chat jusqu'en bas
}

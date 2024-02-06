<?php
    //include_once "../../controller/role.php";
    include_once "../base.php";
?>
<!-- Début du formulaire HTML -->
<h1 class="text-center mt-5 mb-5">Créer un utilisateur</h1>

<h3 class="text-center" id="message"></h3>

<form id="form" class="mx-auto col-6">

    <label for="first_name">Prénom</label>
    <input class="form-control" type="text" name="first_name">

    <label for="last_name">Nom</label>
    <input class="form-control" type="text" name="last_name">

    <label for="mail">Email</label>
    <input class="form-control" type="text" name="mail">

    <label for="psw">Mot de passe</label>
    <input class="form-control" type="password" name="psw">

    <input class="form-control mt-3 btn btn-secondary" type="submit" value="Ajouter">

</form>
<!-- Fin du formulaire HTML -->
</body>
</html>

<script>
    // Récupération du formulaire et de l'élément d'affichage du message
    const form = document.getElementById('form');
    const msg = document.getElementById('message');

    // Ajout d'un écouteur d'événement pour soumettre le formulaire
    form.addEventListener("submit", function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du formulaire

        const formData = new FormData(e.target); // Récupération des données du formulaire

        const data = {
            method: "POST",
            body: formData,
        };

        // Envoi des données du formulaire via une requête fetch
        fetch("controller/admin/ajax_create_ctrl_particular.php", data)
            .then(response => response.json()) // Conversion de la réponse en format JSON
            .then(data => {
                console.log(data); // Affichage des données reçues dans la console
                msg.innerHTML = data.message; // Affichage du message de la réponse
            });
    });
</script>

<?php
    //include_once "../../controller/role.php";
    include_once "../base.php";
?>
<!-- Début du formulaire HTML -->
<h1 class="text-center mt-5 mb-5">Créer une Agence</h1>

<h3 class="text-center" id="messagePro"></h3>

<form id="formProfessional" class="mx-auto col-6">

    <label for="name">Nom de Agence</label>
    <input class="form-control" type="text" name="name">

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
    const formpro = document.getElementById('formProfessional');
    const msgpro = document.getElementById('messagePro');

    // Ajout d'un écouteur d'événement pour soumettre le formulaire
    formpro.addEventListener("submit", function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du formulaire

        const formData = new FormData(e.target); // Récupération des données du formulaire

        const data = {
            method: "POST",
            body: formData,
        };

        // Envoi des données du formulaire via une requête fetch
        fetch("controller/admin/ajax_create_ctrl_professional.php", data)
            .then(response => response.json()) // Conversion de la réponse en format JSON
            .then(data => {
                console.log(data); // Affichage des données reçues dans la console
                msgpro.innerHTML = data.message; // Affichage du message de la réponse
            });
    });
</script>

<?php
    //include_once "../../controller/role.php";
    include_once "../base.php";
?>
    <h1 class="text-center mt-5 mb-5">Créer un utilisateur</h1>

    <h3 class="text-center" id="message"></h3>

    <form id="form" class="mx-auto col-6" >

    <label for="first_name">Prénom</label>
    <input class="form-control" type="text" name="first_name">

    <label for="last_name">Nom</label>
    <input class="form-control" type="text" name="last_name">

    <label for="mail">Email</label>
    <input class="form-control" type="text" name="mail">

    <label for="psw">Mot de passe</label>
    <input class="form-control" type="password" name="psw" >

    <input class="form-control mt-3 btn btn-secondary" type="submit" value="Ajouter">

    </form>
</body>
</html>
<script>
    const form = document.getElementById('form')
    const msg = document.getElementById('message')

    form.addEventListener("submit", function(e){
        e.preventDefault();

        const formData = new FormData(e.target);

        const data = {
            method: "POST",
            body: formData,
        } 

        fetch("controller/admin/ajax_create_ctrl_particular.php", data)
            .then(response => response.json())
            .then(data =>{
                console.log(data)
                msg.innerHTML = data.message
            })
        })
</script>
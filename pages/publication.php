<?php 
include("../inc/functions.php");
session_start(); 
$pubs = get_all_pub();
?>
<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publication</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            }

            .publication {
                border: 1px solid #ddd;
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .pub-header {
                font-weight: bold;
                margin-bottom: 10px;
            }

            .pub-content {
                margin-bottom: 10px;
            }

            .commentaire {
                background-color: #f5f5f5;
                padding: 10px;
                margin: 5px 0 5px 20px;
                border-radius: 3px;
            }

            .comment-form {
                margin-top: 10px;
                margin-left: 20px;
            }

            .comment-input {
                width: 80%;
                padding: 5px;
            }
        </style>
        <script type="text/javascript">
            //Les codes ci dessous sont executé lors que la page est chargée
            window.addEventListener("load", function () {
                function sendData() {
                    var xhr = new XMLHttpRequest();
                    var listepub = document.getElementById("listePubs");

                    // Liez l'objet FormData et l'élément form
                    var formData = new FormData(form);

                    // Définissez ce qui se passe si la soumission s'est opérée avec succès
                    xhr.addEventListener("load", function (event) {});
                    // Definissez ce qui se passe en cas d'erreur
                    xhr.addEventListener("error", function (event) {
                        alert("Oups! Quelque chose s'est mal passé.");
                    });

                    // Configurez la requête
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                listepub.innerHTML = "";

                                if (response && response.length > 0) {
                                    response.forEach(resp => {
                                        listepub.innerHTML += `
                                            <div class="row">
                                                <p><strong>Publication de: ${resp.id_membre}</strong> (${resp.date_de_pub})</p>
                                                <p class="text-center">${resp.contenue}</p>
                                            </div>`;
                                    });
                                } else {
                                    alert("Publication NON ENVOYER !");
                                }
                            } else {
                                alert("Erreur lors de la requête. Statut : " + xhr.status);
                            }
                        }
                    };

                    xhr.open("POST", "traitement.php?code=2");
                    // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
                    xhr.send(formData);
                }

                // Accédez à l'élément form …
                var form = document.getElementById("pubForm");

                // … et prenez en charge l'événement submit.
                form.addEventListener("submit", function (event) {
                    event.preventDefault(); // évite de faire le submit par défaut

                    sendData();
                });
            });
        </script>
    </head>

    <body>
        <div class="header">
            <h2>Publications  de <?= $_SESSION['user']['nom'] ?> </h2>
            <a href="logout.php">Déconnexion</a>
        </div>

        <form id="pubForm">
            <textarea id="texte" name="texte" rows="4" placeholder="Quoi de neuf ?" required></textarea>
            <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id'] ?>">
            <button type="submit">Publier</button>
        </form>

        <div id="listePubs">
            <?php if($pubs != null){
                foreach ($pubs as $pub) { ?>
                    <div class="row">
                        <p><strong>Publication de: <?= $pub['id_membre'] ?> </strong> (<?= $pub['date_de_pub'] ?>)</p>
                        <p class="text-center"><?= $pub['contenue'] ?></p>
                    </div>
            <?php }
            } ?>
        </div>
    </body>

</html>
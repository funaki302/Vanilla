<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hofantrano - Connexion</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
     <script>
        window.addEventListener("load", function() {
        var erreur = document.querySelector(".alert-danger");
        if (erreur) {
            setTimeout(function() {
                erreur.remove();
            }, 5000);
        }
    });
    </script>
    <script type="text/javascript">
        //Les codes ci dessous sont executé lors que la page est chargée
        window.addEventListener("load", function () {
            function sendData() {
                var xhr = new XMLHttpRequest();
                var chargementElement = document.getElementById("proprietaire");

                // Liez l'objet FormData et l'élément form
                var formData = new FormData(form);

                // Définissez ce qui se passe si la soumission s'est opérée avec succès
                xhr.addEventListener("load", function (event) {
                    $msg =
                        event.target.responseText != ""
                            ? event.target.responseText
                            : "OK";
                    alert($msg);
                });
                // Definissez ce qui se passe en cas d'erreur
                xhr.addEventListener("error", function (event) {
                    alert("Oups! Quelque chose s'est mal passé.");
                });

                // Configurez la requête
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response) {
                                chargementElement.remove();
                                // Rediriger vers la page publication.php en cas de succès
                                window.location.href = "publication.php";
                            } else {
                                chargementElement.remove();
                                // Afficher un message d'erreur en cas d'échec
                                window.location.href = "login.php?error=1";
                            }
                        } else {
                            chargementElement.remove();
                            alert("Erreur lors de la requête. Statut : " + xhr.status);
                        }
                    } else if (xhr.readyState < 4) {
                        // Optionnel : afficher un message de chargement
                        console.log("Chargement en cours...");
                        chargementElement.innerHTML = "<img src=\"../assets/Loading_icon.gif\" alt=\"\" class=\"mx-auto d-block\">";
                    }
                    
                };
                xhr.open("POST", "traitement.php?code=1");
                // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
                xhr.send(formData);
            }

            // Accédez à l'élément form …
            var form = document.getElementById("myForm");

            // … et prenez en charge l'événement submit.
            form.addEventListener("submit", function (event) {
                event.preventDefault(); // évite de faire le submit par défaut

                sendData();
            });
        });
    </script>

</head>

<body id="proprietaire">

    <div class="login-card" id="log">
        <header class="text-center mb-4">
            <h1>LOGIN</h1>
        </header>
        <main>
            <h4 class="mb-4 text-center">
                <span class="text-primary">Propriétaire</span> :
            </h4>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger text-center fw-bold" role="alert">
                    Impossible de se connecter en tant que propriétaire !
                </div>
            <?php endif ?>
            <form method="post" id="myForm">
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="mail" name="Email" id="Email" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control form-control-lg" required>
                </div>
                <input type="hidden" name="code" value="1">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg shadow">Valider</button>
                </div>
                <p id="chargement"></p>
            </form>
            <hr class="my-4">

           
        </main>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
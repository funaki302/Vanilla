<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Publications</title>
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
        
    </script>
</head>

<body>
    <div class="header">
        <h2>Publications  de <?= $_SESSION['nom_membre'] ?> </h2>
        <a href="logout.php">Déconnexion</a>
    </div>

    <form id="pubForm">
        <textarea id="texte" name="texte" rows="4" placeholder="Quoi de neuf ?" required></textarea>
        <button type="submit">Publier</button>
    </form>

    <div id="listePubs"></div>
</body>

</html>
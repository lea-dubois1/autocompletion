<?php
    if(isset($_GET['search'])) {
        $db_username = 'root';
        $db_password = '';
        try{
            $conn = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Error : " . $e->getMessage();
        }

        $sql = "SELECT * FROM jeux WHERE titre LIKE :recherche";
        $req = $conn->prepare($sql);
        $req->execute(array(':recherche' => "%" . $_GET['search'] . "%"));
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <title>Recherche</title>
</head>
<body>

    <?php require_once 'header.php' ?>

    <main>

        <?php

        foreach ($resultat as $value) {

            echo "<section class='article-place'>
                    <h2 class='article-title'><a class='link-article' href='element.php?id=$value[id]'>$value[titre]</a></h2>
                    <p class='article-text'>$value[contenu]</p>
                  </section>"
            ;
            
        }

        ?>

    </main>

    <footer></footer>

</body>
</html>
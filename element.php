<?php
    if(isset($_GET['id'])) {
        $db_username = 'root';
        $db_password = '';
        try{
            $conn = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Error : " . $e->getMessage();
        }

        $sql = "SELECT * FROM jeux WHERE id LIKE :id";
        $req = $conn->prepare($sql);
        $req->execute(array(':id' => $_GET['id']));
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php require_once 'header.php' ?>

    <main>

        <h2><?php echo $resultat['titre'] ?></h2>
        <p><?php echo $resultat['contenu'] ?></p>

    </main>

    <footer></footer>
    
</body>
</html>
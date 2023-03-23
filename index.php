<?php
    if(isset($_GET['find'])) {
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
        $req->execute(array(':recherche' => "%" . $_GET['find'] . "%"));
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        $jsonResult = json_encode($resultat, JSON_PRETTY_PRINT);
        echo $jsonResult;
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <title>Autocompletion</title>
</head>
<body>

    <?php require_once 'header.php' ?>

    <main></main>

    <footer></footer>
    
</body>
</html>
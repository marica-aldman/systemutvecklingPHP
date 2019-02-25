<!DOCTYPE html>
<html>
    <head>
        <title>Projekt2</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script src="projekt.js" type="text/javascript"></script>

        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

<?php
$host = 'localhost';
$db   = 'classicmodels';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$productName = 'Not set';
$productNumber = 'Not set';
$productDescription = 'Not set';
$productPrice = 'Not set';

// Läs in post
if (!isset($_POST['Produktnamn'])) {

    $sql = "SELECT productName FROM products WHERE productCode = 1";
    $pdo->prepare($sql)->execute();
    
$productName = 'Not set';
$productNumber = 'Not set';
$productDescription = 'Not set';
$productPrice = 'Not set';

    $name = $_POST['Produktnamn'];

    $sql = "UPDATE INTO products (productName) VALUES ('$name')";
    $pdo->prepare($sql)->execute();
}

// Ändra post
if (isset($_POST['Produktnamn'])) {
    $name = $_POST['Produktnamn'];

    $sql = "UPDATE INTO products (productName) VALUES ('$name')";
    $pdo->prepare($sql)->execute();
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 if($check !== false) {
 echo "File is an image - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "File is not an image.";
 $uploadOk = 0;
 }
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
   }
   if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
   }
   if($imageFileType != "jpg" && $imageFileType != "png" &&
$imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 $uploadOk = 0;
} 
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded";
}    else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file" . basename($_FILES["fileToUpload"]["name"]) . "has been Uploaded";
    } else {
        echo "Sorry, there was an error uploading your file";
    }
}
?>

<form action="redigera.php" method="post" enctype="multipart/form-data">
    <h2>Redigera produkt</h2>
    <label>Produktnamn</label>
    <input type="text" name="Produktnamn" placeholder="Fyll i produktnamn">
    <label>Beskrivning</label>
    <input type="text" name="Beskrivning" placeholder="Fyll i Beskrivning">
    <label>Pris</label>
    <input type="text" name="Pris" placeholder="Fyll i Pris">
    <label>Produktnummer</label>
    <input type="text" name="Produktnummer" value="1" readonly>
    <label>Produktbild</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Spara">
</form>




    </body>
</html>
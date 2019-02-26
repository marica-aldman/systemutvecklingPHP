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

/*Maricas coments are in english due to an english keyboard the only errors that should be left are inspect errors where the browser complains that there is no style.css or projekt.js*/


/* Establish a connection to the database */
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

/* get the product number for the product we are changing from the button clicked on the last page*/

if(isset($_POST['productNumber'])) {
   // $productNumber = $_POST['productNumber']; // we havent actually put this on the other page so until then we put a default value here from the products table
} else {
    $productNumber = 'S10_1678';
}

/*initialize the necessary variables for the form with default values, these shouldn't show in the form when this code functions correctly */

$productName = 'Not set';
$productDescription = 'Not set';
$productPrice = 'Not set';

// Change the product of the correct productcode

if (isset($_POST['Produktnamn'])) {
    $name = $_POST['Produktnamn'];
    $description = $_POST['Beskrivning'];
    $price = $_POST['Pris'];

    $sql = "UPDATE products SET productName ='" . $name . "', productDescription = '" . $description . "', buyPrice = '" . $price . "' WHERE productCode = '" . $productNumber. "'"; //OBS you need ' before and after variables to mark them as strings as the sql demands it
    $toInsert = $pdo->prepare($sql); // prepare the pdo
    $toInsert->execute(); // execute does the actual update

    $productName = $name;
    $productDescription = $description;
    $productPrice = $price;
}

// select and set the variables to their correct values using the productCode

if (!isset($_POST['Produktnamn'])) {

    $sql = "SELECT productName, productDescription, buyPrice FROM products WHERE productCode = '" . $productNumber . "'"; //OBS you need ' before and after variables to mark them as strings as the sql demands it
    $toDisplay = $pdo->prepare($sql); // prepare the pdo
    $toDisplay->execute(); // execute does the actual select but it has to be fetched for display after
    $result = $toDisplay->fetch(PDO::FETCH_ASSOC); // fetch the data in an array that is indexed by column name like this.

    if(count($result) > 0) {
        $productName = $result['productName'];
        $productDescription = $result['productDescription'];
        $productPrice = $result['buyPrice'];
    } else {
        $productName = 'Not getting it';
        $productDescription = 'Not getting it';
        $productPrice = 'Not getting it';
    }
    
}

/* upload picture to the assigned folder 
    remember to check if their is one as otherwise you will get a warning 
    also make sure this doesn't run unless a file has actually been sent */

if( is_uploaded_file($_FILES["fileToUpload"]["tmp_name"]) ) {
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
    // check if a file of that name already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // check if the file is too large
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // check that it has the right type
    if($imageFileType != "jpg" && $imageFileType != "png" &&
    $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    } 

    // upload if it passes all the checks

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded";
    }    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file" . basename($_FILES["fileToUpload"]["name"]) . "has been Uploaded";
        } else {
            echo "Sorry, there was an error uploading your file";
        }
    }
}


/* In order to have preset values for each field based on the product asked for, set the input value to value="
<?php
    echo $variableRelatedToTheInput;
?>
"*/
?>

<form action="redigera.php" method="post" enctype="multipart/form-data">
    <h2>Redigera produkt</h2>
    <label>Produktnamn</label>
    <input type="text" name="Produktnamn" placeholder="Fyll i produktnamn" value="
<?php
    echo $productName;      /* Set the product name to the name asked for when getting the product from the database. */
?>    
    ">
    <label>Beskrivning</label>
    <input type="text" name="Beskrivning" placeholder="Fyll i Beskrivning" value="
<?php
    echo $productDescription;      /* Set the product discription to the discription asked for when getting the product from the database. */
?>    
    ">
    <label>Pris</label>
    <input type="text" name="Pris" placeholder="Fyll i Pris" value="
<?php
    echo $productPrice;      /* Set the product price to the price asked for when getting the product from the database. */
?>    
    ">
    <label>Produktnummer</label>
    <input type="text" name="Produktnummer" readonly value="

<?php
    echo $productNumber;      /* Set the product number to the number of the product we asked the database for, this should be automatic when loading this page from the "Ändra" button on the product page/list. */
?>    

    ">
    <label>Produktbild</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Spara">
</form>




    </body>
</html>
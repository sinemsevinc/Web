
    
<?php
$data = $_POST;

// connection to db
session_start();
$con = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con, "projet");

// username check
$username = $_SESSION["username"];


//username-id match
$selectUsername = "SELECT * FROM person WHERE username = '$username'";
$queryUsername = mysqli_query($con, $selectUsername);
$fetchUsername = mysqli_fetch_assoc($queryUsername);


$userId = $fetchUsername["id"];


if (isset($data["add-to-cart"])){
    $message = null;

    $productId = $data["product-id"];
    $productName = $data["product-name"];
    $productPrice = $data["product-price"];
    $productImage = $data["product-image"];
    $productQuantity = $data["product-quantity"];

    if ($productQuantity > 0){
        $addItem = mysqli_query($con, "INSERT INTO cart(personId, productId, productName, productPrice, productImage) VALUES ('$userId', '$productId', '$productName', '$productPrice', '$productImage')");

        $updateQuantity = mysqli_query($con, "UPDATE jeuvideo SET quantite = '$productQuantity' - 1 WHERE id = '$productId'");

        $updateQuantity = mysqli_query($con, "UPDATE console SET quantite = '$productQuantity' - 1 WHERE id = '$productId'");

        $updateQuantity = mysqli_query($con, "UPDATE accessoire SET quantite = '$productQuantity' - 1 WHERE id = '$productId'");

        header("location: #cart");
    }

    else{
        
        $message = "Item out of stock! Click here to dismiss.";
    }
}

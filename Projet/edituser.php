<?php

session_start();
$con = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con, "projet");

$data = $_POST;


$username = $_SESSION["username"];

$selectUser = mysqli_query($con, "SELECT * FROM person WHERE username = '$username'");
$fetchUser = mysqli_fetch_assoc($selectUser);

$id = $fetchUser["UserID"];
$email = $fetchUser["email"];
$password = $fetchUser["password"];

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Edit User Page</title>
    <link rel="stylesheet" href="styles2.css"/>
    <link rel="icon" href="ninja_son.png">
</head>  
<body>
    <h1 class="login-title">Edit Profile</h1>
    <form class= "form" action="" method="POST">
        <input type="hidden" name="id2" value="<?php echo $id; ?>">

        <label class="login-text">Edit Username: </label>
        <input class="login-input" type="text" name="username" placeholder="<?php echo $username; ?>"/><br />
        
        <label class="login-text">Edit Email: </label>
        <input class="login-input" type="email" name="email" placeholder="<?php echo $email; ?>"/><br />
        
        <label class="login-text">Edit Password: </label>
        <input class="login-input" type="password" name="password"/><br />
        
        <label class="login-text">Confirm new password: </label>
        <input class="login-input" type="password" name="password-confirm"/><br />
        
        <input class="login-button" type="submit" value="Apply Changes" name="apply-btn"/>
        <input class="delete-button login-button" type="submit" value="Delete Account" name="delete-btn" onclick="return confirm('Are you sure you want to delete this user?')"/>
    </form>


    <?php
    
        if (isset($data["apply-btn"])){
            $id2 = $data["id2"];
            $newUsername = $data["username"];
            $newEmail = $data["email"];
            $newPassword = $data["password"];
            $passConf = $data["password-confirm"];

            if ($newUsername == null){
                $newUsername = $username;
            }
            
            if ($newEmail == null){
                $newEmail = $email;
            }
            
            if ($newPassword == null){
                $newPassword = $password;
            }
            
            if ($passConf == null){
                $passConf = $password;
            }
               

            mysqli_query($con, "UPDATE person SET username = '$newUsername' WHERE UserID = '$id2'");
            mysqli_query($con, "UPDATE person SET email = '$newEmail' WHERE UserID = '$id2'");
            mysqli_query($con, "UPDATE person SET password = '$newPassword' WHERE UserID = '$id2'");
            
            $_SESSION["username"] = $newUsername;
            header("location: user-page.php");
        }

        if (isset($data["delete-btn"])){
            $id2 = $data["id2"];

            mysqli_query($con, "DELETE FROM person WHERE UserID = '$id2'");
            header("location: produit.php");
        }
        
    ?>
</body>
</html>
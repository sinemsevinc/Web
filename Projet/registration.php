<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styles2.css"/>
    <link rel="icon" href="ninja_son.png">
</head>  
<body>
    <h1 class="login-title">Register</h1>
    <?php require_once 'messages.php'; ?>
    <form class= "form" action="signup.php" method="POST">
        <label class="login-text"for="username">Username: </label>
        <input class="login-input" type="text" name="username" /><br />
        <label class="login-text"for="email">Email: </label>
        <input class="login-input" type="text" name="email" /><br />
        <label class="login-text"for="password">Password: </label>
        <input class="login-input" type="password" name="password" /><br />
        <label class="login-text"for="password">Confirm password: </label>
        <input class="login-input" type="password" name="password_confirm" /><br />
        <input class="login-button" type="submit" value="Register" />
        <a class="link register" href="produit.php">Go to Product Page</a>
    </form>

    
    

</body>
</html>
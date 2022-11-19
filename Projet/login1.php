<html lang="en">
    <head>
        <title>User Login</title>
        <link rel="stylesheet" href="styles2.css"/>
        <link rel="icon" href="ninja_son.png">
    </head>
    <body>
        
        <h1 class="login-title">Login</h1>
        <?php require_once 'messages.php'; ?>
        <form class="form" action="login.php" method=   "POST">
            <label class="login-text"for="username">Username:</label>
            <input class="login-input" type="text" name= "username" /><br />
            <label class="login-text" for="password">Password:</label>
            <input class="login-input" type="password" name="password" /><br />
            <input class="login-button" type="submit" value="Login" />
            <p class="link">Don't have an account? <a class="register" href="registration.php">Register Now</a></p>
        </form>
    </body>
</html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles2.css"/>
    <link rel="icon" href="ninja_son.png">
</head>
<body>
<?php

session_start();

$data = $_POST;

if(empty($data['username']) || empty($data['password'])){
    $_SESSION['messages'][] = 'Username or password are required!';
}

$username = $data['username'];
$password = $data['password'];

$dsn = 'mysql:dbname=projet;host=localhost';
$dbUser = 'root';
$dbPassword = 'root';

try{
    $connection = new PDO($dsn, $dbUser, $dbPassword);
}catch (PDOException $exception){
    $_SESSION['messages'][] = 'Connection failed: ' . $exception->getMessage();
    header('Location: login1.php');
}

$statement = $connection->prepare('SELECT * FROM person WHERE username = :username');
$statement->execute([':username' => $username]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(empty($result)){
    $_SESSION['messages'][] = 'Incorrect username or password!';
    header('Location: login1.php');
}

$user = array_shift($result);

if($user['username'] === $username && $user['password'] === $password){
    // $_SESSION['messages'][] = 'You have been successfully logged in!' . "<br />";
    // header('Location: login1.php');
$_SESSION['username'] = $user['username'];
    include("user-page.php");
}else{
    $_SESSION['messages'][] = 'Incorrect username or password!';
    header('Location: login1.php');
}
?>
</body>
</html>
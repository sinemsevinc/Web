<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles2.css"/>
</head>
<body>
<?php

session_start();

$data = $_POST;

if (empty($data['username']) ||
    empty($data['password']) ||
    empty($data['email']) ||
    empty($data['password_confirm'])) {
    
    $_SESSION['messages'][] = 'Please fill all required fields!';
    header('Location: registration.php');
    exit;
}

if(strlen($data['password'])<8){
    $_SESSION['messages'][] = 'Password needs to be longer than 8 characters';
    header('Location: registration.php');
    exit;
}

if ($data['password'] !== $data['password_confirm']) {
    $_SESSION['messages'][] = 'Password and Confirm password should match!';
    header('Location: registration.php');
    exit;   
}

$dsn = 'mysql:dbname=projet;host=localhost';
$dbUser = 'root';
$dbPassword = 'root';

try{
    $connection = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $exception){
    $_SESSION['messages'][] = 'Connection failed: ' . $exception->getMessage();
    header('Location: registration.php');
    exit;
}

$statement = $connection->prepare('SELECT * FROM person WHERE username=:username OR email=:email');
if($statement){
    $statement->execute([
        ':username' => $data['username'],
        ':email' => $data['email'],
    ]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($result)){
        $_SESSION['messages'][] = 'user with the username already exists!';
        header('Location: registration.php');
        exit;
    }
}

$statement = $connection->prepare('INSERT INTO person (username, email, password) VALUES (:username, :email, :password)');
if($statement){
    $statement->execute([
        ':username' => $data['username'],
        ':email' => $data['email'],
        ':password' => $data['password'],

    ]);
    
        include("login1.php");
    }


?>
</body>
</html>




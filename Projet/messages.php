<!DOCTYPE html>
<html lang="en">
<head>
    <title>Messages</title>
    <link rel="stylesheet" href="styles2.css"/>
</head>
<body>
    <?php

    session_start();

    if(empty($_SESSION['messages'])){
        return;
    }

    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
    ?>
    <div >
        <?php foreach($messages as $message): ?>
            <span ><?php echo "<span class='message'>" . $message . "</span>"; ?></span>
        <?php endforeach; ?>
    </div>
</body>
</html>

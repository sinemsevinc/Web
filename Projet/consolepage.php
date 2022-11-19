<?php

session_start();
$con = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con, "projet");

$data = $_POST;


$productId = $_SESSION["id"];


$selectProduct = mysqli_query($con, "SELECT * FROM console WHERE ConsoleID = '$productId'");
$fetchProduct = mysqli_fetch_assoc($selectProduct);

$name = $fetchProduct["nom"];
$price = $fetchProduct["prix"];
$description = $fetchProduct["description"];
$video = $fetchProduct["video"];
$marque = $fetchProduct["marque"];
$release = $fetchProduct["releas"];
$slogan = $fetchProduct["slogan"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gaming, Games, Ninja, Play, Playstation, Technology, Best games, New games, Buy games, Valorant, online game">
    <meta name="description" content="Ninja Gaming is the World's biggest online game store">
    <title>Ninja Gaming Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="icon" href="ninja_son.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>


<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <!-- <a href="#"><img src="ninja-gaming-logo_low.png" alt="" class="logo"></a> -->

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          
            <div class="dropdown" style="float:left;">
                <a class="nav-link dropdown-toggle" href="#"
                id="navbarDropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"><i class='bx bx-menu'></i></a>
          <!-- Dropdown menu -->
    
                <div class="dropdown-content" style="left:0;" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" aria-current="page" href="user-page2.php">Home</a>

                    <a class="dropdown-item" href="games.php">Games</a>
            
                    <a class="dropdown-item" href="consoles.php">Consoles</a>
            
                    <a class="dropdown-item" href="accessoire.php">Accessories</a>
                </div>
            </div>
        </li>
      </ul>

      <div class="space">
        <a href="#"><img src="ninja-gaming-logo_low.png" alt="" class="logo"></a>
      </div>
      <div class="space2"></div>
      <div class="list-cont">
      <ul class="navbar-nav menu-right me-auto mb-2 mb-lg-0">
        <li >
            <div class="cart">
                <a class="nav-link" href="#"><i class="bx bx-cart"></i></a>
            </div>
        </li>
        <li>
            <div class="login">
                <a class="nav-link" href="http://localhost/Projet/login1.php"><i class="bx bx-user"></i></a>
            </div>
        </li>

        
      </ul>
      <!-- Left links -->
    </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<div>


<div class="cont">
    <div class="vid">
        
       <h1 class="namee"><?php echo $name; ?></h1>
       
    <video autoplay muted loop class="video">
        <source src="resim/<?php echo $video; ?>" type="video/mp4">
    </video>
    </div>

    <div class="explain">
            <h3><?php echo $slogan; ?></h3>
            <?php echo $description; ?>
            <h4 class="pr"><?php echo "$price €"; ?></h4>
            <p><span class="boldd"><?php echo $release; ?></span></p>
            <p><span class="boldd"><?php echo $marque; ?></span></p>
            <?php

    if($fetchProduct["quantite"] >0) { ?>
    <form action="" method="post" class="collection-item">
        <a href="<?php echo $fetchProduct['login']; ?>">
            <i class="bx bx-cart cart cart-login"></i>
        </a>
        <input type="hidden" name="id2" value="<?php echo $productId; ?>">
    </form>
    <?php  } else { ?>
        <h3 class="out">Item out of stock </h3>
    <?php } 

    
?>
        </div>
</div>
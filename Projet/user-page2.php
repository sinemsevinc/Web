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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


</head>


<body>

<?php

$data = $_POST;

// connection to db
session_start();
$con = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con, "projet");

// username check
$username = $_SESSION["username"];

if (!isset($username)){
  header("location: produit.php");
}

?>


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
                    <a class="dropdown-item" aria-current="page" href="user-page2.php?username=<?php echo $username; ?>">Home</a>

                    <a class="dropdown-item" href="games2.php?username=<?php echo $username; ?>">Games</a>
            
                    <a class="dropdown-item" href="consoles2.php?username=<?php echo $username; ?>">Consoles</a>
            
                    <a class="dropdown-item" href="accessoire2.php?username=<?php echo $username; ?>">Accessories</a>
                </div>
            </div>
        </li>
      </ul>

      <div class="space3">
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
        <a href="edituser.php" class="edit" ><?php echo $username; ?></a>
        <?php $_SESSION["username"] = $username; ?>
                
        </li>
        <li><a class="nav-link logout"href="produit.php"><i class="bx bx-log-out"></i></a></li>

        
      </ul>

    </div>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

    <div class="best">
        <h3>Best Sellers</h3>
    </div>

    <div class="container">

        <?php

            $selectProduct = "SELECT * FROM jeuvideo WHERE best = 'best'";
            $queryProduct = mysqli_query($con, $selectProduct);

            if (mysqli_num_rows($queryProduct) > 0){
                while($fetchProduct = mysqli_fetch_assoc($queryProduct)){ ?>
                
                <div class="cont-elem">
                    
                    <a href="<?php echo $fetchProduct['gamessite2']; ?>">
                        <img src="resim/<?php echo $fetchProduct["img"] ; ?>" alt="" class="img-fluid hovered thumbnail">  

                    </a>
                    <div class="ozellik">
                        <p class="nom"><?php echo $fetchProduct["nom"]; ?></p>
                        <p class="prix"><?php echo $fetchProduct["prix"]. '€'; ?></p>
                        
                    </div>
                </div>
            
            <?php };
            };

          ?>

          <?php

            $selectProduct = "SELECT * FROM console WHERE best = 'best'";
            $queryProduct = mysqli_query($con, $selectProduct);

            if (mysqli_num_rows($queryProduct) > 0){
                while($fetchProduct = mysqli_fetch_assoc($queryProduct)){ ?>
                
                <div class="cont-elem">
                    <a href="<?php echo $fetchProduct['consolessite2']; ?>">
                        <img src="resim/<?php echo $fetchProduct["img"] ; ?>" alt="" class="img-fluid hovered thumbnail">  

                    </a>
                    <div class="ozellik">
                        <p class="nom"><?php echo $fetchProduct["nom"]; ?></p>
                        <p class="prix"><?php echo $fetchProduct["prix"]. '€'; ?></p>
                        
                    </div>
                </div>
            
            <?php };
            };

          ?>

          <?php

            $selectProduct = "SELECT * FROM accessoire WHERE best = 'best'";
            $queryProduct = mysqli_query($con, $selectProduct);

            if (mysqli_num_rows($queryProduct) > 0){
                while($fetchProduct = mysqli_fetch_assoc($queryProduct)){ ?>
                
                <div class="cont-elem">
                    <a href="<?php echo $fetchProduct['accessoiresite2']; ?>">
                        <img src="resim/<?php echo $fetchProduct["img"] ; ?>" alt="" class="img-fluid hovered thumbnail">  

                    </a>
                    <div class="ozellik">
                        <p class="nom"><?php echo $fetchProduct["nom"]; ?></p>
                        <p class="prix"><?php echo $fetchProduct["prix"]. '€'; ?></p>
                        
                    </div>
                </div>
            
            <?php };
            };
          ?>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                        <a href="#"><i class="icon ion-social-facebook"></i></a>
                        <a href="#"><i class="icon ion-social-twitter"></i></a>
                        <a href="#"><i class="icon ion-social-snapchat"></i></a>
                        <a href="#"><i class="icon ion-social-instagram"></i></a>
                        <a href="#"><i class="icon ion-social-linkedin"></i></a>
                        <p class="copyright">Ninja Gaming © 2022</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
          
</body>
</html>
<?php
    session_start();
    
    session_destroy();

    echo 'You have been successfully logged out!';
    include("produit.php");
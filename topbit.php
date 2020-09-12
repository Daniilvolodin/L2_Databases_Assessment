<!DOCTYPE HTML>

<html lang="en">
<?php
    session_start(); // to allow variable transfer between pages...
    include("config.php");
    // Connect to database...
    $dbconnect = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if(mysqli_connect_errno()) {
        echo "Connection failed".mysqli_connect_error();
        exit;
        
    }
    ?>  

<head>
    <meta charset="utf-8">
    <meta name="description" content="Pokemon and stats">
    <meta name="GTT" content="Pokemon Stats">
    <meta name="keywords" content="pokemon, stats, etc">
    
    <title>Pokemon Stats Database</title>

    <!-- for multiple fonts change | to %7c * no spaces*  -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet">  

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/data_style.css">    <!-- custom style sheet -->

    
</head>

<body >
    
    <p class="message">Eek!  Your browser does not support grid.  Please upgrade your system.</p>
     
    <div class="wrapper">
    <div class="box logo" style="border: 3px solid;">
    <a href="index.php"><img src="images/pokeball.png" alt="Pokeball" class="pokeball" /></a>  
    </div>
       
        
        <div class="box banner" style="background-color: red;">
        <div style="    position: absolute;margin-top: 95px;width: max-content;">
        <input type="button" onclick="location.href='showall.php';" value="Show All" class="showallbutton" />
        <input type="button" onclick="location.href='add_pokemon.php';" value="Add Pokemon" class="showallbutton" />
        </div>
            <div class="box new">
            
            <h1 style="position: relative;top: 0;font-size: 60px;padding: 0px;font-weight: bold;font-family: fangsong;letter-spacing: 2px;color: #f0f8ff;-webkit-text-stroke: 1px white;user-select: none;">Pokemon Database</h1>
             
        </div>
        </div> <!-- / banner -->
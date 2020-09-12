<?php include("topbit.php");
    
    $find_sql = "SELECT * FROM `PokemonTable`
    JOIN Type1ID ON (PokemonTable.Type1ID = Type1ID.Type1ID)
    JOIN Type2ID ON (PokemonTable.Type2ID = Type2ID.Type2ID)
    
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);
?>
                       
            
        <div class="box main" style="border: 3px solid;
    background-image: url(images/pokeballs.jpg);
    background-blend-mode: multiply;
    background-color: #867b7b;
    background-repeat-x: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
            <?php
            include("results.php")
            ?>
            
            
            
            

            
        </div> <!-- / main -->
<?php include("bottombit.php")?>
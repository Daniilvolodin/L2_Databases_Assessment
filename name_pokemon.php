<?php include("topbit.php");
    

    $pokemon = $_POST['pokemon_name'];

    $find_sql = "SELECT * FROM `PokemonTable`
    JOIN Type1ID ON (PokemonTable.Type1ID = Type1ID.Type1ID)
    JOIN Type2ID ON (PokemonTable.Type2ID = Type2ID.Type2ID)
    WHERE `Name` LIKE '%$pokemon%' 
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);
?>
                       
            
        <div class="box main">
            
            
            <?php
            include("results.php")
            ?>
            
            
            
            

            
        </div> <!-- / main -->
<?php include("bottombit.php")?>
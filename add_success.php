<?php include("topbit.php");
    // retrieves information...
    $ID = $_SESSION['ID'];

    $find_sql = "SELECT * FROM `PokemonTable`
    JOIN Type1ID ON (PokemonTable.Type1ID = Type1ID.Type1ID)
    JOIN Type2ID ON (PokemonTable.Type2ID = Type2ID.Type2ID)
    WHERE `ID` = '$ID'";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
    <div class="box main">
        <h2><b>Congratulations!</b></h2>
        <p>You have added a Pokemon to the DataBase</p>
        
        <?php
        include("results.php");
        ?>


    </div>
    


<?php include("bottombit.php") ?>
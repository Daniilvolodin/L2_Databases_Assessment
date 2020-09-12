<?php include("topbit.php");
    $type1 = mysqli_real_escape_string($dbconnect, $_POST['Type1']);
    $type2 = mysqli_real_escape_string($dbconnect, $_POST['Type2']);
    
    $total = mysqli_real_escape_string($dbconnect, $_POST['total']);
    $total_more_less = mysqli_real_escape_string($dbconnect, $_POST['total_more_less']);

    $health = mysqli_real_escape_string($dbconnect, $_POST['health']);
    $health_more_less = mysqli_real_escape_string($dbconnect, $_POST['health_more_less']);

    $attack = mysqli_real_escape_string($dbconnect, $_POST['attack']);
    $attack_more_less = mysqli_real_escape_string($dbconnect, $_POST['attack_more_less']);

    $atkspeed = mysqli_real_escape_string($dbconnect, $_POST['attack_speed']);
    $atkspeed_more_less = mysqli_real_escape_string($dbconnect, $_POST['atkspeed_more_less']);

    $defspeed = mysqli_real_escape_string($dbconnect, $_POST['defense_speed']);
    $defspeed_more_less = mysqli_real_escape_string($dbconnect, $_POST['defspeed_more_less']);

    $defense = mysqli_real_escape_string($dbconnect, $_POST['defense']);
    $defense_more_less = mysqli_real_escape_string($dbconnect, $_POST['defense_more_less']);
    
    $speed = mysqli_real_escape_string($dbconnect, $_POST['speed']);
    $speed_more_less = mysqli_real_escape_string($dbconnect, $_POST['speed_more_less']);
    
    $generation = mysqli_real_escape_string($dbconnect, $_POST['generation']);

    $legendary =0;
  

if(isset($_POST['legendary_adv'])){
    $legendary = 1;
    }
else{
    $legendary = 0;
   }
   
if ($health_more_less == "atleast"){
    $health_op = ">=";
   }
elseif ($health_more_less == "atmost") {
    $health_op = "<=";
   }
else {
    $health = 0;
    $health_op = "<=";
   }
    
    
if ($attack_more_less == "atleast"){
    $attack_op = ">=";
    }
elseif ($attack_more_less == "atmost") {
    $attack_op = "<=";
    }
else {
    $attack = 0;
    $attack_op = "<=";
    }



if ($atkspeed_more_less == "atleast"){
    $atkspeed_op = ">=";
    }

elseif ($atkspeed_more_less == "atmost") {
    $atkspeed_op = "<=";
    }

else {
    $atkspeed = 0;
    $atkspeed_op = "<=";
    }


if ($defspeed_more_less == "atleast"){
    $defspeed_op = ">=";
    }

elseif ($defspeed_more_less == "atmost") {
    $defspeed_op = "<=";
    }

else {
    $defspeed = 0;
    $defspeed_op = "<=";
    }




if ($defense_more_less == "atleast"){
    $defense_op = ">=";
    }

elseif ($defense_more_less == "atmost") {
    $defense_op = "<=";
    }

else {
    $defense = 0;
    $defense_op = "<=";
    }


if ($speed_more_less == "atleast"){
    $speed_op = ">=";
    }

elseif ($speed_more_less == "atmost") {
    $speed_op = "<=";
    }

else {
    $speed = 0;
    $speed_op = "<=";
    }

if ($total_more_less == "atleast"){
    $total_op = ">=";
    }

elseif ($total_more_less == "atmost") {
    $total_op = "<=";
    }

else {
    $total = 0;
    $total_op = "<=";
    }


    $find_sql = "SELECT * FROM `PokemonTable`
    JOIN Type1ID ON (PokemonTable.Type1ID = Type1ID.Type1ID)
    JOIN Type2ID ON (PokemonTable.Type2ID = Type2ID.Type2ID)
    WHERE (`Legendary` = $legendary OR `Legendary` = 1)
    AND `Type 1` LIKE '%$type1%' 
    AND `Type 2` LIKE '%$type2%' 
    AND `Total` $total_op '$total'
    AND `Attack` $attack_op '$attack'
    AND `Defense` $defense_op '$defense'
    AND `Sp. Attack` $atkspeed_op '$atkspeed'
    AND `Sp. Def` $defspeed_op '$defspeed'
    AND `Speed` $speed_op '$speed'
    AND `HP` $health_op '$health'
    AND `Generation` = '$generation'
    
    
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
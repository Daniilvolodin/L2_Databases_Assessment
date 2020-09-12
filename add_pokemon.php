<?php include("topbit.php");
$attack = "";
$defense = "";
$atkspeed = "";
$defspeed = "";
$speed = "";
$total = "";
$name = "";
$type1 = "";
$type1ID = "";
$type2 = "";
$type2ID = "";
$legendary = 0;
$health = "";
$generation = "";
$has_errors = "no";
$gen_message = "";


$name_error = $total_error = $attack_error = $defense_error = $atkspeed_error = $defspeed_error = $type1ID_error = $type2ID_error = $generation_error = $speed_error = $health_error = "no-error";


$name_field = $total_field = $attack_field = $defense_field = $atkspeed_field = $defspeed_field = $type1ID_field = $type2ID_field = $generation_field = $speed_field = $health_field = "-ok";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    // Get values from form
    $name = mysqli_real_escape_string($dbconnect, $_POST['name']);
    $attack = mysqli_real_escape_string($dbconnect, $_POST['attack_f']);
    $type1ID = mysqli_real_escape_string($dbconnect, $_POST['Type1']);
    $type2ID = mysqli_real_escape_string($dbconnect, $_POST['Type2']);
    if($type1ID != ""){
    $type1_sql="SELECT * FROM `Type1ID` ORDER BY `Type1ID`.`Type1ID` ASC";
    $type1_query=mysqli_query($dbconnect, $type1_sql);
    $type1_rs=mysqli_fetch_assoc($type1_query);
    $type1 = $type1_rs['Type 1'];
    
    }
    if($type2ID != ""){
    $type2_sql="SELECT * FROM `Type2ID` ORDER BY `Type2ID`.`Type2ID` ASC";
    $type2_query=mysqli_query($dbconnect, $type2_sql);
    $type2_rs=mysqli_fetch_assoc($type2_query);
    $type2 = $type2_rs['Type 2'];
    
    }
    $health = mysqli_real_escape_string($dbconnect, $_POST['health_f']);
    $atkspeed = mysqli_real_escape_string($dbconnect, $_POST['atkspeed_f']);
    $defense = mysqli_real_escape_string($dbconnect, $_POST['defense_f']);
    $defspeed = mysqli_real_escape_string($dbconnect, $_POST['defspeed_f']);
    $speed = mysqli_real_escape_string($dbconnect, $_POST['speed_f']);
    $legendary = mysqli_real_escape_string($dbconnect, $_POST['legendary_f']);
    $generation = mysqli_real_escape_string($dbconnect, $_POST['generation_f']);
    
    if ($name ==""){
        $has_errors = "yes";
        $name_error = "error-text";
        $name_field = "form-error";
    }
    if ($health == ""){
        $has_errors = "yes";
        $health_error = "error-text";
        $health_field = "form-error";
    }
    if ($speed == ""){
        $has_errors = "yes";
        $speed_error = "error-text";
        $speed_field = "form-error";
    }
    if ($attack == ""){
        $has_errors = "yes";
        $attack_error = "error-text";
        $attack_field = "form-error";
    }
    if ($defense == ""){
        $has_errors = "yes";
        $defense_error = "error-text";
        $defense_field = "form-error";
    }
    if ($atkspeed == ""){
        $has_errors = "yes";
        $atkspeed_error = "error-text";
        $atkspeed_field = "form-error";
    }
    if ($defspeed == ""){
        $has_errors = "yes";
        $defspeed_error = "error-text";
        $defspeed_field = "form-error";
    }
    if ($type1ID == ""){
        $has_errors = "yes";
        $type1ID_error = "error-text";
        $type1ID_field = "form-error";
    }
    if ($type2ID == ""){
        $has_errors = "yes";
        $type2ID_error = "error-text";
        $type2ID_field = "form-error";
    }
    if ($generation == ""){
        $generation = 1;
        $generation_error = "defaulted";
        $gen_message = "Generation has been automatically set to 1";
    }
    if ($total != $attack + $defense + $speed + $atkspeed + $defspeed + $health){
        $total = ($attack + $defense + $speed + $atkspeed + $defspeed + $health);
    }
    
    
   
   
    if ($has_errors == "no"){
    
        header('Location: add_success.php');
        $addentry_sql = "INSERT INTO `volodind70370`.`PokemonTable` (`ID` , `Name` , `Type1ID` , `Type2ID` , `Total` , `HP` , `Attack` , `Defense` , `Sp. Attack` , `Sp. Def` , `Speed` , `Generation` , `Legendary`) VALUES (NULL , '$name', '$type1ID', '$type2ID', '$total', '$health', '$attack', '$defense', '$atkspeed', '$defspeed', '$speed', '$generation', '$legendary');";
        $addentry_query = mysqli_query($dbconnect, $addentry_sql);  

        // Get ID for the next page
        $getid_sql = "SELECT * FROM `PokemonTable` WHERE `Name` LIKE '$name' AND `Type1ID` =$type1ID AND `Type2ID` =$type2ID AND `Total` =$total AND `HP` =$health AND `Attack` =$attack AND `Defense` =$defense AND `Sp. Attack` =$atkspeed AND `Sp. Def` =$defspeed AND `Speed` =$speed AND `Generation` =$generation AND `Legendary` =$legendary";

        $getid_query = mysqli_query($dbconnect, $getid_sql);
        $getid_rs = mysqli_fetch_assoc($getid_query);
        $ID = $getid_rs['ID'];
        $_SESSION['ID'] = $ID;
    
    }
    }

?>
        <div class="box main" style="    border: 3px solid;
    background-image: url(images/pokeballs.jpg);
    background-blend-mode: multiply;
    background-color: #867b7b;
    background-repeat-x: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
        <div class="finalform" style="    background-color: #adaca4d9;
    padding: 30px;
    max-width: fit-content;
    border-radius: 30px;
    position: relative;
    top: 20px;
    padding-top: 0px;
    border: 3px #ffffff;
    border-style: solid;
    display: inline-block;">  
        <h2 style="text-transform: capitalize;padding: 0px;position: relative;font-size: 40px;font-family: initial;top: 15px;">Add Pokemon</h2>
          <form method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class= "box-thing">
            <div class="<?php echo $name_error; ?>">
                Please fill in the Pokemon name field  
            </div>
            
            <input class="entryfield <?php echo $name_field; ?>" type="text" name="name"  value="<?php echo $name; ?>" placeholder="Pokemon Name (Required)..."/>  
            </div>
            
            <div class="box-thing">
            
            <input class="entryfield <?php echo $total_field; ?>" type="text" name="total_f" style="background-color: gainsboro;border-color: black;" value="<?php echo $total; ?>" disabled placeholder="Total Points... (Disabled)"/>  
              
            </div>
            
            <div class= "box-thing">
            <div class="<?php echo $health_error; ?>">
                Please fill in the Health Points field  
            </div>
            
            <input class="entryfield <?php echo $health_field; ?>" type="text" name="health_f"  value="<?php echo $health; ?>" placeholder="Health Points..."/>  
              
            </div>
            
            <div class= "box-thing">
            <div class="<?php echo $attack_error; ?>">
                Please fill in the Attack Points field  
            </div>
              
                <input class="entryfield <?php echo $attack_field; ?>" type="number" name="attack_f" value="<?php echo $attack; ?>"     min="0" placeholder="Enter Pokemon Attack Points"/>
               </div> 
            <div class= "box-thing">  
              <div class="<?php echo $atkspeed_error; ?>">
                Please fill in the Attack Speed Points field  
                </div>
              
                <input class="entryfield <?php echo $atkspeed_field; ?>" type="number" name="atkspeed_f" value="<?php echo $atkspeed; ?>"  min="0" placeholder="Enter Pokemon Attack Speed Points"/>
              </div>
            <div class= "box-thing">
            <div class="<?php echo $defense_error; ?>">
                Please fill in the Defense field  
            </div>
              
                <input class="entryfield <?php echo $defense_field; ?>" type="number" name="defense_f" value="<?php echo $defense; ?>"     min="0" placeholder="Enter Pokemon Defense Points"/>
              </div>
            <div class= "box-thing">     
            <div class="<?php echo $defspeed_error; ?>">
                Please fill in the Defense Speed Points field  
                </div>
                
                <input class="entryfield <?php echo $defspeed_field; ?>" type="number" name="defspeed_f" value="<?php echo $defspeed; ?>"  min="0" placeholder="Enter Pokemon Defense Speed Points"/>
              </div>  
            <div class= "box-thing">
            <div class="<?php echo $speed_error; ?>">
                Please fill in the Speed Points field  
            </div>
            
            <input class="entryfield <?php echo $speed_field; ?>" type="number" name="speed_f" value="<?php echo $speed; ?>"  min="0" placeholder="Enter Pokemon Speed Points"/>
            </div>
            <div class= "box-thing">
            <div class="<?php echo $type1ID_error; ?>">
                Please fill in the Type 1 field  
            </div>
            
            
            <select name="Type1" class="entryfield <?php echo $type1ID_field; ?>">
            
            
            <!-- Get options from the database -->
                <?php
                if ($type1ID == ""){
                ?>
                <option value="" selected>Pick The Type</option>  
                
                <?php
                }
                elseif ($type1ID != ""){
                ?>
                <option value="<?php echo $type1ID; ?>" selected><?php echo $type1_rs['Type 1']; ?></option>
                <?php
                }
                ?>
                
                <?php
                $type1_sql="SELECT * FROM `Type1ID` ORDER BY `Type1ID`.`Type1ID` ASC";
                $type1_query=mysqli_query($dbconnect, $type1_sql);
                $type1_rs=mysqli_fetch_assoc($type1_query);
                
                
                do {
                    ?>
                
                <option value="<?php echo $type1_rs['Type1ID']; ?>"><?php echo 
                
                $type1_rs['Type 1'];?></option>
                
                <?php
                } // end type1 loop
                while($type1_rs=mysqli_fetch_assoc($type1_query))
                
                ?>
            </select>
            </div>
            <div class= "box-thing">
            <div class="<?php echo $type2ID_error; ?>">
                Please fill in the Type 2 field  
            </div>
            
            
            <select name="Type2" class="entryfield <?php echo $type2ID_field; ?>">
            
            
            <!-- Get options from the database -->
                <?php
                if ($type2ID == ""){
                ?>
                <option value="" selected>Pick The Type</option>  
                
                <?php
                }
                elseif ($type2ID != ""){
                ?>
                <option value="<?php echo $type2ID; ?>" selected><?php echo $type2_rs['Type 2']; ?></option>
                <?php
                }
                ?>
                
                <?php
                $type2_sql="SELECT * FROM `Type2ID` ORDER BY `Type2ID`.`Type2ID` ASC";
                $type2_query=mysqli_query($dbconnect, $type2_sql);
                $type2_rs=mysqli_fetch_assoc($type2_query);
                
                
                do {
                    ?>
                
                <option value="<?php echo $type2_rs['Type2ID']; ?>"><?php echo 
                
                $type2_rs['Type 2'];?></option>
                
                <?php
                } // end type2 loop
                while($type2_rs=mysqli_fetch_assoc($type2_query))
                
                ?>
            </select>
            </div>  
            <div class= "box-thing">
            <div class="<?php echo $generation_error; ?>">
                <?php echo $gen_message; ?> 
            </div>
              
            <input name="generation_f" class="entryfield <?php echo $generation_field; ?>" type="number" value="<?php echo $generation; ?>" min="1" max="6" placeholder="Enter Pokemon Generation"/>
            </div>
            <div class= "box-thing">
                <b>Is It A Legendary Pokemon?</b>
                <?php
                if($legendary == 0){
                    // Default value, 'No' Selected
                ?>
                <input type="radio" name="legendary_f" value="0" checked="checked"/>No
                <input type="radio" name="legendary_f" value="1"/>Yes
                <?php
                }
                else{
                ?>
                <input type="radio" name="legendary_f" value="0" />No
                <input type="radio" name="legendary_f" value="1" checked="checked"/>Yes
                <?php
                }
                ?>
                
            
              
              
            </div>
              
              
              
              
             <input class="finalbutton" type="submit" value="Submit"/>
            
            
        </form>   
        </div>    
            
        </div> <!-- / main -->
<?php include("bottombit.php")?>
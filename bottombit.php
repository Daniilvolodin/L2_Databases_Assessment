        
        <div class="box side">
           
           
         
            <form class="searchform" method="post" action="name_pokemon.php" enctype="multipart/form-data">
            <input class="searched" type="text" name="pokemon_name" size="40" value="" required placeholder="Pokemon Name.."/>
            
            <input class="submit" type="submit" name="find_pokemon" value="&#xF002;"/>
            </form>
            
            <form class="searchform" method="post" action="legendary.php" enctype="multipart/form-data">
                
                <input class="submit legendary" type="submit" name="legendary" value="Legendary Pokemon &#xf002;"/>
            </form>
            <br/>
            <hr />
            <div class="advanced-frame">
            <div style="position: relative;text-align: -webkit-center;">
            <h2 style="position: relative;text-align: -webkit-center;user-select: none;">Search Stats</h2>
            <form class="searchform" method = "post" action="advanced.php" enctype="multipart/form-data">
            Total Points:
            <div class="totalbox">
                <div class="flex-container">
            
            
            <div    >
                
               
                <input class="adv" type="number"  min=0 name="total" size="40" value="" placeholder="Total Points.."/>
                 <select class="selectbc" name="total_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
            </div>   
          
            
            </div>  
                </div>
                Generation
            <div class="flex-container">
            
            
            
             
            <input class="adv" type="number" min="1" max="6" name="generation" size="40" value="1" placeholder="Generation" style="text-align: center;margin-left: 50px;margin-right: 50px;margin-block-end: 20px; margin-block-start: 5px;"/>
            </div>   
            <select name="Type1" class="selectoptions1">
            <option value="<?php echo $type1_rs['Type 1']; ?>">Pick The Type</option>  
            
            <!-- Get options from the database -->
                
                <?php
                $type1_sql="SELECT * FROM `Type1ID` ORDER BY `Type1ID`.`Type1ID` ASC";
                $type1_query=mysqli_query($dbconnect, $type1_sql);
                $type1_rs=mysqli_fetch_assoc($type1_query);
                
                do {
                    ?>
                <option value="<?php echo $type1_rs['Type 1']?>"><?php echo $type1_rs['Type 1']?></option>
                
                <?php
                } // end type1 loop
                while($type1_rs=mysqli_fetch_assoc($type1_query))
                
                ?>
            </select>
            
            <select name="Type2" class="selectoptions2">
            <option value="<?php echo $type2_rs['Type 2']; ?>">Pick The Type</option>  
            
            <!-- Get options from the database -->
                
                <?php
                $type2_sql="SELECT * FROM `Type2ID` ORDER BY `Type2ID`.`Type2ID` ASC";
                $type2_query=mysqli_query($dbconnect, $type2_sql);
                $type2_rs=mysqli_fetch_assoc($type2_query);
                
                do {
                    ?>
                <option value="<?php echo $type2_rs['Type 2']?>"><?php echo $type2_rs['Type 2']?></option>
                
                <?php
                } // end type1 loop
                while($type2_rs=mysqli_fetch_assoc($type2_query))
                
                ?>
            </select>
            
            <div></div>
            Health Points:
            <div class="flex-container">
            
            
            <div>
                  <input class="adv" type="number"  min=0 name="health" size="40" value="" placeholder="Health Points"/>
                <select class="selectbc" name="health_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
              
                    
            </div>    
            
            </div>    
            Attack Points:
            <div class="flex-container">
            
            </div>
            <div>
                 <input class="adv" type="number"  min=0 name="attack" size="40" value="" placeholder="Attack Points"/>
                <select class="selectbc" name="attack_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
               
                    
            </div>
            Attack Speed Points:
            <div class="flex-container">
            
            
            <div>
                  <input class="adv" type="number"  min=0 name="attack_speed" size="40" value="" placeholder="Attack Speed Points"/>
                <select class="selectbc" name="atkspeed_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                </select>
              
                    
            </div>
            </div>
            Defense Points:   
            <div class="flex-container">
                
                <div>
                     <input class="adv" type="number"  name="defense" min=0 size="40" value="" placeholder="Defense Points"/>
                    <select class="selectbc" name="defense_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
                    
                   
                </div>
                
            </div>
            Defense Speed Points:
            <div class="flex-container">
            
            
            <div>
                <input class="adv" type="number"  min=0 name="defense_speed" size="40" value="" placeholder="Defense Speed Points"/>
                <select class="selectbc" name="defspeed_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
                
                    
            </div>    
            
            </div>
            Speed Points:
            <div class="flex-container">
           
            
            <div>
                 <input class="adv" type="number"  min=0 name="speed" size="40" value="" placeholder="Speed Points"/>
                <select class="selectbc" name="speed_more_less">
                        <option value="atleast">At Least</option>
                        <option value="atmost">At Most</option>
                    </select>
                
                    
            </div>    
            
            </div>
            <div class="styleit" style="text-align: center;">
            <input class="adv-txt" type="checkbox" name="legendary_adv" value="1" />Legendary
             </div>
            <input action="advanced.php" class="advancedsubmit" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />   
         
            </form>            
             
            </div> 
            
     
        </div> 
        </div> <!-- / side bar -->
       
        <div class="box footer">
            CC GTT 20XX
        </div> <!-- / footer -->
                
        
    </div> <!-- / wrapper -->
    
            
</body>
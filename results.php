
<h2 class="new-text" style="background-color: #000000ad;color: white;font-size: 40px;position: relative;margin-block-start: auto;user-select: none;
">Results</h2>
            <?php
            if ($count < 1){
                ?>
            <div class="error">
                <p>
                Sorry! There are no results that match your search.
                Please use the search box in the side bar to try again.
                </p>
            
            
                <img src="images/pika-don't.png" alt="no pokemon" class="pokeball" style="position: sticky;user-select: none;"/>
         
            </div> <!-- end error -->
            
            <?php
            }
            
            else {
                do
                {
                ?>
            <div class="linkthem">
            <div class="results">
                <span class="sub_heading">
                    <?php echo $find_rs['Name']; ?>
                </span>
                <p>
                <b>Type 1:</b>
                <?php echo $find_rs['Type 1']; ?>
                </p>
                <?php
                    if($find_rs['Type 2'] != "None") 
                    {
                    ?> 
                        <b>Type 2:</b>
                        <?php echo $find_rs['Type 2']; ?>
                    <?php
                    }
                
                ?>
                
                
                <p><b>Total Points:</b>
                <?php echo $find_rs['Total']; ?>
                </p>
                
                <p><b>Health Points:</b>
                <?php echo $find_rs['HP']; ?>
                </p>
                
                <p><b>Attack:</b>
                <?php echo $find_rs['Attack']; ?>
                &nbsp;
                &nbsp;
                &nbsp;
                <b>Attack Speed:</b> <?php echo $find_rs['Sp. Attack']; ?>
                </p>
                
                <p><b>Defense:</b> <?php echo $find_rs['Defense']; ?>
                &nbsp;
                &nbsp;
                &nbsp;
                <b>Defense Speed:</b> <?php echo $find_rs['Sp. Def']; ?>
                
                </p>
                <p><b>Speed:</b> <?php echo $find_rs['Speed']; ?></p>
                <p><b>Generation:</b> <?php echo $find_rs['Generation']; ?></p>
                
                <?php 
                if($find_rs['Legendary'] == 1){
                ?>
                <b>Legendary Pokemon</b>
                <?php
                }
                ?>
                
                
                       
                
                
            </div>
            </div>
            <br /> 
            <?php
                } // end results 'do'
                while 
                    ($find_rs=mysqli_fetch_assoc($find_query));
                
            } // end else
            ?>
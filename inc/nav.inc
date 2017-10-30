<!-- Navigation -->
<div class="w3-bar w3-light-grey">
                <a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
                <a href="blog.php" class="w3-bar-item w3-button w3-mobile">Blog</a>
                <a href="login.php" class="w3-bar-item w3-button w3-mobile">New User</a>
                <a href="#" id="hiddenLink" class="w3-bar-item w3-button w3-mobile">Returning User</a>
        
        <?php if(isset($user))
            {
                echo "<div id='mainNav' class='w3-right w3-mobile'>
                <a href='logout.php' class='w3-bar-item w3-button w3-mobile'>Hello ".$user." click to logout </a>
                </div>";
            }
            else {
        ?>
            <div id="mainNav" class="w3-right w3-mobile">
                <div class="w3-dropdown-hover  w3-light-grey">
                    <button class="w3-button">Returning User</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4" >
                        <form name = "frmUser" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" 
                        onSubmit="return validateForm();">
                        <input type="text" name = "txtName" class="w3-bar-item w3-input" placeholder="Name.."><br>
                        <span id="userErr" style="color:red;"></span>
                        <input type="password" name = "txtPwd" class="w3-bar-item w3-input" placeholder="Password.."><br>
                        <span id="pwdErr" style="color:red;"></span>
                        <input name="btnSubmit" type="submit" class="w3-bar-item w3-input" value="submit">
                        </form>
                    </div>
                </div>
            </div>  
        <?php } ?>  
     </div><!--end navbar-->
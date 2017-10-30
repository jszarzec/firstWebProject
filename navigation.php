<?php
if (isset($_POST['btnSubmit'])){

include("inc/dbc.php");
$name = $_POST['txtName'];
$pwd = $_POST['txtPwd'];

$sql = "select * from jszarzec_AddressBook.users where Name = '"
.$name."'and Password = '"
.$pwd."';";

$result=mysql_query($sql,$con);
if($result == False)
    {
        echo "<p> Error running query </p>";
        $msg=mysql_error($con);
    }
else if(mysql_num_rows($result)==0)
    {
        echo "incorrect Username or Password";
    }

 else
    {
        echo "<p>Thanks!</p>";
        $_SESSION['user']=$name;
    }
}

$user =  $_SESSION['user'];

?>

<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/newCSS.css" rel="stylesheet">
        <script src="js/newScript.js" language="javascript"></script>
<script type="text/javascript">

function validateForm()
 {
    var user = document.frmUser.txtName.value;
    var password = document.frmUser.txtPwd.value;

    document.getElementById("userErr").innerHTML='';
    document.getElementById("pwdErr").innerHTML='';

    if(user==''||user==null)
    {
        document.getElementById("userErr").innerHTML='User name cannot be blank';
        return false;
    }
    else if(password==''||password==null)
    {
        document.getElementById("pwdErr").innerHTML='Password cannot be blank';
        return false;
    }
    else
    return true;
 }
</script>
</head>
<body>
<!-- Navigation -->
<div class="w3-bar w3-light-grey">
                <a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
                <a href="blog.php" class="w3-bar-item w3-button w3-mobile">Blog</a>
                <a href="login.php" class="w3-bar-item w3-button w3-mobile">New User</a>
                <a href="#" id="hiddenLink" class="w3-bar-item w3-button w3-mobile">Returning User</a>
        <?php if(isset($user))
            {
                echo "<div id='mainNav' class='w3-right w3-mobile'>
                <a href='#' class='w3-bar-item w3-button w3-mobile'>you are logged in </a>
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
</body>
</html>
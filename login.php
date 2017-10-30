<?php
session_start();
if (isset($_POST['btnLogin'])){

include("inc/dbc.php");
$name = $_POST['frmUser'];
$pwd = $_POST['frmPassword'];

$sql = "select * from jszarzec_AddressBook.users where Name = '".$name."';";
$result=mysql_query($sql,$con);
if($result == False)
{
    echo "<p> Error running query </p>";
    $msg=mysql_error($con);
    
}
else if(mysql_num_rows($result)>0)
{
    $msg = "Username is already in use, Please enter new User Name";
    
}
    else
    {
        $sql = "insert into jszarzec_AddressBook.users (Name, Password)" 
        ." values ('$name', '$pwd');";
        $result = mysql_query($sql,$con);
        if($result == false)
        {
            echo "Error executing query";
            $msg=mysql_error($con);
        }
        else
        {
            $inserted = "<p>Thanks!</p>";
            $_SESSION['user']=$name;
        }
    $user=$_SESSION['$name'];    
    }
    
}
//Code for Nav Bar Login Item (Big Screen):
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
            $user=$_SESSION['$name'];
        }
//code for navbar item (small screen)

if (isset($_POST['btnSubmitHidden'])){
    
    include("inc/dbc.php");
    $name = $_POST['txtNameHidden'];
    $pwd = $_POST['txtPwdHidden'];
    
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
        $user =  $_SESSION['user']; 
    }


if (isset($_POST['btnAdminLogin'])){
    
    include("inc/dbc.php");
    $nameAdmin = $_POST['frmAdminName'];
    $pwd = $_POST['frmAdminPassword'];
    
    $sql = "select * from jszarzec_AddressBook.users where Name = 'jan' and Password = '123'";
   
    
    $result=mysql_query($sql,$con);
    if(mysql_num_rows($result) == 0)
        {
            echo "<p> Error running query </p>";
            
        }
    else
        {
            while($row=mysql_fetch_assoc($result))
            {
                if($nameAdmin==$row['Name']&& $pwd==$row['Password'])
                {
                    $_SESSION['admin']=$nameAdmin;
                    echo "hello ".$nameAdmin; 
                }
                    else
                echo "Incorrect Admin Credentials";
            }
            
        }
        $admin = $_SESSION['admin'];  
    }

                
?>






<html>
<head>
    <title>New User Registration</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/newCSS.css" rel="stylesheet">
        <script src="js/newScript.js" language="javascript"></script>

<script type="text/javascript">
//display admin form
function showAdminForm()
{
    document.frmAdmin.style.display="inline";
    document.frmNewUser.style.display="none";
}
function showUserForm()
{
    document.frmAdmin.style.display="none";
    document.frmNewUser.style.display="inline";
}
function validateLogin()
 {
    var user = document.frmNewUser.frmUser.value;
    var password = document.frmNewUser.frmPassword.value;

    document.getElementById("userLoginErr").innerHTML='';
    document.getElementById("pwdLoginErr").innerHTML='';

    if(user==''||user==null)
    {
        document.getElementById("userLoginErr").innerHTML='User name cannot be blank';
        return false;
    }
    else if(password==''||password==null)
    {
        document.getElementById("pwdLoginErr").innerHTML='Password cannot be blank';
        return false;
    }
    else
    return true;
 }

//Code for Nav Bar Login Item:
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
 //validation for nav bar (small screen)
function validateFormHidden()
 {
    var user = document.frmUserHidden.txtNameHidden.value;
    var password = document.frmUserHidden.txtPwdHidden.value;

    document.getElementById("userErrHidden").innerHTML='';
    document.getElementById("pwdErrHidden").innerHTML='';

    if(user==''||user==null)
    {
        document.getElementById("userErrHidden").innerHTML='User name cannot be blank';
        return false;
    }
    else if(password==''||password==null)
    {
        document.getElementById("pwdErrHidden").innerHTML='Password cannot be blank';
        return false;
    }
    else
    return true;
 }
</script>
</head>

<body>

<?php include("inc/nav2.inc")?>


<h1 align="center"> New User Registration </h1>
<?php if(isset($inserted))
    echo $inserted;

    else {
?>
<div style="margin-left: 50px;">
    <form name="frmNewUser" action = "<?php echo $_SERVER['PHP_SELF'] ?>" method = "post"
    onSubmit=" return validateLogin();">
    <p>
    Enter User Name:<br>
    <input type = "text" name = "frmUser">
        <?php if(isset($msg))
        echo "<p style='color:red'>".$msg."</p>";
        ?>
    <span id="userLoginErr" name="userErr" style="color:red;"></span>
    </p>
    <p>
    Enter Password:</br>
    <input type="password" name ="frmPassword">
    <span id="pwdLoginErr" name="pwdErr" style="color:red;"></span>
    </p>
    <p> 
    <input type="submit" name="btnLogin" value="register" >
    
    <input type="button" value="admin register" onclick="showAdminForm()">
    </p>
    </form></div>
    
<div style="margin-left: 50px" >
    <form name = "frmAdmin" action = "<?php echo $_SERVER['PHP_SELF'] ?>" method = "post"
    style="display: none;">
        <p>Administrator:<br>
        <input type="text" name="frmAdminName"></p>
        <p>Password:<br>
        <input type="password" name ="frmAdminPassword"></p>
        <input type="submit" name="btnAdminLogin" value="admin register">
        <input type="button" onclick="showUserForm()" value="go back">
    </form>
</div>

<?php } ?> 

</body>
    


</html>
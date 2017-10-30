<?php
session_start();
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
        }

//Code for nav bar item (big screen)
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
    $user=$_SESSION['user'];  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title> Welcome </title>
        <script language = "JavaScript" src="js/newScript.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/newCSS.css" rel="stylesheet">
    
<script language="javascript">
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

//validation for nav bar (big screen)
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


    <body>
        <!-- Navigation--> 
        
        <?php include("inc/nav2.inc")?>
        <div align = "center">
        <h1> Hello World </h1></div>
        
       
        <div id="pictureContainer" align="center">
                
            <div id="pictures" class="w3-padding-32 w3-circle w3-center"></div>
            
            <script> 
                    initSlides();
                     display(currentSlide);
                     setInterval(nextSlide,2000);
            </script><br>
                <!--<div class="buttonPics">
                <input type="button" value="next" onClick="nextSlide();">
                <input type="button" value="prev" onClick="prevSlide();"></div>-->
            </div>
        <br><br><br>
        </div>
    
   
        <!--<div style="margin:50px"><p>here is some text needs to be made longer<br>
            here is some text needs to be made longer<br>
            here is some text needs to be made longer<br>
            here is some text needs to be made longer<br></p></div>-->

            
        

    </body>
</html>
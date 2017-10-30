<?php
session_start();
$admin=$_SESSION['admin'];

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

// code for 0th blog item
if(isset($_POST['btnFormSubmit'])){
    include("php/insertComment.php");
    
     $query = "select * from jszarzec_AddressBook.Comments;";
     $result=mysql_query($query,$con);
     if(mysql_num_rows($result) == 0)
     echo "<p> No Data Exists</p>";
    else
    {
     $id = 0;
     $cmt = $_POST['txtComment'];
     $name=$user;
     
     $ok=insertComment($id,$cmt,$name,$con);
    
     if($ok)
    echo "Your commment has processed successfully";
    else
     echo "Error processing comment";
    }
}
//code for 1st blog item

if(isset($_POST['btnFormSubmit1'])){
    include("php/insertComment.php");
    
     $query = "select * from jszarzec_AddressBook.Comments;";
     $result=mysql_query($query,$con);
     if(mysql_num_rows($result) == 0)
     echo "<p> No Data Exists</p>";
    else
    {
     $id = 1;
     $cmt = $_POST['txtComment1'];
     $name=$user;
     
     $ok=insertComment1($id,$cmt,$name,$con);
    
     if($ok)
    echo "Your commment has processed successfully";
    else
     echo "Error processing comment";
    }
}

//code for 2nd blog item

if(isset($_POST['btnFormSubmit2'])){
    include("php/insertComment.php");
    
     $query = "select * from jszarzec_AddressBook.Comments;";
     $result=mysql_query($query,$con);
     if(mysql_num_rows($result) == 0)
     echo "<p> No Data Exists</p>";
    else
    {
     $id = 2;
     $cmt = $_POST['txtComment2'];
     $name=$user;
     
     $ok=insertComment2($id,$cmt,$name,$con);
    
     if($ok)
    echo "Your commment has processed successfully";
    else
     echo "Error processing comment";
    }
}

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
<?php 
include("php/loadComment.php");
include("php/loadComment1.php");
include("php/loadComment2.php");
?>
    
    <?php 
include("inc/nav2.inc");
echo "<h1 align ='center'> Blog </h1>";
echo $admin;

/**************************Blog 0***************************/
include('inc/dbc.php');

//prepare and execute query
 $query = "select * from jszarzec_AddressBook.Blog where Id = '1';";
 $result = mysql_query($query,$con);
 
 //check to see if we got a result
 //No result means something is wrong
 if($result == false)
    echo "<p> Error executing query. </p>";

//check to see if we got any data back
if (mysql_num_rows($result) == 0)
    echo "<p> No data returned. </p>";

//get data from result set.

while($row=mysql_fetch_assoc($result))
{
    echo "<div class='w3-col s6' style='margin-left:25%'>";
    echo "<h2 id = 'h0' onclick ='showParagraph();'> Hello " .$row['Title']. " Read! </h2>";
    echo "<p id = 'p0'> Hello " .$row['Message']. " Read! </p0>";
    echo "</div>";
    echo "<script = 'javascript'>";
        //echo "document.getElementById('h0').innerHTML='Hello!!'; ";
        //echo " ";
    echo "</script>";
    /* echo "<div class='w3-col s6' style='margin-left:25%' name='blogDiv'>";
    echo "<h2><a href = '#' onClick='showParagraph()'>" .$row["Title"] . "</h2>";
    echo "<p id='p0'>" .$row["Message"]. "</p>";
    if(isset($admin))
    {
        echo "<p><a href = 'edit.php?id=".$row["Id"]."&table=Blog'>edit</a></p>";
        echo "<p><a href = 'logout.php'>finish</a></p>";
    }
    echo "</div>";*/
}

   
    

mysql_free_result($result);
//mysql_close($con);
/************************END PHP for Blog 0****************************************************/

?>	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    

<body>
   

<h1 align="center"> Blog </h1>
    
<!--********************************************Blog 0****************************** -->
       

    <div class="w3-col s6" style="margin-left:25%" name="blogDiv">
    <!--<h2 id="h0"><a href = "#" onClick="showParagraph()">First Blog Entry</a></h2>
            
            <p id="p0">Here is some 1st blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            <br>
            <span style="color:red"> Please add Comments Here: </span>
            </p>-->
            <br> 
            <p id="txtCommentOutput"></p>
            <br>
            <div class="w3-col s6" id="button">
                <input type="button" onclick="hideParagraph()" value="hide" id="hide">
                <input type="button" onclick="showForm()" value="comment" id="comment">
            </div>  
            <form name='frmAddComment' method='post' class='frmHide' 
            action='<?php $_SERVER['PHP_SELF']; ?>' onSubmit='return addComment();'>  
            
            <?php if(!isset($user))
                echo "<p onclick='showParagraph()'> please log in to add comment </p>";
                else {
            ?>

             <div class='w3-col s6'>
                <textarea name='txtComment' rows='5' cols='25'></textarea><br>
                <input type='submit' value='submit' name='btnFormSubmit'>
            </div>
        
        <?php } ?>
        
           </form>         
               
        </div>  
        
        <script> displayComment(); </script> 
                
 <!--*********************************Blog 1************************************** -->
        
        <div class="w3-col s6" style="margin-left:25%" name="blogDiv">
            <h2><a href = "#" onClick="showParagraph1()">Second Blog Entry</a></h2>
        
            <p id="p1">Here is some 2nd blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            <br>
            <span style="color:red"> Please add Comments Here: </span>
            </p>
            <br> 
            <p id="txtCommentOutput1"></p>
            <br>
            <div class="w3-col s6" id="button1">
                <input type="button" onclick="hideParagraph1()" value="hide" id="hide">
                <input type="button" onclick="showForm1()" value="comment" id="comment">
            </div>  
            <form name='frmAddComment1' method='post' class='frmHide' 
            action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit='return addComment1();'>  
            
            <?php if(!isset($user))
                echo "<p onclick='showParagraph1()'> please log in to add comment </p>";
                else {
            ?>

             <div class='w3-col s6'>
                <textarea name='txtComment1' rows='5' cols='25'></textarea><br>
                <input type='submit' value='submit' name='btnFormSubmit1'>
            </div>
        
        <?php } ?>
        
           </form>  
        </div>
            
                           
        <script> displayComment1(); </script>

        <!--*********************************Blog 2************************************** -->
        
        <div class="w3-col s6" style="margin-left:25%" name="blogDiv">
            <h2><a href = "#" onClick="showParagraph2()">Third Blog Entry</a></h2>
        
            <p id="p2">Here is some 3rd blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            Here is some blog content it will repeat to make itself longer.
            <br>
            <span style="color:red"> Please add Comments Here: </span>
            </p>
            <br> 
            <p id="txtCommentOutput2"></p>
            <br>
            <div class="w3-col s6" id="button2">
                <input type="button" onclick="hideParagraph2()" value="hide" id="hide">
                <input type="button" onclick="showForm2()" value="comment" id="comment">
            </div>  
            <form name='frmAddComment2' method='post' class='frmHide' 
            action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit='return addComment2();'>  
            
            <?php if(!isset($user))
                echo "<p onclick='showParagraph2()'> please log in to add comment </p>";
                else {
            ?>

             <div class='w3-col s6'>
                <textarea name='txtComment2' rows='5' cols='25'></textarea><br>
                <input type='submit' value='submit' name='btnFormSubmit2'>
            </div>
        
        <?php } ?>
        
           </form>  
        </div>
            
                           
        <script> displayComment2(); </script>
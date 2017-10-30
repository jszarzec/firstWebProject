<?php
session_start();
$admin = $_SESSION['admin'];
if(!isset($admin))
header("Location:login.php");

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
    
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include("inc/nav2.inc")?>
        <h1 align="center"> Edit Blog </h1>

        <?php
			if(isset($_POST['btnSubmit']))
			{
				include("inc/dbc.php");
				
				$table=$_POST['table'];
				$id=$_POST['id'];
				$title=$_POST['title'];
				$message=$_POST['message'];
			
				
				$sql="update jszarzec_AddressBook.$table set Title='$title', Message='$message' where Id = '$id'";
				
				$result=mysql_query($sql,$con);
				
				if($result !=0)
					$msg="<h2>Your content was successfully updated.</h2>";
			}
			
			if(isset($msg))
				echo $msg;
		
		
		?>

<form action = "<?php echo $_SERVER['PHP_SELF'] ?> " method = "post">
<?php
    $table = $_GET['table'];
    $id = $_GET['id'];

        include("inc/dbc.php");
        $sql="select * from jszarzec_AddressBook.$table where Id = '$id';";
        $result = mysql_query($sql,$con);
        if($result == false)
            echo "Error running querry".mysql_error($con);
        else
            { 
                while($row=mysql_fetch_assoc($result))
                {
                    echo '<input type="hidden" name="id" value="'.$id.'">';
					echo '<input type="hidden" name="table" value = "'.$table. '">';
					echo '<p><input type="text" name="title" value = "'.$row['Title'].'"></p>';
					echo '<p><textarea name="message" rows="20" cols="75">'.$row['Message'].'</textarea></p>';
					

                }

            }

?>
<p><input type="submit" name="btnSubmit" value="update"></p>
</form>


</body>
<?php   
 
 include("insertComment.php");

 

 $query = "select * from jszarzec_AddressBook.Comments;";
 $result=mysql_query($query,$con);
 if(mysql_num_rows($result) == 0)
 echo "<p> No Data Exists</p>";
else
{
 $id = 0;
 $cmt = $_POST['txtComment'];
 $name=$user;
 echo $cmt."<br>";
 echo $name;
 $ok=insertComment($id,$cmt,$name,$con);

 if($ok)
echo "Your commment has be processed successfully";
else
 echo "Error processing comment";


 echo "<br /><a href='blog.php'>Return to Blog</a>";
}

?>
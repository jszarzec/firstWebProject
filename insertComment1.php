<?php
include("inc/dbc.php");

function insertComment1($id,$cmt,$name,$con)
{ 
        $sql="insert into jszarzec_AddressBook.Comments (Id, Comment, Name) values ("
        ."'$id', '$cmt', '$name');";

    $result=mysql_query($sql,$con);

if ($result)
        return true;
else
        return false;
}    

?>
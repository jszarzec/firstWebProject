<?php
include("inc/dbc.php");

$sql = "select * from jszarzec_AddressBook.Comments where Id = '2'; ";
$result = mysql_query($sql,$con);

if (mysql_num_rows($result) > 0)
    {
        echo "<script language='javascript'>";
            while($row = mysql_fetch_assoc($result))
            {
                $text = str_replace(array("\n", "\r"), ' ', $row['Comment']);
                echo "cmt2.push(new Comment(";
                echo "'" . $text . "',";
                echo "'" . $row['Name'] . "'";
                echo "));";
            }
        echo "</script>";
    }

?>
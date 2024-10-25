<?php
$conn = mysqli_connect("localhost","root","","jewelry_shop");
if($conn)
{
    echo "connection successfully";
}
else 
{
    echo " connection failed " .$conn.mysqli_connect_error();
}
?>
<?php
include("connection.php");

$id=$_GET['id'];


$b=mysqli_query($conn,"delete from student where id='$id'");

if($b){
    header("location:student.php");


}
else{
    echo " not deleted";
}










?>
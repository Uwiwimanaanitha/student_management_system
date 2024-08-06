<?php
include("connection.php");
$id=$_GET['id'];


$c=mysqli_query($conn,"select * from student where id='$id'");

while($row=mysqli_fetch_array($c)) {

    ?>




<form action="" method="post">
<h1>update student information</h1>

<label for="">fname</label>
        <input type="text" name="fname" id="" value="<?php echo $row[1];?>"><br><br>
        <label for="">lname</label>
        <input type="text" name="lname" id="" value="<?php echo $row[2];?>"><br><br>
        <label for="">age</label>
        <input type="number" name="age" id="" value="<?php echo $row[3];?>"><br><br>
        <label for="">gender</label>
        <input type="text" name="gender" id="" value="<?php echo $row[4];?>"><br><br>
       
        <input type="submit" name="submit" id="" value="save changess">
        </form>

    <?php


}

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];


    if(!empty($fname) && (!empty($lname)) && (preg_match("/^[a-zA-Z]*$/",$fname)) && (preg_match("/^[a-zA-Z]*$/",$lname)) && (preg_match("/^[0-9]*$/",$age)) && (preg_match("/^[male,female]*$/",$gender))){
$update=mysqli_query($conn,"update student set fname='$fname',lname='$lname',age='$age',gender='$gender' where id='$id'");

if($update){
    header("location:student.php");
}
else{
echo " update failed";

}


    }
    else{
        echo"invalid input";
    }














}




















?>
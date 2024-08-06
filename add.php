<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <fieldset style="width: 30%; border-radius:30px; background-color:darkgrey;">
    <h1>add new student</h1>
    <form action="" method="post">
        <label for="">fname</label>
        <input type="text" name="fname" id="" style="border-radius: 20px;"><br><br>
        <label for="">lname</label>
        <input type="text" name="lname" id="" style="border-radius: 20px;"><br><br>
        <label for="">age</label>
        <input type="number" name="age" id="" style="border-radius: 20px;"><br><br>
        <label for="">gender</label>
        F <input type="radio" name="gender" id="" value="female">
        M <input type="radio" name="gender" id=""value="male"><br><br>
        <input type="submit" name="submit" id="" value="add student" style="border-radius: 20px;background-color:chocolate">
    </form>
    </fieldset></center>
</body>
</html>

<?php
include("connection.php");

if(isset($_POST['submit'])){
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $age=$_POST['age'];
   $gender=$_POST['gender'];


if(!empty($fname) && (!empty($lname)) && (preg_match("/^[a-zA-Z]*$/",$fname)) && (preg_match("/^[a-zA-Z]*$/",$lname)) && (preg_match("/^[0-9]*$/",$age)) && (preg_match("/^[male,female]*$/",$gender))){



$insert=mysqli_query($conn,"insert into student(fname,lname,age,gender) value('$fname','$lname','$age','$gender')");
if($insert){
header("location:student.php");




}
else{
    echo "data not inserted";
}

}
else{
    echo"use valid input";
}


}













?>
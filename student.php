<?php
session_start();
if(!isset($_SESSION['username'])){
    
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>student management system
        
        
        
    </h1><br>

    <a href="add.php"><label for="">add students</label></a><br>
    <a href="logout.php"><label for="">logout</label></a>

    <h2>list of all students</h2><br>
<?php
include("connection.php");
$select=mysqli_query($conn,"select * from student");
if(mysqli_num_rows($select)>0){

echo"<table border='2'><tr><th>ID</th><th>fname</th><th>lname</th><th>age</th><th>gender</th><th>action</th></tr>";

while($row=mysqli_fetch_array($select)){
 
echo"<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td><a href='update.php?id=".$row[0]."'>update</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='delete.php?id=".$row[0]."'>delete</a></td></tr>";


}

}
else{
    echo "no students found";
}

?>

   
</body>
</html>
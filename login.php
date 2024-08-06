<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:student.php");
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>

        <fieldset style="width: 20%; background-color:aqua;border-radius:30px;">
        <form action="" method="post">
            <h1>login form</h1>
            <label for="">username</label>
            <input type="text" name="username" id="" placeholder="username" values="<?php  if(isset($_COOKIE['username'])){
                echo $_COOKIE['username'];
            } ?>"><br><br>
            <label for="">password</label>
            <input type="password" name="password" id="" placeholder="password" values="<?php if(isset($_COOKIE['password'])){
                echo $_COOKIE['password'];
            }?>  "><br><br>
            <input type="submit" name="submit" id="" value="login"><br>






        </form>
        </fieldset>
    </center>
</body>
</html>
<?php
include("connection.php");

if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];

if(!empty($username) && (!empty($password)) && (preg_match("/^[a-zA-Z]*$/",$username)) && (preg_match("/^[a-zA-Z0-9]*$/",$password))){



    $sql=mysqli_query($conn,"select * from user where username='$username' and password='$password'" );

    $a=mysqli_num_rows($sql);
    if ($a>0){
        $_COOKIE['username']=$username;
        setcookie('username',$username,time()+20*60);
        $_COOKIE['password']=$password;
        setcookie('password',$password,time()+20*60);
        $_SESSION['username']=$username;

        header("location:student.php");

    }
    else{
        echo"user not found";
    }
    






}
else{
    echo"invalid input";
}

}






?>
<?php


$conectionToDataBase = new mysqli("localhost", "root", "" ,"std");

$username = $_POST['username'];
$age = $_POST['age'];
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$sqlInsertStatement = "INSERT INTO student (username, age , address , email ,  gender) VALUES ('$username' , '$age' , '$address' , '$email' , '$gender')";




// Code For Display Riquired inputs
$usernameErr = $emailErr = $ageErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])){
        $usernameErr = "*";

    }
    if (empty($_POST["age"])){
        $ageErr = "*";

    }
    if(empty($_POST["email"])){
        $emailErr = "*";

    }
    
}



// Code For Excute the Sql Statment if every Thing is okay
$res = "";
if ($usernameErr == "" && $emailErr == "" && $ageErr == ""){
    $conectionToDataBase->query($sqlInsertStatement);
    $res = "<div style = 'color : green'>Added!</div>";

else{
    $res = "<div style = 'color : red'>Please Fill Out The Forms</div>";

}




// Code For Check If Age range from 10 To 30
// }if ($_POST['age']>=10 && $_POST['age']<=30 ){
//     $res = "<div style = 'color : red'>Range From 1 TO 30</div>";

// }


// Code For the username has only letters
// }if (preg_match("/[^\d@#$%]\w*/",$_POST['age'])){
//     $res = "<div style = 'color : red'>invalid UserNAme!</div>";

// }


// Code For the Validate Email\
// }if (preg_match("/[^\d@#$%]\w*/",$_POST['age'])){
//     $res = "<div style = 'color : red'>invalid UserNAme!</div>";

// }





















?>


<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
    <form method = "POST">
    <p><input type="username" name = "username" placeholder = "Enter Your username">  <span style = "color : red"> <?php  echo $usernameErr; ?></span></p>
    <p><input type="text" name = "age" min = "10" max = "30" placeholder = "Enter Your age" style = "width : 163px">  <span style = "color : red"> <?php  echo $ageErr; ?></span></p>
    <p><input type="text" name = "address" placeholder = "Enter Your address"></p>
    <p><input type="email" name = "email" placeholder = "Enter Your email">  <span style = "color : red"> <?php  echo $emailErr; ?></span></p>

    <p><select name="gender">
  <option value="Female">Female</option>
  <option value="Male">Male</option>
</select></p>

    <p><input type="submit"></p>
    <span><?php  echo $res ; ?></span>
    

    </form>
</body>
</html>
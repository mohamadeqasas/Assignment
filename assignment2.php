<?php

// make Connection For dataBase
$conectionToDataBase = new mysqli("localhost", "root", "" ,"std");


// store The Users Values in New Variables
$username = $_POST['username'];
$age = $_POST['age'];
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];



// SQL Statment For Insert The Values in The Table
$sqlInsertStatement = "INSERT INTO student (username, age , address , email ,  gender) VALUES ('$username' , '$age' , '$address' , '$email' , '$gender')";



// Define some Variables TO Store Errors Statment
$genderErr = $usernameErr = $emailErr = $ageErr = "";

// When The USer Click Submit The Are Many Rules
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // الشروط الخاصة بحقل اسم المستخدم
    if (empty($_POST["username"])){
        $usernameErr = "Required";
        
    }elseif (is_numeric($_POST['username'])){
        $usernameErr .= "Please enter a Text";

    }elseif (!preg_match('/^[A-Za-z]+$/', $_POST['username'])){
        $usernameErr .= "invalid Username";
    }
    


    
    // الشروط الخاصة بحقل العمر
    if (empty($_POST["age"])){
        $ageErr = "Required";

    }elseif ($_POST["age"] > 30 || $_POST["age"] < 10){
        $ageErr .= " Range 10 To 30";

    }

    


    // الشروط الخاصة بحقل الإيميل
    if(empty($_POST["email"])){
        $emailErr = "Required";

    }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr .= "  Enter a valid email";
    }

    
   

    // الشروط الخاصة بحقل النوع 
    if($_POST["gender"] != "female" && $_POST["gender"] != "Female" && $_POST["gender"] != "male" && $_POST["gender"] != "Male"){
        $genderErr = "Please Enter A Right Gender";

    }
}




// defint variable for Store Staus (Added | Not)
$res = "";

// make Condition To chech If All The inputs has a Right Validation or not
// if True Display This Statement With green Color
if ($usernameErr == "" && $emailErr == "" && $ageErr == "" && $genderErr ==""){
    $conectionToDataBase->query($sqlInsertStatement);
    $res = "<div style = 'color : green'>Added!</div>";


// if not Display This Statment with Red Color
}else{
    $res = "<div style = 'color : red'>Please Fill Out The Forms</div>";

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
    <form method = "POST">
    <p><input type="text" name = "username" placeholder = "Enter Your username">   <span style = "color : red"> <?php  echo $usernameErr; ?></span></p>
    <p><input type="text" name = "age" placeholder = "Enter Your age">   <span style = "color : red"> <?php  echo $ageErr; ?></span></p>
    <p><input type="text" name = "address" placeholder = "Enter Your address"></p>
    <p><input type="text" name = "email" placeholder = "Enter Your email">  <span style = "color : red"> <?php  echo $emailErr; ?></span></p>
    <p><input type="text" name = "gender" placeholder = "Enter Your gender">  <span style = "color : red"> <?php  echo $genderErr; ?></span></p>

    

    <p><input type="submit"></p>
    <span><?php  echo $res ; ?></span>

    

    </form>
</body>
</html>
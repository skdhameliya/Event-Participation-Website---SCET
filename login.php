<?php
    session_start();
    error_reporting(0);
    include("connection.php");
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>   
</head>
<body>
    
    <form action="" method="post">
        Email: <input type="text" name="userEmail" id=""><br>
        Password: <input type="text" name="userPassword" id=""><br>
        <input type="Submit" name="loginBtn" value="Login">
    </form>

    <a href="registration.php">Click here to register.</a>

</body>
</html> -->

<?php

if(isset($_POST["loginBtn"]))
{
    $userEmail = $_POST["userEmail"];
    $userPassword1 = $_POST["userPassword"];
    // $userPassword = md5($userPasswordMD5);

    // echo $userPassword;

    $query = "select * from logintbl where Email = '$userEmail' and Password = '$userPassword1' ";

    $data = mysqli_query($connection ,$query);

    $numRow = mysqli_num_rows($data);

    //echo $numRow;

    // if($userEmail && $userPassword)
    // {

    // }
    // else
    // {
    //     die("provide both the fields data")
    // }

    if($numRow == 1)
    {
        $_SESSION["cUser"] = $userEmail;
        header("location: index.php");
    }
    else
    {
        echo "<br>user not found"; 
    }
}
?>

<html>
<body>
    <style type="text/css">
        body{
            text-align: center;
            background-color: #363333;
            color: #e16428;
            margin-top: 50px;
            font-size: 25px;
        }
    </style>
</body>
</html>
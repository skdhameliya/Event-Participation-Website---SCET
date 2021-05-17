<?php
    include("connection.php");
    error_reporting(0);
    session_start();

    if(isset($_POST["RegisterBtn"]))
    {
        $user = $_SESSION["cUser"];
        

        if(!$user)
        {
            // echo "<script>alert('Please Login To Participate..');</script>";
            // header("location: index.php"); 
            echo "Please Go Back &Login To Participate..";
        }
        else
        {
            $querySearch = "select * from logintbl where Email = '$user' ";   
            $data = mysqli_query($connection, $querySearch);

            //$numRow = mysqli_num_rows($data);
            $userData = mysqli_fetch_assoc($data);
            
            //retrive
            $fname = $userData["First Name"];
            $lname = $userData["Last Name"];
            $email = $userData["Email"];
            $contact = $userData["Contact No"];
            $year = $userData["Year"];
            // echo $userData["First Name"];

            $querySearch1 = "select * from event_1 where Email = '$user' ";   
            $data1 = mysqli_query($connection, $querySearch1);

            $numRow1 = mysqli_num_rows($data1);
            // echo $numRow1;
            //$userData1 = mysqli_fetch_assoc($data1);

            //$email1 = $userData1["Email"];

            if($numRow1 == 0)
            {
                //user participation process
                // echo $fname . $lname . $email . $contact . $year;

                //if($numRow == 1)
                {
                    // include("connection.php");
                    $queryInsert1 = "insert into event_1 values ('$fname','$lname','$email','$contact','$year')";
                    mysqli_query($connection,$queryInsert1);
                    echo "<script>alert('Participation of $user in event-1 is successfully done.')</script>";
                    echo "Participation of $user is done in event-1. " . "<a href='index.php'> back to home</a>";        
                }
                //else
                {
                    // echo $_SESSION["cUser"] . "is not registred..!";
                }
            }
            else
            {
                //user already participated
            echo "$user has already participated in event-1." . "<a href='index.php'>back to home</a>";
            // header("location: index.php");
            }
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
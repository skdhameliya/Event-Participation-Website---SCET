<?php
    include("connection.php");
    error_reporting(0);
    session_start();
    
    if(isset($_POST["SeeMyTeam"]))
    {
        $user = $_SESSION["cUser"];

        $userEmail = $_POST["userEmailSearchTeam"];
        $queryRegisterCheck = "select * from logintbl where Email = '$userEmail' ";
        $dataRegisterCheck = mysqli_query($connection,$queryRegisterCheck);
        $numRowRegisterCheck = mysqli_num_rows($dataRegisterCheck);

        if($numRowRegisterCheck == 0)
        {
            echo "$userEmail has not registered yet.";
        }
        else
        {
            if(!$user)
            {
                // echo "<script>alert('Please Login To See Your Team & Event..');</script>";
                // header("location: index.php");
                echo "Please Go Back & Login First To See Your Team & Event..";
            }
            else
            {
                $userEmail = $_POST["userEmailSearchTeam"];

                // Event-1
                $querySearchE1 = "select * from event_1 where Email = '$userEmail' ";
                $dataE1 = mysqli_query($connection,$querySearchE1);
                $numRowE1 = mysqli_num_rows($dataE1);
                
                if($numRowE1 == 1)
                {
                    $userRowDataE1 = mysqli_fetch_assoc($dataE1);
                    echo "<center><h3><b><u>EVENT-1</b></u></h3>" . "<b><u>Participated Member</b></u> <br>" . $userRowDataE1["First Name"] . "<br>" . $userRowDataE1["Last Name"] . "<br>" . $userRowDataE1["Email"] . "<br>" . $userRowDataE1["Contact No"] . "<br>" . $userRowDataE1["Year"] . "</center><hr>" ;              
                }
                else
                {
                    echo "<center style='color:red;'>$userEmail is not participate in Event 1</center><hr>";
                }

                // Event-2
                $querySearchE2 = "select * from event_2 where Email_m1 = '$userEmail' || Email_m2 = '$userEmail' ";
                $dataE2 = mysqli_query($connection,$querySearchE2);
                $numRowE2 = mysqli_num_rows($dataE2);

                if($numRowE2 == 1)
                {
                    $userRowDataE2 = mysqli_fetch_assoc($dataE2);
                    echo "<center><h3><b><u>EVENT-2</b></u></h3>" . "<b><u>First Member</b></u> <br>" . $userRowDataE2["First_Name_m1"] . "<br>" . $userRowDataE2["Last_Name_m1"] . "<br>" . $userRowDataE2["Email_m1"] . "<br>" . $userRowDataE2["Contact_No_m1"] . "<br>" . $userRowDataE2["Year_m1"] . "<br><br><br><b><u>Second Member</u></b><br>" .$userRowDataE2["First_Name_m2"] . "<br>" . $userRowDataE2["Last_Name_m2"] . "<br>" . $userRowDataE2["Email_m2"] . "<br>" . $userRowDataE2["Contact_No_m2"] . "<br>" . $userRowDataE2["Year_m2"] . "</center><hr>" ;
                }
                else
                {
                    echo "<center style='color:red;'>$userEmail not participate in Event 2</center><hr>";
                }

            }
        }

        
        
    }

?>


<!-- <html>
    <head>
        <style>
            p{
                color:red;      }
        </style>
    </head>
    <body>
        <p>
            <?php
                // echo $userRowData["Email_m1"] . $userRowData["Email_m2"];
            ?>
        </p>
    </body>
</html> -->

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
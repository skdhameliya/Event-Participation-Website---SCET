<!-- echo "<script>alert('');</script>"; -->
<?php  
    include("connection.php");
    
    // if(isset($_POST['aaaa']))
    {
        // echo "<script>alert('Please Go Back &Login To Participate..');</script>" . "<a href='index.php'>Back to home</a>";
    }
    // else
    {
        if(isset($_POST['RegisterBtn']))
        {
            error_reporting(0);
            session_start();

            $user = $_SESSION["cUser"];
            if(!$user)
            {
                echo "Please Go Back &Login To Participate..";
            } 
            else
            {
                $member1 = $_POST["member1"];
                $member2 = $_POST["member2"];

                if($member1&&$member2)
                {
                    //m1 check register
                    $queryMemberSearch1 = "select * from logintbl where Email = '$member1' ";
                    $data1 = mysqli_query($connection, $queryMemberSearch1);
                    $numRow1 = mysqli_num_rows($data1);
                    $dataRowMember1 = mysqli_fetch_assoc($data1);

                    //m2 check register
                    $queryMemberSearch2 = "select * from logintbl where Email = '$member2' ";
                    $data2 = mysqli_query($connection, $queryMemberSearch2);
                    $numRow2 = mysqli_num_rows($data2);
                    $dataRowMember2 = mysqli_fetch_assoc($data2);

                    if($numRow1 == 1)
                    {
                        if($numRow2 == 1)
                        {
                            //m1 check already part
                            $queryCheckM1 = "select * from event_2 where (Email_m1 = '$member1') || (Email_m2 = '$member1') ";
                            $dataCheckM1 = mysqli_query($connection, $queryCheckM1);
                            $userRowData1 = mysqli_fetch_assoc($dataCheckM1);

                            // m2 check already part
                            $queryCheckM2 = "select * from event_2 where (Email_m1 = '$member2') || (Email_m2 = '$member2') ";
                            $dataCheckM2 = mysqli_query($connection, $queryCheckM2);
                            $userRowData2 = mysqli_fetch_assoc($dataCheckM2);

                            //both checked in one
                            // $queryCheckM2 = "select * from event_2 where (Email_m1 = '$member1' && Email_m2 = '$member2') || (Email_m1 = '$member2' && Email_m2 = '$member1') ";
                            // $dataCheckM2 = mysqli_query($connection, $queryCheckM2);
                            // $userRowData2 = mysqli_fetch_assoc($dataCheckM2);

                            
                            
                            
                            if($userRowData1)
                            {
                                if($userRowData2)
                                {
                                    echo "<script>alert('$member1 and $member2 are already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                                    echo "$member1 and $member2 are already participated in event 2. " . "<a href='index.php'> Back to home</a>";
                                }
                                else
                                {
                                    echo "<script>alert('$member1 has already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                                    echo "$member1 has already participated in event 2." . "<a href='index.php'> Back to home</a>";
                                }
                                
                            }
                            // if($userRowData1)
                            // {
                            //     echo "<script>alert('$member1 has already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                            // }
                            // else if($userRowData2)
                            // {
                            //     echo "<script>alert('$member2 has already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                            // }
                            // else if($userRowData1 && $userRowData2)
                            // {
                            //     echo "<script>alert('$member1 and $member2 are already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                            // }
                            else
                            {
                                if($userRowData2)
                                {
                                    if($userRowData1)
                                    {
                                        echo "<script>alert('$member1 and $member2 are already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('$member2 already participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                                    }
                                }
                                else
                                {
                                    // m2 not already participated
                                    $fnameM1 = $dataRowMember1["First Name"];
                                    $lnameM1 = $dataRowMember1["Last Name"];
                                    $emailM1 = $dataRowMember1["Email"];
                                    $contactM1 = $dataRowMember1["Contact No"];
                                    $yearM1 = $dataRowMember1["Year"];
                                    
                                    $fnameM2 = $dataRowMember2["First Name"];
                                    $lnameM2 = $dataRowMember2["Last Name"];
                                    $emailM2 = $dataRowMember2["Email"];
                                    $contactM2 = $dataRowMember2["Contact No"];
                                    $yearM2 = $dataRowMember2["Year"];

                                    // $fnameM1 = $userRowData2["First_Name_m1"];
                                    // $lnameM1 = $userRowData2["Last_Name_m1"];
                                    // $emailM1 = $userRowData2["Email_m1"];
                                    // $contactM1 = $userRowData2["Contact_No_m1"];
                                    // $yearM1 = $userRowData2["Year_m1"];

                                    // $fnameM2 = $userRowData2["First_Name_m2"];
                                    // $lnameM2 = $userRowData2["Last_Name_m2"];
                                    // $emailM2 = $userRowData2["Email_m2"];
                                    // $contactM2 = $userRowData2["Contact_No_m2"];
                                    // $yearM2 = $userRowData2["Year_m2"];

                                    // echo $fnameM1 . $lnameM1 . $emailM1 . $contactM1 . $yearM1 . $fnameM2 . $lnameM2 . $emailM2 . $contactM2 . $yearM2; 
                                    $queryInsertBoth = "insert into event_2 values ('$fnameM1','$lnameM1','$emailM1','$contactM1','$yearM1','$fnameM2','$lnameM2','$emailM2','$contactM2','$yearM2')";
                                    mysqli_query($connection,$queryInsertBoth);

                                    echo "<script>alert('Team of $emailM1 and $emailM2 participated in event 2');</script>" . "<a href='index.php'>Back to home</a>";
                                }
                            }
                        }
                        else
                        {
                            echo "<script>alert('$member2 has not registerd..');</script>" . "<a href='index.php'>Back to home</a>";;
                        }
                    }
                    else
                    {
                        echo "<script>alert('$member1 has not registerd..');</script>" . "<a href='index.php'>Back to home</a>";;
                    }

                }   
                else
                {
                    // echo "<script>alert('$member1 has not registerd..');</script>";
                    echo "all fields are required";
                }
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
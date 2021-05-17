<?php

    session_start();
    error_reporting(0);
    include("connection.php");

    // if(!$_SESSION["cUser"])
    {
        // header("location: login.php");
        //echo "<script>alert('Please login to participate');</script>";
        // echo "";
    }
    // else
    {

        $cUser = $_SESSION["cUser"];    

        $query = "select * from logintbl where email = '$cUser' ";
        $data = mysqli_query($connection ,$query);
        $userRow = mysqli_fetch_assoc($data);

        if($cUser)
        {
            // echo "<center><h2><b>Welcome," . $_SESSION["cUser"] . "</b></h2></center>";
            echo "<center><h2 style='color:#f2a365;'  class='mt-5'><b>Welcome, " . $userRow["First Name"] . " " . $userRow["Last Name"] . "</b></h2></center>";
        }

        // echo "<br>";
        // echo $userRow["id"] . "<br>";
        // echo $userRow["email"]. "<br>";
        // echo $userRow["password"]. "<br>";
    }

?>

<input type="hidden" value="
    <?php
        if($_SESSION['cUser'])
        {
			echo $_SESSION['cUser'];
        } 
	?>" id="checkSession">



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/myStyle.css">

</head>

<body>
    <!-- <a href="logout.php">logout</a><br><br> -->
<button onclick="backTop()" id="topBtn" title="Go to top">Top</button>

<style type="text/css">
    .navbar{
        border-radius: 20px;
        box-shadow: 0 0 50px red;
        animation: myAnim1 4s linear infinite alternate;
    }
    @keyframes myAnim1 {
        0%{box-shadow: 0 0 40px red;}
        25%{box-shadow: 0 0 40px blue;}
        50%{box-shadow: 0 0 40px green;}
        100%{box-shadow: 0 0 40px yellow;}
    }
</style>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg sticky-top m-5" style="background-color: inherit;">
        <a class="navbar-brand Heading" href="index.php" style='color: #f2a365;'>Event Zone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <center><span class="navbar-toggler-icon" style="color: #f2a365">+</span></center>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color: #f2a365;">Home <span class="sr-only">(current)</span></a>
                </li>

                <?php
                    if($_SESSION["cUser"])
                    {
                        echo "<li class='nav-item'>" . "<a class='nav-link' href='logout.php' style='color: #f2a365;'>Logout</a>" . "</li>";
                    }
                    else
                    {
                        echo "<li class='nav-item'>" . "<a class='nav-link' href='#loginModal' data-toggle='modal' style='color: #f2a365;'>Login</a>" . "</li>";
                    }
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" href=".bd-example-modal-sm">See My Team & Event</a>
                </li> -->

                <?php
                    if($_SESSION["cUser"])
                    {
                        echo "<li class='nav-item'>" . "<a class='nav-link' data-toggle='modal' href='.bd-example-modal-sm' style='color: #f2a365;'>See My Team & Event</a>" . "</li>";
                    }
                    else
                    {
                        echo "";
                    }
                ?>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
    </nav>
    <!-- nav end -->

    <!-- event-start -->
    <div class="container">
        <h1 align="center" class="Heading">Event Arena</h1>
        <div class="row mt-5">

            <div class="col-sm" style="background:;">
                <!-- <a href="" data-toggle="modal" data-target=".bd-example-modal-xl1"><img src="img/event-1.jpg" alt="event-1" width="100%"></a> -->
                <a href=".bd-example-modal-xl1" data-toggle="modal"><img class="checkLogin event1" src="img/aviskar.jpg"
                        alt="event-1" width="100%"></a>
            </div>

            <div class="col-sm" style="background:;">
                <a href="" data-toggle="modal" data-target=".bd-example-modal-xl2"><img class="checkLogin event2"
                        src="img/bech-ke-dikha.jpg" alt="event-2" width="100%"></a>
            </div>

            <div class="col-sm" style="background:;">
                <a href="" data-toggle="modal" data-target=".bd-example-modal-xl3"><img class="checkLogin event3"
                        src="img/tresrhunt.jpg" alt="event-3" width="100%"></a>
            </div>

        </div>
    </div>
    <!-- event-end -->


     <marquee class="mt-5 mb-5" direction="right" behavior="alternate">Last Date For Registration -- 02/10/2020</marquee>

<style>
    .modal-body .loginForm{
        background:yellow;
    }
    .modal-body .loginForm input{
        
    }
            
</style>

    <!-- model start -->
    <!-- login -->
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #272121; color: #e16428">
                <div class="modal-header">
                    <h5 class="modal-title Heading" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #e16428;">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: ;">
                    <!-- <form class="loginForm" action="login.php" method="post">
                        Email: <input type="email" name="userEmail">
                        <br>
                        Password: <input type="password" name="userPassword" id="userPassword">
                        <br>
                        <input type="Submit" name="loginBtn" value="Login">
                        <br><a href="registration.php">Click here to register.</a>
                    </form> -->

                    <form action="login.php" method="post">
                      <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email: </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="enter email" name="userEmail" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password: </label>
                        <div class="col-sm-10">
                          <input type="password" name="userPassword" class="form-control form-control-sm" id="colFormLabelSm" placeholder="enter password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                        <div class="col-sm-3">
                            <!-- <input type="Submit" name="loginBtn" value="Login" id="colFormLabelSm"> -->
                            <button type="Submit" name="loginBtn" class="btn" style="background-color: #e16428; color: #272121">Login</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                        <div class="col-sm-10">
                            <a href="registration.php">Click here to register.</a>
                        </div>
                      </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #e16428; color: #272121">Close</button>
                    <button type="button" class="btn" style="background-color: #e16428; color: #272121">Login</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- See My Team -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="background-color: #e1e099;color: #e16428;">
                <div class="container mt-5">
                    <form action="SeeMyTeamEvent1.php" method="POST">
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-7">
                                <input name="userEmailSearchTeam" type="Email" class="form-control"
                                    placeholder="enter your email address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-7">
                                <button class="btn" style="background-color: #e16428;color: #e1e099;" name="SeeMyTeam">See My Team</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <!-- event-1 -->
    <div class="modal fade bd-example-modal-xl1" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #1b1b2f;color: #e43f5a">
                <center>
                    <div>
                        <h1 align="center" class="Heading mt-5 mb-2">Aaviskar</h1>
                        <img src="img/aviskar.jpg" width="50%" style="margin: 20px 0px;">
                        <!-- <h1 class="mb-3">Rules-1</h1> -->
                        <div class="container p-5">
                            <div class="row">
                                <div class="col-sm">
                                    <p style="text-align: left;"><b>Team size: 1</b></p>
                                    <p style="text-align: left;"><b>Rules:</b></p>
                                    <ul style="text-align: left;">
                                        <li>Participants have to develop a software application or a working model for
                                            topics given above. </li>
                                        <li>Maximum 4 members allowed in a team. </li>
                                        <li>Computers and internet will be provided by the department but participants have to bring
                                            their own hardware components (if required).</li>
                                        <li>You have to prepare a presentation regarding your project and you have to
                                            submit detailed report for the project on the day of event.</li>
                                        <li>Students can submit their abstract at a time of registration.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #e43f5a;color: #1b1b2f;">Close</button>
                    <form action="e1r1.php" method="post">
                        <button type="submit" class="btn" name="RegisterBtn"  style="background-color: #e43f5a;color: #1b1b2f;">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- event-2 -->
    <div class="modal fade bd-example-modal-xl2" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #30475e;color: #f2a365">
                <center>
                    <div>
                        <h1 align="center" class="Heading mt-5 mb-2">Vanijya Vyapar</h1>
                        <img src="img/bech-ke-dikha.jpg" width="50%" style="margin: 20px 0px;">
                        <div class="container p-5">
                            <div class="row">
                                <div class="col-sm">
                                    <p style="text-align: left;"><b>Team size: 2</b></p>
                                    <p style="text-align: left;"><b>Round 1 (Sales Warrior):</b></p>
                                    <ul style="text-align: left;">
                                        <li>Each team will be allocated a team number by picking up chit from a bowl
                                        </li>
                                        <li>Each team will be allocated a product based on their team number</li>
                                        <li>Here the Judge will be the customer and all teams will have to sell their
                                            product tothem</li>
                                        <li>Each team will get 5 minutes for forming the sales strategy and 10 minutes
                                            for sellingthe product, so total 15 minutes per team will be allotted.</li>
                                    </ul>

                                    <p style="text-align: left;"><b>Rules:</b></p>
                                    <ul style="text-align: left;">
                                        <li>Minimum 3 and Maximum 4 Participants per team are allowed</li>
                                        <li>Elimination round would consist of answering 10 questions related to
                                            marketing, sales,advertising</li>
                                        <li>Only 8 teams will be allowed to enter Round 2</li>
                                        <li>Teams will have to sell their product to the opposition team in Round 2</li>
                                        <li>Only 4 teams will be allowed to enter Round 3</li>
                                        <li>Teams will have to sell their product to the Judge who will act as customer
                                            in Round 3</li>
                                        <li>In the event, judges’ decision will be final & irrevocable</li>
                                        <li>All contestants need to carry their college identity card compulsorily</li>
                                        <li>Top 2 teams will be awarded the First Prize and Second Prize respectively.
                                        </li>
                                    </ul>        
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #f2a365;color: #30475e;">Close</button>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button"
                        aria-expanded="false" aria-controls="collapseExample" name="aaaa" style="background-color: #f2a365;color: #30475e;">Register</a>
                    <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button"
                        aria-expanded="false" aria-controls="collapseExample">See My Team</a> -->
                </div>

                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <div class="container mt-5">
                            <p style="color:red;">"Required all the fields"</p>
                            <form action="e2r2_v2.php" method="POST">

                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">First member :</label>
                                    <div class="col-sm-7">
                                        <input name="member1" type="email" class="form-control"
                                            placeholder="first member's email address" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Second member :</label>
                                    <div class="col-sm-7">
                                        <input name="member2" type="email" class="form-control"
                                            placeholder="second member's email address" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-7">
                                        <button type="submit" class="btn" style="background-color: lightgreen;"
                                            name="RegisterBtn">Register</button>
                                        <!-- <p style="display: inline-block;"><i>(We will contact you soon.)</i></p> -->
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- event-3 -->
    <div class="modal fade bd-example-modal-xl3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="background-color: #232931;color: #a7d129">
                <center>
                    <div>
                        <h1 align="center" class="Heading mt-5 mb-2">Khoj Khajana</h1>
                        <img src="img/tresrhunt.jpg" width="50%" style="margin: 20px 0px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm p-5">
                                    <p style="text-align: left;"><b>Team size: 4</b></p>
                                    <p style="text-align: left;"><b>Round 1: (30 minutes)</b></p>
                                    <ul style="text-align: left;">
                                        <li>Solve the given clues and go to destination and perform the mentioned tasks.
                                        </li>
                                        <li>First clue will be given in classroom.</li>
                                    </ul>
                                    <p style="text-align: left;"><b>Round 2: (45 minutes)</b></p>
                                    <ul style="text-align: left;">
                                        <li>Round 2 starts in lab.</li>
                                        <li>Each team has to solve the problem statement and execute the code. </li>
                                        <li>Maximum team allowed : 30</li>
                                    </ul>             
                                </div>
                            </div>
                        </div>
                    </div>
                </center>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #a7d129;color: #232931">Close</button>
                    <button type="submit" class="btn btn-primary" name="RegisterBtn" style="background-color: #a7d129;color: #232931">Register</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model end -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



    <script> 
    $(document).ready(function() {
        //check session
        $('.checkLogin').click(function() {
            var session = $('#checkSession').val();
            if (session == false) {
                alert("Login First");
            }
        });
    });
    </script>

<script>
    var topBtn = document.getElementById("topBtn");

    window.onscroll = function() {topScroll()};

    function topScroll() {
      if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        topBtn.style.display = "block";
      } else {
        topBtn.style.display = "none";
      }
    }
    function backTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>

</body>

</html>
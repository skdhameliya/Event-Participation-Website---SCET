<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <!-- <form action="" method="post">
        First Name: <input type="text" name="userEmail" id=""><br>
        Password: <input type="text" name="userPassword" id=""><br>
        <input type="Submit" name="loginBtn" value="Login">
    </form> -->

<div class="container mt-5 pt-3 pb-3" style="background-color: #f6e9e9">
    <p style="color:red;">"Required all the fields"</p>
    <form action="" method="POST">
		
		<div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">First Name :</label>
		  <div class="col-sm-7">
			<input id="FirstName" name="Fname" type="text" class="form-control" placeholder="first name" >
		  </div>
		</div>

		<div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Last Name :</label>
		  <div class="col-sm-7">
			<input id="LastName" name="Lname" type="text" class="form-control" placeholder="last name" >
		  </div>
		</div>
		
        <div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Email :</label>
		  <div class="col-sm-7">
			<input id="Email" name="Email" type="email" class="form-control" placeholder="abc@gmail.com" >
		  </div>
		</div>
		
        <div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Contact No. :</label>
		  <div class="col-sm-7">
			<input id="ContactNo" name="ContactNo" type="number" class="form-control" placeholder="only 10 digits and should start with 6 or 7 or 8 or 9 " >
		  </div>
		</div>
		
        <div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Select Year :</label>
		  <div class="col-sm-2">  
          <select id="Choice" name="Year" class="custom-select mr-sm-2" >
              <option selected>Choose...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
		  </div>
		</div>
        
        <div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Password :</label>
		  <div class="col-sm-7">
			<input id="Password" name="Password" type="password" class="form-control" placeholder="minimum 6 digits are required">
		  </div>
		</div>

        <div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label">Confirm Password :</label>
		  <div class="col-sm-7">
			<input id="ConfirmPassword" name="ConfirmPassword" type="password" class="form-control" >
		  </div>
		</div>

		<div class="form-group row">
		  <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
		  <div class="col-sm-7">
				<button type="submit" class="btn" style="background-color: #e16428;color: #363333;" name="Submit">Submit</button>
                <h5 style="display: inline-block;">
                    <a href="index.php">Click here to login.</a>
                </h5>
				<!-- <p style="display: inline-block;"><i>(We will contact you soon.)</i></p> -->
		  </div>
		</div>

        <!-- <div class="form-group row">
          <label for="colFormLabel" class="col-sm-3 col-form-label"></label>
          <div class="col-sm-7">
                
          </div>
        </div> -->
		
    </form>
</div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

<?php
    include("connection.php");
    
    if(isset($_POST["Submit"]))
    {
        $fname = $_POST["Fname"];
        $lname = $_POST["Lname"];
        $email = $_POST["Email"];
        $contact = $_POST["ContactNo"];
        $year = $_POST["Year"];
        $password = $_POST["Password"];
        $cpassword = $_POST["ConfirmPassword"];


        // $x = "ff";
        //echo "$x.charAt(0)";

        //echo "$fname/$lname/$email/$contact/$year/$password/$cpassword";


        // if()
        // {
        //     //already register
        // }
        // else
        // {
        //     //not register
        // }


        if($fname&&$lname&&$email&&$contact&&$year&&$password&&$cpassword)
        {
            if(strpos($email, 'gmail.com'))
            {
                // echo "<center>email accept </center><br>";
                if(preg_match('/^[6-9]{10}+$/', $contact))
                // if(strlen($contact) == 10)
                {
                    // echo "<center>contact accept </center><br>";
                    if(($password == $cpassword) && (strlen($cpassword) > 5))
                    {
                        // echo "<center>pass accepted </center><br>";
                        // $cpassword = md5($cpassword);
                        
                       // include("connection.php");

                        $queryInsert = "insert into logintbl values ('$fname','$lname','$email','$contact','$year','$cpassword')"; 
                        
                        $queryInsertData = mysqli_query($connection ,$queryInsert);

                        // die("Registration Done. <br> <a href='index.php'>click here to login</a>");
                        echo "<center>Registration of $fname $lname has done.</center>";
                        echo "<script>alert('Registration of $fname $lname has done.')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Password & Confirm Password must be same and length must be more than 5.') </script>";
                    }
                }
                else
                {
                    echo "<script>alert('mobile number should start with 9 or 8 or 7 or 6 and length must be 10 digits. You have entered $contact is invalid.')</script>";
                }
            }    
            else
            {
                echo "<script>alert('only gmail is accepted')</script>";
            }
        }
        //else
        {
            // echo "<p><b>All the fields are required..!</b></p>";
            echo "<script>alert('All the fields are required..!')</script>";
        }

        // if($fname&&$lname&&$email&&$contact&&$year&&$password&&$cpassword)
        // {
        //     if(strpos($email, 'gmail.com'))
        //     {
        //         echo "email accept <br>";  
        //     }    
        //     else
        //     {
        //         echo "only gmail is accepted <br>";
        //     }
        //     //'/^[6-9]{9}+$/'
        //     //^[7-9][0-9]{9}$
        //     if(preg_match('/^[6-9]\d{9}$/', $contact))
        //     {
        //         echo "contact accept <br>";
        //     }
        //     else
        //     {
        //         echo "mobile number should start with 9 or 8 or 7 or 6 and length must be 10 digits <br>";
        //     }

        //     if($password == $cpassword)
        //     {
        //         echo "pass accepted <br>";
        //     }
        //     else
        //     {
        //         echo "Password & Confirm Password must be same <br>";
        //     }
        // }
        // else
        // {
        //     echo "<p><b>All the fields are required..!</b></p>";
        // }

        //echo "$email/$contact/$password/$cpassword";

          
    }
?>

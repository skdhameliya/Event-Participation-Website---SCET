<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "wt_oep_mydb";

$connection = mysqli_connect($servername,$username,$password,$dbName);

if($connection)
{
    echo "";
    // echo "<script>alert('established con');</script>";
}
else
{
    die("connection could not established" .mysqli_connect_error());
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
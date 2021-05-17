<?php
    session_start();
    session_unset();
    header("location: index.php");

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
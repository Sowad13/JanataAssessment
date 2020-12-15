<?php
$conn = mysqli_connect("localhost","root","","datasystem");

$sql = "UPDATE data SET date='$_POST'".$row['date']."',trade_code = '$_POST'".$row['trade_code']."',high = '$_POST'".$row['high']."',low = '$_POST'".$row['low']."',
open ='$_POST'".$row['open'].",close = '$_POST'".$row['close']."',volume = '$_POST'".$row['volume']."'";

if (mysqli_query($conn,$sql))
    header("refresh:1; url=jason.php");
?>


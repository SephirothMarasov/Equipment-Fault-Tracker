<?php
$hostname = "localhost";
$username = "INSERT DB USER HERE";
$password = "INSERT PASSWORD FOR DB HERE";
$db = "INSERT DB NAME HERE";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
  $store=$_POST['store'];
  $sn=$_POST['sn'];
  $fault=$_POST['fault'];
  $date=$_POST['date'];

// DONT FORGET TO TO INSERT YOUR DATABASE TABLE IN [INSERT TABLE NAME HERE] AND REMOVE THE BRACKETS, EXAMPLE: $query = "INSERT INTO storedb (store, sn, fault, date)
$query = "INSERT INTO [INSERT DB TABLE NAME HERE] (store, sn, fault, date)
  VALUES ('$store', '$sn', '$fault', '$date')";

if (!mysqli_query($dbconnect, $query)) {
        die('An error occurred when submitting your review.');
    } else {
      echo "success!.";
    }

}
?> 


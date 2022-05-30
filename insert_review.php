<?php
require_once 'connect_server.php';

$category = $_REQUEST['cat'];
$text = $_REQUEST['text'];
$date = $_REQUEST['date'];
$complete = $_REQUEST['complete'];

if ($complete == '' || $complete == null){
  $complete = 0;
}

$sql = "INSERT INTO review_table (review_category, review_text, date, complete) VALUES ";
$sql .= "('" . $category . "',";
$sql .= "'" . $text . "',";
$sql .=  "'" . $date . "',";
$sql .= "'" .$complete . "')";


//print $sql;
if(mysqli_query($connection, $sql)){
  print ("Stored");
} else {
  print("Failed");
}

echo "<script>location.href='index.php'</script>";
 ?>
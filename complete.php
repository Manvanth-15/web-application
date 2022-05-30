<?php
require_once 'connect_server.php';

$id = $_REQUEST['id'];

$sql = "UPDATE review_table SET complete = '1' WHERE review_id = '" . $id . "'";
if(mysqli_query($connection, $sql)){
  print ("Stored");
} else {
  print("Failed");
}

echo "<script>location.href='index.php'</script>";


?>
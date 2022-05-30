<?php
function check_login( $connection)
{
    if(isset($_SESSION['user_id']) )
    {
        $id = $_SESSION['user_id'];
		$query = "select * from user_info where user_id = '$id' limit 1";

		$output = mysqli_query($connection,$query);
		if($output && mysqli_num_rows($output) > 0)
		{
			$user_data = mysqli_fetch_assoc($output);
			return $user_data;
		}
    }
    
    header("Location: login.php");
	die;
}   
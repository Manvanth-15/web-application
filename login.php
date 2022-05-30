<?php
    session_start();
    include("connect_server.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $Error = "";
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)  )
		{		
            
            $query = "select * from user_info where username = '$user_name' limit 1";

			$output = mysqli_query($connection, $query);
            
            if($output)
            {
                if($output && mysqli_num_rows($output) > 0 )
                {
                    $user_data = mysqli_fetch_assoc($output);

                    if( $user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: ./index.php");
			            die;
                    }
                }
            }
		    echo "Incorrect username or password";
		}
        else
		{
			echo "User not signed in, try signing in";
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div id="box">
            
        <form method="post">
            <div class= "heading" >Login</div>

            <input id="text" type="text" name="username" placeholder="Enter Username" ><br><br>
            <input id="text" type="password" name="password" placeholder="Enter password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>
            <span class ="text" > New user?</span>
            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>
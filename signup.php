<?php
    session_start();
    include("connect_server.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        // print_r($_POST);
        $Error = "";
        $email = $_POST['email'];
        if( !preg_match("/^[\w \-] + @ [\w\-] + .[\w\-]+$/",$email) )
        {
            $Error = "Enter valid email address";
        }

		$user_name = $_POST['username'];
		$password = $_POST['password'];
        $mobile = $_POST['mobile'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)  )
		{
			$user_id = random_int(10,10000);
			
            $query = "insert into user_info(user_id,username,password,email,mobile) 
            values ('$user_id','$user_name','$password','$email','$mobile')";

			mysqli_query($connection, $query);

			header("Location: login.php");
			die;
		}
        else
		{
			echo "Enter Valid INFORMATION ";
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="signup.css">
</head>
<body>
    
        <div id = "box">
            <form method="post">
                <div id = "heading">Sign Up</div>

                <input id="text" type="email" name="email" placeholder = "*Enter Email"   ><br><br>
                <input id ="text" type="text" name = "username" placeholder = "*Enter Username"  ><br><br>

                <input id="text" type="password" name="password" placeholder = "*Enter Password" ><br><br>
                <input id="text" type="text" name="mobile" placeholder = "Enter mobile number"  ><br><br>
                
                <input id="button" type="submit" value="Sign in"><br><br>
                <span class ="text" > Already a user?</span>
                <a  href="./login.php">Login </a><br><br>
            
            </form>
        </div>
                    
</body>
</html>
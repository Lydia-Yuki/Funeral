<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Main css -->
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">What type of user are you ?</h2>
                    <div class="form-radio">
                        <input type="radio" name="member_level" value="user" id="user"  />
                        <label for="user">User</label>

                        <input type="radio" name="member_level" value="admin" id="admin" checked="checked"/>
                        <label for="admin">Admin</label>
                    </div>

                    <div class="form-textbox">
                        <label for="name">Username</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" />
                    </div>

                    <div class="form-textbox">
                        <label for="conpass">Confirm Password</label>
                        <input type="password" name="conpass" id="conpass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="back" id="back" class="submit" value="Back" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="index.php" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>

    
    <?php
    include ('config.php');
    session_start();

    if (isset($_POST['submit'])) {
	// receive all input values from the form
	    $Username = $_POST[name];
        $Password = $_POST[pass];
        $ConPassword = $_POST[conpass];
        $Member = $_POST[member_level];

        if($Member == 'admin' ){

            if ($Password == $ConPassword){
                $sel = "INSERT INTO admin_tbl (username, pass) 
                VALUES ('$Username','$Password')";

                mysqli_query($db, $sel);
                echo("You have successfully signed up");
		        header('location: loginadmin.php');
                }
            else{
                echo("Passwords do not match");
            }
        }
        else{
            if ($Password == $ConPassword){
                $que = "INSERT INTO user_tbl (username, pass) 
                VALUES ('$Username','$Password')";

                mysqli_query($db, $que);
                echo("You have successfully signed up");
		        header('location: login.php');
                }
            else{
                echo("Passwords do not match");
            }
        }
    }

    if(isset($_POST['back'])){
        header('location: index.php');
    }
    ?>

    <!-- JS -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</html>


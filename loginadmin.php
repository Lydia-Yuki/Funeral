<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link rel="stylesheet" href="./css/admin.css" />
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-button">
                                    <button name="login" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                                <div class="col-lg-6 login-btm back-button">
                                    <button name="back" class="btn btn-outline-primary">BACK</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
</html>

<?php
    include ('config.php');
    session_start();

    if(isset($_POST['back'])){
        header('location: index.php');
    }

    if(isset($_POST['login'])){
        $user = $_POST["username"];
		$pass= $_POST["pass"];


        $sel = "SELECT * FROM admin_tbl WHERE username = '$user' and pass = '$pass'";

		$result = mysqli_query($db,$sel);
		// $row = mysqli_fetch_array($result);
		  
		// $count = mysqli_num_rows($result);

        if ($result >=1){
			//$_SESSION['login_user'] = $user;
             
            header('location: dashboard.php');
        }
        else{
            // echo ($count);
            echo ('Incorrect Username or Password');
        }
    }

?>


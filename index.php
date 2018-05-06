<?php
        session_start();
        include("functions.php");
        require_once 'sqlcon.php';
        if(isset($_SESSION['user'])!=""){
                if($_SESSION['admin_rights']=='Y'){
                        header("Location: admin.php");
                }else{
                header("Location: home.php");
                exit;
                }
        }
        $error = false;
        if( isset($_POST['btn-signin']) ) {

                // sanitizing input
                $email = strtolower(htmlspecialchars(strip_tags(trim($_POST['email']))));
                $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
                if(empty($email)){
                        $error = true;
                        $errMSG = "Please enter your email address.";
                } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                        $error = true;
                        $errMSG = "Please enter a valid email address.";
                }
                if(empty($pass)){
                        $error = true;
                        $errMSG = "Please enter your password.";
                }

                if (!$error) {
                        $username = hash('sha256',$email);
                        $manager = new MongoDB\Driver\Manager("mongodb://lah8:ImdbGr0up!@ds247619.mlab.com:47619/it635mongo");
                        $query = new MongoDB\Driver\Query(array('email_hash' => $username));
                        $cursor = $manager->executeQuery('it635mongo.it635final', $query);
                        $obStr = (string)(json_encode($cursor->toArray()));
                        echo $obStr.'<br>';
                        if(strcmp($obStr,'[]')!==0){
                                $parsed_json = json_decode($obStr, true);
                                if(crypt($pass,$parsed_json[0]['pw_hash'])==$parsed_json[0]['pw_hash']){
                                        $_SESSION['user'] = $username;
                                        $_SESSION['admin_rights'] = $parsed_json[0]['admin_rights'];
                                        $_SESSION['f_name'] = $parsed_json[0]['f_name'];
                                        $_SESSION['l_name'] = $parsed_json[0]['l_name'];
                                        if($_SESSION['admin_rights'] !== 'Y'){
                                                $_SESSION["state"] = 'User';
                                                header("Location: home.php");
                                        }
                                        if($_SESSION['admin_rights'] == 'Y'){
                                                $_SESSION["state"] = 'Admin';
                                                header("Location: admin.php");
                                        }


                                }else{
                                        $errMSG = "Incorrect Credentials, Try again...";

                                }

                        }else{
                                $errMSG = "Incorrect Credentials, Try again...";

                        }

                }

        }


?>


<!DOCTYPE html>
<HTML>
<HEAD>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</HEAD>

<div class="container">
        <div class="row">
        <div class="container" id="formContainer">

          <form class="form-signin" id="login" role="form" method="post" action="" autocomplete="off">
                        <?php
                                if ( isset($errMSG) ) {

                                        ?>
                                        <div class="form-group">
                                        <div class="alert alert-danger">
                                        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                        </div>
                                        </div>
                                        <?php
                                }
                        ?>
                        <div style="margin:auto;width: 50%;padding: 40px;">
                                <h3 class="form-signin-heading">Please sign in</h3><br>
                                <a href="#" id="flipToRecover" class="flipLink">
                                </a>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required autofocus><br>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required><br>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-signin">Sign in</button>
                        </div>
          </form>

        </div>
        </div>
</div>
</HTML>

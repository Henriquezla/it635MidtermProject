<?php
        include("functions.php");
        session_start();
        gatekeeper('Admin');
        require_once 'sqlcon.php';
        if(isset($_POST['btn-cancel']) ) {
                header('index.php');
                exit;
        }

        if(isset($_POST['btn-submit-addpicture']) ) {
                $p_id = $_POST["p_id"];
                $manager = new MongoDB\Driver\Manager("mongodb://lah8:ImdbGr0up!@ds247619.mlab.com:47619/it635mongo");
                $bulk = new MongoDB\Driver\BulkWrite;
                $document1 = ['player_id' => $p_id,'picture'=> 'http://it635.lhenriquez.com/images/'.$p_id.'.jpg'];
                $query = new MongoDB\Driver\Query(array('player_id' => $p_id));
                $cursor = $manager->executeQuery('it635mongo.it635final', $query);
                $obStr = (string)(json_encode($cursor->toArray()));
                $parsed_json = json_decode($obStr, true);
                $blk1 = $bulk->insert($document1);
                var_dump($blk1);
                if(strcmp($obStr,'[]')!==0){
                        $errMSG = "The record already exists.";
                }else{
                        $sucMSG = "Record successfully updated.";
                        $result = $manager->executeBulkWrite('it635mongo.it635final', $bulk);
                }

                 if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = $_FILES["photo"]["name"];
                        $filetype = $_FILES["photo"]["type"];
                        $filesize = $_FILES["photo"]["size"];

                        // Verify file extension
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                        // Verify file size - 5MB maximum
                        $maxsize = 5 * 1024 * 1024;
                        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                        // Verify MYME type of the file
                        if(in_array($filetype, $allowed)){
                            // Check whether file exists before uploading it
                                if(file_exists("images" . $_FILES["photo"]["name"])){
                                        $errMSG =  $_FILES["photo"]["name"] . " already exists.";
                                } else{
                                        move_uploaded_file($_FILES["photo"]["tmp_name"], "/var/www/html/images/" . $p_id.'.jpg');
                                        $sucMSG =  "Your file was uploaded successfully.";
                                }
                        } else{
                                 $errMSG =  "Error: There was a problem uploading your file. Please try again.";
                        }
                } else{
                         $errMSG = "Error: " . $_FILES["photo"]["error"];
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

          <form class="form-signin" id="login" role="form" method="post" action="" autocomplete="off" enctype="multipart/form-data">
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
                        <?php
                                if (isset($sucMSG)) {

                                        ?>
                                        <div class="form-group">
                                        <div class="alert alert-success">
                                        <span class="glyphicon glyphicon-ok-sign"></span> <?php echo $sucMSG; ?>
                                        </div>
                                        </div>
                                        <?php
                                }
                        ?>
                        <div style="margin:auto;width: 50%;padding: 40px;">
                                <h3 class="form-signin-heading">Enter Player Information</h3><br>
                                <a href="#" id="flipToRecover" class="flipLink">
                                </a>
                                <!---<input type="text" class="form-control" name="p_id" id="p_id" placeholder="Player ID" required autofocus><br> -->
                                <label for="p_id">Player ID:</label>
                                <select name="p_id" id="p_id">
                                <?php
                                        $query = "SELECT id FROM players";
                                        $result = $dbh->query($query);
                                        while ($row = $result->fetch_assoc()){
                                                echo "<option value=".$row['id'].">" . $row['id'] . "</option>";
                                        }
                                ?>
                                </select><br>
                                <label for="fileSelect">Filename:</label>
                                <input type="file" name="photo" id="fileSelect"
                                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed.</p>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-submit-addpicture">Submit</button><br><br>
                                <button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel / Go Home</button>
                        </div>
          </form>

        </div>
        </div>
</div>
</HTML>

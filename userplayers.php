<?php
        include("functions.php");
        session_start();
        gatekeeper('User');
        require_once 'sqlcon.php';
        if(isset($_POST['btn-cancel']) ) {
                header('index.php');
                exit;
        }

        $query = "SELECT * FROM players";
        $result = $dbh->query($query);
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $rows[] = $row;
        }
        $rowCount = count($rows);
        echo '<div style="margin:auto;width:75%;padding:40px;">';
        echo '<h3 class="form-signin-heading">Players</h3><br>';
        echo '<form class="form-signin" id="userchoice" role="form" method="post" action="">';
        echo '<table class="table table-striped">';
        echo '<tr>';
        echo '<th scope="col">Picture</th>';
        echo '<th scope="col">ID</th>';
        echo '<th scope="col">First Name</th>';
        echo '<th scope="col">Middle Initial</th>';
        echo '<th scope="col">Last Name</th>';
        echo '<th scope="col">DOB</th>';
        echo '<th scope="col">Country</th>';
        echo '<th scope="col">Bats/Throws</th>';
        echo ' </tr>';
        if($rowCount >= 1){
                foreach($rows as $row){
                        echo '<tr>';
                        $manager = new MongoDB\Driver\Manager("mongodb://lah8:ImdbGr0up!@ds247619.mlab.com:47619/it635mongo");
                        $query = new MongoDB\Driver\Query(array('player_id' => $row['id']));
                        $cursor = $manager->executeQuery('it635mongo.it635final', $query);
                        $obStr = (string)(json_encode($cursor->toArray()));
                        $parsed_json = json_decode($obStr, true);
                        if(strcmp($obStr,'[]')!==0){
                                $url = $parsed_json[0]['picture'];
                        }else{
                                $url = "https://it635.lhenriquez.com/images/noimage.jpg";
                        }

                        echo '<td scope="row"><a href="'.$url.'">' . "<img style='clear: both;' src='$url' height='42' width='42'/>" . '</a>';
                        echo '<td scope="row">' . $row['id'] . '</td>';
                        echo '<td scope="row">' . $row['f_name'] . '</td>';
                        echo '<td scope="row">' . $row['m_initial'] . '</td>';
                        echo '<td scope="row">' . $row['l_name'] . '</td>';
                        echo '<td scope="row">' . $row['dob'] . '</td>';
                        echo '<td scope="row">' . $row['country'] . '</td>';
                        echo '<td scope="row">' . $row['bats_throws'] . '</td>';
                        echo '</tr>';
                        }
        }else{
                echo '<h4 class="form-signin-heading">No such player was found.  Redirecting to your homepage...</h4><br>';
                header('Refresh: 4; index.php');

                }
        echo '</table><br>';

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
        <div style="margin:auto;width: 50%;padding: 40px;">
        <form class="form-signin" id="login" role="form" method="post" action="" autocomplete="off">
        <button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'home.php' "; name="btn-cancel">Cancel</button>
                        </div>
          </form>

        </div>
        </div>
</div>

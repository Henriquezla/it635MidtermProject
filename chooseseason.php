<?php 
	include("functions.php");
	//include("admin_addplayerteam.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-add']) ) {
		if(!empty($_POST['seasonyear'])){
			$dbh->autocommit(false);
			$destTeam = $_SESSION['teamID'][0];
			$seasonID = $_POST['seasonyear'];
			$queries = array();
			$playersIDs = $_SESSION['playersID'];
			foreach($playersIDs as $id){
				$queries[] = "INSERT INTO team_roster_per_season(player_id,team_id,season_year) VALUES('$id','$destTeam','$seasonID');";
			}
			/* foreach($_SESSION['teamID'] as $id){
				echo 'ID = '.$id.'<br>';
				
			} */
			$succeed = true;
			foreach($queries as $query){
				if(!$dbh->query($query)){
					$dbh->rollback();
					$succeed = false;
					$error = true;
					$errMSG = mysqli_error($dbh);
					return;
				}
			}
			if($succeed){
				$dbh->commit();
				$error = false;
				$sucMSG = "Player(s) successfully added to team.";
			}
			$dbh->close();
		}else{
			$error = true;
			$errMSG = 'Please select a season.';
		}			
				
	}
	
	/* if(isset($_POST['btn-search']) ) {
		$searchPerformed = true;
		$error = false;
		$searchTerm = ucwords(sanitizeData($_POST['searchbox']));
		
		if(!$error){
			if(empty($searchTerm)){
				$query = "SELECT * from teams";
				
			}else{
				$query = "SELECT * from teams where name like '%$searchTerm%'";
			}
			
				
			$result = $dbh->query($query);
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			$rowCount = count($rows);
			echo '<div style="margin:auto;width:75%;padding:40px;">';
			echo '<h3 class="form-signin-heading">Teams</h3><br>';
			echo '<form class="form-signin" id="userchoice" role="form" method="post" action="">';
			echo '<table class="table table-striped">';
			echo '<tr>';
			echo '<th scope="col">Select</th>';
			echo '<th scope="col">ID</th>';
			echo '<th scope="col">Team Name</th>';
			echo '<th scope="col">Abbreviation</th>';
			echo '<th scope="col">Games Played</th>';
			echo '<th scope="col">Games Won</th>';
			echo '<th scope="col">Games Lost</th>';
			echo ' </tr>';
			if($rowCount >= 1){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td scope="row"><input type="checkbox" name="rmvID[]" value="'.$row['id'].'"</td>';
					echo '<td scope="row">' . $row['id'] . '</td>';
					echo '<td scope="row">' . $row['name'] . '</td>';
					echo '<td scope="row">' . $row['abbreviation'] . '</td>';
					echo '<td scope="row">' . $row['games_played'] . '</td>';
					echo '<td scope="row">' . $row['games_won'] . '</td>';
					echo '<td scope="row">' . $row['games_lost'] . '</td>';
					echo '</tr>';
				}
			
			}else{
				echo '<h4 class="form-signin-heading">No such team was found.  Try Again...</h4><br>';
				$searchPerformed = false;
				//header('Refresh: 4; index.php');
				
			}
			echo '</table><br>';
					
					
								
		}
							
	} */
			
?>


<!DOCTYPE html>
<HTML>
<HEAD>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
			<?php
				if (!isset($sucMSG)) {
					
					?>
			<div style="margin:auto;width: 50%;padding: 40px;"><br>
				<h3>Choose Season</h3>
				<input class="date-own form-control" style="width: 300px;" type="text" name="seasonyear" id="seasonyear">
				<script type="text/javascript">
				  $('.date-own').datepicker({
					 minViewMode: 2,
					 format: 'yyyy'
				   });
				</script>
				<br><br>
				<button class="btn btn-lg btn-primary btn-block" type="add" name="btn-add">Submit</button><br><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
			<?php
				}else{
					?>
					<div style="margin:auto;width: 50%;padding: 40px;"><br><br>
					<button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Go Home</button>
				<?php
				}
			?>
          </form>
    
        </div>
	</div>
</div>
</HTML>
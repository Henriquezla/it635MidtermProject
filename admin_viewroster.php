<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
	}
	
	if(isset($_POST['btn-delete']) ) {
		if(!empty($_POST['rmvID'])){
			$error = false;
			$teamID = $_POST['rmvID'][0];
			$query = "SELECT (SELECT name FROM teams WHERE id='$teamID') AS 'Team Name', p1.f_name AS 'First Name',p1.l_name AS 'Last Name',s1.season_year AS 'Season' FROM team_roster_per_season s1 LEFT JOIN players p1 ON s1.player_id = p1.id WHERE s1.team_id='$teamID';";
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
				echo '<th scope="col">Team Name</th>';
				echo '<th scope="col">Player First Name</th>';
				echo '<th scope="col">Player Last Name</th>';
				echo '<th scope="col">Season</th>';
				echo ' </tr>';
				if($rowCount >= 1){
					foreach($rows as $row){
						echo '<tr>';
						echo '<td scope="row">' . $row['Team Name'] . '</td>';
						echo '<td scope="row">' . $row['First Name'] . '</td>';
						echo '<td scope="row">' . $row['Last Name'] . '</td>';
						echo '<td scope="row">' . $row['Season'] . '</td>';
						echo '</tr>';
					}
				
				}else{
					echo '<h4 class="form-signin-heading">No such team was found.  Redirecting to your homepage...</h4><br>';
					header('Refresh: 4; index.php');
					
				}
				echo '</table><br>';
		}else{
			$error = true;
			$errMSG = 'Please select a team.';
		}		
			
		
	}
	
	if(isset($_POST['btn-search']) ) {
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
					echo '<td scope="row"><input type="radio" name="rmvID[]" value="'.$row['id'].'"</td>';
					echo '<td scope="row">' . $row['id'] . '</td>';
					echo '<td scope="row">' . $row['name'] . '</td>';
					echo '<td scope="row">' . $row['abbreviation'] . '</td>';
					echo '<td scope="row">' . $row['games_played'] . '</td>';
					echo '<td scope="row">' . $row['games_won'] . '</td>';
					echo '<td scope="row">' . $row['games_lost'] . '</td>';
					echo '</tr>';
				}
			
			}else{
				echo '<h4 class="form-signin-heading">No such team was found.  Redirecting to your homepage...</h4><br>';
				header('Refresh: 4; index.php');
				
			}
			echo '</table><br>';
					
					
								
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
			<?php
				if (isset($searchPerformed) ) {
					?>
					<button class="btn btn-lg btn-primary btn-block" type="delete" name="btn-delete">View Roster</button><br><br>
					<?php
				}
			?>
					
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				
				<?php
				if (isset($searchPerformed) ) {
					
					echo '<br>';
					
				}else{
					echo '<h3 class="form-signin-heading">Enter Team Information</h3><br>';
					echo '<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search teams by name or press Enter to load all teams..."><br>';
					echo '<button class="btn btn-lg btn-primary btn-block" type="search" name="btn-search">Search</button><br><br>';
				}
			?>			
				
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div>
	</div>
</div>
</HTML>


		
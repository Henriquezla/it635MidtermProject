<?php 
	include("functions.php");
	session_start();
	gatekeeper('Admin');
	require_once 'sqlcon.php';
	ini_set("display_errors", true);
	if(isset($_POST['btn-cancel']) ) {
		header('index.php');
		exit;
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
			/* foreach($rows as $row){
				echo $row['f_name'] . "<br>";
			} */
			echo '<div style="margin:auto;width:75%;padding:40px;">';
			echo '<h3 class="form-signin-heading">Teams</h3><br>';
			echo '<form class="form-signin" id="userchoice" role="form" method="post" action="">';
			echo '<table class="table table-striped">';
			echo '<tr>';
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
					echo '<input type="checkbox" name="'.$row['id'].'" value="'.$row['id'].'"';
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
<!------ Include the above in your HEAD tag ---------->
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
					<button class="btn btn-lg btn-primary btn-block" type="delete" name="btn-delete">Delete Selected</button><br><br>
					<?php
				}
			?>
					
				<h3 class="form-signin-heading">Enter Team Information</h3><br>
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				
				<?php
				if (isset($searchPerformed) ) {
					
					echo '<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search teams by name or press Enter to load all teams..."><br>';
					
				}else{
					
					echo '<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search teams by name or press Enter to load all teams..." autofocus><br>';
					
				}
			?>			
				<button class="btn btn-lg btn-primary btn-block" type="search" name="btn-search">Search</button><br><br>
				<button class="btn btn-lg btn-danger btn-block" type="button" onclick="window.location.href = 'admin.php' "; name="btn-cancel">Cancel</button>
			</div>
          </form>
    
        </div> <!-- /container -->
	</div>
</div>
</HTML>


		
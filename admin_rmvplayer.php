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
			$dbh->autocommit(false);
			$deleteID = $_POST['rmvID'];
			$queries = array();
			foreach($deleteID as $rmID){
				$queries[] = "DELETE FROM players where id = '$rmID';";
			}
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
			if($succeed && $_SESSION["state"] === 'Admin'){
				$dbh->commit();
				$error = false;
				$sucMSG = "Player(s) successfully deleted.";
			}else{
				$error = true;
				$errMSG = 'Operation not allowed.';
			}
			$dbh->close();
		}else{
			$error = true;
			$errMSG = 'Please select at least one player.';
		}			
		
	}
	
	if(isset($_POST['btn-search']) ) {
		$searchPerformed = true;
		$error = false;
		$searchTerm = ucwords(sanitizeData($_POST['searchbox']));
		
		if(!$error && $_SESSION["state"] === 'Admin'){
			if(empty($searchTerm)){
				$query = "SELECT * from players";
				
			}else{
				$query = "SELECT * from players where f_name like '%$searchTerm%'";
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
					echo '<td scope="row"><input type="checkbox" name="rmvID[]" value="'.$row['id'].'"</td>';
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
					<button class="btn btn-lg btn-primary btn-block" type="delete" name="btn-delete">Delete Selected</button><br><br>
					<?php
				}
			?>
					
				<a href="#" id="flipToRecover" class="flipLink">
				</a>
				
				<?php
				if (isset($searchPerformed) ) {
					
					echo '<br>';
					
				}else{
					echo '<h3 class="form-signin-heading">Enter Player Information</h3><br>';
					echo '<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search player by first name or press Enter to load all players..." autofocus><br>';
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
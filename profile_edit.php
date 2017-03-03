<?php
	session_start();

	if(!isset($_SESSION['islogin'])) {
		header('Location: login.php');
		exit();
	}
	require_once('backend/functions.php');

	$id = $_SESSION['chaser_id'];

	$chaser = fetchById($id, 'chasers');

	if(count($_POST)>0) {
		$data = array(
			'last_name' => $_POST['last_name'],
			'first_name' => $_POST['first_name'],
			'gender' => $_POST['gender'],
			'bio' => $_POST['bio']
		);
		if(count($_FILES)>0) {
			$f = $_FILES['imgInp'];
	        $tmp_file = $f['tmp_name'];
	        if($tmp_file != '' && $f['size'] > 0 ) {
	        	$path = $name = 'uploads/'.rand(). rand().rand().strtolower($f['name']);
	        	move_uploaded_file($tmp_file, $path);
	        	$data['photo'] = $path;
	        }
		}
		if(update($data, 'chasers', $id)) {
			header('location: profile_edit.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link type="text/css" href="fonts/fonts.css" rel="stylesheet">

	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" href="custom-css/styles.css" rel="stylesheet">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<!-- JS Scripts -->

	<script type='text/javascript'>
		$(document).ready(function() {
			$('#selectIMG').click(function(){
			     $('#imgInp').trigger('click');
			});

			$('#form_submit').click(function() {
				$('#new_post').submit();
			});

			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#imgOutp').attr('src', e.target.result);
		            }
		            
		            reader.readAsDataURL(input.files[0]);
		        }
		    }

		    $('#imgInp').change(function() {
				readURL(this);
			});
			
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->


	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink darken-1">
	        <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	        <ul id="nav-mobile">
        		<li><a href="profile.php"><i class="material-icons">arrow_back</i></a></li>
      		</ul>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Content Area -->
<div class ="card">
	<div class="card-content black-text">
		<div class = "col s12">
		<form action="#" id='new_post' method='post' enctype="multipart/form-data">
			<img id="imgOutp" src="<?php echo $chaser['photo']; ?>" style='width: 100%; height:200px; margin-top: 10px;'/>
			<input type="file" name="imgInp" id='imgInp' accept="image/*" style='display: none;'>
			</div>

			<!-- <button class="btn waves-effect waves-light right pink lighten-3" id='selectIMG'> -->
    					<i id='selectIMG' class="material-icons center">camera_alt</i>
  			 <!-- </button> -->
			<div class="input-field col s12">
            <ul class="collection">
		    <li class="collection-item">
		     <div class="row">
		    <form class="col s12">
		      <div class="row">
		      	<div class="input-field col s12">
		         <input value='<?php echo $chaser['first_name']; ?>' id="first_name" name='first_name' type="text">
		          <label for="first_name">First Name</label>
		        </div>
		        <div class="input-field col s12">
		         <input value='<?php echo $chaser['last_name']; ?>' id="last_name" name='last_name' type="text">
		          <label for="last_name">Last Name</label>
		        </div> 
		       	<div class='col s12'>
			      	<select id='gender' class="browser-default" name='gender'>
					    <option value="" disabled selected>Select gender:</option>
					    	<option value="Male" <?php if($chaser['gender'] == 'Male') echo 'selected'; ?>>
					    		MALE
					    	</option>
					    	<option value="Female" <?php if($chaser['gender'] == 'Female') echo 'selected'; ?>>
					    		FEMALE
					    	</option>
					 </select>
			     </div>
	        	<div class="input-field col s12">
					<textarea name='bio' id="bio" class="materialize-textarea"><?php echo $chaser['bio']; ?></textarea>
					<label for="bio">About Me</label>
				</div>
		</form>
		 <center>
		 	<a id='form_submit' class="waves-effect waves-light btn pink lighten-4">
		 		<i class="material-icons left">done_all</i>Save
		 	</a>
		 </center>
	</div>
</div>
 
  
	 <!-- Content Area -->
</body>
</html>
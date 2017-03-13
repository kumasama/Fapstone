<?php
	session_start();

	if(!isset($_SESSION['islogin'])) {
		header('Location: login.php');
		exit();
	}
	require_once('backend/functions.php');

	$id = $_SESSION['chaser_id'];

	$chaser = fetchById($id, 'chasers');
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
	 <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />
</head>

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<!-- JS Scripts -->

	<script type='text/javascript'>
		$(document).ready(function() {		
       		$('.button-collapse').sideNav({
			      menuWidth: 300, // Default is 300
			      edge: 'left', // Choose the horizontal origin
			      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
			      draggable: true // Choose whether you can drag to open on touch screens
			    }
			 );
		});

	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->
	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink darken-1">
	      		 <ul id="nav-mobile">
	            <a href="user_search.php" data-activates='user_action' class="dropdown-button right"><i class="material-icons right">search</i>
            	</a>
            	</ul>
	        <a href="#" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Include Side Nav -->
	 <?php include('sidenav.php'); ?>
	 <!-- Include Side Nav -->	

	 <!-- Content Area -->
	  <div class="row"> 
        <div class="col s12 m12"> <!-- Container Div -->
          <div class='card grey lighten-5'>
          			<a class='dropdown-button right' href='#' data-activates='dropdownez'>
					  </br>
		          	  	<i class="material-icons">more_vert</i>
		          	  </a>
		          	  <ul id='dropdownez' class='dropdown-content'>
					    <li><a href="#!"><span class='pink-text darken-1'>Edit</span></a></li>
					    <li><a href="#!"><span class='pink-text darken-1'>Delete</span></a></li>
					    <li><a href="#!"><span class='pink-text darken-1'>Report</span></a></li>
					  </ul>
	          		<ul class='collection' style='border: none !important;'>
	          			<li class="collection-item avatar grey lighten-5">
	          				<img src="images/k.jpg" alt="" class="circle" style='width: 50px; height: 50px;'>
	          				<span class='Title'>
	          					<b>Glaichi Mae</b>
	          				</span>
	          				<p class='grey-text'>
	          					@glaichimae08
	          				</p>
	          			</li>
	          		</ul>
          		<div class="card-image">
          		<p style='padding-left: 10px;'>
          			When it's almost summer!When it's almost summer!When it's almost summer!
          			<br />
          			<span class='chip'>
				  		#Tropical
				  	</span>
				  	<span class='chip'>
				  		#Trop
				  	</span>
				  	<span class='chip'>
				  		#Tropical
				  	</span>

				  	</br> Flower Crown - Claires
 					 </br> Flowery Bra - Topshop
          		</p>
              <img src="images/hawaii.jpg" alt="" class="responsive-img">
              <table>
              <tr>	
	              <td class='center'>
	              		<a href="#!favorite">
	              			10 <br \>
			     			<i class="material-icons">favorite_border</i>
			     		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!comments">
	              			55<br \>
			      			<i class="material-icons">comment</i>
			      		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!repeat">
	              			20 <br \>
			     			<i class="material-icons">repeat</i>
			     		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!turned_in">
	              			123 <br \>
			      			<i class="material-icons">turned_in</i>
			      		</a>
	              </td>
              </tr>
              </table>
            </div>
          </div>
        </div> <!-- Container Div -->
      </div> 
	 <!-- Content Area -->
</body>
</html>
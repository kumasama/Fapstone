<?php
	session_start();
	//redirect to login page if user does not login yet.
	if(!isset($_SESSION['islogin']))
	{
		header('location: login.php');
		exit();
	} else {
		$id = $_SESSION['user_id'];
		//
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
			$('.button-collapse').sideNav({
		      menuWidth: 300, // Default is 300
		      edge: 'left', // Choose the horizontal origin
		      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		      draggable: true // Choose whether you can drag to open on touch screens
		    });
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->

	<!--Side Navigation Bar -->
	<?php include 'sidenav.php'; ?>
	<!--Side Navigation Bar -->

	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink lighten-3">
	        <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Content Area -->
	  <div class="row"> 
        <div class="col s12 m12"> <!-- Container Div -->
          <?php for($i=0;$i<25; $i++) { ?>
          <div class="card grey lighten-2">
          	<!-- <a class='dropdown-button right' href='#' data-activates='dropdown1'>
          	  	<i class="material-icons">arrow_drop_down</i>
          	  </a>
          	  <ul id='dropdown1' class='dropdown-content'>
			    <li><a href="#!">edit</a></li>
			    <li><a href="#!">delete</a></li>
			    <li class="divider"></li>
			    <li><a href="#!">report post</a></li>
			  </ul> -->
			  <a class='dropdown-button right' href='#' data-activates='<?php echo 'dropdown' . $i;?>'>
          	  	<i class="material-icons">arrow_drop_down</i>
          	  </a>
          	  <ul id='<?php echo 'dropdown' . $i;?>' class='dropdown-content'>
			    <li><a href="#!"><span class="blue-text text-darken-2">edit</span></a></li>
			    <li><a href="#!">delete</a></li>
			    <li class="divider"></li>
			    <li><a href="#!">report post</a></li>
			  </ul>
          	 <div class="card-content black-text">
              <span class="card-title">
              	 	<a href='#profile'><img class="circle responsive-img" src="images/pp.jpg" style='height: 50px; width: 50px;'></a>
              	 	<a href='#profile2'><h5>Taylor Swift</h5></a>
              </span>
              <p>
	              I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.
              </p>
            </div>
          	<div class="card-image">
              <img src="images/test.jpg" alt="" class="responsive-img">
              <table>
              <tr>
	              <td class='center'>
	              		<a href="#!like">
	              			123 <br \>
			      			<i class="material-icons">thumb_up</i>
			      		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!favorite">
	              			123 <br \>
			     			<i class="material-icons">favorite_border</i>
			     		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!comments">
	              			123 <br \>
			      			<i class="material-icons">comment</i>
			      		</a>
	              </td>
	              <td class='center'>
	              		<a href="#!repeat">
	              			123 <br \>
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
         <?php } ?>
        </div> <!-- Container Div -->
      </div> 
	 <!-- Content Area -->

</body>
</html>
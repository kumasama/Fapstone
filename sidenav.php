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

			$('.hidden').hide();
			
			 $('.button-collapse').sideNav({
			      menuWidth: 300, // Default is 300
			      edge: 'left', // Choose the horizontal origin
			      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
			      draggable: true // Choose whether you can drag to open on touch screens
			    }
			  );
			//modal 
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->

	<!-- Side Navigation Bar-->

	<ul id="slide-out" class="side-nav">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Dropdown1<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
            <li>
            <a class="collapsible-header">Dropdown2<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="right hide-on-med-and-down">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="#!">First</a></li>
        <li><a href="#!">Second</a></li>
        <li><a href="#!">Third</a></li>
        <li><a href="#!">Fourth</a></li>
      </ul>
    </ul>

    <!-- Side Navigation Bar-->

	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper">
	        <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	        <div class='hidden'>
	         <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>
	         </div>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Content Area -->
	  <div class="row">
        <div class="col s12 m12">
          <div class="card grey">
          	<div class="card-image">
              <img src="images/test.jpg" alt="" class="responsive-img">
            </div>
            <div class="card-content black-text">
              <span class="card-title">
              	 	<a href='#profile'><img class="circle responsive-img" src="images/pp.jpg" style='height: 50px; width: 50px;'></a>
              	 	<a href='#profile2'><h5>Taylor Swift</h5></a>
              </span>
                 	 	<?php for($i=0; $i<7; $i++) { ?>
              	 	 <span class="chip">
					    Topless
					  </span	>
					<?php } ?>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>

            <div class="card-action">
            	<a href="#"><i class="material-icons">add</i></a>
              	<a href="#"><i class="material-icons">add</i></a>
              	<a href="#"><i class="material-icons">add</i></a>
            </div>
          </div>
        </div>
      </div>
	 <!-- Content Area -->
</body>
</html>
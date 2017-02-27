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
			$(".hidden").hide();

			$('.chips-placeholder').material_chip({
			    placeholder: 'Enter a tag',
			    secondaryPlaceholder: '+Tag',
			 });

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
        		<li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
      		</ul>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Content Area -->
<div class ="card">
	<div class="card-content black-text">
		<div class = "col s12">
		<form action="#" id='new_post'>
			<img id="imgOutp" src="images/alt.png" style='width: 100%; height:200px; margin-top: 10px;'/>
			<input type="file" name="imgInp" id='imgInp' accept="image/*" class='hidden'>
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
		         <input id="name" type="text">
		          <label for="name">Name</label>
		        </div>
		        <div class="input-field col s12">
		          <input id="uname" type="text">
		          <label for="uname">Username</label>
		        </div>
		         <div class="input-field col s12">
		          <input id="bday" type="date">
		        </div>
			  <select class="browser-default">
			    <option value="" disabled selected>Choose your option</option>
			    <option value="Male">MALE</option>
			    <option value="Female">FEMALE</option>
			  </select>
		          <div class="input-field col s12">
		          <input id="location" type="text">
		          <label for="location">Location</label>
        	</div>
        	<div class="input-field col s12">
				<textarea id="diary" class="materialize-textarea"></textarea>
				<label for="diary">About Me</label>
			</div>
          <center><a class="waves-effect waves-light btn pink lighten-4"><i class="material-icons left">done_all</i>Submit</a></center>
		</form>
	</div>
</div>
 
  
	 <!-- Content Area -->
</body>
</html>
<?php
	require_once('backend/functions.php');
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

	<style>
	
	#imgOutp {
		position: relative;
	}
	#selectIMG {
		position: absolute; 
		/*right: 5px; 
		top: 5px;*/ 
		top: 212px;
		right: 35px;
	}

	</style>
</head>

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<!-- JS Scripts -->

	<script type='text/javascript'>
		$(document).ready(function() {
			$(".hidden").hide();

			$('#selectIMG').click(function(){
			        $('#imgInp').trigger('click');
			});

			$('#form_submit').click(function() {
				$('#new_post').submit();
			});

			$('select').material_select();

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
	 <div class = "row">
	 <div class="col s12 m12">
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
				<textarea id="textarea1" class="materialize-textarea"></textarea>
				<label for="textarea1">Diary</label>
			</div>
			<div class='col s12'>
		        <label>Category</label>
	        	<select id='ootd_type' name='type' class='browser-default'>
	        		<?php
	        			$types = fetchAll_sort('ootd_categories', 'name', 'ASC');
	        			foreach($types as $type) {
	        		?>
	        			<option><?php echo $type['name']; ?></option>
	        		<?php } ?>
	        	</select>
			</div>
			<div class='col s12'>
				  <label>Select Items</label>
				  <select class="browser-default icons" name='ez' multiple>
				    <optgroup label="Winter Closet!">
			        <option value="1">Ripped Jeans</option>
			        <option value="2">Semi-Nude Shirt</option>
			      </optgroup>
			      <optgroup label="Summer Closet!">
			        <option value="3">Option 1Option 1Option 1Option 1</option>
			        <option value="4">Option 1Option 1Option 1Option 1</option>
			      </optgroup>
				  </select>
			</div>
			 <center> <button class="btn waves-effect waves-light pink lighten-3" id='form_submit'>Submit
    					<i class="material-icons right">send</i> </center>
  			  </button> 
		</form>
	</div>
</div>
</div>
	</div>
</div>
 
  
	 <!-- Content Area -->
</body>
</html>
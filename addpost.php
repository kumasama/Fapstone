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
			    placeholder: '+Tag',
			    secondaryPlaceholder: 'Tags',
			 });

			$('#selectIMG').click(function(){
			        $('#imgInp').trigger('click');
			});

			$('#form_submit').click(function(event) {
				event.preventDefault();
				var data = $('#tags').material_chip('data');
				var tags = [];
				for(let i = 0; i<data.length; i++) {
					tags.push(data[i].tag);
				}
				//console.log(tags);
				addPost();
				
			});

			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#imgOutp').attr('src', e.target.result);
		            }
		           
		            reader.readAsDataURL(input.files[0]);
		            console.log(input.files[0]);
		        }
		    }

		    $('#imgInp').change(function() {
				readURL(this);
			});

		    function addPost() {
		    	var formData;
		    	let input_img = document.getElementById('imgInp').value;
		    	console.log(input_img);
		    }
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->


	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink lighten-2">
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
		<button class="btn waves-effect waves-light left" id='selectIMG'>
			Select
    		<i class="material-icons left">camera_alt</i>
  		</button>
		<button class="btn waves-effect waves-light right" id='form_submit'>
			Submit
			<i class="material-icons right">send</i>
		</button> 
		<form action="#" id='new_post' enctype="multipart/form-data">
		<img id="imgOutp" src="images/alt.png" style='width: 100%; height: 350px; margin-top: 10px;'/>
			<input type="file" name="imgInp" id='imgInp' accept="image/*" class='hidden' required/ >
			<div class="input-field col s12">
				<textarea id="textarea1" class="materialize-textarea"></textarea>
				<label for="textarea1">Description</label>
			</div>
			<div class="chips chips-placeholder" id='tags'></div>
		</form>
	</div>
</div>
 
  
	 <!-- Content Area -->
</body>
</html>
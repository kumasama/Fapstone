<?php
  session_start();

	if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

 require_once('backend/functions.php');

$id = $_SESSION['chaser_id'];

if(count($_POST)>0) {
	if(count($_FILES) > 0) {
		$f = $_FILES['imgInp'];
        $tmp_file = $f['tmp_name'];
       	if($f['size'] > 0 ) {
       		$path = $name = 'uploads/'.rand(). rand().rand().strtolower($f['name']);
	        move_uploaded_file($tmp_file, $path);
	        $post = array(
	        	'diary' => $_POST['diary'],
	        	'categories' => $_POST['categories'],
	        	'items' => $_POST['items'],
	        	'photo' => $path,
	        	'chaser_id' => $id
	        );

		    if(insert($post, 'posts')) {
		    	header('Location:index.php');
		    	exit();
			}
       	}
    }   
}

$have_closet_items = have_ClosetItems($id);
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
		top: 400px;
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
			$('#selectIMG').click(function(){
			        $('#imgInp').trigger('click');
			});

			$('#form_submit').click(function() {
				if($('#imgInp').val() != '') {
		            $(this).prop('disabled', true);
		            $('#new_post').submit();
		        }
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

		    var categories = [];
		    var items = [];

		    $('#select_categories').on('change', function() {
			  categories = $(this).val();
			  $('#categories').val(categories);
			})

			$('#select_items').on('change', function() {
			  items = $(this).val();
			  $('#items').val(items);
			})
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->


	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink darken-1">
	        <a href="#" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
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
		<form action="#" id='new_post' method='post' enctype="multipart/form-data">
			<img id="imgOutp" src="images/black.png" style='width: 100%; height:400px'; margin-top: 10px;'/>
			<input type="file" name="imgInp" id='imgInp' accept="image/*" style='display: none;'>
			</div>
    			<i id='selectIMG' class="material-icons center">camera_alt</i>
			<div class="input-field col s12">
				<textarea id="textarea1" name='diary' class="materialize-textarea"></textarea>
				<label for="textarea1">Diary</label>
			</div>

			<input type='hidden' id='items' name='items'>
			<input type='hidden' id='categories' name='categories'>
			
			<div class='col s12'>
		        <label>Category</label>
	        	<select id='select_categories' class='browser-default' multiple>
	        		<?php
	        			$types = fetchAll_sort('ootd_categories', 'name', 'ASC');
	        			foreach($types as $type) {
	        		?>
	        			<option><?php echo $type['name']; ?></option>
	        		<?php } ?>
	        	</select>
			</div>
			<?php 
				if($have_closet_items) {
			?>
					<div class='col s12'>
					  <label>Select Items</label>
					  <select class="browser-default" id='select_items' multiple>
					  <?php 
					  		$closets = fetchClosets($id);
					  		foreach($closets as $closet) {
					  			$closet_items = fetchClosetItems($closet['id']);
					  			if(count($closet_items) > 0 ) {
					  				echo '<optgroup label="' . $closet['name'] .'">';
						  			foreach($closet_items as $closet_item) {
						  				$item = fetchById($closet_item['item_id'], 'items');
						  				echo '<option value="' . $item['id'] . '"><b>' . $item['name'] . '</b></option>';
						  			}
						  			echo '<optgroup>';
					  			}
					  		}
					  ?>
					  </select>
					</div>
			<?php } else { ?>
			<div class='col s12'>
				  <label>Select Items</label>
				  <select class="browser-default">
			        <option disabled>You don't have closet items!</option>
				  </select>
			</div>
			<?php } ?>
			 <center>
		</form>
		 <button class="btn waves-effect waves-light pink lighten-3" id='form_submit'>Submit
    		<i class="material-icons right">send</i> </center>
  		</button> 
	</div>
</div>
</div>
	</div>
</div>
 
  
	 <!-- Content Area -->
</body>
</html>
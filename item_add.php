<?php
  session_start();

	if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  if(count($_POST)>0) {
      if(count($_FILES) > 0)
      {
        $f = $_FILES['imgInp'];
        $tmp_file = $f['tmp_name'];
        $path = $name = 'uploads/'.rand(). rand().rand().strtolower($f['name']);
        move_uploaded_file($tmp_file, $path);
        $item = array(
            'name' => $_POST['item_name'],
            'type' => $_POST['type'],
            'brand' => $_POST['brand'],
            'size' => $_POST['item_size'],
            'photo' => $path,
            'chaser_id' => $id
        );
        
        if(insert($item, 'items')) {
            header('Location:items.php');
            exit();
        }
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

      $("input").attr("autocomplete","off");
      
      $('.chips-placeholder').material_chip({
          placeholder: 'Enter a tag',
          secondaryPlaceholder: '+Tag',
       });

      $('#selectIMG').click(function(){
          $('#imgInp').trigger('click');
      });

      $('#form_submit').click(function() {
        if($('#imgInp').val() != '' && $('#item_name').val() != '') {
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
    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->


  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <ul id="nav-mobile">
            <a href="../final" class="brand-logo center"><img src="images/items.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
            <li><a href="items.php"><i class="material-icons">arrow_back</i></a></li>
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
    <form id='new_post' method="post" enctype="multipart/form-data">
      <img id="imgOutp" src="images/black.png" style='width: 100%; height:200px; margin-top: 10px;'/>
      <input type="file" name="imgInp" id='imgInp' accept="image/*" style='display: none;'>
      </div>
        <i id='selectIMG' class="material-icons center">camera_alt</i>
		    <div class="row">
			    <div class="col s12">
			      	<div class="row">
				        <div class="input-field col s12">
				         <input id="item_name" name='item_name' type="text" value=''>
				          <label for="item_name">Item Name</label>
				        </div>
				        <div class='col s12'>
					        <label>Brand</label>
				        	<select id='item_brand' name='brand' class='browser-default'>
				        		<?php
				        			$brands = fetchAll('item_brands');
				        			foreach($brands as $brand) {
				        		?>
				        			<option><?php echo $brand['name']; ?></option>
				        		<?php } ?>
				        	</select>
				        </div>
				        <div class='col s12'>
					        <label>Type</label>
				        	<select id='item_type' name='type' class='browser-default'>
				        		<?php
				        			$types = fetchAll_sort('item_categories', 'name', 'ASC');
				        			foreach($types as $type) {
				        		?>
				        			<option><?php echo $type['name']; ?></option>
				        		<?php } ?>
				        	</select>
				        </div>
						<div class="input-field col s12">
					          <input id="item_size" name='item_size' type="text" value=' '>
					          <label for="item_size">Item Size</label>
					    </div>
				    </div>
				</div>
			</div>

          </button> 
    </form>
           <center> <button class="btn waves-effect waves-light pink lighten-3" id='form_submit'>Add </center>
  </div>
</div>
</div>
  </div>
</div>
 
  
   <!-- Content Area -->
</body>
</html>
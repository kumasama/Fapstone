<?php
  session_start();

	if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

  require_once('backend/functions.php');

  if(isset($_GET['item_id'])) {
      $item = fetchById($_GET['item_id'], 'items');
  } else {
      header('location: items.php');
  }

  $id = $_SESSION['chaser_id'];

  if(isset($_GET['closet_id'])) {
      $prev_url = 'closet_items.php?closet_id=' . $_GET['closet_id'];
  } else {
      $prev_url = 'items.php';
  }

  if(count($_POST)>0) {
        $new_item_info = array(
            'name' => $_POST['item_name'],
            'type' => $_POST['type'],
            'brand' => $_POST['brand'],
            'size' => $_POST['item_size'],
            'quantity' => $_POST['item_qty']
        );

        if(update($new_item_info, 'items', $item['id'])) {
            header('location: ' . $prev_url);
            exit();
        }
  }

  function selected($item1, $item2) {
      if(trim($item1) == trim($item2)) {
          echo 'selected';
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

      $('#form_submit').click(function() {
        $('#new_post').submit();
      });

      $('select').material_select();
    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->


  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <ul id="nav-mobile">
            <a href="<?php echo $prev_url; ?>" class="brand-logo center"><img src="images/items.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
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
      <img id="imgOutp" src="<?php echo $item['photo']; ?>" style='width: 100%; height:200px; margin-top: 10px;'/>
      </div>
		    <div class="row">
			    <div class="col s12">
			      	<div class="row">
				        <div class="input-field col s12">
				         <input id="item_name" name='item_name' type="text" value='<?php echo $item['name']; ?>'>
				          <label for="item_name">Item Name</label>
				        </div>
				        <div class='col s12'>
					        <label>Brand</label>
				        	<select id='item_brand' name='brand' class='browser-default'>
				        		<?php
				        			$brands = fetchAll('item_brands');
				        			foreach($brands as $brand) {
				        		?>
				        			<option <?php selected($brand['name'], $item['brand']); ?>><?php echo $brand['name']; ?></option>
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
				        			<option <?php selected($type['name'], $item['type']); ?>>
                        <?php echo $type['name']; ?>       
                      </option>
				        		<?php } ?>
				        	</select>
				        </div>
						  <div class="input-field col s12">
					          <input id="item_size" name='item_size' type="text" value='<?php echo $item['size']; ?>'>
					          <label for="item_size">Item Size</label>
					    </div>
              <div class="input-field col s12">
                    <input id="item_qty" name='item_qty' type="number" value='<?php echo $item['quantity']; ?>' min='1'>
                    <label for="item_qty">Quantity</label>
              </div>
				    </div>
				</div>
			</div>

          </button> 
    </form>
           <center> <button class="btn waves-effect waves-light red darken-2" id='form_submit'>Save </center>
  </div>
</div>
</div>
  </div>
</div>
 
  
   <!-- Content Area -->
</body>
</html>
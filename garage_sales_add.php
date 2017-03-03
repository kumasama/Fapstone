<?php
  session_start();

	if(!isset($_SESSION['islogin'])) {
	    header('Location: login.php');
	    exit();
  	}

 require_once('backend/functions.php');

$id = $_SESSION['chaser_id'];

if(count($_POST) > 0 ){
	$data = $_POST;
	$data['chaser_id'] = $id;
	if($data['items'] != '') {
		if(insert($data, 'garage_sales')) {
			header('location: garage_sales.php');
			exit();
		}
	} else {
		header('location: garage_sales.add.php');
		exit();
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
</head>

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<!-- JS Scripts -->

	<script type='text/javascript'>
		$(document).ready(function() {
			$('#form_submit').click(function() {
				$('#new_post').submit();
			});

			$('select').material_select();

            $('.datepicker').pickadate({
	          selectMonths: true, // Creates a dropdown to control month
	          selectYears: 30,// Creates a dropdown of 15 years to control year
	          min: new Date(2017,3,1),
	          max: new Date(2018,1,31)
	        });

	        function dateStringify(dateString) {
	            let d = new Date(dateString);
	            let b_month = d.getMonth() + 1;
	            let b_year = d.getFullYear();
	            let b_day = d.getDate();

	            return b_year + '-' + b_month + '-' + b_day;
	        }

			 $('#select_start_date').on('change', function() {
	            $('#start_date').val(dateStringify($(this).val()));
	         });

	         $('#select_end_date').on('change', function() {
	            $('#end_date').val(dateStringify($(this).val()));
	         });

	        var items = [];
			$('#select_items').on('change', function() {
				  items = $(this).val();
				  $('#items').val(items);
			});
		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->


	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink darken-1">
	        <a href="#" class="brand-logo center"><img src="images/garage.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	        <ul id="nav-mobile">
        		<li><a href="garage_sales.php"><i class="material-icons">arrow_back</i></a></li>
      		</ul>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Content Area -->
<div class ="card">
<div class = "card-title">
	<div class="card-content black-text">
		<div class="input-field col s12">
		     <div class="row">
		    <form class="col s12" method='post' id='new_post'>
		      <input type='hidden' id='start_date' name='start_date' />
		      <input type='hidden' id='end_date' name='end_date' />
		      <input type='hidden' id='items' name='items'>
		      <div class="row">
		        <div class="input-field col s12">
		         <input id="name" name='name' type="text" class="validate">
		          <label for="name">Garage Sale Name</label>
 		        </div>
		         <div class="input-field col s12">
                    <input type="date" id='select_start_date' class="datepicker">
                    <label>Date Start</label>
                   </div>
				    <div class="input-field col s12">
                    <input type="date" id='select_end_date' class="datepicker">
                    <label>Date End</label>
                   </div>
			     <div class="input-field col s12">
		          <input name='start_time' type="text" class="validate">
		          <label for="timestart">Time Start</label>
        	    </div>
		        <div class="input-field col s12">
				   <input name='end_time' id="timeend" type="text" class="validate">
				   <label for="timeend">Time End</label>
		        </div>
		        <?php 
				if($have_closet_items) {
			?>
					<div class='col s12'>
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
				  <select class="browser-default">
			        <option disabled>You don't have closet items!</option>
				  </select>
			</div>
			<?php } ?>
        	     <div class="input-field col s12">
				   <input name='place' id="place" type="text" class="validate">
				   <label for="place">Place</label>
		        </div>
		</form>
		 <center>
		 	<a id='form_submit' href='#' class="waves-effect waves-light btn pink lighten-4">
		 		Submit
		 	</a>
		 </center>
	</div>
</div>
<!-- Content Area -->
</body>
</html>
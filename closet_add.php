<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  if(count($_POST)>0) {
  		$closet_info = array(
  			'name' => $_POST['closet_name'],
  			'description' => $_POST['closet_descr'],
  			'chaser_id' => $id
  		);
  		if(insert($closet_info, 'closets')) {
  			header('Location:closets.php');
        exit();
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

      $("input").attr("autocomplete","off");}
        
      $('#form_submit').click(function() {
      	let n = $('#closet_name').val();
      	let m = $('#closet_descr').val();
      	if(n!='' && m!='') {
          $(this).prop('disabled', true);
        	$('#new_post').submit();
        }
      });

      $('#new_post').submit(function(e) {
        let n = $('#closet_name').val();
        let m = $('#closet_descr').val();
        if(n!='' && m!='') {
          $(this).submit();
        } else {
          e.preventDefualt();
        }
      });

    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->

  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <a href="closets.php" class="brand-logo center"><img src="images/closet.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
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
<form method='post' id='new_post'>
<img id="imgOutp" src="images/black.png" style='width: 100%; height:200px; margin-top: 10px;'/>
</div>
<!-- <button class="btn waves-effect waves-light right pink lighten-3" id='selectIMG'> -->
<!-- </button> -->
<div class="input-field col s12">
<input id="closet_name" name='closet_name' type="text">
<label for="closet_name">Closet Name</label>
</div>
<div class="input-field col s12">
<textarea id="closet_descr" name='closet_descr' class="materialize-textarea"></textarea>
<label for="closet_descr">Closet Description</label>
</div>
</form>
<center> <button class="btn waves-effect waves-light pink lighten-3" id='form_submit'>Add </button></center>
</div>
</div>
</div>
</div>
</div>
 
  
   <!-- Content Area -->
</body>
</html>
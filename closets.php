<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
      header('Location: index.php');
      exit();
  }

  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];
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
      $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left', // Displays dropdown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
      });
    });
  </script>

  <!-- JS Scripts -->
  <style>
  .card-image{
    width: 160px;
  }
  </style>

  <!-- Start Code here -->


  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <a href="#" class="brand-logo center"><img src="images/closet.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
          </ul>
        </div>
      </nav>
  </div>
   <!-- Navigation Bar -->
<div class="row">
    <?php
      $closets = fetchClosets($id);
      if(count($closets)>0) {
    ?>  
          <?php foreach($closets as $closet) { ?>
          <div class="col s12">
            <div class="card">  
              <a class='dropdown-button right' href='#' data-activates='dropdown<?php echo $closet['id']; ?>'><br />
              <i class="material-icons">more_vert</i>
              </a>
              <ul id='dropdown<?php echo $closet['id']; ?>' class='dropdown-content'>
              <li><a href="closet_edit.php?closet_id=<?php echo $closet['id']; ?>"><span class='pink-text darken-1'>Edit</span></a></li>
              <li><a href="closet_delete.php?closet_id=<?php echo $closet['id']; ?>"><span class='pink-text darken-1'>Delete</span></a></li>
              </ul>    
              <div class='card-content'>
              <a href='closet_items.php?closet_id=<?php echo $closet['id']; ?>'>
              <span class="card-title black-text"><b><?php echo $closet['name']; ?></b></span>
              </a>
              <p class='flow-text black-text'>
              <?php echo $closet['description']; ?>
              </p>
              </div>
            </div>
          </div>
          <?php } ?>
    <?php } ?>
    <!-- <div class="col s12">
      <div class="card">
        <a class='dropdown-button right' href='#' data-activates='dropdownez'><br />
        <i class="material-icons">more_vert</i>
        </a>
        <ul id='dropdownez' class='dropdown-content'>
        <li><a href="#!"><span class='pink-text darken-1'>Edit</span></a></li>
        <li><a href="#!"><span class='pink-text darken-1'>Delete</span></a></li>
        </ul>    
        <div class='card-content'>
        <a href='#easy_click'>
        <span class="card-title black-text"><b>Glaiza Easy Closet MEhehehe GG uips</b></span>
        </a>
        <p class='flow-text black-text'>
        I am a very simple card. I am good at containing small bits of information.
        I am convenient because I require little markup to use effectively.
        </p>
        </div>
      </div>
    </div> -->
</div>
<div class="fixed-action-btn">
<a href='closet_add.php'class="btn-floating btn-large red">
<i class="large material-icons">add</i>
</a>
</div>
</body>
</html>
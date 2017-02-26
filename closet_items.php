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
</head>
<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

  <!-- JS Scripts -->

  <script type='text/javascript'>
    $(document).ready(function() {
      $('.collapsible').collapsible();
      $('.carousel').carousel();
    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->

  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper red lighten-1">
          <!-- <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a> -->
          <a href="#" class="brand-logo center">Closet</a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
              <a href="closet_items_add.php" id='add_item'><i class="material-icons right">add</i></a>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->
   <!-- <div class="row">
        <div class="col s6">
          <div class="card">
            <div class="card-content black-text">
              <center>
                <img src="images/k.jpg" alt="" class="square" style='width: 80px; height: 80px;'>
              <p>
                <b>Semi Nude JeansEZEZEsafasfsafasfsafsa</b> <br />
                Brand <br />
                Type <br />
                Size <br />
              </p>
             </center>
            </div>
          </div>
        </div>
    </div> -->
    <div class='row'>
      <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
    <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
  </div>
    </div>
</body>
</html>
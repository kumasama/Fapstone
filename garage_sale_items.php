<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }
  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  if(!isset($_GET['garage_id'])) {
      header('Location:garage_sales.php');
      exit();
  } else {
      $garage_id = $_GET['garage_id'];
      $garage = fetchById($garage_id, 'garage_sales');
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
</head>
<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

  <!-- JS Scripts -->

  <script type='text/javascript'>
    $(document).ready(function() {
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .6, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 200, // Transition out duration
            startingTop: '4%', // Starting top style attribute
            endingTop: '10%', // Ending top style attribute
        });
    });

    function openModal(path) {
        $('#modalImg').prop('src', path);
        $('#modal1').modal('open');
    }


  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->

  <!-- Navigation Bar -->
   <div class="navbar-fixed"'>
      <nav class='nav'>
        <div class="nav-wrapper red lighten-1">
          <ul id="nav-mobile">
            <a href="#" class="brand-logo center"><img src="images/garage.png" alt="OOTDme" height="65" style="margin-top:-5px;">
            <li>
              <a href="garage_sales.php">
                <i class="material-icons">arrow_back</i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Main Content -->
   <div class="row" id='main-content'>      
      <blockquote>
        <b><?php echo $garage['name']; ?></b>
        <?php
          $start = '<br />' . date('F j' , strtotime($garage['start_date'])); 
          $end = date('F j' , strtotime($garage['end_date'])); 
          echo $start . ' - ' . $end . '<br />';
          echo $garage['start_time'] . ' - ' . $garage['end_time'] . '<br />';
          echo $garage['place'];
        ?>
      </blockquote>
   <?php 

        $items = explode(',', $garage['items']);
        if(count($items)>0) {
   ?>
   <ul class="collection">
    <?php 
 
          foreach($items as $item_id) {
              $item = fetchById($item_id, 'items');
    ?>
        <li class="collection-item avatar">
          <img src="<?php echo $item['photo']; ?>" alt="" class="circle">
          <span class="title"><?php echo $item['name']; ?></span>
          <p><?php echo $item['brand']; ?><br>
             <?php echo $item['type']; ?> <br>
             <?php echo (trim($item['size']))!=''?$item['size']:'&nbsp;';?>
          </p>
          <div class='secondary-content' style='margin-top: 53px;'>
              <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='red-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>
          </div>
        </li>
        <?php } ?>
  </ul>
  <br /><br /><br />
  <?php } ?>
    </div>
  <!-- Main Content -->
   <!-- Modal Structure -->
    <!-- Modal Trigger -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal transparent">
    <div class="modal-content">
      <img id='modalImg' src='images/c1.jpg' class="responsive-img">
    </div>
  </div>   
</body>
</html>
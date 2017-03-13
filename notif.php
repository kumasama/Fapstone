<?php 
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }
  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  function joinURL($chaser_id, $garage_id) {
      echo 'backend/join_garage.php?chaser_id=' . $chaser_id . '&garage_id=' . $garage_id;
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
    
    });
  </script>
  <!-- JS Scripts -->

  <!-- Start Code here -->


  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <span class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></span>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->

 <!-- Content Area -->
<body>
<h5> Invitations</h5>
<?php 
    $invites = get_invitations($id);
    if(count($invites) > 0 ) {
?>
<ul class="collection">
  <?php foreach($invites as $invite) { 
          $garage = fetchById($invite['garage_id'], 'garage_sales');
          $ch = fetchById($garage['chaser_id'], 'chasers');
  ?>
         <li class="collection-item avatar">
          <img src="<?php echo $ch['photo']; ?>" alt="" class="circle">
          <span class="title"> 
            <p> 
              <b><?php echo $ch['first_name'] . ' ' . $ch['last_name']; ?></b>
                  <span class='flow-text'>
                  invited you to join on her pre-loved items sale. 
                  </span>
            </p>
          </span>
          <?php if(!joined($id, $invite['garage_id'])) {?> 
          <div class='secondary-content' style='margin-top: 44px;'>
            <a href='<?php joinURL($id, $garage['id']); ?>'><b>Join</b></a>
          </div>
           <?php } ?>
        </li> 
  <?php } ?>
</ul>
<?php } ?>
<!-- <ul class="collection">
<h5> Notifications   </h5>
<li class="collection-item avatar">
<img src="images/hawaii.jpg" alt="" class="circle">
<span class="title"> <p> <b>iamglaizamae</b> liked your OOTD. </p></span>    
</li>
<li class="collection-item avatar">
<img src="images/09.jpg" alt="" class="circle">
<span class="title"><p> <b>letsdoit</b> opened a new garage sale. </p></span>


</li>

<li class="collection-item avatar">
<img src="images/o7.jpg" alt="" class="circle">
<span class="title"><p> <b>pattz</b> voted for your OOTD. </p></span>

</li>
</li>
<li class="collection-item avatar">
<img src="images/c3.jpg" alt="" class="circle">
<span class="title"><p> <b>styleislife</b> posted a new OOTD. </p></span>


</li>
</li>
<li class="collection-item avatar">
<img src="images/o.jpg" alt="" class="circle">
<span class="title"><p> <b>ootdph</b> followed you. </p></span>
</li>
</ul> -->
</body>
</html>
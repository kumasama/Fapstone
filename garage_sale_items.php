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

        $('#btn_add').on('click', function() {
            $('#modal_items').modal('open');
        });

        $('#btn_add_items').on('click', function() {
            $('#form_add_items').submit();
        });

        $('#btn_send_invitation').on('click', function() {
          $('#form_invite').submit();
        });

        $('#group_btn').on('click', function() {
          $('#garage_chasers').modal('open');
        });

        var c_len = 0;
        $("input[type='checkbox']").change(function() {
            c_len = $('input[type="checkbox"][name="chasers[]"]:checked').length;
            if(c_len > 0 ) {
                $('#btn_send_invitation').attr('class', 'modal-action modal-close waves-effect waves-green btn-flat')
            } else {
                $('#btn_send_invitation').attr('class', 'modal-action modal-close waves-effect waves-green btn-flat disabled')
            }
        });

        var len = 0;
        $("input[type='checkbox']").change(function() {
            len = $('input[type="checkbox"][name="items[]"]:checked').length;
            if(len > 0 ) {
                $('#btn_add_items').attr('class', 'modal-action modal-close waves-effect waves-green btn-flat')
            } else {
                $('#btn_add_items').attr('class', 'modal-action modal-close waves-effect waves-green btn-flat disabled')
            }
        });

        $('#invite_btn').on('click', function() {
            $('#modal_chasers').modal('open');
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
        <div class="nav-wrapper pink darken-1">
          <ul id="nav-mobile">
            <span class="brand-logo center"><img src="images/garage.png" alt="OOTDme" height="65" style="margin-top:-5px;"></span>
            <li>
              <a href="garage_sales.php">
                <i class="material-icons">arrow_back</i>
              </a>
            </li>
            <?php if($garage['chaser_id'] == $id) { ?>
            <a href="#" id='invite_btn'>
                <i class="material-icons right">group_add</i>
            </a>
            <?php } ?>
            <a href="#" id='group_btn'>
                <i class="material-icons right">group</i>
            </a>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Main Content -->
   <div class="row" id='main-content'>      
      <blockquote>
        <?php
          $start = date('F j' , strtotime($garage['start_date'])); 
          $end = date('F j' , strtotime($garage['end_date'])); 
          echo '<b>' . $start . ' - ' . $end . '</b><br />';
          echo $garage['start_time'] . ' - ' . $garage['end_time'] . '<br />';
          echo $garage['place'];
        ?>
      </blockquote>
       <?php 
        $garage_items = fetchGarageItems($garage_id);
        if(count($garage_items)>0) {
   ?>
   <ul class="collection">
    <?php 
 
          foreach($garage_items as $garage_item) {
              $item = fetchById($garage_item['item_id'], 'items');
    ?>
        <li class="collection-item avatar">
          <img src="<?php echo $item['photo']; ?>" alt="" class="circle">
          <span class="title"><?php echo $item['name']; ?></span>
          <p><?php echo $item['brand']; ?><br>
             <?php echo $item['type']; ?> <br>
             <?php echo (trim($item['size']))!=''?$item['size']:'&nbsp;';?> <br>
             Quantity: <?php echo $item['quantity']; ?>
          </p>
          <div class='secondary-content' style='margin-top: 53px;'>
              <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='red-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>
          <?php if($item['chaser_id'] == $id) { ?>
              &nbsp; &nbsp; &nbsp;
              <a href="backend/delete_garage_item.php?garage_id=<?php echo $garage_id; ?>&garage_item_id=<?php echo $garage_item['id']; ?>">
                <span class='red-text text-darken-2'>
                  <i class="material-icons">remove_circle</i>
                </span>
              </a> 
          <?php } ?>
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
<?php
      if(have_ClosetItems_garage($id)) {
        $closets = fetchClosets($id);
  ?>
  <div id='modal_items' class='modal'>
    <div class="modal-content">
    <form id='form_add_items' method='post' action='backend/add_garage_item.php?garage_id=<?php echo $garage_id; ?>'>
  <?php 
      foreach($closets as $closet) { 
        $closet_items = fetchClosetItems_garage($closet['id']);
        if(count($closet_items) > 0 ) {
          echo '<b><i>' . $closet['name'] . '</i></b>';
          foreach($closet_items as $closet_item) {
            $item = fetchById($closet_item['item_id'], 'items'); ?>  
              <p>
              <input class="filled-in" type="checkbox" value='<?php echo $item['id']; ?>' name='items[]' id="item<?php echo $item['id']; ?>" />
              <label for="item<?php echo $item['id']; ?>"><?php echo $item['name']; ?></label>
            </p>
          <?php } ?>
      <?php } ?>
  <?php } ?>
  </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a id='btn_add_items' href="#!" class="modal-action modal-close waves-effect waves-green btn-flat disabled">ADD</a>
    </div>
  </div>
<?php } ?>
<?php if($id == $garage['chaser_id'] || joined($id, $garage_id)) { ?>
  <div class="fixed-action-btn">
  <a id='btn_add' href='#' class="btn-floating btn-large red darken-2">
    <i class="large material-icons">add</i>
  </a>  
  </div>
<?php } ?> 
<?php
  $select_invites = can_invites($id, $garage_id);
  if(count($select_invites)>0) {
?>
<div class='modal' id='modal_chasers'>
  <div class='modal-content'>
  <h5>Invite people to your pre-loved items sale</h5>
  <form id='form_invite' method='post' action='backend/send_invites.php?garage_id=<?php echo $garage_id; ?>'>
<?php
  foreach($select_invites as $chaser) {
?>
  <p>
    <input class="filled-in" type="checkbox" value='<?php echo $chaser['id']; ?>' name='chasers[]' id="chaser<?php echo $chaser['id']; ?>" />
    <label for="chaser<?php echo $chaser['id']; ?>"><b><?php echo $chaser['first_name'] . ' ' . $chaser['last_name']; ?></b></label>
    </p>
<?php } ?>
<form>
  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a id='btn_send_invitation' href="#!" class="modal-action modal-close waves-effect waves-green btn-flat disabled">Send</a>
    </div>
</div>
<?php } ?>
<div class='modal' id='garage_chasers'>
  <div class='modal-content'>
    <h5><i>Chasers</i></h5>
    <ul class='collection'>
        <?php
          $ch = fetchById($garage['chaser_id'], 'chasers'); 
        ?>
        <li class="collection-item avatar">
          <img src="<?php echo $ch['photo']; ?>" alt="" class="circle">
          <span class="title"><b><?php echo $ch['first_name'] . ' ' .$ch['last_name']; ?></b></span>
        </li>
        <?php 
            $garage_chasers = fetchGarageChasers($garage_id);
            foreach($garage_chasers as $garage_chaser) {
              $chaser = fetchById($garage_chaser['chaser_id'], 'chasers');
        ?>
        <li class="collection-item avatar">
          <img src="<?php echo $chaser['photo']; ?>" alt="" class="circle">
          <span class="title"><b><?php echo $chaser['first_name'] . ' ' .$chaser['last_name']; ?></b></span>
        </li>
        <?php } ?>
    </ul>
  </div>
  <div class='modal-footer'>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
</body>
</html>
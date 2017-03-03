<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }
  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];
  
  $search = (isset($_GET['search']))?$_GET['search']:'';

  if(!isset($_GET['closet_id'])) {
      header('Location:closets.php');
      exit();
  } else {
      $closet_id = $_GET['closet_id'];
      $closet = fetchById($closet_id, 'closets');
      $can_transfer = can_transfer($closet_id, $id);
  }

  function hide() {
      $str = "style='display: none'";
      echo $str;
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

        $('#clear_search').on('click', function() {
            $('#search-content').html('');
            $('#searchcontent').hide();
            $('#main-content').show();
            $('#search').val('');
        });

        var len = 0;
        $("input[type='checkbox']").change(function() {
            len = $('input[type="checkbox"]:checked').length;
            if(len > 0 ) {
                $('#btn_transfer').show();
            } else {
                $('#btn_transfer').hide();
            }
        }); 

        $('#btn_transfer').on('click', function() {
            setTimeout(function() {
              $('#form_transfer').submit();
            }, 500);
        });
    });

    function openModal(path) {
        $('#modalImg').prop('src', path);
        $('#modal1').modal('open');
    }

    function transfer_modal() {
      $('#modal_transfer').modal('open');
    }

  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->

  <!-- Navigation Bar -->
   <div class="navbar-fixed"'>
      <nav class='nav'>
        <div class="nav-wrapper pink darken-1">
          <ul id="nav-mobile">
            <span href="#" class="brand-logo center"><img src="images/closet.png" alt="OOTDme" height="65" style="margin-top:-5px;">
            </span>
            <li>
              <a href="closets.php">
                <i class="material-icons">arrow_back</i>
              </a>
            </li>
              <a href="#" id='clear_search'><i class="material-icons right">clear</i></a>
          </ul>
        </div>
      </nav>
   </div>
    <div id='search_bar' class="navbar-fixed" >
      <nav>
        <div class="nav-wrapper pink darken-1">
          <form>
            <div class="input-field">
              <input name='closet_id' type='hidden' value='<?php echo $closet_id; ?>'/>
              <input id="search" placeholder='Search Item' name='search' value='<?php echo $search; ?>' type="search">
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
          </form>
        </div>
      </nav>
    </div>
   <!-- Navigation Bar -->
   <div class='row' id='search-content' <?php if($search == '') hide();?> >
      <blockquote>
        <b><?php echo $closet['name']; ?></b>
      </blockquote>
      <?php 
          if($search!='') {
      ?>
      <ul class='collection'>
        <?php 
          $closet_items = fetchClosetItems_search($closet_id, $search);
          if(count($closet_items)>0) {
            foreach($closet_items as $closet_item) {
              $item = fetchById($closet_item['item_id'], 'items');
        ?>
            <li class="collection-item avatar">
              <img src="<?php echo $item['photo']; ?>" alt="" class="circle">
              <span class="title"><?php echo $item['name']; ?></span>
              <p><?php echo $item['brand']; ?><br>
                 <?php echo $item['type']; ?> <br>
                 <?php echo (trim($item['size']))!=''?$item['size']:'&nbsp;';?>
              </p>
              <div class='secondary-content' style='margin-top: 53px;'>
                  <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='red-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>&nbsp; &nbsp; &nbsp;
                  <a href="delete_closet_item.php?closet_id=<?php echo $closet_id; ?>&closet_item_id=<?php echo $closet_item['id']; ?>">
                <span class='red-text text-darken-2'>
                  <i class="material-icons">remove_circle</i>
                </span>
              </a> 
              </div>
            </li>
            <?php } ?>
        <?php } ?>
      </ul>
      <?php } ?>
   </div>
   <!-- Main Content -->
   <div class="row" id='main-content' <?php if($search != '') hide();?> >      
      <blockquote>
        <b><?php echo $closet['name']; ?></b>
        <?php 
          if($can_transfer) {
        ?>
         <a onclick='transfer_modal()' class='right' href='#' style='padding-right: 15px;'>
          <span class='pink-text darken-1'><i class="material-icons">move_to_inbox</i></span>  
         </a>
         <?php } ?>
      </blockquote>
   <?php 
        $closet_items = fetchClosetItems($closet_id);
        if(count($closet_items)>0) {
   ?>
   <ul class="collection">
    <?php 
 
          foreach($closet_items as $closet_item) {
              $item = fetchById($closet_item['item_id'], 'items');
    ?>
        <li class="collection-item avatar">
          <img src="<?php echo $item['photo']; ?>" alt="" class="circle">
          <span class="title"><?php echo $item['name']; ?></span>
          <p><?php echo $item['brand']; ?><br>
             <?php echo $item['type']; ?> <br>
             <?php echo (trim($item['size']))!=''?$item['size']:'&nbsp;';?>
          </p>
          <div class='secondary-content' style='margin-top: 53px;'>
              <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='red-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>&nbsp; &nbsp; &nbsp;
              <a href="delete_closet_item.php?closet_id=<?php echo $closet_id; ?>&closet_item_id=<?php echo $closet_item['id']; ?>">
                <span class='red-text text-darken-2'>
                  <i class="material-icons">remove_circle</i>
                </span>
              </a> 
          </div>
        </li>
        <?php } ?>
  </ul>
  <br /><br /><br />
  <?php } ?>
  <!-- Main Content -->
   <!-- Modal Structure -->
    <!-- Modal Trigger -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal transparent">
    <div class="modal-content">
      <img id='modalImg' src='images/c1.jpg' class="responsive-img">
    </div>
  </div> 
  <div id="modal_transfer" class="modal modal-fixed-footer">
    <form id='form_transfer' action='backend/item_transfer.php' method='post'>
    <input type='hidden' name='from_closet_id' value='<?php echo $closet_id; ?>' />
    <div class="modal-content">
<?php
if($can_transfer) {
?>
      <p>
        <label>Transfer items to closet</label>
        <select class='browser-default' name='to_closet_id'>
<?php
    $closets = transferable_closets($closet_id, $id);
    foreach($closets as $closet) {
        echo '<option value='. $closet['id'] .'>';
        echo $closet['name'];
        echo '<option>';
    }
?>
        </select>
      </p>
      <?php 
        foreach($closet_items as $closet_item) {
          $item = fetchById($closet_item['item_id'], 'items');
      ?>
      <p>
        <input class="filled-in" type="checkbox" value='<?php echo $item['id']; ?>' name='items[]' id="item<?php echo $item['id']; ?>" />
        <label for="item<?php echo $item['id']; ?>"><?php echo $item['name']; ?></label>
      </p>
  <?php } ?>
<?php } ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a id='btn_transfer' style='display: none;' href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Transfer</a>
    </div>
    </form>
  </div>  
    <div class="fixed-action-btn">
    <a href='closet_items_add.php?closet_id=<?php echo $closet_id; ?>'class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
  </div>
</body>
</html>

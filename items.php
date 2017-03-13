<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }
  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];
  
  $search = (isset($_GET['search']))?$_GET['search']:'';

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
          <a href="#" class="brand-logo center">Items</a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
              <a href="#" id='clear_search'><i class="material-icons right">clear</i></a>
          </ul>
        </div>
      </nav>
   </div>
    <div id='search_bar' class="navbar-fixed" >
      <nav>
        <div class="nav-wrapper pink darken-2">
          <form>
            <div class="input-field">
              <input id="search" placeholder='Search Item' name='search' value='<?php echo $search; ?>' type="search">
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
          </form>
        </div>
      </nav>
    </div>
   <!-- Navigation Bar -->
   <div class='row' id='search-content' <?php if($search == '') hide();?> >
      <ul class='collection'>
        <?php 
        if($search!='') {
          $items = fetchItems_search($id, $search);
          if(count($items)>0) {
            foreach($items as $item) {
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
                  <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='pink-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>&nbsp; &nbsp; &nbsp;
                  <a href="item_edit.php?item_id=<?php echo $item['id']; ?>"><span class='pink-text text-darken-2'><i class="material-icons">mode_edit</i></span></a> &nbsp; &nbsp; &nbsp;
                  <a href="delete_item.php?item_id=<?php echo $item['id']; ?>"><span class='pink-text text-darken-2'><i class="material-icons">delete_forever</i></span></a> 
              </div>
            </li>
            <?php } ?>
        <?php } ?>
        <?php } ?>
      </ul>
   </div>
   <!-- Main Content -->
   <div class="row" id='main-content' <?php if($search != '') hide();?> >
   <ul class="collection">
    <?php 
        $items = fetchItems($id);
        if(count($items)>0) {
          foreach($items as $item) {
    ?>
        <li class="collection-item avatar">
          <img src="<?php echo $item['photo']; ?>" alt="" class="circle">
          <span class="title"><?php echo $item['name']; ?></span>
          <p><?php echo $item['brand']; ?><br>
             <?php echo $item['type']; ?> <br>
             <?php echo (trim($item['size']))!=''?$item['size']:'&nbsp;';?> <br>
             Quantity: <?php echo $item['quantity']; ?>
          </p>
          <div class='secondary-content' style='margin-top: 75px;'>
              <a onclick='openModal("<?php echo $item['photo']; ?>")'><span class='pink-text text-darken-2'><i class="material-icons">zoom_in</i></span></a>&nbsp; &nbsp; &nbsp;
              <a href="item_edit.php?item_id=<?php echo $item['id']; ?>"><span class='pink-text text-darken-2'><i class="material-icons">mode_edit</i></span></a> &nbsp; &nbsp; &nbsp;
              <a href="delete_item.php?item_id=<?php echo $item['id']; ?>"><span class='pink-text text-darken-2'><i class="material-icons">delete_forever</i></span></a> 
          </div>
        </li>
        <?php } ?>
    <?php } ?>
  </ul>
      <br /><br /><br />
    </div>
  <div id="modal1" class="modal transparent">
    <div class="modal-content" style='padding: 0px !important;'>
      <img id='modalImg' src='images/c1.jpg' class="responsive-img">
    </div>
  </div>   
    <div class="fixed-action-btn">
    <a href='item_add.php' class="btn-floating btn-large red darken-2">
      <i class="large material-icons">add</i>
    </a>
  </div>
</body>
</html>

<?php
  require_once('backend/functions.php');
  $test = array(1,2,3,4,5,6,7,8);
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
        $('#select_item').hide();

        $('select').material_select();

        var state = false;
        $(this).on('click', '#add_item', function() {
            var x = document.getElementById('add_item');
            $('#select_item').toggle();
            $('#main_content').toggle();
            if(state) {
               x.innerHTML = '<i class="material-icons right">add</i>';
               state = false;
            } else {
              x.innerHTML = '<i class="material-icons right">clear</i>';
              state = true;
            }
        });
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
              <a href="#" id='add_item'><i class="material-icons right">add</i></a>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->
<div class="row" id='select_item'>
<ul class="collection" id='list'>
</li>
<li id='<?php echo $test[0]; ?>' class="collection-item avatar">
<img src="images/v1.jpg" alt="" class="circle">
<span class="title">Blue Jeans Meheh 1</span>
<p>
  EZ
</p>
<a href="#!" onclick='console.log("<?php echo $test[0]; ?>")'class="secondary-content"><i class="material-icons">add</i></a>
</li>
<li id='<?php echo $test[1]; ?>' class="collection-item avatar">
<img src="images/v1.jpg" alt="" class="circle">
<span class="title">Blue Jeans Meheh 2</span>
<p>
  EZ
</p>
<a href="#!" onclick='console.log("<?php echo $test[1]; ?>")'class="secondary-content"><i class="material-icons">add</i></a>
</li>
<li id='<?php echo $test[2]; ?>' class="collection-item avatar">
<img src="images/v1.jpg" alt="" class="circle">
<span class="title">Blue Jeans Meheh 3</span>
<p>
  EZ
</p>
<a href="#!" onclick='console.log("<?php echo $test[2]; ?>")'class="secondary-content"><i class="material-icons">add</i></a>
</li>
</ul>
</div>
<?php
  $records = fetchAll('closet_items');
?>
<div class='row' id='main_content'>
<?php if(count($records)>0) { ?>
  <?php foreach($records as $r) { ?>
  <?php $record = fetchById($r['item_id'], 'items');?>
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light red lighten-1">
      <center>
          <img class="activator" src="<?php echo $record['photo'];?>" style='width:200px; height:240px;'>
      </center>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">
        Glyza Meh
        <i class="material-icons right">more_vert</i>
      </span>
      <table>
        <tr>
          <td align='center'>
            <a href="backend/closet_delete_item.php?id=<?php echo $r['id']; ?>">Remove From Closet</a>
          </td>
        </tr>
      </table>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <b><?php echo $record['name']; ?></b><i class="material-icons right">close</i>
      </span>
      <h5>Type: <?php echo $record['type']; ?></h5>
      <h5>Brand: <?php echo $record['brand']; ?></h5>
      <h5>Size: <?php echo $record['size']; ?>/A</h5>
    </div>
  </div>
  <?php } ?>
  <!-- -->

  <?php foreach($records as $r) { ?>
  <?php $record = fetchById($r['item_id'], 'items');?>
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light red lighten-1">
      <center>
          <img class="activator" src="<?php echo $record['photo'];?>" style='width:200px; height:240px;'>
      </center>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">
        Glyza Meh
        <i class="material-icons right">more_vert</i>
      </span>
      <table>
        <tr>
          <td align='center'>
            <a href="backend/closet_delete_item.php?id=<?php echo $r['id']; ?>">Remove From Closet</a>
          </td>
        </tr>
      </table>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <b><?php echo $record['name']; ?></b><i class="material-icons right">close</i>
      </span>
      <h5>Type: <?php echo $record['type']; ?></h5>
      <h5>Brand: <?php echo $record['brand']; ?></h5>
      <h5>Size: <?php echo $record['size']; ?>/A</h5>
    </div>
  </div>
  <?php } ?>
<?php } ?>
</div>
    </body>
  </html>

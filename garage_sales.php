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
          <a href="#" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
          </ul>
        </div>
      </nav>
  </div>
   <!-- Navigation Bar -->
<div class="row">
    <blockquote>
        <h5>
            <strong>Pre-Loved Items Sale</strong>
        </h5>
    </blockquote>
    <?php
      $garage_sales = fetchGarageSales($id);
      if(count($garage_sales)>0) {
    ?>  
          <?php foreach($garage_sales as $event) { ?>
          <div class="col s12">
            <div class="card <?php if_joint_garage($event['id']); ?>">  
              <?php if($event['chaser_id'] == $id) { ?>
                <a class='dropdown-button right' href='#' data-activates='dropdown<?php echo $event['id']; ?>'><br />
                <span class='pink-text darken-1'>
                  <i class="material-icons">more_vert</i>
                </span>
                </a>
              <?php } ?>
              <ul id='dropdown<?php echo $event['id']; ?>' class='dropdown-content'>
                  <li><a href="garage_edit.php?garage_id=<?php echo $event['id']; ?>">
                      <span class='pink-text darken-1'>Edit
                      </span>
                  </a></li>
                  <li><a href="backend/delete_garage.php?garage_id=<?php echo $event['id']; ?>">
                      <span class='pink-text darken-1'>Delete
                      </span>
                  </a></li>
              </ul>    
              <div class='card-content z-depth-3'>
            
              <p class='flow-text black-text'>
                <strong>
                <?php 
                          $start_date = date('F j' , strtotime($event['start_date'])); 
                          $end_date = date('F j' , strtotime($event['end_date']));    
                ?>
                <a href='garage_sale_items.php?garage_id=<?php echo $event['id']; ?>'>
                <span class='black-text'>
                  <?php echo $start_date . ' - ' . $end_date; ?>
                </span>
                </a>
                </strong>
                <?php 
                    echo '<br />' . $event['start_time'] . ' - ' . $event['end_time'] . '<br />';
                    echo $event['place'] . '<br /><br />'; 
                    echo $event['description'];
                ?>
              </p>
              </div>
            </div>
          </div>
          <?php } ?>
    <?php } ?>
</div>
<div class="fixed-action-btn">
<a href='garage_sales_add.php' class="btn-floating btn-large red darken-2">
<i class="large material-icons">add</i>
</a>
</div>
</body>
</html>
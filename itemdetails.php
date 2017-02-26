<?php
  require_once('backend/functions.php');

  $records = fetchAll('items');

  if(!(count($records)>0)) {
    header('Location: index.php');
    exit();
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
      $(".hidden").hide();

      $('.chips-placeholder').material_chip({
          placeholder: 'Enter a tag',
          secondaryPlaceholder: '+Tag',
       });

      $('#selectIMG').click(function(){
              $('#imgInp').trigger('click');
      });

      $('#form_submit').click(function() {
        $('#new_post').submit();
      });
      $('select').material_select();



      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#imgOutp').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#imgInp').change(function() {
        readURL(this);
      });
    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->


  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->
      <div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo $record['pic']; ?>">
              <span class="card-title">Hippie</span>
              <div class="card-content black-text">
              <p> Item Name: <?php echo $record['name']; ?> </p>
              <p> Item Type: <?php echo $record['type']; ?> </p>
              <p> Item Brand: <?php echo $record['brand']; ?> </p>
              <p> Item Size:  <?php echo $record['size']; ?> <p>
            </div>
            <div class="card-action">
              <a href="#">Edit Item</a>
              <a href ="#">Delete Item</a>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>

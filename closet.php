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
      $('.nav-wrapper').click(function(){
        $( "#centerPreloader" ).toggle();
      });

      $('.modal').modal(); 

      //modal 
      var interval;
      $( ".card" )
        .mouseup(function() {
          clearInterval(interval);
        })
        .mousedown(function() {
          console.log('Mouse Down!');
          interval = setInterval(function() {
            $('#modal1').modal('open');
            clearInterval(interval);
          }, 1500);
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
            <li><a href="home.php"><i class="material-icons">arrow_back</i></a></li>
            <a href="addcloset.php"><i class="material-icons right">add</i></a>
          </ul>
        </div>
      </nav>
  </div>
   <!-- Navigation Bar -->
   <div class='row'>
      <center>
      <div class='col s1'></div>
      <div class="card col s10">
        <div class="card-image">
              <img style='width: 100%;' src="images/v3.jpg">
              <a href ="#"><span class="card-title">Glaiza's Closet</span></a> 
        </div>
      </div>
      <div class='col s1'></div>
    </div>
    <div class='row'>
      <center>
      <div class='col s1'></div>
      <div class="card col s10">
        <div class="card-image">
              <img style='width: 100%;' src="images/v3.jpg">
              <a href ="#"><span class="card-title">Glaiza's Closet</span></a> 
        </div>
      </div>
      <div class='col s1'></div>
    </div>
    <div class='row'>
      <center>
      <div class='col s1'></div>
      <div class="card col s10">
        <div class="card-image">
              <img style='width: 100%;' src="images/v3.jpg">
              <a href ="#"><span class="card-title">Glaiza's Closet</span></a> 
        </div>
      </div>
      <div class='col s1'></div>
    </div>
   </div>

   <!-- Content Area -->
       <!-- <div class="col s12">
        <div class="col s6">
          <div class="card">
          <div class="card-image">
              <img src="images/v3.jpg">
            <center> <a href ="#"><span class="card-title">Glaiza's Closet</span></a> </center>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card">
            <div class="card-image">
              <img src="images/v1.jpg">
          <center> <a href ="#"><span class="card-title">Glaiza's Closet</span></a> </center>
            </div>
          </div>
        </div>
         </div>
        </div> -->
   <!-- Content Area -->
</body>
</html>
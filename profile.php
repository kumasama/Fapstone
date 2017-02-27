<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  $chaser = fetchById($id, 'chasers');
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
        $('ul.tabs').tabs();

        $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
          }
       );
    });

    function test(ez) {
        console.log(ez);
    } 

  </script>

  <!-- JS Scripts -->
<style>
.btn{
  border-radius: 20px;
}
.cardbg {
   background:url(images/b.png) no-repeat 0% 0%;
   background-size:500px;
}
</style>

  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <a href="../final" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->
<div class="cardbg">
  </br>
  <center> 
      <img src="<?php echo $chaser['photo']; ?>" alt="" class="circle responsive-img" width="120px" height="100px">
  </br>
  <h5><span class="white-text"><?php echo $chaser['first_name'] . ' ' . $chaser['last_name']; ?></span></h5>    
  <p class="white-text">
    <!-- A girl living her life to the fullest  | Student | Blogger  -->
    <?php echo $chaser['bio']; ?>
  </p>
  <p color="whitesmoke" size="40px">
      <a href ="#" class="white-text">3 OOTDS</a> | 
      <!-- <a href ="#" class="white-text">123 Followers</a> |  -->
      <a href ="#" class="white-text"><?php echo count_followers($id); ?> Followers</a> | 
      <a href = "#" class="white-text"><?php echo count_following($id); ?> Following</a> | 
  </p>
  <a class="btn waves-effect waves-light pink accent-4 white-text">Edit Profile</a>
  </center>
  </br>
</div>
<ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a href="#test-swipe-1">GARAGE</a></li>
    <li class="tab col s3"><a class="active" href="#test-swipe-2">OOTD</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">CHASES</a></li>
</ul>
<div id="test-swipe-1" class="row">
</div>

<div id="test-swipe-2" class="row">
<div class="col s12 m12"> <!-- Container Div -->
          <div class='card grey lighten-5'>
                <a class='dropdown-button right' href='#' data-activates='dropdownez'>
            </br>
                    <span class='pink-text darken-1'><i class="material-icons">more_vert</i></span>
                  </a>
                  <ul id='dropdownez' class='dropdown-content'>
              <li><a href="#!"><span class='pink-text darken-1'>Edit</span></a></li>
              <li><a href="#!"><span class='pink-text darken-1'>Delete</span></a></li>
              <li><a href="#!"><span class='pink-text darken-1'>Report</span></a></li>
            </ul>
                <ul class='collection' style='border: none !important;'>
                  <li class="collection-item avatar grey lighten-5">
                    <img src="images/k.jpg" alt="" class="circle" style='width: 50px; height: 50px;'>
                    <span class='Title'>
                      <b>Glaichi Mae</b>
                    </span>
                    <p class='grey-text'>
                      @glaichimae08
                    </p>
                  </li>
                </ul>
              <div class="card-image">
              <p style='padding-left: 10px;'>
                When it's almost summer!When it's almost summer!When it's almost summer!
                <br />
                <span class='chip'>
              #Tropical
            </span>
            <span class='chip'>
              #Trop
            </span>
            <span class='chip'>
              #Tropical
            </span>

            </br> Flower Crown - Claires
           </br> Flowery Bra - Topshop
              </p>
              <img src="images/hawaii.jpg" alt="" class="responsive-img">
              <table>
              <tr>  
                <td class='center'>
                    <a href="#!favorite" >
                    <span class='pink-text darken-1'>
                      10 <br \>
                      <i class="material-icons">favorite_border</i>
                    </span>
              </a>
                </td>
                <td class='center'>
                    <a href="#!comments">
                      <span class='pink-text darken-1'>55<br \>
                  <i class="material-icons">comment</i></span>
                </a>
                </td>
                <td class='center'>
                    <a href="#!repeat">
                    <span class='pink-text darken-1'>
                      20 <br \>
                <i class="material-icons">repeat</i>
                </span>
              </a>
                </td>
                <td class='center'>
                    <a onclick='test ("test")' href="#!turned_in">
                    <span class='pink-text darken-1'>
                      123 <br \>
                  <i class="material-icons">turned_in</i>
                  </span>
                </a>
                </td>
              </tr>
              </table>
            </div>
          </div>
        </div> <!-- Container Div -->
<div id="test-swipe-3" class="row"> <!-- Chases -->
</div>
</body>
</html>
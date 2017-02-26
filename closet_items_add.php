<?php
  require_once('backend/functions.php');
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
        $('#clear_search').on('click', function() {
            $('#search-content').html('');
            $('#searchcontent').hide();
            $('#main-content').show();
            $('#search').val('');
        });
    });
  </script>

  <!-- JS Scripts -->

  <!-- Start Code here -->

  <!-- Navigation Bar -->
   <div class="navbar-fixed"'>
      <nav class='nav'>
        <div class="nav-wrapper red lighten-1">
          <a href="#" class="brand-logo center">Closet</a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
              <a href="#" id='clear_search'><i class="material-icons right">clear</i></a>
          </ul>
        </div>
      </nav>
   </div>
    <div id='search_bar' class="navbar-fixed" >
      <nav>
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
              <input id="search" name='search' value='<?php echo $search; ?>' type="search">
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>
    </div>
   <!-- Navigation Bar -->
   <div class='row' id='search-content' <?php if($search == '') hide();?> >
   EASY EASY
   </div>
   <div class="row" id='main-content' <?php if($search != '') hide();?> > 
      <?php for($x = 0; $x<30; $x++) { ?>
        <div class="col s12 m12"> <!-- Container Div -->
          <div class='card grey lighten-5'>
                <a class='dropdown-button right' href='#' data-activates='dropdownez'>
            </br>
                    <i class="material-icons">more_vert</i>
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
                    <a href="#!favorite">
                      10 <br \>
                <i class="material-icons">favorite_border</i>
              </a>
                </td>
                <td class='center'>
                    <a href="#!comments">
                      55<br \>
                  <i class="material-icons">comment</i>
                </a>
                </td>
                <td class='center'>
                    <a href="#!repeat">
                      20 <br \>
                <i class="material-icons">repeat</i>
              </a>
                </td>
                <td class='center'>
                    <a href="#!turned_in">
                      123 <br \>
                  <i class="material-icons">turned_in</i>
                </a>
                </td>
              </tr>
              </table>
            </div>
          </div>
        </div> <!-- Container Div -->
        <?php } ?>
      </div> 
   <!-- Content Area -->
</body>
</html>

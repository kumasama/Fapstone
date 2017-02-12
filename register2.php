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
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 75 // Creates a dropdown of 15 years to control year
        });
    });
  </script>

  <!-- JS Scripts -->

  <!-- Main Content -->
  <br \><br \>
  <div class='row'>
    <div class='card'>
      <div class="card-image center">
          <img src="images/logo1.png" alt="" class="responsive-img">
      </div>
      <div class="card-content black-text center">
        <form>
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix"  data-error="wrong" data-success="right">Username</label>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Main Content -->
</body>
</html>
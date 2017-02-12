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
      
    });
  </script>

  <!-- JS Scripts -->

<div class ="card">
  <div class="card-content black-text">
<center>
<img src="images/logo1.png" alt="" class="responsive-img">
</center>
<p class="center login-form-text">Express yourself through OOTD</p>
</br>
<div id="login_div">
<form method="post">

<div class="input-field">
<input class="validate" id="email" type="email">
<label for="email" data-error="wrong" data-success="right">Email/Username</label>
</div>

<div class="input-field">
<input id="password" type="password">
<label for="password">Password</label>
</div>
        
<div class="input-field center">
<button class="btn waves-effect waves-light pink lighten-4" type="submit" name="action">LOGIN</button>
</div> </br> </br>

<p>
<center>
<a href="#" id="register">Register Now!</a>
<a href="#" id="forgot">Forgot password?</a>
</center>
</p>

<br>
<br>
</form>
</div>
</div>
</div>

</body>
</html>
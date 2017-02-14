<?php
  session_start();

  if(isset($_SESSION['islogin'])) {
      header('Location: index.php');
      exit();
  }

  require_once('backend/functions.php');

  $prompt_msg = '';

  if(count($_POST)>0) {
      $id = login($_POST['username'], $_POST['password']);
      if($id > 0 ) {
          $_SESSION['islogin'] = true;
          $_SESSION['user_id'] = $id;
          header('Location:index.php');
          exit();
      } else {
          $prompt_msg = 'Incorrrect chaser credentials!';
      }
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
  <input class="validate" name='username' id="username" type="text">
  <label for="username">Email/Username</label>
  </div>

  <div class="input-field">
  <input id="password" name='password' type="password">
  <label for="password">Password</label>
  </div>
        
  <div class="input-field center">
    <button class="btn waves-effect waves-light pink lighten-4" type="submit" name="action">  LOGIN
    </button>
  </div> 
</form>
</br> 
<div><center>
<?php echo $prompt_msg; ?>
</center></div>
</br>
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
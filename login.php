<?php
  session_start();

  if(isset($_SESSION['islogin'])) {
      header('Location: index.php');
      exit();
  }

  require_once('backend/functions.php');

  $prompt_msg = ' ';

  if(count($_POST)>0) {
      $id = login($_POST['username'], $_POST['password']);
      if($id > 0 ) {
          $_SESSION['islogin'] = true;
          $_SESSION['chaser_id'] = $id;
          header('Location:index.php');
          exit();
      } else {
          $prompt_msg = 'Username or password is incorrect!';
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
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />
<style>
body {
/* background:url(images/b.png) no-repeat 0% 0%;
 background-size:cover;*/
 background: url(images/b.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height: 100%;
}
</style>
</head>

<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

</script>
<div class='row'>
  <div class='card transparent'>
    <div class="card-content white-text">
      <center>
        <img src="images/logo.png" alt="" class="responsive-img">
        <p class="center login-form-text">Express yourself through OOTD</p>
      </center>
        <form method='post'>
          <div class="input-field">
          <input class="validate" name='username' id="username" type="text">
          <label for="username">Email/Username</label>
          </div>

          <div class="input-field">
          <input id="password" name='password' type="password">
          <label for="password">Password</label>
          </div>

          <div class="input-field center">
          <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">  LOGIN
          </button>
          </div> 
        </form>
        <br />
        <div><center>
           <?php echo $prompt_msg; ?>
        </center></div>
        <br />
        <p> 
        <center>
        <a class = "white-text" href="register.php" id="register">Register Now!</a>
        <a  class = "white-text" href="#" id="forgot">Forgot password?</a>
        </center>
        </p>
    </div>
</div>
</div>
</body>
</html>
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
        $('select').material_select();
    });
  </script>

  <!-- JS Scripts -->

<div class ="card">
  <center>
    <img src="images/logo1.png" alt="" class="responsive-img">
  </center>
  <div class="card-content black-text">
    <div class="row">
        <form class='col s12'>
          <div class='row'>
              <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix"  data-error="" data-success="">Username</label>
              </div>
              <div class='input-field col s7'>
                  <i class="material-icons prefix">https</i>
                  <input id="icon_prefix" type="password" class="validate">
                  <label for="icon_prefix">Password</label>
              </div>
              <div class='input-field col s5'>
                  <input id="icon_prefix" type="password" class="validate">
                  <label for="icon_prefix">Re-Password</label>
              </div>
              <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix" type="email" class="validate">
                  <label for="icon_prefix"  data-error="" data-success="">Email</label>
              </div>
               <div class='input-field col s7'>
                  <i class="material-icons prefix">person</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Last Name</label>
              </div>
              <div class='input-field col s5'>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">First Name</label>
              </div>
              <div class="input-field col s6">
                  <i class="material-icons prefix">event</i>
                  <select>
                    <option value='1'>January</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                  </select>
                  <label>Month</label>
              </div>
              <div class="input-field col s3">
                  <select>
                    <?php for($x=1; $x<32; $x++) { ?>
                    <option value="<?php echo $x; ?>"><?php echo ($x<10)?'0' . $x:$x; ?></option>
                    <?php } ?>
                  </select>
                  <label>Day</label>
              </div>
              <div class="input-field col s3">
                  <select>
                    <?php for($x=1980; $x<2005; $x++) { ?>
                    <option value='<?php echo $x; ?>'><?php echo $x; ?></option>
                    <?php } ?>
                  </select>
                  <label>Year</label>
              </div>
              <div class="input-field col s12 center">
                  <button class="btn waves-effect waves-light pink lighten-2" type="submit" name="action">
                      REGISTER
                  </button>
              </div>
              <div class="input-field col s12 center">
                  <font family="roboto" size="1px" color="black">
                      Already have an account? 
                  </font>
                      <a href='login.php'>
                        <font family="roboto" size="1px">
                          Login
                        </font>
                      </a>
              </div>
          </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>
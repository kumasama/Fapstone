<?php
  require_once('backend/functions.php');

  if(count($_POST)) {
     if(insert($_POST, 'chasers')) {
        header('Location: login.php');
        exit();
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
</head>
<style>
body {
/* background:url(images/b.png) no-repeat 0% 0%;
 background-size:cover;*/
 background: url(images/b.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <!-- JS Scripts -->
  <script type='text/javascript'>
    $(document).ready(function() {

        $("input").attr("autocomplete","off");

        $('select').material_select();

        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 30,// Creates a dropdown of 15 years to control year
          min: new Date(1980,1,31),
          max: new Date(2003,1,31)
        });

        $('#btn_Register').on('click', function(event) {
            if(checkInputs()) {
                $(this).prop('disabled', true);
                $('#form_register').submit();
            } else {
                console.log('Not yet!');
            }
        });

        function checkInputs() {
            if($('#username').val().length === 0) {
              return false;
            }
            if($('#email').val().length === 0) {
              return false;
            }
            if($('#password').val().length === 0) {
              return false;
            }
            if($('#first_name').val().length === 0) {
              return false;
            }
            if($('#last_name').val().length === 0) {
              return false;
            }
            if($('#final_birthdate').val().length === 0) {
              return false;
            }
            if($('#username').hasClass('invalid')) {
              return false;
            }
            if($('#email').hasClass('invalid')) {
              return false;
            }
            if($('#password').hasClass('invalid')) {
              return false;
            }
            return true;
        }


        function dateStringify(dateString) {
            let d = new Date(dateString);
            let b_month = d.getMonth() + 1;
            let b_year = d.getFullYear();
            let b_day = d.getDate();

            return b_year + '-' + b_month + '-' + b_day;
        }

        function validateName(txt) {
          re = /^[a-zA-Z]*$/;
          return re.test(txt);
        }

        $('#first_name').keyup(function() {
            let reg = /^[a-zA-Z]*$/;
            let inp = $(this).val();
            if(reg.test(inp)) {

            } else {
              $(this).prop('class', 'invalid');
              if(inp.length !== 0)
                $('#label_email').attr('data-error', 'Invalid email address!');
            }
        });

        $('#email').keyup(function() {
           let reg = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;
           let inp = $('#email').val();
           if(reg.test(inp)) {
              fetch('backend/check_existing.php?email=' + inp)
              .then(function(response) {
                  if(response.ok) {
                    return response.text();
                  }
              }).then(function(test) {
                  if(test == '1') {
                    $('#email').prop('class', 'invalid');
                    $('#label_email').attr('data-error', 'Email is already taken');
                  } else {
                    $('#email').removeAttr('class');
                  }
              }).catch(function(error) {
                  console.log('Something went wrong!');
              });
           } else {
              $(this).prop('class', 'invalid');
              if(inp.length !== 0)
                $('#label_email').attr('data-error', 'Invalid email address!');
              else {
                $('#label_email').attr('data-error', ' ');
              }
           }
        });

        $('#password').keyup(function(e) {
           if(e.which == 13) {
                if(!$(this).hasClass('invalid'))
                  $('#email').focus();
            }
           let inp = $(this).val();
           if (inp.length === 0) {
                $('#label_password').attr('data-error', '');
           } else if(inp.length < 6) {
                $(this).prop('class', 'invalid');
                $('#label_password').attr('data-error', 'Password is too short');
           } else {
                $(this).removeAttr('class');
           }
        });

        $('#username').keyup(function(e) {
            let reg = /^[a-zA-Z][a-zA-Z-0-9]+$/;
            let inp = $('#username').val();
            if(e.which == 13) {
                if(!$(this).hasClass('invalid'))
                  $('#password').focus();
            }
            if(reg.test(inp)) {
              if(inp.length < 6) {
                  $(this).prop('class', 'invalid');
                  $('#label_username').attr('data-error', 'Username too short');
              } else if(inp.length > 14){
                  $(this).prop('class', 'invalid');
                  $('#label_username').attr('data-error', 'Username too long');
              } else {
                  fetch('backend/check_existing.php?username=' + inp)
                  .then(function(response) {
                      if(response.ok) {
                        return response.text();
                      }
                  })
                  .then(function(test) {
                      if(test == '1') {
                        $('#username').prop('class', 'invalid');
                        $('#label_username').attr('data-error', 'Username is already taken');
                      } else {
                        $('#username').removeAttr('class');
                      }
                  }).catch(function(error) {
                      console.log('Something went wrong!');
                  });
              }
            } else {
              $(this).prop('class', 'invalid');
              if(inp.length !== 0)
                $('#label_username').attr('data-error', 'Username is invalid');
              else {
                $('#label_username').attr('data-error', ' ');
              }
            }
        });

        $('#birthdate').on('change', function() {
            $('#final_birthdate').val(dateStringify($(this).val()));
        });
    });
  </script>
<div class='row'>
  <div class='card transparent'>
    <div class="card-content white-text">
      <center>
        <img src="images/logo.png" alt="" class="responsive-img">
        <p class="center login-form-text">Express yourself through OOTD</p>
      </center>
        <form method='post' id='form_register'> 
        <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="username" name='username' type="text">
              <label id='label_username' for="username" data-error="" data-success="">Username</label>
          </div>
          <div class='input-field col s12'>
              <i class="material-icons prefix">https</i>
              <input id="password" name="password" type="password">
              <label id='label_password' for="password">Password</label>
          </div>
          <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input id="email" name='email' type="text">
              <label id='label_email' for="email">Email</label>
          </div>
           <div class='input-field col s12'>
              <i class="material-icons prefix">person_outline</i>
              <input id="last_name" name='last_name' type="text">
              <label id='last_name' for="last_name">Last Name</label>
          </div>
          <div class='input-field col s12'>
              <i class="material-icons prefix">person_outline</i>
              <input id="first_name" name='first_name' type="text">
              <label id='first_name' for="first_name">First Name</label>
          </div>
          <div class="input-field col s12">
              <i class="material-icons prefix">event</i>
                <input type="date" id='birthdate' class="datepicker">
                <label for="birthdate">Birthdate</label>
                <input type='hidden' id='final_birthdate' name='birthdate' />
          </div>
        </form>
        <div class="input-field col s12 center">
              <button class="btn waves-effect waves-light pink lighten-2" type="submit" id='btn_Register'>
                  REGISTER
              </button>
          </div>
          <div class="input-field col s12 center">
              <font family="roboto" size="3px" color="white">
                  Already have an account? 
              </font>
                  <a href='login.php'>
                    <font family="roboto" size="3px">
                      Login
                    </font>
                  </a>
          </div>
    </div>
</div>
</div>
</body>
</html>
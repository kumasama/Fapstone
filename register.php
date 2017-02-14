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

        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 30,// Creates a dropdown of 15 years to control year
          min: new Date(1980,1,31),
          max: new Date(2003,1,31)
        });

        // })
        $('#btn_Register').click(function(event) {
          if(checkInputStatus()) {
              console.log('It can now be added to database!');
              register();
              // ifExistingUsername();
              // checkIfExisting('username', document.getElementById('username').value);
          }
          else {
              console.log('Not yet ready!');
          }
        });

        let checkIfExisting = function(key, value) {
            let formData = new FormData();
            formData.append(key, value);
            var x = '';
            fetch('backend/chasers.php?function=checkExisting', {
              method: 'POST',
              body: formData
            })
            .then(function(response){
                return response.text();
            }).then(function(text) {
                this.x = text;
            });
            console.log(x);
        }

        function register() { 
            let params = {
               username : document.getElementById('username').value,
               password : document.getElementById('password').value,
               email : document.getElementById('email').value,
               last_name :  document.getElementById('last_name').value,
               first_name : document.getElementById('first_name').value,
               birthdate : dateStringify(document.getElementById('birthdate').value)
            };

            let formData = new FormData();
            formData.append('json', JSON.stringify(params));
            fetch('backend/chasers.php?function=insert', {
              method: 'POST',
              body: formData
            })
            .then(function(response){
                return response.text();
            }).then(function(text) {
                if(text=='Success') {
                  console.log('Success');
                  clearFields();
                  alert('You have been registered!');
                  window.location.href = "login.php";
                } else {
                  console.log('Failed');
                }
            });
        }

        function dateStringify(dateString) {
            let d = new Date(dateString);
            let b_month = d.getMonth() + 1;
            let b_year = d.getFullYear();
            let b_day = d.getDate();

            return b_year + '-' + b_month + '-' + b_day;
        }

        function checkInputStatus() {
            let error_prompts = [];
            let status = false;
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let repassword =  document.getElementById('repassword').value;
            let email =  document.getElementById('email').value;
            let last_name =  document.getElementById('last_name').value;
            let first_name = document.getElementById('first_name').value;
            let birthdate = document.getElementById('birthdate').value;

            let reg_info = [];
            reg_info.push(username,password,repassword,email,last_name,first_name, birthdate);
            for(i=0; i<reg_info.length; i++) {
                if(reg_info[i] == '') {
                    alert("Please don't leave any empty fields behind.");
                    return false;
                }
            }
            if(!validateEmail(email)) {
              error_prompts.push('This e-mail address is invalid!');
            }
            if(!validateUsername(username)) {
              error_prompts.push('Username is invalid!');
            }
            if(!validatePassword(password,repassword)) {
              error_prompts.push('Passwords do not match!');
            }
            if(!validateName(first_name) || !validateName(last_name)) {
              error_prompts.push('Name should consist only of letters!');
            }

            console.log(error_prompts);

            return (error_prompts.length>0)?false:true;
        }

        function clearFields() {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            document.getElementById('repassword').value = '';
            document.getElementById('email').value = '';
            document.getElementById('last_name').value = ''; 
            document.getElementById('first_name').value = ''; 
            document.getElementById('birthdate').value = '';
        }

        function validateEmail(txt) {
          var re = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;
          return re.test(txt);
        }

        function validateUsername(txt) {
          var re = /^[a-zA-Z][a-zA-Z-0-9]+$/;
          return re.test(txt);
        }

        function validatePassword(p1, p2) {
          return p1 == p2;
        }

        function validateName(txt) {
          re = /^[a-zA-Z]*$/;
          return re.test(txt);
        }
    });
  </script>

  <!-- JS Scripts -->

<div class ="card">
  <center>
    <img src="images/logo1.png" alt="" class="responsive-img">
  </center>
  <div class="card-content black-text">
    <div class="row">
          <div class='row'>
            <form class='col s12' id='form_register' method='post' action='backend/register.php'>
              <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="username" name='username' type="text">
                  <label for="username"  data-error="" data-success="">Username</label>
              </div>
              <div class='input-field col s7'>
                  <i class="material-icons prefix">https</i>
                  <input id="password" name="password" type="password">
                  <label for="password">Password</label>
              </div>
              <div class='input-field col s5'>
                  <input id="repassword" name='repassword' type="password">
                  <label for="repassword">Re-Password</label>
              </div>  
              <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" name='email' type="text">
                  <label for="email">Email</label>
              </div>
               <div class='input-field col s7'>
                  <i class="material-icons prefix">person</i>
                  <input id="last_name" name='last_name' type="text">
                  <label for="last_name">Last Name</label>
              </div>
              <div class='input-field col s5'>
                  <input id="first_name" name='first_name' type="text">
                  <label for="first_name">First Name</label>
              </div>
              <div class="input-field col s12">
                  <i class="material-icons prefix">event</i>
                    <input type="date" name='birthdate' id='birthdate' class="datepicker">
              </div>
              </form>
              <div class="input-field col s12 center">
                  <button class="btn waves-effect waves-light pink lighten-2" type="submit" id='btn_Register'>
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
    </div>
  </div>
</div>
</body>
</html>
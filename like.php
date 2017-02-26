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
      $(".hidden").hide();

      $('.chips-placeholder').material_chip({
          placeholder: 'Enter a tag',
          secondaryPlaceholder: '+Tag',
       });

      $('#selectIMG').click(function(){
              $('#imgInp').trigger('click');
      });

      $('#form_submit').click(function() {
        $('#new_post').submit();
      });
    
    $('.materialboxed').materialbox();

      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#imgOutp').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#imgInp').change(function() {
        readURL(this);
      });
    });
  </script>
  <!-- JS Scripts -->

  <!-- Start Code here -->


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

 <!-- Content Area -->
<body>
<ul class="collection">
    <li class="collection-item avatar">
      <img src="images/a.jpg" alt="" class="circle">
      <span class="title">Mae Odo</span>
        <a class="btn waves-effect waves-light pink lighten-4 right"><i class="material-icons">thumb_up</i></a>
        
    </li>
     <li class="collection-item avatar">
      <img src="images/v1.jpg" alt="" class="circle">
      <span class="title">Rihanna</span>
        <a class="btn waves-effect waves-light pink lighten-4 right"><i class="material-icons">thumb_up</i></a>
        
    </li>

     <li class="collection-item avatar">
      <img src="images/o7.jpg" alt="" class="circle">
      <span class="title">Carlo Rosi</span>
        <a class="btn waves-effect waves-light pink lighten-4 right"><i class="material-icons">thumb_up</i></a>
        
    </li>
    </ul>
    </body>
  </html>
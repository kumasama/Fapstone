<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }
  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  $chaser = fetchById($id, 'chasers');

  function fetchChasers($id) {
    try {
      $db = PDO_Connection();
      $sql = "select * from chasers where not id=?";
      $stmt = $db->prepare($sql);
      $stmt->execute(array($id));
      $result = $stmt->fetchAll();
    } catch(Exception $e) {
      echo $e->getMessage();
    }
    return $result;
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

        getChasers();

        $("input").attr("autocomplete","off");

        $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        });

        $('#search').keyup(function(e) {
            if(e.which == 13) {
                  $(this).blur();
            } else {
              if($(this).val() == '') {
                $('#main_content').show();
                $('#search_content').hide();
              } else {
                $('#main_content').hide();
                $('#search_content').show();
              }
              let chaser_id = $('#chaser_id').val();
              let search = $('#search').val();
              if($(this).val() != '') {
              fetch('backend/search_chaser?chaser_id= '+ chaser_id + '&search=' + search)
              .then(function(response) {
                  return response.json();
              }).then(function(data) {
                  let len = Object.keys(data).length;
                  if(len > 0 ) {
                    console.log(len);
                    let content = '<ul class="collection">';
                    for(let i = 0; i<len; i++) {
                        content += '<li class="collection-item avatar">';
                        content += '<a href="profile_view.php?chaser_id='+ data[i].id +'">';
                        content += '<img src="'+ data[i].photo +'" alt="" class="circle">';
                        content += '<span class="title black-text lighten-1"><b>' + data[i].first_name +' ' + data[i].last_name + '</b></span>';
                        content += '<p class="flow-text grey-text lighten-1">'+ data[i].username +'</p>';
                        content += '</a>';
                        content += '</li>';
                    }
                    content += '</ul>';
                    $('#search_content').html(content);
                  }
              });
              }
            }
        });

        function getChasers() {
            let chaser_id = $('#chaser_id').val();
            fetch('backend/search_chaser?chaser_id= '+ chaser_id)
            .then(function(response) {
                return response.json();
            }).then(function(data) {
                let len = Object.keys(data).length;
                if(len > 0 ) {
                  console.log(len);
                  let content = '<ul class="collection">';
                  for(let i = 0; i<len; i++) {
                      content += '<li class="collection-item avatar">';
                      content += '<a href="profile_view.php?chaser_id='+ data[i].id +'">';
                      content += '<img src="'+ data[i].photo +'" alt="" class="circle">';
                      content += '<span class="title black-text lighten-1"><b>' + data[i].first_name +' ' + data[i].last_name + '</b></span>';
                      content += '<p class="flow-text grey-text lighten-1">'+ data[i].username +'</p>';
                      content += '</a>';
                      content += '</li>';
                  }
                  content += '</ul>';
                  $('#main_content').html(content);
                }
            });
        }

		});
	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->

  <input type='hidden' id='chaser_id' value='<?php echo $id; ?>'>

	<!-- Navigation Bar -->
	   <nav>
    <div class="nav-wrapper pink darken-1">
        <div class="input-field">
          <input id="search" type="search">
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
    </div>
  </nav>
<!-- Navigation Bar -->

<!-- Content Area -->		       
<a href="#" style='display: none;' data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
<?php include('sidenav.php'); ?>
<div class='row' id='main_content'>
</div>

<div class='row' id='search_content' style='display: none!'>
</div>
	 <!-- Content Area -->
</body>
</html>
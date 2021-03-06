<?php
  session_start();

  if(!isset($_SESSION['islogin'])) {
    header('Location: login.php');
    exit();
  }

  require_once('backend/functions.php');

  $id = $_SESSION['chaser_id'];

  if(isset($_GET['chaser_id']) && $_GET['chaser_id'] !== '') {
      $chaser_id = $_GET['chaser_id'];
      $chaser = fetchById($chaser_id, 'chasers');
      if($chaser_id == $id) {
          header('location: profile.php');
          exit();
      }
  } else {
      header('Location: index.php');
      exit();
  }

  $following = if_Follower($id, $chaser_id);

  function generateURL($follower, $following) {
      echo 'backend/follow.php?follower_id=' . $follower . '&following_id=' . $following;
  }

  function generateURL2($follower, $following) {
      echo 'backend/unfollow.php?follower_id=' . $follower . '&following_id=' . $following;
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
        $('ul.tabs').tabs();

        $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
          }
       );
    });

    function openModal(path) {
        $('#modalImg').prop('src', path);
        $('#modal1').modal('open');
    }

    function like(chaser_id, post_id) {
      // console.log(chaser_id + ' liked ' + post_id);
      let x = $('#like' + post_id);
      let value = $.trim(x.html());
      let url = 'backend/reactions.php?type=like&chaser_id='+ chaser_id +'&post_id=' + post_id;
      fetch(url)
      .then(function(response) {
        return response.text();
      }).then(function(text) {
        if(text!='') {
          if(value == '&nbsp;') {
            x.html('1');
          } else {
            x.html(++value);
          }
        }
      });
    }

    function vote(chaser_id, post_id) {
      // console.log(chaser_id + ' liked ' + post_id);
      let x = $('#vote' + post_id);
      let value = $.trim(x.html());
      let url = 'backend/reactions.php?type=vote&chaser_id='+ chaser_id +'&post_id=' + post_id;
      fetch(url)
      .then(function(response) {
        return response.text();
      }).then(function(text) {
        if(text!='') {
          if(value == '&nbsp;') {
            x.html('1');
          } else {
            x.html(++value);
          }
        }
      });
    }

    function report_post(chaser_id, post_id) {
      let url = 'backend/complaints.php?type=post&reporter_id='+ chaser_id +'&post_id=' + post_id;
      fetch(url)
      .then(function(response) {
        return response.text();
      }).then(function(text) {
        if(text!='') {
          
        }
      });
    }

    function chase_post(chaser_id, post_id) {
      // console.log(chaser_id + ' liked ' + post_id);
      let url = 'backend/chase.php?chaser_id='+ chaser_id +'&post_id=' + post_id;
      fetch(url)
      .then(function(response) {
        return response.text();
      }).then(function(text) {
        if(text!='') {
          
        }
      });
    }

  </script>

  <!-- JS Scripts -->
<style>
.btn{
  border-radius: 20px;
}
.cardbg {
   background:url(images/b.png) no-repeat 0% 0%;
   background-size:500px;
}
</style>

  <!-- Navigation Bar -->
   <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper pink darken-1">
          <a href="#" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
          <ul id="nav-mobile">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
            <a href="#" data-activates='user_action' class="dropdown-button right"><i class="material-icons right">more_vert</i></a>
            <ul id='user_action' class='dropdown-content pink darken-1'>
              <li class='divider'></li>
              <li><a href="#!"><span class='white-text darken-1'>Report</span></a></li>
              <li class='divider'></li>
            </ul>
          </ul>
        </div>
      </nav>
   </div>
   <!-- Navigation Bar -->
<div class="cardbg">
  </br>
  <center> 
      <img src="<?php echo $chaser['photo']; ?>" alt="" class="circle responsive-img" width="120px" height="100px">
  </br>
  <h5>
    <span class="white-text">
        <?php echo $chaser['first_name'] . ' ' . $chaser['last_name']; ?>
    </span>
  </h5>    
  <p class="white-text">
    <!-- A girl living her life to the fullest  | Student | Blogger  -->
    <?php echo $chaser['bio']; ?>
  </p>
  <p color="whitesmoke" size="40px">
      <a href ="#" class="white-text"><?php echo count_posts($chaser_id); ?> OOTDS</a> | 
      <a href ="#" class="white-text"><?php echo count_followers($chaser_id); ?> Chasers</a>
  </p>
  <?php if($following) { ?>
    <a href='<?php generateURL2($id, $chaser_id); ?>' class="btn waves-effect waves-light pink accent-4 white-text">Unchase</a>
  <?php } else {?>
    <a href='<?php generateURL($id, $chaser_id); ?>' class="btn waves-effect waves-light pink accent-4 white-text">Chase</a>
  <?php } ?>
  </center>
  </br>
</div>
<ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3">
      <a href="#test-swipe-1">GARAGE</a>
    </li>
    <li class="tab col s3">
      <a class="active" href="#test-swipe-2">OOTD</a>
    </li>
    <li class="tab col s3">
      <a href="#test-swipe-3">CHASE</a>
    </li>
</ul>
<div id="test-swipe-1" class="row">
<!-- Content for Tab 1 -->
<?php
      $garage_sales = fetchGarageSales($chaser_id);
      if(count($garage_sales)>0) {
    ?>  
          <?php foreach($garage_sales as $event) { ?>
          <div class="col s12">
            <div class="card <?php if_joint_garage($event['id']); ?>">  
              <?php if($event['chaser_id'] == $id) { ?>
                <a class='dropdown-button right' href='#' data-activates='dropdown<?php echo $event['id']; ?>'><br />
                <span class='pink-text darken-1'>
                  <i class="material-icons">more_vert</i>
                </span>
                </a>
              <?php } ?>
              <ul id='dropdown<?php echo $event['id']; ?>' class='dropdown-content'>
                  <li><a href="garage_edit.php?garage_id=<?php echo $event['id']; ?>">
                      <span class='pink-text darken-1'>Edit
                      </span>
                  </a></li>
                  <li><a href="backend/delete_garage.php?garage_id=<?php echo $event['id']; ?>">
                      <span class='pink-text darken-1'>Delete
                      </span>
                  </a></li>
              </ul>    
              <div class='card-content z-depth-3'>
            
              <p class='flow-text black-text'>
                <strong>
                <?php 
                          $start_date = date('F j' , strtotime($event['start_date'])); 
                          $end_date = date('F j' , strtotime($event['end_date']));    
                ?>
                <a href='garage_sale_items.php?garage_id=<?php echo $event['id']; ?>'>
                <span class='black-text'>
                  <?php echo $start_date . ' - ' . $end_date; ?>
                </span>
                </a>
                </strong>
                <?php 
                    echo '<br />' . $event['start_time'] . ' - ' . $event['end_time'] . '<br />';
                    echo $event['place'] . '<br /><br />'; 
                    echo $event['description'];
                ?>
              </p>
              </div>
            </div>
          </div>
          <?php } ?>
    <?php } ?>
</div>
<div id="test-swipe-2" class="row">
<!-- Content for Tab 2 -->
<?php
  $posts = fetch_ootds($chaser_id);
  if(count($posts)>0) {
 ?>
  <?php foreach($posts as $post) { ?>
      <div class='col s12'>
        <div class='card grey lighten-5'>
          <a class='dropdown-button right' href='#' data-activates='dropdown<?php echo $post['id']; ?>'>
            </br><span class='pink-text darken-1'><i class="material-icons">more_vert</i></span>  
          </a>
          <ul id='dropdown<?php echo $post['id']; ?>' class='dropdown-content'>
            <?php 
              if($post['chaser_id'] == $id) {
            ?>
                <li><a href="#!"><span class='pink-text darken-1'>Edit</span></a></li>
                <li><a href="#!"><span class='pink-text darken-1'>Delete</span></a></li>
              <?php } else { ?>
                <li>
                  <a href="#!favorite" onclick='report_post(<?php echo $id . ',' . $post['id']; ?>)'>
                    <span class='pink-text darken-1'>Report</span>
                  </a>
                </li>
              <?php } ?>
          </ul>
          <?php $ch = fetchById($post['chaser_id'], 'chasers'); ?>
          <ul class='collection' style='border: none !important;'>
            <li class="collection-item avatar grey lighten-5">
              <?php
                $url = ($ch['id'] == $id)?'profile.php':'profile_view.php?chaser_id=' . $ch['id'];
              ?>
              <a href='<?php echo $url; ?>'>
                    <img src="<?php echo $ch['photo']; ?>" alt="" class="circle" style='width: 50px; height: 50px;'>
                    </a>
                    <span class='Title'>
                      <b><?php echo $ch['first_name'] . ' ' . $ch['last_name']; ?></b>
                    </span>
                    <p class='grey-text'>
                      <?php echo date('F j g:i A' , strtotime($post['date_time'])); 
                      ?>
                    </p>
                  </li>
          </ul>
          <div class='card-image'>
          <p style='padding-left: 15px; margin-top: -15px;'>
          <?php 
            if($post['diary'] != '') { 
              echo $post['diary'] . '<br />';
            }

            if($post['categories'] != '') {
              $cats = explode(',', $post['categories']);
              foreach($cats as $cat)
                echo '<span class="chip" style="margin-top: 10px; margin-bottom: 10px;">' . $cat . '</span>';
            }

            if($post['items'] != '') { 
              $items = explode(',', $post['items']);
              foreach($items as $item_id) {
                $item = fetchById($item_id, 'items');
                if(count($item)>0) {
                  echo '<br />';
                  echo '<a onclick=openModal("'. $item['photo'] .'")>';
                  echo '<span class="red-text text-darken-2">';
                  echo $item['name'] . ' - ' . $item['brand'];
                  echo '<span>';
                  echo '</a>';
                }
              }
            }
          ?>
                </p>
                <img src="<?php echo $post['photo']; ?>" alt="" class="responsive-img">
                <table>
                  <tr>  
                     <td class='center'>
                        <a href="#!favorite" onclick='like(<?php echo $id . ',' . $post['id']; ?>)'>
                          <span class='pink-text darken-1' id='like<?php echo $post['id']; ?>'>
                            <?php 
                              $reactions = count_reactions($post['id'], 'like');
                              echo ($reactions>0)?$reactions:'&nbsp;';
                            ?>
                          </span> <br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">thumb_up</i>
                    </span>
                  </a>
                    </td>
                    <td class='center'>
                        <a href="#!favorite" onclick='vote(<?php echo $id . ',' . $post['id']; ?>)'>
                          <span class='pink-text darken-1' id='vote<?php echo $post['id']; ?>'>
                          <?php 
                            $reactions = count_reactions($post['id'], 'vote');
                            echo ($reactions>0)?$reactions:'&nbsp;';
                          ?>
                          </span><br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">favorite_border</i>
                    </span>
                  </a>
                    </td>
                    <td class='center'>
                        <a href="#!comments">
                        <span class='pink-text darken-1'>
                          &nbsp;<br \>
                      <i class="material-icons">comment</i>
                    </a>
                    </span>
                    </td>
                    <td class='center'>
                      <?php 
                        if($post['chaser_id'] != $id) {
                      ?>
                        <a href="#!favorite" onclick='chase_post(<?php echo $id . ',' . $post['id']; ?>)'>
                      <?php } else { ?>
                        <a href="#!favorite">
                      <?php } ?>
                          <span class='pink-text darken-1' id='chase<?php echo $post['id']; ?>'>
                            <?php 
                              $chases = count_chases($post['id']);
                              echo ($chases>0)?$chases:'&nbsp;';
                            ?>
                          </span> <br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">turned_in</i>
                    </span>
                  </a>
                    </td>
                    </tr>
                  </table>
          </div>
        </div>
      </div>
  <?php } ?>
<?php } ?>
</div>
<div id="test-swipe-3" class="row">
<!-- Content for Tab 2 -->
<?php
  $posts = fetch_chases($chaser_id);
  if(count($posts)>0) {
 ?>
  <?php foreach($posts as $post) { ?>
      <div class='col s12'>
        <div class='card grey lighten-5'>
          <a class='dropdown-button right' href='#' data-activates='dropdown<?php echo $post['id']; ?>'>
            </br><span class='pink-text darken-1'><i class="material-icons">more_vert</i></span>  
          </a>
          <ul id='dropdown<?php echo $post['id']; ?>' class='dropdown-content'>
            <?php 
              if($post['chaser_id'] == $id) {
            ?>
                <li><a href="#!"><span class='pink-text darken-1'>Edit</span></a></li>
                <li><a href="#!"><span class='pink-text darken-1'>Delete</span></a></li>
              <?php } else { ?>
                <li>
                  <a href="#!favorite" onclick='report_post(<?php echo $id . ',' . $post['id']; ?>)'>
                    <span class='pink-text darken-1'>Report</span>
                  </a>
                </li>
              <?php } ?>
          </ul>
          <?php $ch = fetchById($post['chaser_id'], 'chasers'); ?>
          <ul class='collection' style='border: none !important;'>
            <li class="collection-item avatar grey lighten-5">
              <?php
                $url = ($ch['id'] == $id)?'profile.php':'profile_view.php?chaser_id=' . $ch['id'];
              ?>
              <a href='<?php echo $url; ?>'>
                    <img src="<?php echo $ch['photo']; ?>" alt="" class="circle" style='width: 50px; height: 50px;'>
                    </a>
                    <span class='Title'>
                      <b><?php echo $ch['first_name'] . ' ' . $ch['last_name']; ?></b>
                    </span>
                    <p class='grey-text'>
                      <?php echo date('F j g:i A' , strtotime($post['date_time'])); 
                      ?>
                    </p>
                  </li>
          </ul>
          <div class='card-image'>
          <p style='padding-left: 15px; margin-top: -15px;'>
          <?php 
            if($post['diary'] != '') { 
              echo $post['diary'] . '<br />';
            }

            if($post['categories'] != '') {
              $cats = explode(',', $post['categories']);
              foreach($cats as $cat)
                echo '<span class="chip" style="margin-top: 10px; margin-bottom: 10px;">' . $cat . '</span>';
            }

            if($post['items'] != '') { 
              $items = explode(',', $post['items']);
              foreach($items as $item_id) {
                $item = fetchById($item_id, 'items');
                if(count($item)>0) {
                  echo '<br />';
                  echo '<a onclick=openModal("'. $item['photo'] .'")>';
                  echo '<span class="red-text text-darken-2">';
                  echo $item['name'] . ' - ' . $item['brand'];
                  echo '<span>';
                  echo '</a>';
                }
              }
            }
          ?>
                </p>
                <img src="<?php echo $post['photo']; ?>" alt="" class="responsive-img">
                <table>
                  <tr>  
                     <td class='center'>
                        <a href="#!favorite" onclick='like(<?php echo $id . ',' . $post['id']; ?>)'>
                          <span class='pink-text darken-1' id='like<?php echo $post['id']; ?>'>
                            <?php 
                              $reactions = count_reactions($post['id'], 'like');
                              echo ($reactions>0)?$reactions:'&nbsp;';
                            ?>
                          </span> <br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">thumb_up</i>
                    </span>
                  </a>
                    </td>
                    <td class='center'>
                        <a href="#!favorite" onclick='vote(<?php echo $id . ',' . $post['id']; ?>)'>
                          <span class='pink-text darken-1' id='vote<?php echo $post['id']; ?>'>
                          <?php 
                            $reactions = count_reactions($post['id'], 'vote');
                            echo ($reactions>0)?$reactions:'&nbsp;';
                          ?>
                          </span><br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">favorite_border</i>
                    </span>
                  </a>
                    </td>
                    <td class='center'>
                        <a href="#!comments">
                        <span class='pink-text darken-1'>
                          &nbsp;<br \>
                      <i class="material-icons">comment</i>
                    </a>
                    </span>
                    </td>
                    <td class='center'>
                      <?php 
                        if($post['chaser_id'] != $id) {
                      ?>
                        <a href="#!favorite" onclick='chase_post(<?php echo $id . ',' . $post['id']; ?>)'>
                      <?php } else { ?>
                        <a href="#!favorite">
                      <?php } ?>
                          <span class='pink-text darken-1' id='chase<?php echo $post['id']; ?>'>
                            <?php 
                              $chases = count_chases($post['id']);
                              echo ($chases>0)?$chases:'&nbsp;';
                            ?>
                          </span> <br \>
                          <span class='pink-text darken-1'>
                      <i class="material-icons">turned_in</i>
                    </span>
                  </a>
                    </td>
                    </tr>
                  </table>
          </div>
        </div>
      </div>
  <?php } ?>
<?php } ?>
</div>
</body>
</html>
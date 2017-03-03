<?php
	session_start();

	if(!isset($_SESSION['islogin'])) {
		header('Location: login.php');
		exit();
	}
	require_once('backend/functions.php');

	$id = $_SESSION['chaser_id'];

	$chaser = fetchById($id, 'chasers');
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

<body>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>

	<!-- JS Scripts -->

	<script type='text/javascript'>
		$(document).ready(function() {	
       		$('.button-collapse').sideNav({
			      menuWidth: 300, // Default is 300
			      edge: 'left', // Choose the horizontal origin
			      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
			      draggable: true // Choose whether you can drag to open on touch screens
			    }
			 );

	       	$('.modal').modal({
	            dismissible: true, // Modal can be dismissed by clicking outside of the modal
	            opacity: .6, // Opacity of modal background
	            inDuration: 300, // Transition in duration
	            outDuration: 200, // Transition out duration
	            startingTop: '4%', // Starting top style attribute
	            endingTop: '10%', // Ending top style attribute
	        });
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
    	let x = $('#chase' + post_id);
    	let value = $.trim(x.html());
    	let url = 'backend/chase.php?chaser_id='+ chaser_id +'&post_id=' + post_id;
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

	</script>

	<!-- JS Scripts -->

	<!-- Start Code here -->
	<!-- Navigation Bar -->
	 <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper pink darken-1">
	      		 <ul id="nav-mobile">
	      		 	<a href="post_add.php"><i class="material-icons right">library_add</i>
	      		 	<a href="user_search.php"><i class="material-icons right">search</i>
            	</a>
            	</ul>
	        <a href="#" class="brand-logo center"><img src="images/logo.png" alt="OOTDme" height="65" style="margin-top:-5px;"></a>
	        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
	      </div>
	    </nav>
	 </div>
	 <!-- Navigation Bar -->

	 <!-- Include Side Nav -->
	 <?php include('sidenav.php'); ?>
	 <!-- Include Side Nav -->	
	 <!-- Main Content -->
 <?php
 	$posts = fetch_Posts($id);
 	if(count($posts)>0) {
 ?>
	<div class='row' id='main_content'>
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
	 </div>
<?php } ?>
<div id="modal1" class="modal transparent">
    <div class="modal-content">
      <img id='modalImg' src='#' class="responsive-img">
    </div>
  </div> 
</body>
</html>
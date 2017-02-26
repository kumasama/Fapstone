  <ul id="slide-out" class="side-nav">
  <li><div class="userView">
      <div class="background">
        <img src="images/b.png">
      </div>
      <a href="#!user"><img class="circle" src="images/hawaii.jpg"></a>
      <a href="#!name">
        <span class="white-text name">
        <?php 
          echo $chaser['first_name'] . ' ' . $chaser['last_name'];
        ?>
        </span
      ></a>
      <a href="#!email"><span class="white-text email">
        <?php 
            echo $chaser['email'];
        ?>
      </span></a>
    </div></li>
      <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
       <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
       <li><a href="items.php"><i class="material-icons">loyalty</i>Items</a></li>
       <li><a href="closet.php"><i class="material-icons">wc</i>Closet</a></li>
        <li><a href="garage.php"><i class="material-icons">style</i>Garage</a></li>
        <li><a href="notifs.php"><i class="material-icons">notifications</i>Notifications</a></li>
        <li><a href="settings.php"><i class="material-icons">settings</i>Settings</a></li>
        <li><a href="logout.php"><i class="material-icons">forward</i>Logout</a></li>
    </ul>
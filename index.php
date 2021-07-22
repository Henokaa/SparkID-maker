<html>
<head>
</head>
<body onload="loadIndex();">

<!-- The Modal -->
<div id="myModal" class="modall">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Help</h2>
    </div>
    <div class="modal-body">
      <p>Steps to follow:-</p>
      <p>Step 1 - You should first create employee profile under admin section - admin username:- username, admin password:- password. <br>Step 2 - Create the employee profile. After that you can press the start button, then go to new profile section to create new profile.</p>
    </div>
    <div class="modal-footer">
      <h3></h3>
    </div>
  </div>

</div>

  <?php         
  include 'mysqli_connect.php';
  
  $sql = "CREATE TABLE admin(
          admin_user VARCHAR(50),
          admin_password VARCHAR(50),
          admin_type VARCHAR(10)
          );";
  @mysqli_query($conn, $sql); //creating table for the admin

  $sql = "SELECT COUNT(*) FROM admin";
  if($row=mysqli_fetch_array(mysqli_query($conn, $sql)) and $row[0]==0){
    $sql = "INSERT INTO admin (admin_user,admin_password,admin_type) VALUES ('JU-CBTP-G1','G1-CBTP-JU','Master'),('username','password','Normal');";
    @mysqli_query($conn, $sql);
  }
  $sql = "SELECT admin_user, admin_password FROM admin WHERE admin_type='Normal'";
  if($admin = mysqli_fetch_array(mysqli_query($conn, $sql))) echo "";  // the 2nd row table from bossadb_ admin table the second row
  else echo "Error: ".mysqli_error($conn); //conn from mysqli_connect should mention every time
  ?>
 <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
    <div class="container"><a class="navbar-brand" href="#page-top">Identificaton System</a><a data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto text-uppercase">
            	<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" href="#"><i class="fa fa-globe"></i> Language</a>
                    <div class="drpdown">
                    	<a href="#">English</a>
                    	<a href="#">Amharic</a>
                    	<a href="#">Afan Oromo</a>
                    </div>
                </li>
                <li class="nav-item dropdown" style="text-transform:none;"><a class="dropdown-toggle nav-link" href="#"><i class="fa fa-lock" id="admin_lock_icon"></i><i class="fa fa-unlock" id="admin_unlock_icon" style="display:none;"></i> ADMIN</a>
                    <div class="drpdown" id="admin_unlock" style="visibility:hidden; width:220px;">
                    	<a href="#" onclick="newEmployeeProfile();">Register Employee</a>
                    	<a href="#" onclick="viewEmployeeProfiles();">View Employee Profiles</a>
                    	<!--<a href="#">Change Software Title/Logo</a>-->
                    	<a href="#" onclick="document.getElementById('change_login_admin').style.display='block'; document.getElementById('Modal_ID_view').style.display='none'; document.getElementById('Modal_ID_new').style.display='none'; document.getElementById('Modal_ID_edit').style.display= 'none';">Change Admin Password</a>
                      <a href="#" onclick="lockAdmin();"><i class="fa fa-lock"></i> Click to lock</a>
                    </div>

                    <div class="drpdown" id="admin_lock">
                      <a href="#" onclick="document.getElementById('login_admin').style.display='block';"><i class="fa fa-unlock"></i> Click to unlock</a>
                    </div>
                </li>
                 <!--<li>Register Employee</li>
                    <li>View Eployee Profile</li>
                    <li>Edit employee Profile</li>                   
                    <li>Remove Employee Profile</li>-->
                <!--<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Theme</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Light</a><a class="dropdown-item" role="presentation" href="#">Dark</a><a class="dropdown-item" role="presentation" href="#">Colored</a></div>
                    </li>-->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"><i class="fa fa-question-circle-o"></i> About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact"><i class="fa fa-phone"></i> Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead" style="/*background-image: url('img/Moto Themes 12.png');*/">
    <div class="container">
        <div class="intro-text" style="padding-top: 230px;">
        	<section id="title">
            <div class="intro-lead-in"><span style="font-size: 35px;">Global</span></div>
            <div class="intro-heading text-uppercase" style="font-size: 40px;"><span style="font-size: 37px;">Identificaton System</span></div>
        	</section>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="search_profile.php">START</a>  
    </div>
</header>
</div><div class="canvas" id="pt"></div>





<div id="login_admin" class="modal">
  
  <form class="modal-content animate" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('login_admin').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="container sp">
      <label for="admin_user"><b>Username</b></label>
      <input type="text" placeholder="Username *" autocomplete="off" onblur="if(this.value!='') this.style.backgroundColor='#e8f0fe';" name="admin_login_user" required><p id="user_err"></p>

      <label for="admin_pass"><b>Password</b></label>
      <input type="password" placeholder="Password *" autocomplete="off" onblur="if(this.value!='') this.style.backgroundColor='#e8f0fe';" id="login_pass1" name="admin_login_pass" required><i class="fa fa-eye" onmousedown="peekPassword(1);" onmouseup="unpeekPassword(1);" title="peek"></i><p id="pass_err"></p>
        
      <button type="submit" name="admin_submit" value="admin_submit" onclick="document.cookie='index_selected_modal=3';">Login</button>
      <!--<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
    </div>
    <!--<div class="container sp" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login_admin').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>-->
  </form>
</div>







<div id="change_login_admin" class="modal">
  
  <form class="modal-content animate"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('change_login_admin').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="container sp">
      <label for="admin_user"><b>New Username</b></label>
      <input type="text" placeholder="Username *" name="change_admin_user" autocomplete="off" onblur="if(this.value!='') this.style.backgroundColor='#e8f0fe';" required>

      <label for="admin_pass"><b>New Password</b></label>
      <input type="password" id="login_pass2" placeholder="Password *" name="change_admin_pass" autocomplete="off" onblur="if(this.value!='') this.style.backgroundColor='#e8f0fe';" required>
      <i class="fa fa-eye" onmousedown="peekPassword(2);" onmouseup="unpeekPassword(2);" title="peek"></i>

      <label for="admin_pass"><b>Confirm Password</b></label>
      <input type="password" id="login_pass3" placeholder="Confirm Password *" name="change_admin_pass" autocomplete="off" onblur="if(this.value!='') this.style.backgroundColor='#e8f0fe'; if(this.value != document.getElementById('login_pass2').value) this.style.borderColor='tomato'; else this.style.borderColor='#ccc';" required>
      <i class="fa fa-eye" onmousedown="peekPassword(3);" onmouseup="unpeekPassword(3);" title="peek"></i><p id="change_pass_err"></p>
        
      <button type="submit" name="admin_change_submit" onclick="if(document.getElementById('login_pass2').value != document.getElementById('login_pass3').value){this.type='button'; document.getElementById('change_pass_err').innerHTML='Passwords don\'t match';} else this.type='submit';">Save</button>
      <!--<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>-->
      <?php
      if(isset($_POST['admin_change_submit'])){    //modal to change the user name and password to update it
        $change_admin_user = $_POST['change_admin_user'];    
        $change_admin_pass = $_POST['change_admin_pass'];
        $_SESSION["username"] = $change_admin_user;
        $sql = "UPDATE admin SET admin_user='$change_admin_user', admin_password='$change_admin_pass' WHERE admin_type='Normal';";
        mysqli_query($conn, $sql);
      }
      ?>
    </div>
    <!--<div class="container sp" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login_admin').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>-->
  </form>
</div>

</html>
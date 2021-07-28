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

<main>


<!-- The View Profile Modal -->
<div id="Modal_ID_view" class="modal_sel_id_view">
  <!-- Modal content -->
  <div class="modal-content_view">
    <div class="modal_sel_id_header_view">
      <h3>Employee Profiles</h3>
      <span class="modal_close_view">&times;</span>
  </div>
    <div class="modal_view">
      <div class="modal-content" style="margin:0px;padding:20px 0px; height:480px;width:100%; border:none;">
      <table id="search_result_table" class="view_emp_profile">
        <tr>
          <th>Full Name</th>
          <th>Sex</th>
          <th>Phone Number</th>
          <th>Position / Title</th>
          <th>Modify</th>
        </tr>
      <?php      // view employee profile modal
      $sql = "SELECT emp_id,emp_fname,emp_mname,emp_lname,emp_gender,emp_tel1_num,emp_cur_position FROM employee ORDER BY emp_fname ASC, emp_mname ASC, emp_lname ASC;";

      if($res=mysqli_query($conn, $sql)) echo "";
      else echo "Unable to retrieve profile info: ".mysqli_error($conn);
      while($row = mysqli_fetch_array($res))
        echo '<tr>
              <td>'.$row["emp_fname"].' '.$row["emp_mname"].' '.$row["emp_lname"].'</td>
              <td>'.$row["emp_gender"].'</td>
              <td>'.$row["emp_tel1_num"].'</td>
              <td>'.$row["emp_cur_position"].'</td>
              <td><div class="search_table_icons">
                        <a href="#"><i class="fa fa-pencil ico_pencil" style="color:#0040d8;" onclick="openModal('.$row["emp_id"].',1);" title="Edit Profile"></i></a>
                        <a href="#" id="linkT"><i class="fa fa-trash-o ico_trash" style="color:red;" onclick="openModal('.$row["emp_id"].',2);" title="Delete Profile"></i></a>
                    </div></td>
              </tr>';
      /*echo '<div class="container search_profile">
        <table id="search_result_table">
            <tr>
                <td rowspan="3" style="width: 100px; text-align: center;"><img src="" class="search_result_img" alt="Profile Picture"></td>
                <td colspan="2" style="border-bottom: 1px solid #333;"><label>Name: </label><span>'.$row["emp_fname"].' '.$row["emp_mname"].' '.$row["emp_lname"].'</span></td>
                <td rowspan="3" style="width: 130px; text-align: center; padding: 15px;">
                    <div class="search_table_icons">
                        <a href="#"><i class="fa fa-pencil ico_pencil" style="color:#0040d8;" onclick="openModal('.$row["emp_id"].',1);" title="Edit Profile"></i></a>
                        <a href="" id="linkT"><i class="fa fa-trash-o ico_trash" style="color:red;" onclick="openModal('.$row["emp_id"].',2);" title="Delete Profile"></i></a>
                    </div>
                </td>
            </tr>
            <tr style="border-bottom: 1px solid #333;">
                <td><label>Sex: </label><span>'.$row["emp_gender"].'</span></td>
                <td><label>Phone N<emp style="text-decoration: underline;">o</emp>: </label><span>'.$row["emp_tel1_num"].'</span></td>
            </tr>
            <tr>
                <td colspan="2"><label>Position/Title: </label><span>'.$row["emp_cur_position"].'</span></td>
            </tr>
        </table>
         </div>';*/
      ?>
    </table>
  </div>
    </div>
  </div>
</div>



<!-- The New Modal -->
<div id="Modal_ID_new" class="modal_sel_id_new">
  <div class="modal-content_new">
    <div class="modal_sel_id_header_new">
      <h3>Register / Create New Employee's Profile</h3>
      <span class="modal_close_new">&times;</span>
    </div>
   <iframe src="new_profile_employee.php" name="frm"></iframe>
  </div>
</div>



<!-- The Edit Modal -->
<div id="Modal_ID_edit" class="modal_sel_id_edit">
  <div class="modal-content_edit">
    <div class="modal_sel_id_header_edit">
      <h3>Edit Employee's Profile</h3>
      <span class="modal_close_edit">&times;</span>
    </div>
   <iframe src="edit_employee_profile.php" name="frm"></iframe>
  </div>
</div>




<!-- The Delete Modal -->
<div id="Modal_ID_delete" class="modal_sel_id_delete">
  <!-- Modal content -->
  <div class="modal-content_delete">
    <div class="modal_sel_id_header_delete">
      <span class="modal_close_delete">&times;</span>
  </div>
    <div class="modal_question_delete">
      <h3>Are you sure you want to delete this profile?</h3>
      <a href="#" id="delete_no">No</a>
      <a href="#" id="delete_yes">Yes</a>
    </div>
    
    <div class="modal_ans_delete">  
      <?php        // deleting the employee profile
        if(isset($_COOKIE['index_delete_modal'])){
          $sql =  "DELETE FROM employee WHERE emp_id=".$_COOKIE['index_mod_id'];
          if(mysqli_query($conn, $sql))
            echo "Profile Deleted"; // making the cookie exprire
          echo '<script>document.cookie = "index_delete_modal=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";   
          window.location.reload();</script>';
          //setcookie("index_delete_modal", "0");
        }
      ?>
      <h3>Profile Deleted!</h3>
      <a href="#" id="delete_ok">OK</a>
    </div>
  </div>
</div>






</main>





<footer style="padding: 5px;">
    <div class="container" style="text-align: center; color: #222;">
    	<span class="copyright">Copyright&nbsp;&copy; 2020  |  All Rights Reserved</span>
    	<!--<ul class="list-inline quicklinks">
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="#">Terms of Use</a></li>
        </ul>-->
    </div>
</footer>

<script>

  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal_login = document.getElementById('login_admin');
    if (event.target == modal_login) {
        modal_login.style.display = "none";
    }
    var modal_change = document.getElementById('change_login_admin');
    if (event.target == modal_change) {
      modal_change.style.display = "none";
    }
}
function lockAdmin(){
  document.cookie = 'admin_lock=lock';
  window.location.assign("index.php");
}
function unlockAdmin(){
  <?php
    if(isset($_POST['admin_submit'])){
      for($j=1; $j<=2; $j++){// the second run is to check the master user and password
      if($_POST['admin_login_user'] == $admin['admin_user'] && $_POST['admin_login_pass'] == $admin['admin_password']){
          echo "
          document.getElementById('admin_lock').style.visibility = 'hidden';
          document.getElementById('admin_lock_icon').style.display = 'none';
          document.getElementById('admin_unlock').style.visibility = 'visible';
           document.getElementById('admin_unlock_icon').style.display = 'inline-block';

           var d = new Date();
           d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
           document.cookie = 'admin_lock=unlock;expires='+d.toUTCString()+';';

           document.cookie = 'index_selected_modal=0';
           window.location.assign('index.php');
           ";
           break;
      }
      else if($_POST['admin_login_user'] != $admin['admin_user'] && $_POST['admin_login_pass'] == $admin['admin_password']){
        echo "
          document.getElementById('user_err').innerHTML = 'Incorrect Username';
           ";
           break;
      }
      else if($_POST['admin_login_user'] == $admin['admin_user'] && $_POST['admin_login_pass'] != $admin['admin_password']){
        echo "
          document.getElementById('pass_err').innerHTML = 'Incorrect Password';
           ";
           break;
      }
      else{
        echo "
          document.getElementById('user_err').innerHTML = 'Incorrect Username';
          document.getElementById('pass_err').innerHTML = 'Incorrect Password';
           ";
      }
      //echo "window.location.assign('index.php');";

      //set $admin to the master user and password
      $sql = "SELECT admin_user, admin_password FROM admin WHERE admin_type='Master'";
      if($admin = mysqli_fetch_array(mysqli_query($conn, $sql))) echo "";
    }
    }

    if(isset($_COOKIE['admin_lock']) and $_COOKIE['admin_lock']=='unlock'){
      echo "
      document.getElementById('admin_lock').style.visibility = 'hidden';
      document.getElementById('admin_lock_icon').style.display = 'none';
      document.getElementById('admin_unlock').style.visibility = 'visible';
      document.getElementById('admin_unlock_icon').style.display = 'inline-block';";
    }
    else{
      echo "
      document.getElementById('admin_lock').style.visibility = 'visible';
      document.getElementById('admin_lock_icon').style.display = 'inline-block';
      document.getElementById('admin_unlock').style.visibility = 'hidden';
      document.getElementById('admin_unlock_icon').style.display = 'none';";
    }
  ?>
  /*document.getElementById('admin_lock').style.visibility = 'hidden';
  document.getElementById('admin_lock_icon').style.display = 'none';
  document.getElementById('admin_unlock').style.visibility = 'visible';
   document.getElementById('admin_unlock_icon').style.display = 'inline-block';*/
}
function peekPassword(i){
  document.getElementById('login_pass'+i).type="text";
}
function unpeekPassword(i){
  document.getElementById('login_pass'+i).type="password";
}
//*****************************************************

function newEmployeeProfile(){
  document.getElementById('Modal_ID_view').style.display="none";
  document.getElementById('change_login_admin').style.display="none";
  document.getElementById('Modal_ID_edit').style.display = "none";

  var modal = document.getElementById('Modal_ID_new');
  modal.style.display = "block";
  var span = document.getElementsByClassName("modal_close_new")[0];
  span.onclick = function() {
    modal.style.display = "none";
    window.location.reload();
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    window.location.reload();
    }
  }
}

function viewEmployeeProfiles(){
  document.getElementById('Modal_ID_new').style.display="none";
  document.getElementById('change_login_admin').style.display="none";
  document.getElementById('Modal_ID_edit').style.display = "none";

  var modal = document.getElementById('Modal_ID_view');
  modal.style.display = "block";
  var span = document.getElementsByClassName("modal_close_view")[0];
  span.onclick = function() {
    modal.style.display = "none";
    window.location.reload();
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    window.location.reload();
    }
  }
}

function editEmployeeProfile(){
  var modal = document.getElementById('Modal_ID_edit');
  modal.style.display = "block";
  var span = document.getElementsByClassName("modal_close_edit")[0];
  span.onclick = function() {
    modal.style.display = "none";
    window.location.reload("index.php");
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    window.location.reload("index.php");
    }
  }
}

function deleteEmployeeProfile(){
  var modal_del = document.getElementById('Modal_ID_delete');
  modal_del.style.display = "block";
  document.getElementsByClassName("modal_close_delete")[0].onclick = function() {
    modal_del.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal_del) {
      modal_del.style.display = "none";
    }
  }
  document.getElementById('delete_no').onclick = function(){
    modal_del.style.display = "none";
  }
  document.getElementById('delete_yes').onclick = function(event){ 
    document.cookie = "index_delete_modal=delete";
    window.onclick = function(event) {
      if (event.target != document.getElementById('delete_yes')) {
        modal_del.style.display = "none";
        window.location.reload("index.php");
      }
    }
    document.getElementsByClassName("modal_question_delete")[0].style.display = "none";
    document.getElementsByClassName("modal_ans_delete")[0].style.display = "block";
    document.getElementsByClassName("modal-content_delete")[0].style.width = '45%';
  }
  document.getElementById('delete_ok').onclick = function(){
    //window.location.reload("index.php");
    document.getElementsByClassName("modal-content_delete")[0].style.width = '55%';
    document.getElementsByClassName("modal_question_delete")[0].style.display = "block";
    document.getElementsByClassName("modal_ans_delete")[0].style.display = "none";
    modal_del.style.display = "none";
  }
}



function loadIndex(){
   unlockAdmin();
  //window.scrollBy(0, 140);
  var select_modal = "<?php if(isset($_COOKIE['index_selected_modal']))echo $_COOKIE['index_selected_modal'];?>";
  if(select_modal == '1'){
    editEmployeeProfile();
    document.cookie = "index_selected_modal="+0;
  }
  if(select_modal == '2'){
    viewEmployeeProfiles();
    deleteEmployeeProfile();
    document.cookie = "index_selected_modal="+0;
  }
  if(select_modal == '3'){
    document.cookie = "index_selected_modal="+0;
    document.getElementsByClassName('animate')[0].style.animation='none';
    document.getElementById('login_admin').style.display='block';
  }
}

function openModal(cur_emp_id, select_modal){
  //SET COOKIE to the selected icon(modal)
  document.cookie = "index_selected_modal="+select_modal;
  //Set COOKIE to the selected profile's res_id--------------
  document.cookie = "index_mod_id="+cur_emp_id;
  //var x = document.cookie;
  //document.getElementById('demo').innerHTML="ALL COOKIES:"+x;
  window.location.reload();
  //--------------------------------------------------------
}

</script>


</html>
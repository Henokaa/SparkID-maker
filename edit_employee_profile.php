<!DOCTYPE html>
<html>
<head>
	<title>Employee's Profile</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_main.css">
	<style type="text/css">
		*{
			box-sizing: border-box;
		}
		body{
			margin: 0;
			background-color: #FFF;
		}
     main.new_resident_profile{
      width: 100%;
      background-color: #FFF;
      margin: auto;
      margin-bottom: 30px;
      padding: 0px;
      box-shadow: none;/*5px 8px 10px 10px rgba(0,0,0,0.2); */
    }
    h1.create_profile_title{
      font-size:28px; 
      color:#333; 
      text-shadow: 2px 2px rgba(0,0,0,0.3);
      padding: 15px 80px;
      margin-left: 30px;
      width: 100%;
      background-color: #47a8ca;/*#EEE*/
      border-radius: 0px 0px 5px 5px;
    }
    h3.profile_form_info{
      font-size:25px;
      color: #47ca7f;
      margin:30px 40px;
    }
    span.profile_form_info_number{
      background-color: #47ca7f;
      color: #F7F7F7;
      padding: 2px 7px;
      border-radius: 5px;
    }
    form input.profile_ip,form .profile_dob,form select.profile_select{
      float: left;
      margin-right: 5px;
      height: 30px;
      text-transform: capitalize;
      border-color: #FFF;
      background-color: #F7F7F7;
      color: #000;
    }
    form input.profile_ip:focus{
      border: 1px solid #47ca7f;
      background-color: #F7F7F7;/*#f4e5b2;*/
      border-radius: 0px;
      color: #222;
      border-left: 3px solid #47ca7f;
    }
    div.profile_moreinfo{
      background-color: #DFD;
      border-radius: 5px;
      margin-left: 30px;
      padding: 15px 30px;
      padding-bottom: 1px;
    }
    div.upload_photo, input._photo{
      right: 6%;
    }
	</style>
</head>
<body>
<?php
  include 'mysqli_connect.php';
  $sql = "SELECT *,DAY(emp_dob),MONTH(emp_dob),YEAR(emp_dob),DAY(emp_unemp_date),MONTH(emp_unemp_date),YEAR(emp_unemp_date) FROM employee WHERE emp_id=".$_COOKIE['index_mod_id'].";";

        if($res=mysqli_query($conn, $sql)) echo "";
        else echo "Couldn't retrieve profile information: ".mysqli_error($conn);

        $row = mysqli_fetch_array($res);

if (($_SERVER["REQUEST_METHOD"] == "POST") and isset($_POST['emp_submit'])) {
  $emp_fname = $_POST['emp_fname'];
  $emp_mname = $_POST['emp_mname'];
  $emp_lname = $_POST['emp_lname'];
  $emp_gender = $_POST['emp_gender'];
  $emp_dob = $_POST['emp_dob_year'].'-'.$_POST['emp_dob_month'].'-'.$_POST['emp_dob_day'];
  $emp_tel1_type = $_POST['emp_tel1_type'];
  $emp_tel1_num = $_POST['emp_tel1_num'];
  $emp_tel2_type = $_POST['emp_tel2_type'];
  $emp_tel2_num = $_POST['emp_tel2_num'];
  $emp_marital = $_POST['emp_marital'];
  $emp_spouse_fname = $_POST['emp_spouse_fname'];
  $emp_spouse_lname = $_POST['emp_spouse_lname'];
  $emp_spouse_tel_type = $_POST['emp_spouse_tel_type'];
  $emp_spouse_tel_num = $_POST['emp_spouse_tel_num'];
  $emp_num_ch = $_POST['emp_num_ch'];
  $emp_init_position = $_POST['emp_init_position'];
  $emp_contract = $_POST['emp_contract'];
  $emp_init_salary = $_POST['emp_init_salary'];
  $emp_cur_position = $_POST['emp_cur_position'];
  $emp_status = $_POST['emp_status'];
  $emp_cur_salary = $_POST['emp_cur_salary'];
  $emp_unemp_date = $_POST['emp_unemp_year'].'-'.$_POST['emp_unemp_month'].'-'.$_POST['emp_unemp_day'];
  $emp_unemp_reason = $_POST['emp_unemp_reason'];
  //$emp_user = $_POST['emp_user'];
  $emp_pass = $_POST['emp_pass'];


  $sql = "UPDATE employee SET emp_fname='$emp_fname',emp_mname='$emp_mname',emp_lname='$emp_lname',emp_gender='$emp_gender',emp_dob='$emp_dob',emp_tel1_type='$emp_tel1_type',emp_tel1_num='$emp_tel1_num',emp_tel2_type='$emp_tel2_type',emp_tel2_num='$emp_tel2_num',emp_marital='$emp_marital',emp_spouse_fname='$emp_spouse_fname',emp_spouse_lname='$emp_spouse_lname',emp_spouse_tel_type='$emp_spouse_tel_type',emp_spouse_tel_num='$emp_spouse_tel_num',emp_num_ch='$emp_num_ch',emp_init_position='$emp_init_position',emp_contract='$emp_contract',emp_init_salary='$emp_init_salary',emp_cur_position='$emp_cur_position',emp_status='$emp_status',emp_cur_salary='$emp_cur_salary',emp_unemp_date='$emp_unemp_date',emp_unemp_reason='$emp_unemp_reason',emp_pass='$emp_pass' WHERE emp_id=".$_COOKIE['index_mod_id'].";";
   

  if(mysqli_query($conn, $sql)) echo "<p style='text-align:center; font-weight:bold; background-color:#47a8ca; margin-top:10px; font-size:20px;'>Profile Edited</p>";
  else echo 'Error: '.mysqli_error($conn);
  
//echo "<script>window.location.assign('edit_employee_profile.php');</script>";
}
?>

</body>
</html>
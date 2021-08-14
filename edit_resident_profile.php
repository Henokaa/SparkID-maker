<!DOCTYPE html>
<html>
<head>
	<title>Resident's Profile</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_main.css">
	<style type="text/css">
		*{
			box-sizing: border-box;
		}
		body{
			margin: 0;
      padding: 0px 10px;
			/*background-color: #82868a;*/
		}
		/*main{
			position: absolute;
			overflow: hidden;
			top: 10px;
			margin-top: 35px;
			padding: 15px;
			height: 110%;
		}*/
    
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
      color:#47a8ca;
      margin:30px 40px;
    }
    span.profile_form_info_number{
      background-color: #47a8ca;
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
      border-color: #FFF;
      background-color: #F7F7F7;/*#f4e5b2;*/
      border-radius: 0px;
      color: #222;
      border-left: 3px solid #47a8ca;
    }
    div.profile_moreinfo{
      background-color: rgba(71,168,202,0.3);
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
        $sql = "SELECT *,DAY(res_dob),MONTH(res_dob),YEAR(res_dob) FROM resident WHERE res_id=".$_COOKIE['mod_id'].";";

        if($res=mysqli_query($conn, $sql)) echo 'Profile Information Retrieved';
        else echo "Couldn't retrieve profile information: ".mysqli_error($conn);

        $row = mysqli_fetch_array($res);
?>

<main class="new_resident_profile">
	<!--<h1 class="create_profile_title">EDIT RESIDENT'S PROFILE</h1>-->
<div class="container">
	
	<h3 class="profile_form_info"><span class="profile_form_info_number">1</span> Personal Information</h3>

  <form method="post" action="res_config_edit.php" enctype="multipart/form-data">
  	<div class="upload_photo">
    <input type="file" name="res_photo" value="<?php echo $row['res_photo_name'];?>" class="_photo" style="opacity:0; width:160px; height:140px; z-index:1;" onchange="changePic(this);">
    	<img src="<?php echo $row['res_photo_name'];?>" id="pro_pic" alt="Resident's Photo" accept="image/gif, image/jpeg, image/jpg, image/png, image/ico" style="width: 140px; max-height: 120px;">
    	<div class="img_overlay" style="font-size:15px; font-weight:bold;">Upload Photo</div>
    </div>
    <script>
          function changePic(input) 
          {
                if (input.files && input.files[0]) 
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#pro_pic')
                          .attr('src', e.target.result)
                          //.height(200);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
          }
        </script>
  	<div class="form-group">
  		<span class="profile_la req">Full Name:</span>
  		<input type="text" name="res_fname" value="<?php echo $row['res_fname'];?>" class="form-control profile_ip" placeholder="First *" autocomplete="off" style="width: 22%;" required>
  		<input type="text" name="res_mname" class="form-control profile_ip" placeholder="Middle *" value="<?php echo $row['res_mname'];?>" autocomplete="off" style="width: 22%;" required>
  		<input type="text" name="res_lname" value="<?php echo $row['res_lname'];?>" class="form-control profile_ip" placeholder="Last *" autocomplete="off" style="width: 22%;" required>
  	</div>
  	<div class="form-group">
  		<span class="profile_la req">Gender:</span>
	  	<div class="profile_radio">
	  		<div class="custom-control custom-radio">
			  <input type="radio" name="res_gender" value="Male" class="custom-control-input" id="ResidentRadioMale" required>
			  <label class="custom-control-label" for="ResidentRadioMale">Male</label>
			</div> 
			<div class="custom-control custom-radio">
			  <input type="radio" name="res_gender" value="Female" class="custom-control-input" id="ResidentRadioFemale">
			  <label class="custom-control-label" for="ResidentRadioFemale">Female</label>
			</div> 
		</div>
	</div>
	<div class="form-group">
		<span class="profile_la req">Date of Birth:</span>
    <input type="number" name="res_dob_day" value="<?php echo $row['DAY(res_dob)'];?>" class="form-control profile_ip" placeholder="Day" autocomplete="off" style="width: 8%;" required>
		<!--<select class="custom-select custom-select-sm mb-3 profile_dob" id="dayOption" style="width: 13%;">
	      	<option style="display: none;">Day</option>
	    </select>-->
	   <select name="res_dob_month" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 22%;" required>
	    <option value="" style="display: none;">Month</option>
			<option id="m1" value="1">January</option>
			<option id="m2" value="2">February</option>
			<option id="m3" value="3">March</option>
			<option id="m4" value="4">April</option>
			<option id="m5" value="5">May</option>
			<option id="m6" value="6">June</option>
			<option id="m7" value="7">July</option>
			<option id="m8" value="8">August</option>
			<option id="m9" value="9">September</option>
			<option id="m10" value="10">October</option>
			<option id="m11" value="11">November</option>
			<option id="m12" value="12">December</option>
	   </select>
	    <!--<select class="custom-select custom-select-sm mb-3 profile_dob" id="yearOption" style="width: 18%;">
	    	<option style="display: none;">Year</option>
	    </select>-->
    <input type="number" name="res_dob_year" value="<?php echo $row['YEAR(res_dob)'];?>" class="form-control profile_ip" placeholder="Year" autocomplete="off" style="width: 11%;" required>
  		<!--<input type="date" name="">-->
  	</div>
	<div class="form-group">
    	<span class="profile_la req">Birth Place: </span>
    	<input type="text" name="res_pob" value="<?php echo $row['res_pob'];?>" class="form-control profile_ip" placeholder="Birth Place *" autocomplete="off" style="width: 25%; margin-right: 30px;" required>
		<span class="profile_la req">Nationality:</span>
	    <select name="res_nationality" class="form-control profile_select" style="width:20%;">
	      	<option value="Ethiopian">Ethiopian</option>
			   <option id="oth" value="Other">Other</option>
	    </select>
  	</div>
  	<br />
    <div class="form-group">
    	<span class="profile_la req">Phone Number  &nbsp;1:</span>
    	<select name="res_tel1_type" class="form-control profile_select phone_select">
  			<option id="mob1" value="Mobile">Mobile</option>
  			<option id="hom1" value="Home">Home</option>
  			<option id="wor1" value="Work">Work</option>
  			<option id="alt1" value="Alternate">Alternate</option>
  		</select>
    	<input type="tel" name="res_tel1_num" value="<?php echo $row['res_tel1_num'];?>" class="form-control profile_ip" id="phone_input1" onclick="(this.value=='')?this.value='+251-':true;" onkeypress="phone_change('phone_input1');" placeholder="Phone Number 1*" maxlength="16" autocomplete="off" style="width: 30%;" onblur="if(this.value=='+251-')this.value=''"required>
    </div>
    <div class="form-group">
    	<span class="profile_la" style="margin-left: 103px; margin-right: 25px;"> &nbsp;2:</span>
    	<select name="res_tel2_type" class="form-control profile_select phone_select">
  			<option id="mob2" value="Mobile">Mobile</option>
        <option id="hom2" value="Home">Home</option>
        <option id="wor2" value="Work">Work</option>
        <option id="alt2" value="Alternate">Alternate</option>
  		</select>
    	<input type="tel" name="res_tel2_num" value="<?php echo $row['res_tel2_num'];?>" class="form-control profile_ip" id="phone_input2" onclick="(this.value=='')?this.value='+251-':true;" onkeypress="phone_change('phone_input2');" placeholder="Phone Number 2" maxlength="16" autocomplete="off" style="width:30%;" onblur="if(this.value=='+251-')this.value=''">
    </div>
    <div class="form-group">
    <span class="profile_la">Occupation: </span>
    <select name="res_work" class="form-control profile_select" style="width:24%;">
      <option value="-"> &nbsp;-</option>
      <option id="stu" value="Student">Student</option>
      <option id="gov" value="Government Worker">Government Worker</option>
      <option id="ngo" value="NGO Worker">NGO Worker</option>
      <option id="pri" value="Private Worker">Private Worker</option>
      </select>
    </div>
    <h3 class="profile_form_info clearfix"><span class="profile_form_info_number">2</span> Family Information</h3>
    <div class="form-group">
  		<span class="profile_la req">Mother's Name:</span>
  		<input type="text" name="res_mom_fname" value="<?php echo $row['res_mom_fname'];?>" class="form-control profile_ip" placeholder="First *" autocomplete="off" style="width: 29%;" required>
  		<input type="text" name="res_mom_lname" value="<?php echo $row['res_mom_lname'];?>" class="form-control profile_ip" placeholder="Last *"  autocomplete="off" style="width: 29%;" required>
  	</div>
  	<div class="form-group">
    	<span class="profile_la">Mother's Phone Number: </span>
    	<select name="res_mom_tel_type" class="form-control profile_select phone_select">
  			<option id="mob3" value="Mobile">Mobile</option>
        <option id="hom3" value="Home">Home</option>
        <option id="wor3" value="Work">Work</option>
        <option id="alt3" value="Alternate">Alternate</option>
  		</select>
    	<input type="tel" name="res_mom_tel_num" value="<?php echo $row['res_mom_tel_num'];?>" class="form-control profile_ip" id="phone_input3" onclick="(this.value=='')?this.value='+251-':true;" onkeypress="phone_change('phone_input3');" placeholder="Phone Number" maxlength="16" autocomplete="off" style="width: 30%;" onblur="if(this.value=='+251-')this.value=''">
    </div>
    <br />
    <div class="form-group">
		<span class="profile_la req">Marital Status of Resident: </span>
		<select name="res_marital" class="form-control profile_select" onclick="if(this.value=='Married')document.getElementById('spouse').style.display='block'; else document.getElementById('spouse').style.display='none'" style="width:22%;">
	    <option value="" style="display: none;"></option>
	  	<option id="nmar" value="Not Married">Not Married</option>
			<option id="mar" value="Married">Married</option>
			<option id="div" value="Divorced">Divorced</option>
			<option id="wid" value="Widowed">Widowed</option>
	    </select>
  	</div>
  	<div class="profile_moreinfo nodisp" id="spouse">
    <div class="form-group">
  		<span class="profile_la">Spouse's Name:</span>
  		<input type="text" name="res_spouse_fname" value="<?php echo $row['res_spouse_fname'];?>" class="form-control profile_ip" placeholder="First"  autocomplete="off" style="width: 29%;">
  		<input type="text" name="res_spouse_lname" value="<?php echo $row['res_spouse_lname'];?>" class="form-control profile_ip" placeholder="Last"  autocomplete="off" style="width: 29%; float: left;">
  	</div>
  	<div class="form-group">
    	<span class="profile_la">Spouse's Phone Number: </span>
    	<select name="res_spouse_tel_type" class="form-control profile_select phone_select" style="width:15%; height:25px;">
  			<option id="mob4" value="Mobile">Mobile</option>
        <option id="hom4" value="Home">Home</option>
        <option id="wor4" value="Work">Work</option>
        <option id="alt4" value="Alternate">Alternate</option>
  		</select>
    	<input type="tel" name="res_spouse_tel_num" value="<?php echo $row['res_spouse_tel_num'];?>" class="form-control profile_ip" id="phone_input4" onclick="(this.value=='')?this.value='+251-':true;" onkeypress="phone_change('phone_input4');" placeholder="Phone Number" maxlength="16" autocomplete="off" style="width: 30%;" onblur="if(this.value=='+251-')this.value=''">
    </div>
	</div>
    <br />


<!--*************************************************************-->




    <div class="form-group">
    	<span class="profile_la req">Current Number of Children:</span>
    	<!--<input type="text" class="form-control profile_ip" autocomplete="off" style="float: left; width: 15%;" onfocus="this.style.width='35%';" onblur="this.style.width='28%';" required>-->
    	<select name="res_num_ch" class="form-control profile_select" style="width:9%;" onclick="childrenProfile(this.value);">
    		<option value="0">0</option>
  			<option id="ch1" value="1">1</option>
  			<option id="ch2" value="2">2</option>
  			<option id="ch3" value="3">3</option>
  			<option id="ch4" value="4">4</option>
  			<option id="ch5" value="5">5</option>
  			<!--<option value="6">6</option>
  			<option value="7">7</option>
  			<option value="8">8</option>
  			<option value="9">9</option>
  			<option value="10">10</option>-->
  			<option id="chgt5" value="5.5">&gt;5</option>
  		</select>
    </div>

    <div class="profile_moreinfo nodisp" id="child1">
    <div class="form-group">
  		<span class="profile_la profile_moreinfo_title">First Child's Information</span>
  		<span class="profile_la">Child's Name:</span>
  		<input type="text" name="res_ch1_fname" value="<?php echo $row['res_ch1_fname'];?>" class="form-control profile_ip" placeholder="First" autocomplete="off" style="width: 29%;">
  		<input type="text" name="res_ch1_lname" value="<?php echo $row['res_ch1_lname'];?>" class="form-control profile_ip" placeholder="Last" autocomplete="off" style="width: 29%;">
  	</div>
  	<div class="form-group">
  		<span class="profile_la">Child's Gender: </span>
	  	<div class="profile_radio" style="margin-right: 60px;">
	  		<div class="custom-control custom-radio">
			  <input type="radio" name="res_ch1_gender" value="Male" class="custom-control-input" id="ChildRadioMale1"> 
			  <label class="custom-control-label" for="ChildRadioMale1" required>Male</label>
			</div> 
			<div class="custom-control custom-radio">
			  <input type="radio" name="res_ch1_gender" value="Female" class="custom-control-input" id="ChildRadioFemale1">
			  <label class="custom-control-label" for="ChildRadioFemale1">Female</label>
			</div>
      <input type="radio" name="res_ch1_gender" style="display:none;" checked>
		</div>
		<span class="profile_la">Child's Age:</span>
		<input type="text" name="res_ch1_age" value="<?php echo date('Y')-$row['res_ch1_age'];?>" class="form-control profile_ip" placeholder="Age" autocomplete="off" style="width: 8%;" onfocus="this.style.width='10%';" onblur="this.style.width='8%';">
	</div>
	<div class="form-group">
    	<span class="profile_la">Child's Birth Place:</span>
    	<input type="text" name="res_ch1_pob" value="<?php echo $row['res_ch1_pob'];?>" class="form-control profile_ip" placeholder="Birth Place" autocomplete="off" style="width: 25%; margin-right: 10px;">
    	<span class="profile_la">Relation to Child:</span>
	    <select name="res_ch1_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 20%;">
	       <option id="bl1" value="By Blood">By Blood</option>
			   <option id="st1" value="Step Child">Step Child</option>
			   <option id="ad1" value="Adopted">Adopted</option>
			   <option id="ot1" value="Other Relative">Other Relative</option>
	    </select>
    </div>
  </div>

  <div class="profile_moreinfo nodisp" id="child2">
    <div class="form-group">
      <span class="profile_la profile_moreinfo_title">Second Child's Information</span>
      <span class="profile_la">Child's Name:</span>
      <input type="text" name="res_ch2_fname" value="<?php echo $row['res_ch2_fname'];?>" class="form-control profile_ip" placeholder="First" autocomplete="off" style="width: 29%;">
      <input type="text" name="res_ch2_lname" value="<?php echo $row['res_ch2_lname'];?>" class="form-control profile_ip" placeholder="Last" autocomplete="off" style="width: 29%;">
    </div>
    <div class="form-group">
      <span class="profile_la">Child's Gender: </span>
      <div class="profile_radio" style="margin-right: 60px;">
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioMale2" name="res_ch2_gender" value="Male">
        <label class="custom-control-label" for="ChildRadioMale2" required>Male</label>
      </div> 
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioFemale2" name="res_ch2_gender" value="Female">
        <label class="custom-control-label" for="ChildRadioFemale2">Female</label>
      </div>
      <input type="radio" name="res_ch2_gender" style="display:none;" checked> 
    </div>
    <span class="profile_la">Child's Age:</span>
    <input type="text" name="res_ch2_age" value="<?php echo date('Y')-$row['res_ch2_age'];?>" class="form-control profile_ip" placeholder="Age" autocomplete="off" style="width: 8%;" onfocus="this.style.width='10%';" onblur="this.style.width='8%';">
  </div>
  <div class="form-group">
      <span class="profile_la">Child's Birth Place:</span>
      <input type="text" name="res_ch2_pob" value="<?php echo $row['res_ch2_pob'];?>" class="form-control profile_ip" placeholder="Birth Place" autocomplete="off" style="width: 25%; margin-right: 10px;">
      <span class="profile_la">Relation to Child:</span>
      <select name="res_ch2_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 20%;">
         <option id="bl2" value="By Blood">By Blood</option>
         <option id="st2" value="Step Child">Step Child</option>
         <option id="ad2" value="Adopted">Adopted</option>
         <option id="ot2" value="Other Relative">Other Relative</option>
      </select>
    </div>
  </div>

  <div class="profile_moreinfo nodisp" id="child3">
    <div class="form-group">
      <span class="profile_la profile_moreinfo_title">Third Child's Information</span>
      <span class="profile_la">Child's Name:</span>
      <input type="text" name="res_ch3_fname" value="<?php echo $row['res_ch3_fname'];?>" class="form-control profile_ip" placeholder="First" autocomplete="off" style="width: 29%;">
      <input type="text" name="res_ch3_lname" value="<?php echo $row['res_ch3_lname'];?>" class="form-control profile_ip" placeholder="Last" autocomplete="off" style="width: 29%;">
    </div>
    <div class="form-group">
      <span class="profile_la">Child's Gender: </span>
      <div class="profile_radio" style="margin-right: 60px;">
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioMale3" name="res_ch3_gender" value="Male">
        <label class="custom-control-label" for="ChildRadioMale3" required>Male</label>
      </div> 
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioFemale3" name="res_ch3_gender" value="Female">
        <label class="custom-control-label" for="ChildRadioFemale3">Female</label>
      </div>
      <input type="radio" name="res_ch3_gender" style="display:none;" checked>
    </div>
    <span class="profile_la">Child's Age:</span>
    <input type="text" name="res_ch3_age" value="<?php echo date('Y')-$row['res_ch3_age'];?>" class="form-control profile_ip" placeholder="Age" autocomplete="off" style="width: 8%;" onfocus="this.style.width='10%';" onblur="this.style.width='8%';">
  </div>
  <div class="form-group">
      <span class="profile_la">Child's Birth Place:</span>
      <input type="text" name="res_ch3_pob" value="<?php echo $row['res_ch3_pob'];?>" class="form-control profile_ip" placeholder="Birth Place" autocomplete="off" style="width: 25%; margin-right: 10px;">
      <span class="profile_la">Relation to Child:</span>
      <select name="res_ch3_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 20%;">
         <option id="bl3" value="By Blood">By Blood</option>
         <option id="st3" value="Step Child">Step Child</option>
         <option id="ad3" value="Adopted">Adopted</option>
         <option id="ot3" value="Other Relative">Other Relative</option>
      </select>
    </div>
  </div>

  <div class="profile_moreinfo nodisp" id="child4">
    <div class="form-group">
      <span class="profile_la profile_moreinfo_title">Fourth Child's Information</span>
      <span class="profile_la">Child's Name:</span>
      <input type="text" name="res_ch4_fname" value="<?php echo $row['res_ch4_fname'];?>" class="form-control profile_ip" placeholder="First" autocomplete="off" style="width: 29%;">
      <input type="text" name="res_ch4_lname" value="<?php echo $row['res_ch4_lname'];?>" class="form-control profile_ip" placeholder="Last" autocomplete="off" style="width: 29%;">
    </div>
    <div class="form-group">
      <span class="profile_la">Child's Gender: </span>
      <div class="profile_radio" style="margin-right: 60px;">
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioMale4" name="res_ch4_gender" value="Male">
        <label class="custom-control-label" for="ChildRadioMale4" required>Male</label>
      </div> 
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioFemale4" name="res_ch4_gender" value="Female">
        <label class="custom-control-label" for="ChildRadioFemale4">Female</label>
      </div>
      <input type="radio" name="res_ch4_gender" style="display:none;" checked>
    </div>
    <span class="profile_la">Child's Age:</span>
    <input type="text" name="res_ch4_age" value="<?php echo date('Y')-$row['res_ch4_age'];?>" class="form-control profile_ip" placeholder="Age" autocomplete="off" style="width: 8%;" onfocus="this.style.width='10%';" onblur="this.style.width='8%';">
  </div>
  <div class="form-group">
      <span class="profile_la">Child's Birth Place:</span>
      <input type="text" name="res_ch4_pob" value="<?php echo $row['res_ch4_pob'];?>" class="form-control profile_ip" placeholder="Birth Place" autocomplete="off" style="width: 25%; margin-right: 10px;">
      <span class="profile_la">Relation to Child:</span>
      <select name="res_ch4_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 20%;">
         <option id="bl4" value="By Blood">By Blood</option>
         <option id="st4" value="Step Child">Step Child</option>
         <option id="ad4" value="Adopted">Adopted</option>
         <option id="ot4" value="Other Relative">Other Relative</option>
      </select>
    </div>
  </div>

  <div class="profile_moreinfo nodisp" id="child5">
    <div class="form-group">
      <span class="profile_la profile_moreinfo_title">Fifth Child's Information</span>
      <span class="profile_la">Child's Name:</span>
      <input type="text" name="res_ch5_fname" value="<?php echo $row['res_ch5_fname'];?>" class="form-control profile_ip" placeholder="First" autocomplete="off" style="width: 29%;">
      <input type="text" name="res_ch5_lname" value="<?php echo $row['res_ch5_lname'];?>" class="form-control profile_ip" placeholder="Last" autocomplete="off" style="width: 29%;">
    </div>
    <div class="form-group">
      <span class="profile_la">Child's Gender: </span>
      <div class="profile_radio" style="margin-right: 60px;">
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioMale5" name="res_ch5_gender" value="Male">
        <label class="custom-control-label" for="ChildRadioMale5" required>Male</label>
      </div> 
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="ChildRadioFemale5" name="res_ch5_gender" value="Female">
        <label class="custom-control-label" for="ChildRadioFemale5">Female</label>
      </div>
      <input type="radio" name="res_ch5_gender" style="display:none;" checked>
    </div>
    <span class="profile_la">Child's Age:</span>
    <input type="text" name="res_ch5_age" value="<?php echo date('Y')-$row['res_ch5_age'];?>" class="form-control profile_ip" placeholder="Age" autocomplete="off" style="width: 8%;" onfocus="this.style.width='10%';" onblur="this.style.width='8%';">
  </div>
  <div class="form-group">
      <span class="profile_la">Child's Birth Place:</span>
      <input type="text" name="res_ch5_pob" value="<?php echo $row['res_ch5_pob'];?>" class="form-control profile_ip" placeholder="Birth Place" autocomplete="off" style="width: 25%; margin-right: 10px;">
      <span class="profile_la">Relation to Child:</span>
      <select name="res_ch5_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 20%;">
         <option id="bl5" value="By Blood">By Blood</option>
         <option id="st5" value="Step Child">Step Child</option>
         <option id="ad5" value="Adopted">Adopted</option>
         <option id="ot5" value="Other Relative">Other Relative</option>
      </select>
    </div>
  </div>




<!--*************************************************************-->

    

    <h3 class="profile_form_info"><span class="profile_form_info_number">3</span> Emergency Contact</h3>
    <div class="profile_moreinfo">
    <div class="form-group">
      <span class="profile_la req">Emergency Contact's Name: </span>
      <input type="text" name="res_emcon_fname" value="<?php echo $row['res_emcon_fname'];?>" class="form-control profile_ip" placeholder="First Name *" autocomplete="off" style="width: 25%;" onfocus="this.style.width='32%';" onblur="this.style.width='25%';" required>
      <input type="text" name="res_emcon_lname" value="<?php echo $row['res_emcon_lname'];?>" class="form-control profile_ip" placeholder="Last Name *" autocomplete="off" style="width: 25%;" onfocus="this.style.width='32%';" onblur="this.style.width='25%';" required>
    </div>
    <div class="form-group">
      <span class="profile_la req">Phone Number: </span>
      <select name="res_emcon_tel_type" class="form-control profile_select phone_select" style="width:15%; height:25px;">
        <option id="mob5" value="Mobile">Mobile</option>
        <option id="hom5" value="Home">Home</option>
        <option id="wor5" value="Work">Work</option>
        <option id="alt5" value="Alternate">Alternate</option>
      </select>
      <input type="tel" name="res_emcon_tel_num" value="<?php echo $row['res_emcon_tel_num'];?>" class="form-control profile_ip" id="phone_input5" onclick="(this.value=='')?this.value='+251-':true;" onkeypress="phone_change('phone_input5');" placeholder="Phone Number *" maxlength="16" autocomplete="off" style="width: 35%;" onfocus="this.style.width='45%';" onblur="this.style.width='35%'; if(this.value=='+251-')this.value=''" required>
    </div>
    <div class="form-group">
      <span class="profile_la">Relation to Emergency Contact: </span>
      <input type="text" name="res_emcon_relation" value="<?php echo $row['res_emcon_relation'];?>" class="form-control profile_ip" placeholder="Relation" style="width: 30%;" onfocus="this.style.width='35%';" onblur="this.style.width='30%';">
    </div>
    </div>

    <h3 class="profile_form_info" id="new_profile_house"><span class="profile_form_info_number">4</span> Residence Information</h3>
    <div class="form-group">
    	<span class="profile_la req">House Number:</span>
    	<input type="text" name="res_hou_num" value="<?php echo $row['res_hou_num'];?>" class="form-control profile_ip" placeholder="House Number *" autocomplete="off" style="width: 25%; margin-right: 30px;" required>
    	<span class="profile_la">House Location:</span>
    	<input type="text" name="res_hou_loc" value="<?php echo $row['res_hou_loc'];?>" class="form-control profile_ip" placeholder="House Location" autocomplete="off" style="width: 28%;">
    </div>
    <div class="form-group">
    	<span class="profile_la">Area of Land (m<sup>2</sup>):</span>
    	<input type="text" name="res_hou_area" value="<?php echo $row['res_hou_area'];?>" class="form-control profile_ip" placeholder="Area of Land" autocomplete="off" style="width: 23%; margin-right: 30px;">
    	<span class="profile_la">Relation to Asset:</span>
	    <select name="res_hou_relation" class="custom-select custom-select-sm mb-3 profile_dob" id="monthOption" style="width: 22%;">
	      <option style="display: none;"></option>
  			<option id="own" value="Owner">Owner</option>
  			<option id="resid" value="Resident">Resident</option>
  			<option id="tenant" value="Tenant">Tenant</option>
	    </select>
    </div>
	<span class="profile_la">House Description:</span>
    <div class="form-group">
    	<textarea name="res_hou_desc" id="house_Desc" class="form-control" placeholder="Description ..." style="background-color: #F7F7F7; width: 65%; height: 100px; margin-left: 30px; transition: width 0.4s;" onfocus="this.style.width='80%';" onblur="this.style.width='65%';"></textarea>
    </div>
    <h3 class="profile_form_info"><span class="profile_form_info_number">5</span> Verification</h3>
    <div class="profile_moreinfo">
    <div class="form-group">
    	<span class="profile_la req" style="margin-left:28px;">Employee's Name: </span>
    	<select id="select_emp" onclick="empName();" class="form-control profile_select" style="width: 40%; margin-right: 30px;">
    		<option value="" style="display: none;"></option>
  			<?php
        $sql = "SELECT emp_fname,emp_mname,emp_lname,emp_pass FROM employee WHERE emp_status='Employed';";
        $result = mysqli_query($conn, $sql);
        while($emp = mysqli_fetch_array($result))
        {
          $empName = $emp['emp_fname'].' '.$emp['emp_mname'].' '.$emp['emp_lname'];
          $empPass = $emp['emp_pass'];
          echo '<option class="empNameOpt" value="'.$empPass.'">'.$empName.'</option>';
        }

        $sql = "SELECT COUNT(*) FROM employee WHERE emp_status='Employed';";
        $numEmp = mysqli_fetch_array(mysqli_query($conn, $sql));
        ?>
  		</select>
    </div>
    <script>
      function empName(){
        for(var i=0; i<Number(<?php echo $numEmp[0];?>); i++)
          if(document.getElementsByClassName('empNameOpt')[i].selected)
            document.getElementById('empNameTxt').value=document.getElementsByClassName('empNameOpt')[i].innerHTML;
      }
    </script>
    <input type="text" name="res_emp_name" id="empNameTxt" style="display:none;">

    <div class="form-group">
      <span class="profile_la req">Employee's Password: </span>
      <input type="password" name="res_emp_pass" class="form-control profile_ip" placeholder="Password *" autocomplete="off" style="width: 35%;" onfocus="this.style.width='40%';" onblur="this.style.width='35%'; if(this.value != document.getElementById('select_emp').value){this.value='';document.getElementById('emp_pass_err').innerHTML='Incorrect Password';} else document.getElementById('emp_pass_err').innerHTML='';" required>
      <p id="emp_pass_err" style="color:tomato;font-style:italic;font-size:15px;margin-left:15px;display:inline;"></p>
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox mb-3" style="margin-right: 60px;">
      <input type="checkbox" class="custom-control-input" id="ResRegCheck" required>
      <label class="custom-control-label" for="ResRegCheck"><span class="profile_la req"></span>I Employee Name vreify the validity of this persons profile to be accurate. If by any chance this profile be false or inaccurate, I will take full responsibility.</label>
    </div>
    </div>
	</div>
    <br /><br />
    <div class="col-lg-12">
	    <button class="btn btn-primary btn-lg profile_save" type="submit" name="res_submit" style="background-color:#47a8ca;"><span><i class="fa fa-save"></i> &nbsp;Save Profile </span></button>
	    <!--<button class="btn btn-primary btn-lg profile_review" type="button" onclick="window.location.assign('edit_resident_profile.php');" style="background-color:#47a8ca;"><span><i class="fa fa-window-close-o"></i> &nbsp;Cancel </span></button>-->

	    <button class="btn btn-primary btn-lg profile_reset" type="reset" onclick="window.location.assign('edit_resident_profile.php');" style="background-color:#47a8ca;"><span>Reset All&nbsp; <i class="fa fa-undo"></i></span></button>
	</div>
    </form>
	</div>

</main>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="assets/js/agency.js"></script>

</body>
</html>
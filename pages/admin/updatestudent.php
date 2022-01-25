<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  try{

    $id = $_GET['id'];
    $sql = "SELECT * FROM student where id = $id";
    $result = mysqli_query($db, $sql);
    $getDataRow = mysqli_fetch_array($result);

    if(isset($_POST['update'])) {
      $studentFirstName = $_POST['studentFirstName'];
      $studentMiddleName = $_POST['studentMiddleName'];
      $studentLastName = $_POST['studentLastName'];
      $gender = $_POST['gender'];
      $studentDOB = $_POST['studentDOB'];
      $studentPhone = $_POST['studentPhone'];
      $studentEmail = $_POST['studentEmail'];
      $studentAddress = $_POST['studentAddress'];
      $studentClass = $_POST['studentClass'];
      $studentSection = $_POST['studentSection'];
      $studentRoll = $_POST['studentRoll'];

        if(empty($studentFirstName)) throw new Error('Student First Name should not be empty');
        else if(empty($studentLastName)) throw new Error('Student Last Name should not be empty');
        else if($gender  === 'default') throw new Error('Gender should not be empty');
         else if(empty($studentDOB)) throw new Error('Students Date of Birth should not be empty');
         else if(empty($studentPhone)) throw new Error('Student Phone should not be empty');
         else if(empty($studentEmail)) throw new Error('student Email should not be empty');
         else if(empty($studentAddress)) throw new Error('Student Address should not be empty');
         else if(empty($studentClass)) throw new Error('Student Class should not be empty');
         else if(empty($studentSection)) throw new Error('Student Section should not be empty');
         else if(empty($studentRoll)) throw new Error('Student Roll should not be empty');
        else {
          $sql = "SELECT * from student";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {           
            if($studentEmail == $row['studentEmail'] && $studentClass== $row['studentClass'] && $studentSection == $row['studentSection']&& $studentRoll == $row['studentRoll'] && $studentFirstName == $row['studentRoll']) {
              throw new Error('Student Details Already Existed');
            } 
          }
          $updateSQL = "UPDATE student SET 
              studentFirstName = '$studentFirstName', 
              studentMiddleName = '$studentMiddleName', 
              studentLastName = '$studentLastName', 
              gender = '$gender', 
              studentDOB = '$studentDOB', 
              studentPhone = '$studentPhone', 
              studentEmail = '$studentEmail', 
              studentAddress = '$studentAddress', 
              studentClass = '$studentClass', 
              studentSection = '$studentSection', 
              studentRoll = '$studentRoll' where id = $id
            ";
          mysqli_query($db, $updateSQL);                
          $success = 'Student Details Updated Succesfully';
          header('Refresh: 1');
        }     
    } 
  }catch (Error $errorData) {
    $error = $errorData->getMessage();
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Management System</title>
  <link rel="stylesheet" href="../../css/sharedsb.css" />
  <link rel="stylesheet" href="../../icons/all.css" />
  <link rel="stylesheet" href="../../css/sharedgrid.css" />
  <link rel="stylesheet" href="../../css/faculty.css">
</head>

<body>
  <div class="full-section">
    <section class="main-sidebar">
      <table class="table">
        <h1 class="admin-panel">Admin Panel</h1>
        <tr>
          <td><i class="fas fa-home"></i></td>
          <td><a href="./index.php">Dashboard</a></td>
        </tr>
        <tr class="active">
          <td><i class="fas fa-user"></i></td>
          <td><a href="./addstudent.php">Add Student Info</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-user-friends"></i></td>
          <td><a href="./viewstudents.php">View Students</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-book"></i></td>
          <td><a href="./addsubject.php">Add Subjects</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-chart-line"></i></td>
          <td><a href="./addclass.php">Add Class</a></td>
        </tr>



        <tr>
          <td><i class="fas fa-id-badge"></i></td>
          <td><a href="./userprofile.php">User Profile</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-plus"></i></td>
          <td><a href="./createid.php">Create Id</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-arrow-alt-circle-left"></i></td>
          <td><a href="../../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>
    <section class="grids">
      <h3>Update Student</h3>
      <form method='POST'>
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Update Students Details</span>
          </div>

          <div class="error-div">
            <?php if(isset($error)) {?>
            <div class="message">
              <?php echo $error; ?>
            </div>
            <?php
                }?>
          </div>
          <div class="success-div">
            <?php if(isset($success)) {?>
            <div class="success">
              <?php echo $success; ?>
            </div>
            <?php
                }?>
          </div>

          <div class="allinputfield content-section">
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>First Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter First Name' name='studentFirstName'
                value='<?php echo $getDataRow['studentFirstName'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Middle Name</label>
                <!-- <span class='required'> *</span> -->
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Middle Name' name='studentMiddleName'
                value='<?php echo $getDataRow['studentMiddleName'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Last Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Last Name' name='studentLastName'
                value='<?php echo $getDataRow['studentLastName'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-venus mid-icon"></i>
                <label class='mid-title'>Gender</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <select name="gender" class='input' value=' <?php echo $getDataRow['gender'] ?>'>
                <option value="default">--Select--</option>
                <option value='male' <?php echo ($getDataRow['gender'] == 'male' ? 'selected' : '') ?>>Male
                </option>
                <option value='female' <?php echo ($getDataRow['gender'] == 'female' ? 'selected' : '') ?>>Female
                </option>
                <option value='other' <?php echo ($getDataRow['gender'] == 'other' ? 'selected' : '') ?>>Other
                </option>
              </select>
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-calendar mid-icon"></i>
                <label class='mid-title'>Date of Birth</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='date' class='input' placeholder='Enter DOB' name='studentDOB'
                value='<?php echo $getDataRow['studentDOB'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-phone mid-icon"></i>
                <label class='mid-title'>Phone</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='number' class='input' placeholder='Enter Phone number' name='studentPhone'
                value='<?php echo $getDataRow['studentPhone'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-envelope mid-icon"></i>
                <label class='mid-title'>Email</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='email' class='input' placeholder='Enter Email' name='studentEmail'
                value='<?php echo $getDataRow['studentEmail'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-location-arrow mid-icon"></i>
                <label class='mid-title'>Address</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Address' name='studentAddress'
                value='<?php echo $getDataRow['studentAddress'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <!-- <input type='text' class='input' placeholder='Enter Student Class' name='studentClass' /> -->
              <select name="studentClass" class='input'>
                <option value="default">--Select--</option>
                <?php
                    $sql = "SELECT distinct className from classes";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      
                ?>
                <option value='<?php echo $row['className'] ?> '
                  <?php echo ($getDataRow['studentClass'] == $row['className'] ? 'selected' : '') ?>>
                  <?php 
                    echo $row['className'];
                  ?>
                </option>
                <?php 
              }?>
              </select>
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Section</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <!-- <input type='text' class='input' placeholder='Enter Student Section' name='studentSection' /> -->
              <select name="studentSection" class='input'>
                <option value="default" selected>--Select--</option>
                <?php
                    $sql = "SELECT distinct classSection from classes";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      
                ?>
                <option value='<?php echo $row['classSection'] ?>'
                  <?php echo ($getDataRow['studentSection'] == $row['classSection'] ? 'selected' : '') ?>>
                  <?php 
                    echo $row['classSection'];
                  ?>
                </option>
                <?php 
              }?>
              </select>
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>RollNo</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Roll no' name='studentRoll'
                value='<?php echo $getDataRow['studentRoll'] ?>' />
            </div>

          </div>
          <button class='btn' name='update'>Update</button>
        </div>
      </form>
    </section>
  </div>
</body>

</html>
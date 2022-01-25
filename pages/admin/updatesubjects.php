<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  $sessionEmail = $_SESSION['email'];
  $id = $_GET['id'];
  $sql = "SELECT * FROM course where id = $id";
  $result = mysqli_query($db, $sql);
  $getDataRow = mysqli_fetch_array($result);
   
  try{
    if(isset($_POST['submit'])) {
      $courseID = $_POST['courseId'];
      $courseName = $_POST['courseName'];
      $courseClass = $_POST['courseClass'];

        if(empty($courseID)) throw new Error('Course ID should not be empty');
        else if(empty($courseName)) throw new Error('Course Name should not be empty');
        else if(empty($courseClass)) throw new Error('Course Class should not be empty');
        else {
          $sql = "SELECT * from course";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {           
            if($courseID == $row['courseId'] && $courseName == $row['courseName'] && $courseClass== $row['courseClass']) {
              throw new Error('CourseId ' . $courseID . ' Already Existed');
            } 
          }
          $updateSQL = "UPDATE course SET
                courseId = '$courseID', 
                courseName = '$courseName', 
                courseClass = '$courseClass' WHERE id = $id";
          mysqli_query($db, $updateSQL);
          $success = 'Course Modified Successfully';
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
  <link rel="stylesheet" href="../../css/faculty.css" />
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
        <tr>
          <td><i class="fas fa-user"></i></td>
          <td><a href="./addstudent.php">Add Student Info</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-user-friends"></i></td>
          <td><a href="./viewstudents.php">View Students</a></td>
        </tr>
        <tr class="active">
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
      <h3>Update Subjects</h3>
      <form method='POST'>
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Update Subjects Details</span>
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
          <div class="content-section">
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Course Id</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Course Id' name='courseId'
                value='<?php echo $getDataRow['courseId'] ?>' />
            </div>
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Course Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Course Name' name='courseName'
                value='<?php echo $getDataRow['courseName'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <select name="courseClass" class='input'>
                <option value="default">--Select--</option>
                <?php
                    $sql = "SELECT distinct className from classes";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      
                ?>
                <option value='<?php echo $row['className'] ?> '
                  <?php echo ($getDataRow['courseClass'] == $row['className'] ? 'selected' : '') ?>>
                  <?php 
                    echo $row['className'];
                  ?>
                </option>
                <?php 
              }?>
              </select>
            </div>
          </div>
          <button class="btn" name='submit'>Submit</button>
        </div>
      </form>
    </section>
  </div>
</body>

</html>
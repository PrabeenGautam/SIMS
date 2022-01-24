<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  $sessionEmail = $_SESSION['email'];
   
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
            if($courseID == $row['courseId']) {
              throw new Error('CourseId ' . $courseID . ' Already Existed');
            } 
          }
          $insertSQL = "INSERT INTO course (courseId, courseName, courseClass) VALUES ('$courseID', '$courseName', '$courseClass')";
          mysqli_query($db, $insertSQL);
          $success = 'Course ' . $courseName .  ' Added Succesfully with Course Id  ' . $courseID;
        }     
    } 

    if(isset($_GET["del"])){
      $id = $_GET['del'];
      $del_sql = "DELETE FROM course where id = '$id'";
      mysqli_query($db, $del_sql);
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
      <h3>Add Subjects</h3>
      <form method='POST'>
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Subjects</span>
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
              <input type='text' class='input' placeholder='Enter Course Id' name='courseId' />
            </div>
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Course Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Course Name' name='courseName' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Class' name='courseClass' />
            </div>
          </div>
          <button class="btn" name='submit'>Submit</button>
        </div>
      </form>

      <div class='card-section'>
        <div class='heading'>
          <span class='title-icon'>
            <i class="fas fa-plus"></i>
          </span>
          <span class='title'>View Subjects</span>
        </div>


        <div class="table-section">
          <table class="tables">
            <thead>
              <tr>
                <th>SN.</th>
                <th>ID</th>
                <th>Course</th>
                <th>Class</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <tr>
                <?php 
                $sql = "SELECT * from course";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['courseId'] ?></td>
                <td><?php echo $row['courseName'] ?></td>
                <td><?php echo $row['courseClass'] ?></td>
                <td>
                  <a name='edit' class="btn-general btn-edit custom"
                    href="addsubject.php?edit=<?php echo $row['id'] ?>">Edit
                  </a>
                  <a name='del' class="btn-general btn-danger"
                    href="addsubject.php?del=<?php echo $row['id'] ?>">Delete</a>
                </td>
              </tr>
            </tbody>
            <?php } ?>

          </table>
        </div>
    </section>
  </div>
</body>

</html>
<?php
// require_once "../php/config.php";
// require_once "../php/session.php";
// 
?>

<?php

// try {

//   //Students form
//   if (isset($_POST['student'])) {

//     //students data insertion to database table "students"
//     $result = mysqli_query($db, "insert into students(st_id,st_name,st_department,st_batch,st_sem,st_email) values('$_POST[st_id]','$_POST[st_name]','$_POST[st_dept]','$_POST[st_batch]','$_POST[st_sem]','$_POST[st_email]')");
//     $st_success_msg = "Student added successfully.";
//   }

//   //Teachers form
//   if (isset($_POST['teacher'])) {

//     //teachers data insertion to the database table "teachers"
//     $res = mysqli_query($db, "insert into teachers(teacher_id,teacher_name,teacher_department,teacher_email,teacher_course) values('$_POST[tc_id]','$_POST[tc_name]','$_POST[tc_dept]','$_POST[tc_email]','$_POST[tc_course]')");
//     $tc_success_msg = "Teacher added successfully.";
//   }
// } catch (Exception $e) {
//   $error_msg = $e->getMessage();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Management System</title>
  <link rel="stylesheet" href="../../css/sharedsb.css" />
  <link rel="stylesheet" href="../../css/sharedgrid.css" />
  <link rel="stylesheet" href="../../css/userprofile.css" />
  <link rel="stylesheet" href="../../icons/all.css" />
  <link rel="stylesheet" href="../../css/add.css" />
  <script src="../JS/toggle.js"></script>
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
        <tr>
          <td><i class="fas fa-book"></i></td>
          <td><a href="./addsubject.php">Add Subjects</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-chart-line"></i></td>
          <td><a href="./addclass.php">Add Class</a></td>
        </tr>


        <tr class="active">
          <td><i class="fas fa-cog"></i></td>
          <td><a href="./settings.php">Settings</a></td>
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
          <td><a href="../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>

    <section class="grids">
      Select: <a href="#teacher">Teacher</a> |
      <a href="#student">Student</a>

      <div id="student">
        <form method="post">
          <fieldset>
            <legend>Add Student's Information</legend>
            <div class="message">
              <?php if (isset($st_success_msg))
                echo $st_success_msg;
              ?>
            </div>
            <div class="form-group">
              <label>Reg. No:</label>
              <div>
                <input type="text" name="st_id" placeholder="Student reg. no." />
              </div>
            </div>

            <div class="form-group">
              <label>Name:</label>
              <div>
                <input type="text" name="st_name" placeholder="Student full name" />
              </div>
            </div>

            <div class="form-group">
              <label>Department:</label>
              <div>
                <input type="text" name="st_dept" placeholder="Department eg. BCT" />
              </div>
            </div>

            <div class="form-group">
              <label>Batch:</label>
              <div>
                <input type="text" name="st_batch" placeholder="Batch eg. 2075" />
              </div>
            </div>

            <div class="form-group">
              <label>Semester:</label>
              <div>
                <input type="text" name="st_sem" placeholder="Semester" />
              </div>
            </div>

            <div class="form-group">
              <label>Email:</label>
              <div>
                <input type="email" name="st_email" placeholder="Valid Email" />
              </div>
            </div>
            <input type="submit" value="Add Student" class="button" name="student" />

          </fieldset>
        </form>
      </div>

      <div id="teacher">
        <form method="post">
          <fieldset>
            <legend>Add Teacher's Information</legend>
            <div class="message">
              <?php if (isset($tc_success_msg))
                echo $tc_success_msg;
              ?>
            </div>
            <div class="form-group">
              <label>Teacher's id</label>
              <div>
                <input type="text" name="tc_id" placeholder="Teacher's id" />
              </div>
            </div>

            <div class="form-group">
              <label>Name:</label>
              <div>
                <input type="text" name="tc_name" placeholder="Enter Full name" />
              </div>
            </div>

            <div class="form-group">
              <label>Department:</label>
              <div>
                <input type="text" name="tc_dept" placeholder="Department eg. BCT" />
              </div>
            </div>

            <div class="form-group">
              <label>Email:</label>
              <div>
                <input type="email" name="tc_email" placeholder="Valid Email" />
              </div>

              <div class="form-group">
                <label>Subject Name:</label>
                <div>
                  <input type="text" name="tc_course" placeholder="Courses" />
                </div>
              </div>
            </div>
            <input type="submit" value="Add Teacher" class="button" name="teacher" />

          </fieldset>
        </form>
      </div>
    </section>
  </div>
</body>

</html>
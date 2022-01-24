<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 
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

      <form>

        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Subjects</span>
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
              <input type='text' class='input' placeholder='Enter Course Id' required name='courseId' />
            </div>
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Course Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Course Name' required name='courseName' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Class' required name='courseClass' />
            </div>
          </div>
          <button class="btn">Submit</button>
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
                <th>ID</th>
                <th>Course</th>
                <th>Class</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <tr>
                <td>29</td>
                <td>Prabin Gautam</td>
                <td>12</td>
                <td>
                  <button class="btn-general btn-edit">Edit</button>
                  <button class="btn-general btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
    </section>
  </div>
</body>

</html>
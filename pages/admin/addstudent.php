<?php
// require_once "../php/config.php";
// require_once "../php/session.php";
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
      <h3>Add Student</h3>
      <form>
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Students</span>
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
              <input type='text' class='input' placeholder='Enter First Name' required name='studentFirstName' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Middle Name</label>
                <!-- <span class='required'> *</span> -->
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Middle Name' name='studentMiddleName' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>Last Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Last Name' required name='studentLastName' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-venus mid-icon"></i>
                <label class='mid-title'>Gender</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <select name="gender" class='input'>
                <option value="" disabled selected>--Select--</option>
                <option value='male'>Male</option>
                <option value='female'>Female</option>
                <option value='other'>Other</option>
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
              <input type='date' class='input' placeholder='Enter DOB' required name='studentDOB' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-phone mid-icon"></i>
                <label class='mid-title'>Phone</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='number' class='input' placeholder='Enter Phone number' required name='studentPhone' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-envelope mid-icon"></i>
                <label class='mid-title'>Email</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='email' class='input' placeholder='Enter Email' required name='studentEmail' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-location-arrow mid-icon"></i>
                <label class='mid-title'>Address</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Address' required name='studentAddress' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Student Class' required name='studentClass' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Section</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Student Section' required name='studentSection' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>RollNo</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Roll no' required name='studentRoll' />
            </div>

          </div>
          <button class="btn">Submit</button>
        </div>




        <div class="right-section">
          <div class='card-section'>
            <div class='heading'>
              <span class='title-icon'>
                <i class="fas fa-plus"></i>
              </span>
              <span class='title'>View Add Students</span>
            </div>
            <div class="table-section">
              <table class="tables">
                <thead>
                  <tr>
                    <th>Roll No</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Email</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>29</td>
                    <td>Prabin Gautam</td>
                    <td>Male</td>
                    <td>2058-03-09</td>
                    <td>Lamachaur</td>
                    <td>12 A</td>
                    <td>9827150647</td>
                    <td>prabeen122@gmail.com</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </div>
        </div>
    </section>
    </form>
  </div>
</body>

</html>
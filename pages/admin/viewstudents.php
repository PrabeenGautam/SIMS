<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  if(isset($_GET["del"])){
      $id = $_GET['del'];
      $del_sql = "DELETE FROM student where id = '$id'";
      mysqli_query($db, $del_sql);
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
        <tr class="active">
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
      <h3>View Students</h3>
      <div class='card-section'>
        <div class='heading'>
          <span class='title-icon'>
            <i class="fas fa-plus"></i>
          </span>
          <span class='title'>View Students</span>
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
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <?php 
                    $sql = "SELECT * from student";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                  ?>
              <tr>
                <td><?php echo $row['studentRoll'] ?></td>
                <td>
                  <?php echo $row['studentFirstName'] . ' '. $row['studentMiddleName']. ' '. $row['studentLastName'] ?>
                </td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['studentDOB'] ?></td>
                <td><?php echo $row['studentAddress'] ?></td>
                <td><?php echo $row['studentClass'] . ' '. $row['studentSection'] ?></td>
                <td><?php echo $row['studentPhone'] ?></td>
                <td><?php echo $row['studentEmail'] ?></td>
                <td>
                  <a name='edit' class="btn-general btn-edit"
                    href="viewstudents.php?edit=<?php echo $row['id'] ?>">Edit</a>
                  <a name='del' class="btn-general btn-danger"
                    href="viewstudents.php?del=<?php echo $row['id'] ?>">Delete</a>
                </td>
              </tr>
            </tbody>
            <?php } ?>

          </table>
        </div>
      </div>


    </section>
  </div>
</body>

</html>
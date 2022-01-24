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
      <table class="tables">
        <thead>
          <tr>
            <th>Roll No</th>
            <th>Full Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>
        </thead>

        <?php

        $count = 0;
        $statement = mysqli_query($db, "select * from teachers order by teacher_id asc");
        while ($tc_data = mysqli_fetch_array($statement)) {
          $count++;
        ?>
          <tbody>
            <tr>
              <td><?php echo $tc_data['teacher_id']; ?></td>
              <td><?php echo $tc_data['teacher_name']; ?></td>
              <td><?php echo $tc_data['teacher_department']; ?></td>
              <td><?php echo $tc_data['teacher_email']; ?></td>
              <td><?php echo $tc_data['teacher_course']; ?></td>
            </tr>
          </tbody>

        <?php } ?>
      </table>
    </section>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Management System</title>
  <link rel="stylesheet" href="../../css/sharedsb.css" type="text/css" />
  <link rel="stylesheet" href="../../icons/all.css" />
  <link rel="stylesheet" href="../../css/sharedgrid.css" />
</head>

<body>
  <div class="full-section">
    <section class="main-sidebar">
      <table class="table">
        <h1 class="admin-panel">Admin Panel</h1>
        <tr class="active">
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
          <td><a href="./userprofile.php">Create Id</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-arrow-alt-circle-left"></i></td>
          <td><a href="../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>
    <section class="grids">
      <h3>Dashboard</h3>
      <div class="cardelement">
        <div class='cards'>
          <div class='name-details'>
            <div class='number'>199</div>
            <div class='name'>Student</div>
          </div>
          <div class='card-icons'><i class="fas fa-user" style="color: #FFC36D"></i></div>
        </div>

        <div class='cards'>
          <div class='name-details'>
            <div class='number'>199</div>
            <div class='name'>Student</div>
          </div>
          <div class='card-icons'><i class="fas fa-user-secret" style="color: #FF7676"></i></div>
        </div>

        <div class='cards'>
          <div class='name-details'>
            <div class='number'>199</div>
            <div class='name'>Student</div>
          </div>
          <div class='card-icons'><i class="fas fa-flag" style="color: #009DDC"></i></div>
        </div>

        <div class='cards'>
          <div class='name-details'>
            <div class='number'>199</div>
            <div class='name'>Student</div>
          </div>
          <div class='card-icons'><i class="fas fa-file" style="color: #27AE60"></i></div>
        </div>

      </div>
    </section>
    <div></div>
</body>

</html>
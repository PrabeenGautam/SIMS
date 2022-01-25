<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 
try {
  if(isset($_GET["del"])){
      $id = $_GET['del'];
      $del_sql = "DELETE FROM student where id = '$id'";
      mysqli_query($db, $del_sql);
    }

  if(isset($_POST["search"])) {
    $firstname = $_POST['searchFirstName'];
    $lastname = $_POST['searchLastName'];
    $class = $_POST['searchClass'];
    $roll = $_POST['searchRoll'];
    $gender = $_POST['searchGender'];
    $section = $_POST['searchSection'];
    $address = $_POST['searchAddress'];

    //  if(empty($firstname) || empty($lastname) || empty($class) || empty($roll)) {
    //   throw new Exception('Choose any field to search');
    //   exit();
    // } 
    
    $q = "SELECT * from student WHERE 1 = 1 ";
    if(isset($firstname) && !empty($firstname)) $q = $q . " AND studentFirstName = '$firstname'";
    if(isset($lastname) && !empty($lastname)) $q = $q . " AND studentLastName = '$lastname'";
    if(isset($class) && !empty($class)) $q = $q . " AND studentClass = '$class'";
    if(isset($roll) && !empty($roll)) $q = $q . " AND studentRoll = '$roll'";
    if(isset($gender) && !empty($gender)) $q = $q . " AND gender = '$gender'";
    if(isset($section) && !empty($section)) $q = $q . " AND studentSection = '$section'";
    if(isset($address) && !empty($address)) $q = $q . " AND studentAddress = '$address'";

    $result = mysqli_query($db, $q);
    if(mysqli_num_rows($result) == 0) {
      throw new Exception('Results not found. Try Using another Keyword');
    }
    
  }
} catch (Exception $errorData) {
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
      <h3>Search Students</h3>

      <form method="POST">
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-search"></i>
            </span>
            <span class='title'>Search Students</span>
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
            <h3>You can Search Using Any Input Field Given Below</h3>
            <div class="allinputfield">
              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>First Name</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by First Name' name='searchFirstName' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Last Name</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Last Name' name='searchLastName' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Class</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Class' name='searchClass' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Roll No</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Roll no' name='searchRoll' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Gender</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Gender' name='searchGender' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Address</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Address' name='searchAddress' />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>Section</label>
                </div>

                <!-- Input Field  -->
                <input type='search' class='input' placeholder='Search by Section' name='searchSection' />
              </div>
            </div>
          </div>
        </div>
        <button class="btn-outside" name="search">Search</button>
      </form>

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
                    if(!isset($_POST['search'])) {
                      $sql = "SELECT * from student";
                      $result = mysqli_query($db, $sql);
                    }
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
                    href="updatestudent.php?id=<?php echo $row['id'] ?>">Edit</a>
                  <a name='del' class="btn-general btn-danger"
                    href="viewstudents.php?del=<?php echo $row['id'] ?>">Delete</a>
                </td>
              </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>


    </section>
  </div>
</body>

</html>
<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  $sessionEmail = $_SESSION['email'];
  $id = $_GET['id'];
  $sql = "SELECT * FROM classes where id = $id";
  $result = mysqli_query($db, $sql);
  $getDataRow = mysqli_fetch_array($result);
   
  try{
    if(isset($_POST['update'])) {
      $className = $_POST['className'];
      $sectionName = $_POST['sectionName'];
      $classCode = $_POST['classCode'];
      $classDescription = $_POST['classDescription'];

        if(empty($className)) throw new Error('Classname should not be empty');
        else if(empty($sectionName)) throw new Error('Section should not be empty');
        else if(empty($classCode)) throw new Error('Class Code should not be empty');
        else if(empty($classDescription)) throw new Error('Description should not be empty');
        else {
          $sql = "SELECT * from classes";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {           
            if($className == $row['className'] && $sectionName == $row['classSection'] && $classCode == $row['classCode'] && $classDescription == $row['classDescription']) {
              throw new Error('Class ' . $className . ' with section ' . $sectionName . ' Already Existed');
            } 
          }
          $updateSQL = "UPDATE classes SET 
            className = '$className', 
            classSection = '$sectionName', 
            classCode = '$classCode', 
            classDescription = '$classDescription' where id = $id;
            ";
          mysqli_query($db, $updateSQL);
          $success = 'Class Details Modified Successfully';
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
        <tr>
          <td><i class="fas fa-book"></i></td>
          <td><a href="./addsubject.php">Add Subjects</a></td>
        </tr>
        <tr class="active">
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
      <h3>Update Class</h3>

      <form method='POST'>

        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Update Class Details</span>
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
                <i class="fas fa-book mid-icon"></i>
                <label class='mid-title'>Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Class' name='className'
                value='<?php echo $getDataRow['className'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-book mid-icon"></i>
                <label class='mid-title'>Section</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Class' name='sectionName'
                value='<?php echo $getDataRow['classSection'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-code mid-icon"></i>
                <label class='mid-title'>Class Code</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Class Code' name='classCode'
                value='<?php echo $getDataRow['classCode'] ?>' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-file mid-icon"></i>
                <label class='mid-title'>Description</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <textarea rows='4' cols='50' name='classDescription' placeholder='Enter Description'
                class='input textarea'><?php echo $getDataRow['classDescription'] ?></textarea>
            </div>
          </div>
          <button class="btn" name='update'>Update</button>
        </div>
      </form>
    </section>
  </div>
</body>

</html>
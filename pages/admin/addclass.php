<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

   $sessionEmail = $_SESSION['email'];
   
  try{
    if(isset($_POST['submit'])) {
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
            if($className == $row['className'] && $sectionName == $row['classSection']) {
              throw new Error('Class ' . $className . ' with section ' . $sectionName . ' Already Existed');
            } 
          }
          $insertSQL = "INSERT INTO classes (className, classSection, classCode, classDescription) VALUES ('$className', '$sectionName', '$classCode', '$classDescription')";
          mysqli_query($db, $insertSQL);
          $success = 'Class ' . $className .  ' Added Succesfully with section ' . $sectionName;
        }     
    } 

    if(isset($_GET["del"])){
      $id = $_GET['del'];
      $del_sql = "DELETE FROM classes where id = '$id'";
      mysqli_query($db, $del_sql);
    }
  }catch (Error $errorData) {
    $error = $errorData->getMessage();
  }

?>


<?php 

try {
    if(isset($_POST['import'])) {

      $fileName = $_FILES['file']['tmp_name']; //Give name of the file 
      $file_ext = $_FILES['file']['name'];
      //Checking Extension of the file
      $extension = pathinfo($file_ext, PATHINFO_EXTENSION);

      if($extension == 'csv') {
        if($_FILES['file']['size'] > 0) {
          //Opening file into read mode
          $file = fopen($fileName, "r");
          while(($columnData = fgetcsv($file, 10000)) !== FALSE) {
            if (isset($columnData[0]) && isset($columnData[1]) && isset($columnData[2]) && isset($columnData[3])) {

              $sql_insert = "INSERT INTO classes (className, classSection, classCode, classDescription) 
                                        VALUES ('$columnData[0]', '$columnData[1]', '$columnData[2]', '$columnData[3]')";
                                        
              mysqli_query($db, $sql_insert); 
              $successMsg = "CSV file has been imported successfully to database";
            } else throw new Exception('Some values are empty. Recheck CSV Files');           
          }
          fclose($file);
        }
        else {
          throw new Exception('File Size is 0: Error');
        }
      } else {
        throw new Exception('Only CSV File Supported. Please import CSV Files');
      }
    }

} catch (Exception $errorDataCSV) {
  $errorMsg = $errorDataCSV->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Info Management</title>
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
      <div class="success-div">
        <?php if(isset($errorMsg)) {?>
        <div class="message">
          <?php echo $errorMsg; ?>
        </div>
        <?php
                }?>
      </div>
      <div class="success-div">
        <?php if(isset($successMsg)) {?>
        <div class="success">
          <?php echo $successMsg; ?>
        </div>
        <?php
                }?>
      </div>
      <form class="form-horizontal" method="post" name="csvupload" id="csvupload" enctype="multipart/form-data">
        <div class="input-row">
          <label>Choose CSV
            File</label> <input type="file" name="file" id="file" accept=".csv">
          <button type="submit" id="submit" name="import" class="btn-general btn-edit">Import</button>
          <br />

        </div>

      </form>

      <h3>Add Class Details</h3>

      <form method='POST'>

        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Class</span>
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

          <div class="content-section ">
            <div class="allinputfield-description">
              <div class="mid-content">

                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-book mid-icon"></i>
                  <label class='mid-title'>Class</label>
                  <span class='required'> *</span>
                </div>

                <!-- Input Field  -->
                <input type='text' class='input' placeholder='Enter Class' name='className' />
              </div>

              <div class="mid-content">

                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-book mid-icon"></i>
                  <label class='mid-title'>Section</label>
                  <span class='required'> *</span>
                </div>

                <!-- Input Field  -->
                <input type='text' class='input' placeholder='Enter Class' name='sectionName' />
              </div>

              <div class="mid-content">

                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-code mid-icon"></i>
                  <label class='mid-title'>Class Code</label>
                  <span class='required'> *</span>
                </div>

                <!-- Input Field  -->
                <input type='text' class='input' placeholder='Enter Class Code' name='classCode' />
              </div>
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
                class='input textarea'></textarea>
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
                <th>ID</th>
                <th>Class</th>
                <th>Section</th>
                <th>Class Code</th>
                <th>Description</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <?php 
                $sql = "SELECT * from classes";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['className'] ?></td>
                <td><?php echo $row['classSection'] ?></td>
                <td><?php echo $row['classCode'] ?></td>
                <td><?php echo $row['classDescription'] ?></td>
                <td>
                  <a name='edit' class="btn-general btn-edit"
                    href="updateclass.php?id=<?php echo $row['id'] ?>">Edit</a>
                  <a name='del' class="btn-general btn-danger"
                    href="addclass.php?del=<?php echo $row['id'] ?>">Delete</a>
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
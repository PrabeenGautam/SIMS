<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  try{
    if(isset($_POST['submit'])) {
      $studentFirstName = $_POST['studentFirstName'];
      $studentMiddleName = $_POST['studentMiddleName'];
      $studentLastName = $_POST['studentLastName'];
      $gender = $_POST['gender'];
      $studentDOB = $_POST['studentDOB'];
      $studentPhone = $_POST['studentPhone'];
      $studentEmail = $_POST['studentEmail'];
      $studentAddress = $_POST['studentAddress'];
      $studentClass = $_POST['studentClass'];
      $studentSection = $_POST['studentSection'];
      $studentRoll = $_POST['studentRoll'];

        if(empty($studentFirstName)) throw new Error('Student First Name should not be empty');
        else if(empty($studentLastName)) throw new Error('Student Last Name should not be empty');
        else if($gender  === 'default') throw new Error('Gender should not be empty');
         else if(empty($studentDOB)) throw new Error('Students Date of Birth should not be empty');
         else if(empty($studentPhone)) throw new Error('Student Phone should not be empty');
         else if(empty($studentEmail)) throw new Error('student Email should not be empty');
         else if(empty($studentAddress)) throw new Error('Student Address should not be empty');
         else if(empty($studentClass)) throw new Error('Student Class should not be empty');
         else if(empty($studentSection)) throw new Error('Student Section should not be empty');
         else if(empty($studentRoll)) throw new Error('Student Roll should not be empty');
        else {
          $sql = "SELECT * from student";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {           
            if($studentEmail == $row['studentEmail'] && $studentClass== $row['studentClass'] && $studentSection == $row['studentSection']&& $studentRoll == $row['studentRoll'] && $studentFirstName == $row['studentRoll']) {
              throw new Error('Stundet Details Already Existed');
            } 
          }
          $insertSQL = "INSERT INTO student (studentFirstName, studentMiddleName, studentLastName, gender, studentDOB, studentPhone, studentEmail, studentAddress, studentClass, studentSection, studentRoll) VALUES ('$studentFirstName', '$studentMiddleName', '$studentLastName', '$gender', '$studentDOB', '$studentPhone', '$studentEmail', '$studentAddress', '$studentClass', '$studentSection', '$studentRoll')";
          mysqli_query($db, $insertSQL);
          $success = 'Student Details Added Succesfully';
        }     
    } 

    if(isset($_GET["del"])){
      $id = $_GET['del'];
      $del_sql = "DELETE FROM student where id = '$id'";
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
            if (isset($columnData[0]) && isset($columnData[1]) && isset($columnData[2]) && isset($columnData[3]) && isset($columnData[4]) && isset($columnData[5]) && isset($columnData[6]) && isset($columnData[7]) && isset($columnData[8]) && isset($columnData[9]) && isset($columnData[10])) {
              $sql_insert = "INSERT INTO 
                            student (studentFirstName, studentMiddleName, studentLastName, gender, studentDOB, studentPhone, studentEmail, studentAddress, studentClass, studentSection, studentRoll) 
                            
                            VALUES ('$columnData[0]', '$columnData[1]', '$columnData[2]', '$columnData[3]', '$columnData[4]', '$columnData[5]', '$columnData[6]', '$columnData[7]', '$columnData[8]', '$columnData[9]', '$columnData[10]')";
                                        
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
      <h3>Add Student</h3>
      <form method='POST'>
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Students</span>
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

          <div class="allinputfield content-section">
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>First Name</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter First Name' name='studentFirstName' />
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
              <input type='text' class='input' placeholder='Enter Last Name' name='studentLastName' />
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
                <option value="default" selected>--Select--</option>
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
              <input type='date' class='input' placeholder='Enter DOB' name='studentDOB' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-phone mid-icon"></i>
                <label class='mid-title'>Phone</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='number' class='input' placeholder='Enter Phone number' name='studentPhone' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-envelope mid-icon"></i>
                <label class='mid-title'>Email</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='email' class='input' placeholder='Enter Email' name='studentEmail' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-location-arrow mid-icon"></i>
                <label class='mid-title'>Address</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Address' name='studentAddress' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Class</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <!-- <input type='text' class='input' placeholder='Enter Student Class' name='studentClass' /> -->
              <select name="studentClass" class='input'>
                <option value="default" selected>--Select--</option>
                <?php
                    $sql = "SELECT distinct className from classes";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      
                ?>
                <option value='<?php echo $row['className'] ?>'>
                  <?php 
                    echo $row['className'];
                  ?>
                </option>
                <?php 
              }?>
              </select>
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>Student Section</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <!-- <input type='text' class='input' placeholder='Enter Student Section' name='studentSection' /> -->
              <select name="studentSection" class='input'>
                <option value="default" selected>--Select--</option>
                <?php
                    $sql = "SELECT distinct classSection from classes";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      
                ?>
                <option value='<?php echo $row['classSection'] ?>'>
                  <?php 
                    echo $row['classSection'];
                  ?>
                </option>
                <?php 
              }?>
              </select>
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-photo-video mid-icon"></i>
                <label class='mid-title'>RollNo</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='text' class='input' placeholder='Enter Roll no' name='studentRoll' />
            </div>

          </div>
          <?php 
              if(isset($_GET["edit"])){
               echo  "<button class='btn' name='update'>Update</button> ";           
              } else {
               echo "<button class='btn' name='submit'>Submit</button>";
              }
          ?>

        </div>
      </form>



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
              <h3>Only Show Last 8 Inserted</h3>
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
                    $sql = "SELECT * from student ORDER BY id desc LIMIT 8";
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
                      href="updatestudent.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a name='del' class="btn-general btn-danger"
                      href="addstudent.php?del=<?php echo $row['id'] ?>">Delete</a>
                  </td>
                </tr>
              </tbody>
              <?php 
                } 
            ?>

            </table>
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>
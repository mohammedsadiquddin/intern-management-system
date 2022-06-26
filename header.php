<?php
session_start();
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- including the jquery datatables  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
     } );
    </script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Intern management system</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <?php
              // if admin has been logged in starting the session 
              if(isset($_SESSION["admin"])){
              echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="adminlogout.php">Admin Logout</a>
              </li>
              ';
              echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="updFromIntern.php">Updates From Intern</a>
              </li>
              ';
              echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="addIntern.php">Add Intern</a>
              </li>
              ';}
              // if intern has been logged in starting the session
              if(isset($_SESSION['internemail'])){
                echo '
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="project_update.php">update of the project</a>
                </li>
                ';
                echo '
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="internlogout.php">Intern Logout</a>
                </li>
                ';
              }
              // if no one is logged in then showing the homepage to the user
              if(!isset($_SESSION["admin"]) && (!isset($_SESSION["internemail"]))){
                echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin.php">Admin Login</a>
              </li>';
              echo ' <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="intern.php">Intern Login</a>
            </li>';
            }?>
              </ul>
          </div>
        </div>
      </nav>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          </body>
          </html>
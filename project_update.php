<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
session_start();
if(!$_SESSION['internemail']){
  header("location: index.php");
}
include 'header.php';
include 'dbconnect_pu.php';
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  // if the user clicked the submit button and all the input fields are set 
  if(isset($_POST["submit"])){
      $name=$_POST["name"];
      $updates=$_POST["updates"];
      $date=$_POST["date"];
      // if input fields are empty showing the alert 
      if(empty($name)|| empty($updates) || empty($date)){
        echo "<div class='alert alert-danger' style='margin-bottom:0'>
        <strong>Empty!</strong>Kindly fill up all the details
        </div>";
      }
      // entering all the details into the projectupdate database 
      else{
      $sql="INSERT INTO `projectupdate` (`name`, `updates`, `date`) VALUES ('$name', '$updates', '$date')";
      $result=mysqli_query($con,$sql);
      if($result){
        echo "<div class='alert alert-success' style='margin-bottom:0'>
        <strong>Success!</strong>Successully updated the project
        </div>";
      }
    }
  }
}
?>

<form method="post" action="project_update.php">
    <div class="container">
    <h1>PROJECT UPDATE</h1>
    <div class="mb-3">
      <!-- displaying here intern email which has been stored in the session  -->
      <?php
      echo '<b> Email:'.$_SESSION['internemail'];
      ?>
    </div>
  <div class="mb-3">
    <input name="name" placeholder="Enter your name" style="width:50vw" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <textarea  name="updates" placeholder="Update of the project" cols="30" rows="10"></textarea>
  </div>
  <div class="mb-3">
  <input type="date" name="date">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<!-- INSERT INTO `emp` (`sno`, `name`, `phno`, `email`, `password`) VALUES ('1', 'brock', '8888888888', 'brock@gmail.com', 'brock123'); -->
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
session_start();
// if admin is not logged in then redirecting him to the index page 
if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
  header("location: index.php");
  exit();
}
?>
<?php
include 'header.php';
include 'dbconnect_emp.php';
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST["submit"])){
  // echo 'Registered';
  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $password=$_POST["password"];

  if(empty($name) || empty($phone) || empty($email) || empty($password)){
    echo "kindly fill all the details";
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
    echo "Enter the correct name";
  }
  else{
    // $passwordhash=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO `emp` (`name`, `phno`, `email`, `password`) VALUES ('$name', '$phone', '$email', '$password')"; 
    $result=mysqli_query($con,$sql);
    if($result){
      // echo 'inserted';
      echo "<div class='alert alert-success' style='margin-bottom:0'>
      <strong>Success!</strong>successully added
      </div>";
      // header("location: index.php");
    }
  }
}
else{
  header("location: index.php");
}
}
?>
<form method="POST" action="addIntern.php">
        <div class="text-center mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input name="name" style="width: 50vw;margin: auto;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="text-center mb-3">
          <label for="exampleInputEmail1" class="form-label">Phone Number</label>
          <input name="phone" style="width: 50vw;margin: auto;" type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="text-center mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="email" style="width: 50vw;margin: auto;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="text-center mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" style="width:50vw;margin: auto;" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button style="display: flex;margin:auto;" name="submit"  type="submit" class="btn btn-primary">Submit</button>
      </form>
      <?php
      include 'footer.php';
      ?>
<?php
// hiding the notices from the interface
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
// header component
include 'dbconnect_emp.php';
include 'header.php';
// database component
?>
<?php
$login=false;
// if the form request method is post
if($_SERVER["REQUEST_METHOD"]=="POST"){
  // if the user clicked the submit button 
  if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    // selecting the email and password from the database if exists
    $sql="Select * from Emp where email='$email' AND password='$password'";
    // executing the query
    $result=mysqli_query($con,$sql);
    // checking if any row are there with the enterd email and password
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['internemail']=$email;
        header("location: project_update.php?intern=true");
        }
        // if the input fields are empty 
    else if(empty($email) || empty($password)){  
          echo "<div class='alert alert-danger' style='margin-bottom:0'>
          <strong>Failed!</strong>kindly fill up all the details.
          </div>";
        }
        // if intern enter wrong email and password 
    else{
         echo '<div class="alert alert-danger" role="alert">
         Invalid credentials!
       </div>'; 
        }
      }
    }
?>

    <form action="intern.php" method="post">
        <div class="text-center mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="email" style="width: 50vw;margin: auto;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="text-center mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" style="width:50vw;margin: auto;" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="submit" style="display: flex;margin:auto;" type="submit" class="btn btn-primary">Submit</button>
      </form>
      <?php
      include 'footer.php'
      ?>
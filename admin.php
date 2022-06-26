<?php
// including the php files 
include 'dbconn_admin.php';
include 'header.php';
?>
<?php
// By using the post we can send the data from form to database 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  // if user clicked the submit button 
  if(isset($_POST["submit"])){
  $email=$_POST["email"];
  $password=$_POST["password"];

  // selecting data from admin database where entered email and password should match with the database email and password 
$sql="select * from admin where email='$email' AND password='$password'";
// running the query 
$result=mysqli_query($con,$sql);
// if we found the num of rows is 1 i.e entered mail and password is true then we are letting in the admin 
$num=mysqli_num_rows($result);
if($num==1){
  // starting the session so that we can show the logout and login button to the user 
  session_start();
  $_SESSION['admin']=$email;
  // navigating the user to the next page 
  header("location: addIntern.php?admin=true");
}
// if input fields are empty displaying an alert 
else if(empty($email) || empty($password)){  
  echo "<div class='alert alert-danger' style='margin-bottom:0'>
  <strong>Failed!</strong>kindly fill up all the details.
  </div>";
}
// if admin enter wrong email and password displaying an alert 
else{
  echo "<div class='alert alert-danger' style='margin-bottom:0'>
  <strong>Invalid!</strong>Invalid Credentials
  </div>";
}}}
?>
    <form method="POST" action="admin.php">
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
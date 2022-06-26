<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
session_start();
if(!$_SESSION['admin']){
  header("location: index.php");
}
include 'dbconnect_pu.php';
include 'header.php';
?>

<div class="container" style="margin-top:2vh;">
<table class="table" id="myTable" >
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Updates</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
  // selecting all from projectupdate database 
  $sql="select * from projectupdate";
  $result=mysqli_query($con,$sql);
  $sno=0;
  // fetching the data from database and iterating one by one using while loop 
  while($row=mysqli_fetch_assoc($result)){
    $sno=$sno+1;
    echo "<tr>
    <th scope=`row`>".$sno."</th>
       <td colspan=`7`>".$row['name']."</td>
       <td>".$row['updates']."</td>
       <td>".$row['date']."</td>
       </tr>
 ";}?>
  </tbody>
</table>
</div>
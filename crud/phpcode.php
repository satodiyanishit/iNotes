
<?php

include '_dbconnect.php';
$insert = false;
$update = false;
$delete = false;


//delete record
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `srno` = $sno";
  $result = mysqli_query($conn, $sql);    
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snoEdit'])){
    //update record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];
    
    $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`srno` = $sno";
    $result = mysqli_query($conn, $sql);
    
    if($result){
      $update = true;
    }
    else{
      echo "The error occured--> ". $mysqli_error($conn);
    }
  }
  else{
    $title = $_POST["title"];
    $description = $_POST["description"];
    //insert record
    $sql = "INSERT INTO `notes` (`title`, `description`)VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);

    if($result){
      //echo "The record has been inserted successfullly<br>";
      $insert = true;
      
    }
    else{
      echo "The error occured--> ". $mysqli_error($conn);
    }
  }
  
}

//insert alert
if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Your note has been inserted successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }

  //delete alert
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Your note has been deleted successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }

  //update alert
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Your note has been updated successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
?>


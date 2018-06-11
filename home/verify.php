<?php
  include '../includes/connect.php';
  $getResult = "SELECT * FROM results WHERE exam_id = '$ref' AND user_id = '$user_id'";
  $fetch = $conn->query($getResult);
  if ($fetch->num_rows > 0) {
    header("location: taken.php");
  }
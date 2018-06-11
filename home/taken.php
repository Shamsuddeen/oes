<?php
include 'header.php';
if ($_GET['ref']) {
  $exam_id = $_GET['ref'];
  include '../includes/connect.php';
  $getResult = "SELECT * FROM results WHERE exam_id = '$exam_id' AND user_id = '$user_id'";
  $result 	 = $conn->query($getResult);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    	$score = $row['score'];
    }
  }else{
	header("location: index.php");
  }
}else {
	header("location: index.php");
}

?>

      <div class="callout callout-info">
        <h3>Assessment Taken</h3>
        <p><b>Your Score: <?php echo($score); ?></b></p>
      </div>

<?php
	include 'footer.php';
?>
<?php
  include 'header.php';
if (!$_GET['ref']) {
  header("Location: index.php");
}else {
  $ref = $_GET['ref'];
}


if (isset($_POST) & !empty($_POST)) {
  include '../includes/connect.php';
  $getResult = "SELECT * FROM results WHERE exam_id = '$ref' AND user_id = '$user_id'";
  $fetch = $conn->query($getResult);
  if ($fetch->num_rows > 0) {
    $fmsg = "Assessment take click <a href='taken.php?ref=$ref'> here to view result</a>";
  }else{
    $examPassword = mysqli_real_escape_string($conn, $_POST['examPassword']);
    $check = "SELECT exam_password FROM exams WHERE exam_id = '$ref' AND exam_password = '$examPassword' AND status = 1";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
      $exam_id = $ref;
      $_SESSION['exam_id'] = $exam_id;
      if (isset($_SESSION['exam_id']) & !empty($_SESSION['exam_id'])) {
        $smsg = "Exam Session Started";
      }else {
        $fmsg = "Cannot start session ";
      }
    }else {
      $fmsg = "Invalid Password, please try again.";
    }
  }
}

if (isset($fmsg)) {
  echo "
        <div class='callout callout-danger'>
            <h4>Ooops!</h4>
              Uhumm! Error occured  ". $fmsg ."
        </div>
  ";
}
if(isset($smsg)){
  echo "
        <div class='callout callout-success'>
            <h4>Success!</h4>
            ".$smsg."
        </div>
  ";
}
?>

<div class="row">
  <div class="col-md-4">
  </div>
  <?php
    if (isset($_SESSION['exam_id']) & !empty($_SESSION['exam_id'])) {
      $exam_id = $_SESSION['exam_id'];
  ?>
  <?php
    include '../includes/connect.php';
    $getInfo = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
    $res = $conn->query($getInfo);
    while ($r = $res->FETCH_ASSOC()) {
      $exam_Name    = $r['exam_name'];
      $examTime     = $r['exam_time'];
      $nOfQuestions = $r['nOfQuestions'];
      $markPerAnswer = $r['markPerAnswer'];
    }
  ?>
    <div class='callout callout-info'>
      <h4><b><?php echo $exam_Name; ?></b> Instruction</h4>
        <p>
          <ul>
            <li>You will answer <?php echo $nOfQuestions; ?> Questions</li>
            <li>Your attempt will be automatically submit after <?php echo $examTime; ?>Minutes</li>
            <li>Each Questions carries <?php echo $markPerAnswer; ?>marks </li>
            <a href="exam.php?ref=<?php echo $exam_id;?>" class="btn btn-danger btn-flat btn-block" onclick="confirm('Are sure you want to attempt this exams?')">START</a>
          </ul>
        </p>
    </div>
  <?php
}else {
  ?>
  <div class="col-md-8">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Take Exam</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
        <form method="POST" action="#">
          <div class="box-body">
            <div class="form-group">
              <?php
                include '../includes/connect.php';
                $selExam = "SELECT * FROM exams WHERE exam_id = '$ref'";
                $res = $conn->query($selExam);
                while ($r = $res->FETCH_ASSOC()) {
                  $exam_Name = $r['exam_name'];
                }
              ?>
              <label for="examName">Exam Name</label>
              <input type="text" name="examName" value="<?php echo $exam_Name; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="password">Exam Password</label>
              <input type="password" name="examPassword" class="form-control">
            </div>
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-md-8">
              </div>
              <div class="col-md-4">
                <input type="submit" value="Submit" class="btn btn-primary btn-flat btn-block">
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
  <?php } ?>
</div>

<?php
  include 'footer.php';
?>

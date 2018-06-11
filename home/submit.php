<?php
  include 'header.php';
  $exam_id = $_SESSION['exam_id'];
  include '../includes/connect.php';
  $getExamInfo = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
  $result = $conn->query($getExamInfo);

  while ($data = $result->FETCH_ASSOC()) {
    $exam_Name      = $data['exam_name'];
    $examTime       = $data['exam_time'];
    $nOfQuestions   = $data['nOfQuestions'];
    $markPerAnswer  = $data['markPerAnswer'];
  }
?>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Assessment Summary</h3>
      </div>
        <div class="box-body">
          <table class="table table-hover tabler-striped">
            <thead>
              <th>Question</th>
              <th>Your answer</th>
              <th>Correct answer</th>
            </thead>
            <tbody>
              <?php
                for ($i = 1; $i <= $nOfQuestions; $i++) { 
                  ${"ques$i"}   = mysqli_real_escape_string($conn, $_POST['question'.$i.'']);
                  ${"answer$i"} = strtolower(mysqli_real_escape_string($conn, $_POST['answer'.$i.'']));
                  $getInfo = "SELECT * FROM questoins WHERE question_id = '".${"ques$i"}."' ";
                  $resInfo = $conn->query($getInfo);
                  while ($row = $resInfo->FETCH_ASSOC()) {
              ?>

              <tr>
                <td><?php echo($row['question']) ?></td>
                <td><?php echo(${"answer$i"}) ?></td>
                <td><?php echo($row['is_correct']) ?></td>
              <?php
                    if ($row['is_correct'] == ${"answer$i"}) {
                      $score = $markPerAnswer;
                    }else{
                      $score = 0;
                    }
                    $total_score += $score;
              ?>
              </tr>
              <?php
                  }
                }
                
                $total_mark   = $nOfQuestions * $markPerAnswer;

                $insert = "INSERT INTO `results`(`user_id`, `exam_id`, `score`) VALUES ('$user_id','$exam_id','$total_score')";
                $conn->query($insert);
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="callout callout-info">
        <h3>Your Score</h3>
        <p><b><?php echo($total_score ." / ". $total_mark); ?></b></p>
      </div>


<?php
  include 'footer.php';
?>

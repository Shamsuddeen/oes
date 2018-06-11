<?php
  include 'header.php';

  if (isset($fmsg)) {
    echo "
          <div class='callout callout-danger'>
              <h4>Ooops!</h4>
                Uhumm! Error occured ". $fmsg ."
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

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">All Examinations</h3>
  </div>
      <div class="box-body">
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <th>Examination Name</th>
          </thead>
          <tbody>
            <?php
              include '../includes/connect.php';
              $getExams = "SELECT * FROM exams WHERE status = 1";
              $getQuery = $conn->query($getExams);
              while ($row = $getQuery->FETCH_ASSOC()) {
            ?>
              <tr>
                  <td>
                    <a href="take-exam.php?ref=<?php echo $row['exam_id'];?>" title="Attempt <?php echo $row['exam_name'];?>">
                      <?php echo $row['exam_name'];?>
                    </a>
                  </td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
  </div>

<?php
  include 'footer.php';
?>

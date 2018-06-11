</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
<!-- To the right -->
<div class="pull-right hidden-xs">
  Version 1.0 - Developed by <a href="http://omacys.s3host.ml">Shamsuddeen Omacy</a>
</div>
<!-- Default to the left -->
  <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="./"><?php echo("OES"); ?></a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->
<script src="../assets/jQuery/jquery-2.2.3.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/demo.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/pace/pace.min.js"></script>
<script src="../assets/toastr/toastr.min.js"></script>
<script src="../assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/DataTables/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="../assets/DataTables/pdfmake-0.1.32/vfs_fonts.js"></script>
<script src="../assets/DataTables/Buttons-1.5.1/js/buttons.html5.min.js"></script>
<script src="../assets/DataTables/Buttons-1.5.1/js/buttons.print.min.js"></script>
<script src="../assets/DataTables/Buttons-1.5.1/js/buttons.colVis.min.js"></script>
<script src="../assets/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
<script src="../assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="../assets/moment/moment.js"></script>
<script src="../assets/fullcalendar/dist/fullcalendar.min.js"></script>
<script>
    var min = '<?php echo $examTime; ?>';
    var total_seconds = 60 * min;
    var minutes = parseInt(total_seconds / 60);
    var seconds = parseInt(total_seconds % 60);
    function CheckTime() {
        document.getElementById("exam-time-left").innerHTML = 'Time Left: ' + minutes + 'm ' + seconds + 'secs';
        if (total_seconds <= 60) {
            setTimeout("$('#exam-time-left').fadeToggle();", 1);
        }
        if (total_seconds <= 0) {
            setTimeout('document.exam.submit()', 1);
        } else {
            if(total_seconds <= 1){
              //If time is over should hide the questions and the submit button
                setTimeout("$('table').fadeOut('fast');", 1);
                setTimeout("$('button').hide('fast'); ", 1);
            }if(total_seconds <= 1){
              //Show a message that the time has expired
                setTimeout("$('#timeOut').fadeIn('slow');", 1);
            }
            $("#timeOut").hide("fast");
            total_seconds = total_seconds - 1;
            minutes = parseInt(total_seconds / 60);
            seconds = parseInt(total_seconds % 60);
            setTimeout("CheckTime()", 1000);
        }
    }
    setTimeout("CheckTime()", 1000);
</script>
<script>
  $(document).ready(function() {
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {
          visible: true,
          api: true
        } )
        .columns.adjust();
    } );

    var table = 	$('#example').DataTable({
        processing:     true, // for show progress bar
        scrollY:        400,
        scrollCollapse: true,
        lengthChange:   false,
        dom: 'Bfrtip',
        buttons: [
          {
            extend:       'pdfHtml5',
            orientation:  'protrait', //protrait or landscape
            pageSize:     'A4',
          },
          'copyHtml5',
          'excelHtml5',
          'colvis'
        ]
    } );

    table.buttons().container()
      .appendTo( '#example_wrapper .small-6.columns:eq(0)' );
    } );
</script>
<script>

  Command: toastr["success"]( "Online Exam Management System!", "Welcome to")

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>
<script>
$(function () {
/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

$('#calendar').fullCalendar({
  header    : {
    left  : 'prev, next, today',
    center: 'title',
    right : 'month,agendaWeek,agendaDay'
  },
  buttonText: {
    today: 'today',
    month: 'month',
    week : 'week',
    day  : 'day'
  }
})
})
</script>
</body>
</html>

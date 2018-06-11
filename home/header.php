<?php
	session_start();
if(!isset($_SESSION['username']) & empty($_SESSION['username'])){
  header('location: ../');
}else{
  include '../includes/connect.php';
	$user_name = $_SESSION['username'];
	$userSQL = "SELECT * FROM users WHERE username = '$user_name' OR email = '$user_name'";
	$res 	= $conn->query($userSQL);
  if ($res->num_rows > 0) {
  	while ($r = $res->FETCH_ASSOC()) {
      $user_id      = $r['user_id'];
  		$fullname   	= $r['fullname'];
      $role       	= $r['role'];
      $profile_pic  = $r['profile_pic'];
      $username 		= $r['username'];
      $gender     	= $r['gender'];
      $email      	= $r['email'];
      if ($r['role'] == 1) {
        header("Location: ../admin/");
      }
  	}
  }else{
    header("Location: ../");
  }
  //$conn->close();
}
	$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home | OES</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  <link rel="icon" href="../assets/img/icon.png">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link type="text/css" rel="stylesheet" href="../assets/css/skins/_all-skins.css">
  <link rel="stylesheet" href="../assets/toastr/toastr.css">
  <link rel="stylesheet" href="../assets/pace/css/pace-center-atom.css" >
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- fullCalendar -->
     <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../assets/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
			<div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand"><b>Home</b>OES</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo($profile_pic); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $fullname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo($profile_pic); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $fullname; ?> - <?php echo $role; ?>
                  <small><?php echo($email); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../includes/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
		</div>
    </nav>
    </header>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="container">
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    © 2018 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Help

    Contact GitHub
    API
    Training
    Shop
    Blog
    About

Press h to open a hovercard with more details.

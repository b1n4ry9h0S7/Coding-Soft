<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">


<head>
  <title>Results</title>
</head>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Results</h1>
  </div>
</div>

<div class="container">
<?php
  session_start();
  include('includes/DB.php');

  if(!isset($_SESSION['auth']))
  {
   echo '<body id="bground">';
    echo '<div class="container">
<div class="card" id="LT">
<h4>You are not authorized to view this page. Login to continue</h4>
 <a href="auth.php" class="btn btn-primary btn-block">Login</a>
 </div>
</div>';
    echo '</body>';
    echo '<style type="text/css">
  #bground {
     background: linear-gradient(to right, #ff9966, #ff5e62);
  }
</style>
';
    exit();
  }
  $result = DB::query("SELECT id, name, points FROM teams");
?>
<hr>
<?php if($result): ?>
<div class="questions list-group">
  <?php foreach($result as $i=>$r): ?>
          <div class="question card">
            <h3 class="question-title">
              <h3 class="text-center display-4"> Team <?php echo $r['name']; ?> </h3>
              <hr>
              <h3 class="text-center display-5">Points: <?php echo $r['points']; ?> </h3>
            </h3>
          </div>
  <?php endforeach; ?>
</div>
<?php else: ?>
  <p class="alert alert-info">No Teams yet</p>
  <a href="index.php" class="btn btn-primary">Team</a>
<?php endif; ?>
</div>

<style type="text/css">
h3 {
  font-family: "Times New Roman", san-serif;
  font-size: 25px;
}
  .jumbotron {
    text-align: center;
    color: white;
     background: linear-gradient(to right, #ff9966, #ff5e62);
  }
.card {
  border-radius: 10px;
}
.question-edit {
    
}
  </style>

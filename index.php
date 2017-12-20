<link rel="stylesheet" href="includes/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/css/main.css">
<link rel="stylesheet" href="includes/css/animate.css">  
<link href="https://fonts.googleapis.com/css?family=Pacifico|Shrikhand" rel="stylesheet">

<head>
  <title>Code Igniter</title>
</head>
<body id="bground" >

  <div class="jumbotron jumbotron-fluid">
    <h1 class="display-3 animated flipInY header
"><b><span id="Mmash">CODE IGNITER</span></b></h1>      
    <h3><span class="ityped"></span></h3>
    <hr>
  </div>  
</div>

<script src="includes/js/ityped.js"></script>
  <script>
    window.ityped.init(document.querySelector('.ityped'), {
            strings : ['We hope you will enjoy!', 'Have fun! All the best!'],
            loop : true
        });
  </script>


<div  class="container">
<?php
session_start();
include('includes/DB.php');

if(isset($_POST['submit'])) {
  if(isset($_POST['team']) && !empty($_POST['team']))
  {
    $_SESSION['team'] = $_POST['team'];
    $team_name = $_POST['team'];
    if(!DB::query("SELECT name FROM teams WHERE name=:name", array(':name' => $team_name)))
    {
      DB::query("INSERT INTO teams VALUES(DEFAULT, :team, 0)", array(':team' => $team_name));
      setcookie("team_name", $team_name);
      $_SESSION['pageLoaded'] = 0;
      header('Location: coding.php');
    }
    else
    {
      echo '<div class="alert alert-warning">Duplicate team name found!</div>';
    }
  }
  else
  {
    echo '<div class="alert alert-warning">Team name cannot be empty!</div>';
  }
}

?>
  <div class="card text-center" id="team-entry">
    <div class="container">
      <div clas="card-body">
        <h4 class="card-title">
          Enter the team name:
        </h4>
        <form method="post">
          <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">Team</span>
            <input class="form-control" type="text" name="team" placeholder="Type the team name...">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary  btn-block" type="submit" name="submit">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<div class="card">
  <div class="card-header">
    <b>Rules:</b>
  </div>
  <div class="card-block">
    <p>


      <!-- RULES -->
      <pre>  1. Rule 1.
  2. Rule 2 .
  3. Rule 3.
  4. Rule 4.
  5. Rule 5.</pre>

    <!-- End of Rules -->
  </p>

  <hr>
  </div>
</div>


</div>
</body>
<style type="text/css">
  #bground {
     background: linear-gradient(to right, #ff9966, #ff5e62); 
  }

  .jumbotron {
    text-align: center;
    background-color: white;
  }
  pre {
    font-family: "Times New Roman" , Times, sans-serif;
    font-size: 20px;
  }

  .card-header {
      font-family: "Times New Roman" , Times, sans-serif;
    font-size: 20px;
  }

  .card {
    border-radius: 8px;
  }
    #Mmash {
        margin: 0;
        padding: 0;
        text-align: center;
        font-family: 'Shrikhand', cursive;
        color: transparent;
        background-image: linear-gradient(to right, #eb3349, #f45c43);
        -webkit-background-clip: text;
        -moz-background-clip: text;
      animation: animate 10s linear infinite;
        background-size: 1000%;
    }
  @keyframes animate
    {
        0%
        {
            background-position: 0% 100%;
        }
        20%
        {
            background-position: 100% 0%;
        }
        100%
        {
            background-position: 0% 100%;
        }
    }
</style>
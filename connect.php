<?php
  session_start();

  //phpinfo();
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  
  $mysql = mysqli_connect("localhost", "user123512", "abc123", "dhusttesting");
  
  if (!$mysql) { 
    echo "Error: Unable to connect to MySQL" . PHP_EOL; 
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
  }
  
  echo "Success! Able to connect to MySQL." . PHP_EOL;
  echo "Connection Information: " . mysqli_get_host_info($mysql) . PHP_EOL; 
  
  mysqli_close($mysql);
  
?>

<!doctype html>

<html>
  <head>
  
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>MySQL Connect</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <!-- Optional theme
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    -->
	
	<style>
	
	
	
	</style>
    
    
    
  </head>
  
  <body>
  
    
    <div class="navbar navbar-default">
    
      <div class="container">
      
        <div class="navbar-header">
        
          <a href="" class="navbar-brand">My Website</a>
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
          <ul class="nav navbar-nav">
          
            <li><a href="#">Page 1</a>
            <li><a href="#">Page 2</a>
            <li><a href="#">Page 3</a>
          
          </ul>
        
        </div>
      
      </div>
    
    </div>
    
    
    <div class="container">
        
        
    </div>      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>

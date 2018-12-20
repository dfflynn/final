<?php
  session_start();
  $db_host='localhost';
  $db_user='david';
  $db_pass='cst336';
  $db_name='racing';
    
    
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if(!$conn) {
    die ('failed to connect' . mysqli_connect_error());
  }
  
  
  $timeString = "CAST('" . $_GET['time'] . "' AS DATE)";
  $passString = $_GET['pass'];
  $placeString = $_GET['place'];
  
  
  $sql = 'INSERT INTO `page`(`TIME`, `PASS`, `LOCATION`) VALUES (' . $timeString . ',"' .$passString.  '", "'. $placeString . '")';
  
  $query = mysqli_query($conn, $sql);
  
    
  $sql = 'select * from page';
  $query = mysqli_query($conn, $sql);
  
  
    
  if(!$query) {
    die ('error found' . mysqli_error($conn));
  }
  
  
  
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Racing</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
    <body>
    
    
    <div id = "searchbar">
      
    </div>
    
    <a href="./add.php"><img src="./img/add.png" width="50" height="45"></a>
    
    <div id = 'mainView'>
      <?php
      
        
      
        echo "
        <table class = 'table'>
        <tr>
        <th>ID</th>
        <th>TIME</th>
        <th>LOCATION</th>
        </tr>";
        
        while ($row = mysqli_fetch_array($query)) {
          
          
          
          echo ' <tr>
          <td>'.$row['ID'].'</td>
          <td>'.$row['TIME'].'</td>
          <td>'.$row['LOCATION'].'</td>
          </tr>';
        }
        
        echo "</table>";
      
      ?>
      
    </div>
    
    
    
   
    
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
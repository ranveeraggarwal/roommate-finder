<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roommate Finder</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
    <div class="row">
    <br>
      <div class="col-md-6 col-md-offset-3 well">
        <?php
          if(!$_POST['host'] || !$_POST['room'] || !$_POST['name'] || !$_POST['dept'] || !$_POST['fblink']){
            die('You didn\'t fill in a required field.');
          }
          $host = $_POST['host'];
          $room = $_POST['room'];
          $name = $_POST['name'];
          $dept = $_POST['dept'];
          $fblink = $_POST['fblink'];
          $opened = fopen('roomie.txt','r');
          if (!$opened) {echo 'ERROR: Unable to open file';}
          $oneisPresent = 0;
          $twoisPresent = 0;
          while(!feof($opened)) {
            $line = fgets($opened, 2048);
            $exline=explode('*****',$line);
            if((strcmp($exline[0],$host)==0) && (strcmp($exline[1],$room)==0) && (strcmp($exline[2], "1")==0))
            {
              $oneisPresent = 1;
            }
            if((strcmp($exline[0],$host)==0) && (strcmp($exline[1],$room)==0) && (strcmp($exline[2], "2")==0))
            {
              $twoisPresent = 1;
              break;
            }
          }
          if (($oneisPresent == 1) && ($twoisPresent == 1)) {
            echo "Umm.. Looks like there is a mistake. Both the occupants have already filled up for this room.";
          }
          elseif ($oneisPresent == 0) {
            fclose($opened);
            $writed = fopen("roomie.txt", "a"); 
            if (!$writed) {
              print("Could not append to file");
            }
            $writer = implode("*****",$data);
            fwrite($writed,PHP_EOL.$host."*****".$room."*****1*****".$name."*****".$dept."*****".$fblink."\n");
            echo "Your response has been recorded";
            fclose($writed);
          }
          elseif (($oneisPresent == 1) && ($twoisPresent == 0)) {
            fclose($opened);
            $writed = fopen("roomie.txt", "a"); 
            if (!$writed) {
              print("Could not append to file");
            }
            $writer = implode("*****",$data);
            fwrite($writed,PHP_EOL.$host."*****".$room."*****2*****".$name."*****".$dept."*****".$fblink."\n");
            echo "Your response has been recorded";
            fclose($writed);
          }
          else {die("Error! Report this at ranveeraggarwal@gmail.com");}
        ?>
        
        
      </div>
    </div>
    <center><a class="btn btn-primary" type="button" href="./index.html">Back to Roommate Finder</a></center>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
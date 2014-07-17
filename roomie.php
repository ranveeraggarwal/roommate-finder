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
  	<center><h2>Details for <?php echo "Hostel ".$_POST['hostel'].", room number ".$_POST['roomno']; ?></h2></center>
  	<hr>
  	<div class="row">
  	<div class="col-md-6 col-md-offset-3 well">
	  <?php
	  	if(!$_POST['hostel'] || !$_POST['roomno']){
	      die('You didn\'t fill in a required field.');
	    }
	    $hostel = $_POST['hostel'];
	    $roomno = $_POST['roomno'];
	    $opened = fopen('roomie.txt','r');
		if (!$opened) {echo 'ERROR: Unable to open file';}
		$oneisPresent = 0;
		$twoisPresent = 0;
		while(!feof($opened)) {
			$line = fgets($opened, 2048);
			$exline=explode('*****',$line);
			//echo $exline[0];
			if((strcmp($exline[0],$hostel)==0) && (strcmp($exline[1],$roomno)==0) && (strcmp($exline[2], "1")==0))
			{
				echo "<center><h4>Occupant 1</h4></center><p><a href='http://www.facebook.com/".$exline[5]."''>".$exline[3]."</a><br>".$exline[4]."</p><hr>";
				$oneisPresent = 1;
			}
		}
		if ($oneisPresent == 0)
		{
			echo "<center><h4>Occupant 1</h4></center><p>Hard Luck! Look like the occupant hasn't visited the app yet :(</p><hr>";
		}
		fclose($opened);
		$opened = fopen('roomie.txt','r');
		while(!feof($opened)) {
			$line = fgets($opened, 2048);
			$exline=explode('*****',$line);
			//echo $exline[0];
			if((strcmp($exline[0],$hostel)==0) && (strcmp($exline[1],$roomno)==0) && (strcmp($exline[2], "2")==0))
			{
				echo "<center><h4>Occupant 2</h4></center><p><a href='http://www.facebook.com/".$exline[5]."''>".$exline[3]."</a><br>".$exline[4]."</p>";
				$twoisPresent = 1;
			}
		}
		if ($twoisPresent == 0)
		{
			echo "<center><h4>Occupant 2</h4></center><p>Hard Luck! Look like the occupant hasn't visited the app yet :(</p>";
		}
		/*if ($isPresent == 0) {
			fclose($opened);
			$writed = fopen("roomie.txt", "a"); 
			if (!$writed) {
				print("Could not append to file");
			}
			$data=$_POST;
			//unset($data[name]);
			//unset($data[dept]);
			//unset($data[fblink]);
			//$writer = implode("*****",$data);
			fwrite($writed,PHP_EOL.$hostel."*****".$roomno."*****\n");
			echo "Your response has been recorded";
			fclose($writed);
		}*/
	  ?>
</div>
</div>
<hr>
<center>
	<a class="btn btn-primary" href="./index.html">Back to Roommate Finder</a>
	<hr>
	<h3>Did you find your</h3>
	<img src="./img/evil.jpg" class="img img-responsive">
	<h3>No?</h3>
	<h4>Well, you'll have to wait until he fills this up [Fingers Crossed].</h4>
</center>
<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<p>Don't see your details in there? Add 'em here!</p>
			<form action="enter.php" method="post">
			    <div class="form-group">
			    	<input type="text" name="host" id="host" class="form-control" placeholder="Hostel" tabindex="3">
			    	<i>Example: 15</i>
			    	<input type="text" name="room" id="room" class="form-control" placeholder="Room Number" tabindex="3">
			    	<i>Example: A101</i>
			        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" tabindex="3">
			        <br>
			        <input type="text" name="dept" id="dept" class="form-control" placeholder="Your Department" tabindex="3">
			        <br>
			        <input type="text" name="fblink" id="fblink" class="form-control" placeholder="Your Facebook Username" tabindex="3">
			        <i>Example: coolsuperman (if your profile link goes like www.facebook.com/coolsuperman)</i>
			    </div>
			    <center><button class="btn btn-primary" type="submit" name="entbtn">Add!</button></center>
		    </form>
		</div>
	</div>
	<hr>
    			<center><p>Also, while you're at it, you might wanna take a look at</p></center>
    			<center><img src="./img/drevil.jpg" class="img img-responsive"></center>
    			<hr>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
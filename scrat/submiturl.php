<?php
$server="localhost";
	$db="google2";
	$user="root";
	$pass="";
	$conn=new mysqli($server,$user,$pass,$db);
	session_start();
	$message="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$addurl=$conn->prepare("INSERT INTO submittedurl (url) VALUES(?)");
	$addurl->bind_param("s",$_POST["url"]);
	if($addurl->execute())
	{
		$message="Url has been added.Our Spider will visit your site soon.Thank you";
	}
	else
	{
		$message="Url has been already added.Our Spider will visit your site soon.Thank you";
	}
	$addurl->close();

}

?>
<!Doctype html>
<html>
<head>
	<title>Submit Url to Scrat</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootcss.css" rel="stylesheet" type="text/css"/>

    <script src="jquery.min.js"></script>
    <script src="bootjs.min.js"></script>
    <script>
    $(document).ready(function()
    	{
    		$("#secondvisibile").hide();
$("#bottominput").keyup(function()
{
	if($(this).val().length !=0)
	{
	$("#secondvisibile").show();
	$("#topinput").val($(this).val());
	$("#hideplace").hide();
}


});
    });
    </script>
    <style type="text/css">
    ul
    {
    	list-style: none;
    }
    </style>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-lg-12"  style="">
			<h1 style="font-size:20px;font-weight:light;margin-left:300px;">Submit url to <Br /></h1>
			<center>
			<img src="mainlogo.png" style="height:300px;" />
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
				<input name="url" type="url" placeholder="http://something.somewhere.something"  style="height:30px;width:400px;"/><button class="btn btn-default" type="submit">Submit URL</button>
			<p><?php echo $message ;?></p>
			</form>
			</center>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12" style="text-align:center;position:absolute;bottom:0;left:0;right:0">
			<p>&copy;Scrat Developers    <a href="#" >Sign In</a>                <a href="index.php" >Home</a></p>

		</div>
	</div>
</body>
</html>

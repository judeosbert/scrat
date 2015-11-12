<!Doctype html>
<html>
<head>
	<title>Scrat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" >
     <!--[if lte IE 8]>

     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
     <!--[if lt IE 9]>
     <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>

     <![endif]-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	   <script>

    $(document).ready(function()
    	{

				$("#addbutton").click(function()
			{
				top.location="submiturl.php";
			});
				$("#searchsomething").hide();
				$("#addbutton").hide();
    		$("#secondvisibile").hide();
					$("#endtext").hide();









$("#bottominput").keyup(function()
{$("#addbutton").hide();
	if($(this).val().length !=0)
	{

	$("#secondvisibile").show();
	$("#topinput").val($(this).val());
	$("#searchtext").html("Searching for <span style='color:#0288d1;'> "+$(this).val()+"</span>");
	$("#searchtext").fadeIn();

	//Do ajax here

	//Doing ajax request here
			$("#searchsomething").hide();
			$.ajax({
				method:"post",
				url:"fetchresult.php",
				data:"query="+$(this).val(),
				complete:function()
				{
					document.title=$('#bottominput').val();
				},
				success:function(response)
				{
for(var i=1;i<=response.length;i++)
{
	response=response.replace("\\","");

}

				var json=JSON.parse(response);

				for(var i=1;i<=json.results.url1;i++)
				{
					json.results.url1=json.results.url1.replace("\\","");

				}
				var array = $.map(json.results, function(el) { return el; })
				var final="";
				var resultcount=parseInt(json.count);
				if(resultcount==0)
				{
					$("#resultul").html("").fadeIn();
				$("#searchsomething").text("No Results").show();
				$("#searchtext").hide();
				$("#addbuttonsomething").show();

				}
				else
				{

				for(var i=0;i<=30;i=i+3)
				{


			final="<li class='list-item' style='min-width:100%;'>";
		    final=final+"<a target='_blank' href='"+array[i]+"' style='font-size:28px;'>"+array[i+1]+"</a><br />";
		    final=final+"<a target='_blank' href='"+array[i]+"' style='font-size:13px;color:green;'>"+array[i]+"</a><br />";
		    final=final+"<p>"+array[i+2]+"</p><hr /></li>";
				if(typeof array[i]=='undefined')
				break;
				$("#resultul").hide();
		    	$("#resultul").append(final);
					$("#resultul").fadeIn();


}

}
			//alert(json.results.url1);
				$("#searchtext").html("About  <span style='color:#0288d1;'> "+json.count+"</span> results").fadeIn();

				}
		});


	// Doing ajax
	$("#topinput").focus();

	$("#hideplace").hide();


}
else {
		$("#searchtext").text("");
		document.title="Scrat The Open Search Engine";
}
});
$("#topinput").keyup(function()
{
	$("#addbutton").hide();
$("#resultul").html("");
$("#basic").hide();
	if($(this).val().length !=0)
	{

			//Doing ajax request here
			$("#searchsomething").hide();
			$.ajax({
				method:"post",
				url:"fetchresult.php",
				data:"query="+$(this).val(),
				complete:function()
				{
					document.title=$('#topinput').val();
				},
				success:function(response)
				{
for(var i=1;i<=response.length;i++)
{
	response=response.replace("\\","");

}

				var json=JSON.parse(response);

				for(var i=1;i<=json.results.url1;i++)
				{
					json.results.url1=json.results.url1.replace("\\","");

				}
				var array = $.map(json.results, function(el) { return el; })
				var final="";
				var resultcount=parseInt(json.count);
				if(resultcount==0)
				{
					$("#resultul").html("").fadeIn();
				$("#searchsomething").text("No Results").show();
				$("#searchtext").hide();
				$("#addbutton").show();
				}
				else
				{

				for(var i=0;i<=30;i=i+3)
				{

					//
			final="<li class='list-group-item' style='min-width:100%;'>";
		    final=final+"<a target='_blank' href='"+array[i]+"' style='font-size:28px;'>"+array[i+1]+"</a><br />";
		    final=final+"<a target='_blank' href='"+array[i]+"' style='font-size:13px;color:green;'>"+array[i]+"</a><br />";
		    final=final+"<p>"+array[i+2]+"</p><hr /></li>";
				if(typeof array[i]=='undefined')
				break;
				$("#resultul").hide();
					$("#resultul").append(final);
					$("#resultul").fadeIn();


}


}
			//alert(json.results.url1);
				$("#searchtext").html("About  <span style='color:#0288d1;'> "+json.count+"</span> results").fadeIn();

				}

		});



	}
	else
	{
$("#searchtext").text("");
$("#resultul").html("");
document.title="Scrat The Open Search Engine";
$("#searchsomething").html("VerveBox Inc.<p style='font-size:15px;'>The complete network for students</p>").show("slow");
	}
$('a').on('click',function(e)
{
	alert("hi");
});
});



    });
    </script>
    <style type="text/css">
		@font-face {
		font-family: mont;
		src:url(mont.otf);
		}
    ul
    {
    	list-style: none;

    }
		.list-group-item
		{
			border:0px;
		}

    </style>
</head>
<body onload="" >
	<div class="container-fluid">
	<div class="row" id="secondvisibile" style="background-color:#F1F1F1;box-shadow:0px 0px 3px 3px rgba(0,0,0,0.2);postion:fixed;height:70px;">
		<div class="col-lg-2">
			<a href="index.php"><img src="logo.png" style="height:80px;margin-top:-2px;margin-left:80px;" /></a>
		</div>
		<div class="col-lg-10">
			<div class="searchbar" style="width:100%;margin-top:20px;">
				<ul class="list-inline">
					<li><input spellcheck="true" id="topinput"  type="text" style="width:600px;height:40px;font-size:20px;font-family: 'Roboto', sans-serif;font-weight:100;" placeholder="&nbsp;Search query" /></li>
					<li><button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button></li>
				</ul>
				<!--<div id="suggetions" style="z-index:80;width:600px;height:200px;color:#fff;box-shadow:0px 0px 2px 2px rgba(0,0,0,0.2);"></div>-->

			</div>
		</div>
	</div>
	<div class="row" id="resultspace" style="font-weight:light;font-family:mont;height:100%;width:100%;display:hidden;padding-left:10%;padding-right:10%;">
<div class="col-lg-12" style="height:50px;"><p id="searchtext" style="font-size:15px;"></p></div>
<div class="col-lg-12"><center><p id="searchsomething" style="font-size:70px;margin-top:15%;"></p>
												<button id="addbutton" class="btn btn-primary">Know website having result ? Add it to Scrat</button></center></div>
<div class="col-lg-12">
	<div style="margin-left:10%;margin-right:10%;">
<ul id="resultul" class="list-group">



		</ul>
		<ul class="list-"
	</div>
</div>

</div>
	</div>
	<div class="row" id="hideplace" style="margin-top:50px;">
		<div class="col-lg-12" style="text-align:center;">
			<ul class="list-group">
				<li><img src="mainlogo.png" style="margin-left:0px;height:200px;margin-top:50px;border:0px solid red;border-radius:00%;"  /></li>
			<li><input spellcheck="true" autofocus id="bottominput" type="text" style="width:600px;height:40px;font-size:20px;font-family: 'Roboto', sans-serif;font-weight:light;margin-top:-600px;" />
						</li>
			<li><br /><button class="btn btn-default" style="">ScratSearch</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:none;color:#fff;" href="developers.html"><button class="btn btn-primary" style="">Developers</buton></a></li>
		</ul>
		</div>

	</div>
	<div class="row">
		<center>
		<div class="col-lg-12" style="text-align:center;position:absolute;bottom:0;left:0;right:0">
			<p id="basic">&copy;ScratDevelopers    <a href="#" >Documentation</a>       <a target='_blank' href="submiturl.php" >Submit URL</a></p>
			<center>
		</div>
	</div>
	</div>
</body>
</html>

<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<style>
		body
		{
			heigh: 100%;
			background-repeat: repeat;
    			background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
		}
		td{
			background-color: #F7F7F7
		}
		.navbar {
   	 		margin-bottom: 0 !important;
		}
		.navbar .nav > li > a {
    			color:  #0066F !important;
		}
		.editor { 
        		position: relative;
			height: 500px;
			width: 750px;
		}
		.effect1{
			-webkit-box-shadow: 0 10px 6px -6px #777;
	   		-moz-box-shadow: 0 10px 6px -6px #777;
	        	box-shadow: 0 10px 6px -6px #777;
		}
		.container
		{
			width: 100%	
		}
		.effect8
		{
  			position:relative;       
    			-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       			-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            		box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		}
		.effect8:before, .effect8:after
		{
			content:"";
    			position:absolute; 
    			z-index:-1;
    			-webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    			-moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    			box-shadow:0 0 20px rgba(0,0,0,0.8);
    			top:10px;
    			bottom:10px;
    			left:0;
    			right:0;
    			-moz-border-radius:100px / 10px;
    			border-radius:100px / 10px;
		} 
		.effect8:after
		{
			right:10px; 
    			left:auto;
    			-webkit-transform:skew(8deg) rotate(3deg); 
       			-moz-transform:skew(8deg) rotate(3deg);     
        		-ms-transform:skew(8deg) rotate(3deg);     
         		-o-transform:skew(8deg) rotate(3deg); 
            		transform:skew(8deg) rotate(3deg);
		}  
		.li{
			color: #FFFFFF;
		}
  	</style>
  	<head>
		<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
    		<title>Compile It!</title>
    		<meta charset="utf-8"> 
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
    		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  	</head>
	<body>
	<section>
		<nav class="navbar navbar-inverse effect1">
  			<div class="container-fluid">
    				<div class="navbar-header">
      					<a class="navbar-brand" href="index.html" style="font-family: 'Lobster', cursive;">Compile It!</a>
    				</div>
    				<div>
      					<ul class="nav navbar-nav navbar-left">
        					<li class="active"><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
      					</ul>
      					<ul class="nav navbar-nav navbar-right">
        					<li><a href="signin.html" style="font-family: 'Lobster', cursive;">Sign In!</a></li>
						<li><a href="signup.html" style="font-family: 'Lobster', cursive;">Sign Up!</a></li> 
      					</ul>
				</div>
			</div>
		</nav><br  /><br   /><br  />
		<div class="card">
			<div class="container">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 pull-left">
					<div class="header pull-left" style="font-family: 'Lobster', cursive; font-size: 30px">&#60;&#47;&#62; Type code here 
					</div>
				</div>
			</div>
			</div>
			<div class="container">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 pull-left">
			 		<div id="editor" class="editor column-md-8"></div>
						<script src="http://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" type="text/javascript" charset="utf-8"></script>
    						<script>
        						var editor = ace.edit("editor");
        						editor.setTheme	("ace/theme/monokai");
        						editor.getSession().setMode("ace/mode/c_cpp");
								editor.getSession().setValue("//write your code here\n");
								var myCode = editor.getSession().getValue();
								//alert(myCode);
								
								function myfunc() {
									myCode = editor.getSession().getValue();
									var input = document.getElementById("in");
									input.value = document.getElementById("comment1").value;
									input.form.submit();
									//alert(document.getElementById("comment1").value);
									//alert(myCode);
									//window.location.href = "/Project/getSourceCode.php?name=" + myCode;
									var element = document.getElementById("code");
									element.value = myCode;
									element.form.submit();
								}
    						</script>
				</div>			
				</div>
			</div>
			</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8" >
				<table class="table table-bordered">
				<tr>
				<td>
					<ul id="myTab" class="nav nav-tabs">
   						<li class="active">
      							<a href="#home" data-toggle="tab">
         							<span class="glyphicon glyphicon-inbox"></span> stdin
      							</a>
   						</li>
   						<li><a href="#ios" data-toggle="tab"><span class="glyphicon glyphicon-inbox"></span> stdout</a></li>
						<li class="pull-right">
						<button type="button" onclick="myfunc()" class="btn btn-success"><span class="glyphicon glyphicon-cog"></span> Run</button></li>
					</ul>
					<form action="getSourceCode.php" method="post" target="targetOutput" width="730" height="150">
							<input type="hidden" name="code" id="code">
							<input type="hidden" name="in" id="in">
							<div id="myTabContent" class="tab-content">
		   						<div class="tab-pane fade in active" id="home">
		   							<div class="form-group">
		  							<textarea class="form-control" rows="5" id="comment1"></textarea>
									</div>
								</div>
		   						<div class="tab-pane fade" id="ios">
		   							<div class="form-group">
		  							<!--<textarea class="form-control" rows="8" id="comment2"></textarea>-->
									<iframe src="blankPage.html" name="targetOutput" width=730 height=150>
									</iframe>
								</div>
								<form action="readFile()" >
								</form>
								<!--<script type="text/javascript">
									document.getElementById("comment2").innerHTML = readFile();

									function readFile() {
										var filePath = "output.txt"
										xmlhttp = new XMLHttpRequest();
										xmlhttp.open("GET",filePath,false);
										xmlhttp.send(null);
										var fileContent = xmlhttp.responseText;
										alert(fileContent);
									}
								</script>-->
							</div>
					</form>
					</td>
					</tr>
					</table>
					</div>
				</div>
		</div>
	</section>
  	</body>
</html>

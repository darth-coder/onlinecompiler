<html>
	<body>

		<?php
			//echo "Hello";
			//echo "$_GET['name']";
			//echo 'Hello <br>' . htmlspecialchars($_GET["name"]) . '!';
			//echo "<br>Bye";

			//$_GET["name"];
//			$sourceFile = "sourceCode.txt";
			$sourceFile = fopen("./sandbox/sourceCode.c", "w") or die("Unable to create sourceCode file");
			//$code = "$_GET['name']";
			//file_put_contents($file, $code);
			//$content = unserialize(file_get_contents($file));

			//echo "$code";
			$code="Failure";
			if (isset($_POST['code'])) {
				$code=$_POST['code'];
			}
//			file_put_contents($sourceFile, $code);
			fwrite($sourceFile, $code);

			//echo $_POST['in'];

			$inputFile = "./sandbox/inputFile.txt";
			$val = "";
			if (isset($_POST['in'])) {
				$val=$_POST['in'];
			}
			file_put_contents($inputFile, $val);



//////			//core-code
			`rm ./sandbox/prog`;
			`rm ./sandbox/error.txt`;
			$compileStatus = `gcc ./sandbox/sourceCode.c -o ./sandbox/prog 2> ./sandbox/error.txt; echo $?`;
			$outputVal =`cat $inputFile | ./sandbox/prog`;
			echo "$compileStatus";
			$outputFile = "./sandbox/outputFile.txt";
			echo "$outputFile";
			//echo "$outputVal";
			file_put_contents($outputFile, $outputVal);
		//	echo nl2br($outputVal);		
	
			if($compileStatus==1) {
	
				$fh = fopen("./sandbox/error.txt", "r") or die("Varla");
				$pageText = fread($fh, 25000);
				echo nl2br($pageText);

			} else {

				echo nl2br($outputVal);
			}


			//self.close();
			//header('Location: '. $_SERVER['HTTP_REFERER']);

			//header( "refresh:5;url=index.html" );
			

			//sleep(10);

			//echo "$code";

			//file_put_contents($file, $code);
		?>

		<!--<script type="text/javascript">

			//	window.close();

		</script>-->

	</body>
</html>

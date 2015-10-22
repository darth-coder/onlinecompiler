<html>
	<body>

		<?php
			session_start();  
		if(isset($_SESSION['views']))
		    $_SESSION['views'] = $_SESSION['views']+ 1;
		else
		    $_SESSION['views'] = 1;

		echo "views = ". $_SESSION['views'];


			// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

	$sandbox=$_SESSION['uname'];
	 $sandbox= "./sandbox/$sandbox";
	`mkdir $sandbox`;
			$ip = get_client_ip();
			echo "      Client ip = $ip<br>";
			
			$sourceFile = fopen("$sandbox/sourceCode.c", "w") or die("Unable to create sourceCode file");
			$code="Failure";
			if (isset($_POST['code'])) {
				$code=$_POST['code'];
			}
			fwrite($sourceFile, $code);
			$inputFile = "$sandbox/inputFile.txt";
			$val = "";
			if (isset($_POST['in'])) {
				$val=$_POST['in'];
			}
			file_put_contents($inputFile, $val);



//////			//core-code
			`rm $sandbox/prog`;
			`rm $sandbox/error.txt`;
			$compileStatus = `gcc $sandbox/sourceCode.c -o $sandbox/prog 2>&1`;
//			sleep(10);
			$outputVal =`echo "cat $sandbox/inputFile.txt | timeout 5 $sandbox/prog" | sh 2>&1`;

//			$outputVal =`echo "echo $val | timeout 5 ./sandbox/prog" | sh 2>&1`;
//			echo "$compileStatus";
//			$outputFile = "./sandbox/outputFile.txt";
//			file_put_contents($outputFile, $outputVal);
	
			if($compileStatus!="") {
	
			//	$fh = fopen("./sandbox/error.txt", "r") or die("Varla");
			//	$pageText = fread($fh, 25000);
			//	echo nl2br($pageText);
				echo nl2br($compileStatus);

			} else {
//				$outputVal = `cat $inputFile | ./sandbox/prog 2>&1`;
				echo nl2br($outputVal);

			}
		?>

	</body>
</html>

<?php
$conn = mysqli_connect("localhost","root","rengarajan","online_compiler");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//	echo $_POST['inputName'];

//	if(isset($_POST["inputName"]) && isset($_POST["inputEmail"]) && isset($_POST["inputPassword"]) && isset($_POST["conpasswd"])) {
 		$name = $_POST["inputName"];
		$email = $_POST["inputEmail"];
		$pass = $_POST["inputPassword"];
		$confPass = $_POST["conpasswd"];
	//}



//	echo $name;
	$sql = "INSERT INTO userDB (username, emailid, password) VALUES ('$name', '$email', '$pass')";
//	echo $bool;
	$result = $conn->query($sql);
//	echo $sql;
//	echo $result;
	if($result === TRUE) {
		echo "Ok";
		header("Location: signin.html");
	} else
		echo "Username exists. Script exits.";

	/*if ($result->num_rows > 0) {
	    	// output data of each row
		while($row = $result->fetch_assoc()) {}

	} else {
	    echo "0 results";
	}*/

	$conn->close();
?>

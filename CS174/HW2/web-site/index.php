<?php

	include "../DBConnect.php";

	function setHeaders() {
		$path_parts =  pathinfo($_SERVER['PATH_INFO']);
		$extension = $path_parts['extension'];
		
		if ($extension == "jpg") {
			header('Content-Type:image/jpeg');
			
			$file =  getcwd() ."". $_SERVER['PATH_INFO'];
			if (! file_exists($file)) die("$file does not exist!");
			if (! is_readable($file)) die("$file is unreadable!");

			readfile($file);
			$conn = connectToDB();
			$ip = $_SERVER["SERVER_ADDR"];
			$requestedFile = (string)$_SERVER["PATH_INFO"];
			$date = time();
			$newCount = counter();
			sendToDB($ip, $requestedFile, $newCount, $date);

		} elseif ($extension == "html") {

			header('Content-Type:text/html');

			$file =  getcwd() ."". $_SERVER['PATH_INFO'];
			if (! file_exists($file)) die("$file does not exist!");
			if (! is_readable($file)) die("$file is unreadable!");

			readfile($file);
			$conn = connectToDB();
			$ip = $_SERVER["REMOTE_ADDR"];

			$requestedFile = (string)$_SERVER["PATH_INFO"];
			$date = time();
			$newCount = counter();
			sendToDB($ip, $requestedFile, $newCount, $date);
		}
		
	}
	setHeaders();

	function sendToDB($ip, $file, $count, $date) {
			
			$conn = connectToDB();
			$result = mysqli_query($conn, "SELECT IP_ADDRESS, FILE FROM counts WHERE IP_ADDRESS = '$ip' AND FILE='$file'");

			if(mysqli_num_rows($result) == 0) {
				// row not found
				$sql = "INSERT INTO counts (IP_ADDRESS, HITS, TIME, FILE) VALUES ('$ip', '$count', '$date', '$file')";
				$conn->query($sql);
			} else {
				// row found, update
				$sql = "SELECT HITS FROM counts";

				$countFromDB = mysqli_query($conn, $sql);
				$stuff = mysqli_fetch_array($countFromDB);
				$countToUpdate = intval($stuff['HITS']);
				
				$newSql = "UPDATE counts SET HITS = '$countToUpdate' WHERE IP_ADDRESS='$ip' AND FILE='$file'";	
				if ($conn->query($newSql) === TRUE) {
					
				} else {
				    echo "Error: " . $sql . $conn->error;
				}
							
			}
			
			$conn->close();
	}

	function counter() {
		$file = "../data/counts.txt"; 

		$handle = fopen($file, 'r+') ; 

		$data = fread($handle, 512) ; 

		$count = $data + 1; 

		fseek($handle, 0) ; 

		fwrite($handle, $count) ; 

		fclose($handle);
		return $count; 
	}
	function resetCount() {
		$file = "../data/counts.txt"; 

		$handle = fopen($file, 'r+') ; 

		$data = fread($handle, 512) ; 

		$count = 0;

		fseek($handle, 0) ; 

		fwrite($handle, $count) ; 

		fclose($handle);
	}


?>

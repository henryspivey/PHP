<html>
	<head>
		<title>Changed title</title>
		<link rel="stylesheet" type="text/css" href="site.css">
	</head>
	<body>
		<div class='center'>
		<h1> Web-site Analytics </h1>

		<form action ='' method='POST'>

			<strong>Select Time Interval:</strong><br>
			<select name='intervals'>
				<option value = '10'>10 Seconds</option>
				<option value = '60'>Last Minute</option>
				<option value = '3600'>Last Hour</option>
				<option value = 'max'>All Time</option>
			</select>
			<input type='submit' value='Go'>

	</form>
	</div>

	<?php
	include "../DBConnect.php";
	//created with help from http://www.css-resources.com/Make-Bar-Chart-from-MySQL-Table-Data.html

	function messageController() {
	   //decide which view to use and set up data for output
		if(!empty($_POST['intervals'])){
			dataView($_POST['intervals']);
		} 
	} 
	function dataView($data) {
	  $conn = connectToDB();	
		$interval = explode(" ", $data);
		$currentTime = time();

		$files = array();
		$hits  = array();
		$ips = array();

		
		if ($interval[0] == 10) {
			$sql = "SELECT * FROM counts WHERE TIME <= UNIX_TIMESTAMP()-10";

		} elseif ($interval[0] == 60) {

			$sql = "SELECT * FROM counts WHERE TIME <= UNIX_TIMESTAMP() - 60";

		} elseif ($interval[0] == 3600) {

			$sql = "SELECT * FROM counts WHERE TIME <= UNIX_TIMESTAMP() - 3600";

		} else 
		{
			$sql = "SELECT * FROM counts ORDER BY TIME DESC";
		}
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		       // echo "IP_ADDRESS " . $row["IP_ADDRESS"]. " HITS " . $row["HITS"]. " " . " FILE ". $row["FILE"] . " "."<br>";
		    	$f = htmlentities(stripslashes($row["FILE"]), ENT_QUOTES);
		    	$h = htmlentities(stripslashes($row["HITS"]), ENT_QUOTES);
		    	$ipList =  htmlentities(stripslashes($row["IP_ADDRESS"]), ENT_QUOTES);
		    	array_push($files, $f);
		    	array_push($hits, $h);
		    	array_push($ips, $ipList);
		    }
		} else {
		    echo "0 results";
		}
		$biggest  = max($hits);
		

		echo "<div id='hits'>". json_encode($hits) . "</div>";
		echo "<div id='files'>". json_encode($files). "</div>";
		echo "<div id='ips'>". json_encode($ips). "</div>";
		echo "<div id='biggest'>".$biggest. "</div>";
		
		$conn->close();
		
	} messageController();

	?>

	<script language="javascript">
	// for files
	var m = document.getElementById("files").innerHTML;
	var filesArray = JSON.parse("["+ m + "]");

	// for hits
	var a = document.getElementById("hits").innerHTML;
	var array = JSON.parse("[" + a + "]");

	// for ips
	var ips = document.getElementById("ips").innerHTML;
	var ipArray = JSON.parse("[" + ips + "]");

	var b = document.getElementById("biggest").innerHTML;

	var getBiggest = parseInt(b);
	var r=getBiggest/300;
	
	
	var chartDiv = document.createElement("div");
	chartDiv.className = "chartDiv";

	// the following is for rendering the charts and page names on the page
	if (array[0].length > 0) {

		for (var i=0;i<array[0].length;i++){
			
			// create a container to hold the counts and page downloads
			var container = document.createElement("div");
			container.className = "chartContainer";

			// create DOM element to hold the charts
			var chart = document.createElement("div");
			chart.id="a" + i;
			chart.style.marginLeft = 5+"px";
			chart.style.bottom = 100+"px";
			chart.style.height = (parseInt(array[0][i])*r*100)+"%";
			chart.className = "aDiv";
			container.appendChild(chart); // append the counts to the container

			// create DOM element to hold the pages requested
			var nameTag = document.createElement("div");
			nameTag.id="b" + i;
			
			nameTag.style.marginLeft = 5+"px";
			
			nameTag.style.bottom = 70+"px";
			nameTag.className = "bDiv";
			nameTag.innerHTML =  filesArray[0][i];
			container.appendChild(nameTag); // append the page names to the container

			chartDiv.appendChild(container);  // append container
		}

	}
	document.body.appendChild(chartDiv);

	var ipChartDiv = document.createElement("div");
	ipChartDiv.className = "ipChartDiv";
	// the following is for rendering the IP address and counts on the page
	if (ipArray[0].length > 0) {
		
		for (var i = 0; i < ipArray[0].length; i++) {
			var ipContainer = document.createElement("div");
			ipContainer.className = "ipContainer";


			// create DOM element to hold the charts
			var chart = document.createElement("div");
			chart.id="a" + i;
			chart.style.marginLeft = 5+"px";
			chart.style.bottom = 100+"px";
			chart.style.height = (parseInt(array[0][i])*r*100)+"%";
			chart.className = "aDiv";
			chart.innerHTML = parseInt(array[0][i]);
			ipContainer.appendChild(chart); // append the counts to the container

			// create DOM element to hold the pages requested
			var ipTag = document.createElement("div");
			ipTag.id="b" + i;
			
			ipTag.style.marginLeft = 5+"px";
			
			ipTag.style.bottom = 70+"px";
			ipTag.className = "bDiv";
			ipTag.innerHTML =  ipArray[0][i];
			ipContainer.appendChild(ipTag); // append the page names to the container

			ipChartDiv.appendChild(ipContainer);  // append container


		};

	}
	document.body.appendChild(ipChartDiv);

	</script>
	</body>
</html>




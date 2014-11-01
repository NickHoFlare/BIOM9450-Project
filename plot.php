<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simple XY plot with TeeChart</title>
	<?php include("./functions.php"); ?>
</head>

<body>

	<?php
	
		// Includes for Charting
		// This is the relative path to the TeeChart directory
	    require_once("./TeeChart/sources/libTeeChart.php"); 
		
		// Obtain the name of the uploaded file. We know that it is located in the ./uploads directory / expect it to be there.
	    $fileName = $_POST["FILE_NAME"];
	    $filePath = "./uploads/$fileName";
	    // Uploaded file is a simple text file, no metadata. Each char is 1 byte. To get number of characters, we get the filesize.
	    $numChars = filesize($filePath);
	    // Open the file for reading purposes only, using a file handle		
	    $fileHandle = fopen($filePath, 'r');
	    // Copy all the data from the file into a string, stored in $readData.
	    $readData = fread($fileHandle, $numChars);
	    fclose($fileHandle);

	    // Split the string into discrete strings, stored in an array, $dataArray
	    $dataArray = explode("\n", $readData);
	    // Do data processing on the contents of the array to normalize them to the desired values
	    $dataArray = convertData($dataArray);
	    // Given that the sampling was done at 500Hz, obtain the number of values stored in the array and divide by 500.0 to 
	    // 1) Convert the string values into floats
	    // 2) Find the amount of time (in seconds) that the data was collected over
	    $numValues = count($dataArray);
	    $time = $numValues / 500.0;
	    // Calculate the time interval between each value in $dataArray (time before the next data was sampled)
	    $timeIncrement = $time / $numValues;

		//Set up chart
		$chart1 = new TChart(640,480);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText("Plot of ".$fileName);
		$chart1->getLegend()->setVisible(FALSE);
		
		$varname = new Line($chart1->getChart()); 
		
		// create an array "$times" to store the values of times that correspond with each point of data.
		$times = array(0);
		for ($i = 1 ; $i < $numValues ; $i++) {
			$times[$i] = $times[$i-1] + $timeIncrement;
		} 
		
		$i=0;
		foreach($dataArray as $x){
			$varname->addXY($times[$i],$dataArray[$i]);
			$i++;
		}
		
	    $varname->Setcolor(Color::BLUE()); 
		$chart1->getAxes()->getBottom()->getTitle()->setText("Time (s)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("ECG signal (mV)"); 

		$chart1->render("ecg.png");	
	
	?>
    
    <img src="ecg.png" style="border: 1px solid gray;"/>

</body>
</html>
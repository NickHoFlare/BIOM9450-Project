<?php		
	// Get a string. $readData is a string.
	$query = "SELECT * FROM TriaxData WHERE Subject_ID = $subjectID ORDER BY Sig_Type";
	$triaxData = odbc_exec($conn,$query);

	while (odbc_fetch_row($triaxData)) {
		$sigType = odbc_result($triaxData,"Sig_Type");

		if ($sigType == "Markers") {
			$markerDate = odbc_result($triaxData,"Date");
			$markerData = odbc_result($triaxData,"Data");
		} else if ($sigType == "TriaxAP") {
			$apDate = odbc_result($triaxData,"Date");
			$apData = odbc_result($triaxData,"Data");
		} else if ($sigType == "TriaxML") {
			$mlDate = odbc_result($triaxData,"Date");
			$mlData = odbc_result($triaxData,"Data");
		} else if ($sigType == "TriaxVT") {
			$vtDate = odbc_result($triaxData,"Date");
			$vtData = odbc_result($triaxData,"Data");
		} else {
			echo "YOU SHOULDN'T BE HERE.";
		}
	}

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

	echo '<img src="ecg.png" style="border: 1px solid gray;"/>'
	
?>
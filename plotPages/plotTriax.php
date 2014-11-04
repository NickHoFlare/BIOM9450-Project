<?php	
/*** Initialise Values ***/
		
	/***************
	***  Marker  ***
	***************/
	
	$query = "SELECT * FROM TriaxData WHERE Subject_ID = $subjectID AND Sig_Type = 'Markers'";
	$markers = odbc_exec($conn,$query);
	
	$markerCounter = 0;
	while (odbc_fetch_row($markers)) {
		$markerDate = odbc_result($markers,"Date");
		$markerData = odbc_result($markers,"Data");
		$markerCounter++;
	}  
	if ($markerCounter > 0) {
		$markerDataArray = explode(" ",$markerData,-1);
	}
	
	/****************
	***  TriaxML  ***
	****************/
	
	$query = "SELECT * FROM TriaxData WHERE Subject_ID = $subjectID AND Sig_Type = 'TriaxML'";
	$triaxML = odbc_exec($conn,$query);
	odbc_binmode($triaxML, ODBC_BINMODE_PASSTHRU); 
	odbc_longreadlen($triaxML, 0);
	ob_start();
	
	$mlCounter = 0;
	while (odbc_fetch_row($triaxML)) {
		$mlDate = odbc_result($triaxML,"Date");
		odbc_result($triaxML,"Data");
		$mlCounter++;
	}
	odbc_free_result($triaxML);
	$mlData = ob_get_clean();	
	
	$mlDataArray = explode(" ",$mlData,-1);
	
	/****************
	***  TriaxAP  ***
	****************/
	
	$query = "SELECT * FROM TriaxData WHERE Subject_ID = $subjectID AND Sig_Type = 'TriaxAP'";
	$triaxAP = odbc_exec($conn,$query);
	odbc_binmode($triaxAP, ODBC_BINMODE_PASSTHRU); 
	odbc_longreadlen($triaxAP, 0);
	ob_start();
	
	$apCounter = 0;	
	while (odbc_fetch_row($triaxAP)) {
		$apDate = odbc_result($triaxAP,"Date");
		odbc_result($triaxAP,"Data");
		$apCounter++;
	}
	odbc_free_result($triaxAP);
	$apData = ob_get_clean();	
	
	$apDataArray = explode(" ",$apData,-1);
	
	/****************
	***  TriaxVT  ***
	****************/
	
	$query = "SELECT * FROM TriaxData WHERE Subject_ID = $subjectID AND Sig_Type = 'TriaxVT'";
	$triaxVT = odbc_exec($conn,$query);
	odbc_binmode($triaxVT, ODBC_BINMODE_PASSTHRU); 
	odbc_longreadlen($triaxVT, 0);
	ob_start();
	
	$vtCounter = 0;
	while (odbc_fetch_row($triaxVT)) {
		$vtDate = odbc_result($triaxVT,"Date");
		odbc_result($triaxVT,"Data");
		$vtCounter++;
	}
	odbc_free_result($triaxVT);
	$vtData = ob_get_clean();	
	
	$vtDataArray = explode(" ",$vtData,-1);

	/*** Graph Values ***/
	require_once("../TeeChart/sources/libTeeChart.php");  
	if ($markerCounter > 0) {
		$markerTimes = convertMarkers($markerDataArray);
	} else {
		echo "<h2>Marker data does not exist.<h2>";
	}
	
	/****************
	***  TriaxML  ***
	****************/	
	if ($mlCounter > 0) {
		// Do data processing on the contents of the array to normalize them to the desired values
		$mlDataArray = convertData($mlDataArray);
		
		$mlMarkerValues = array(0);
		for ($k = 0 ; $k < count($markerDataArray) ; $k++) {
			$mlMarkerValues[$k] = $mlDataArray[$markerDataArray[$k]];
		}
		
		// Given that the sampling was done at 40Hz, obtain the number of values stored in the array and divide by 40.0 to 
		// 1) Convert the string values into floats
		// 2) Find the amount of time (in seconds) that the data was collected over
		$numValues = count($mlDataArray);
		$time = $numValues / 40.0;
		// Calculate the time interval between each value in $dataArray (time before the next data was sampled)
		$timeIncrement = $time / $numValues;
	
		//Set up chart
		$chart1 = new TChart(640,480);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText("Plot of TriaxML, conducted on $mlDate");
		$chart1->getLegend()->setVisible(FALSE);
		
		$lineGraph = new Line($chart1->getChart()); 
		$points = new Points($chart1->getChart());
		
		// create an array "$times" to store the values of times that correspond with each point of data.
		$times = array(0);
		for ($i = 1 ; $i < $numValues ; $i++) {
			$times[$i] = $times[$i-1] + $timeIncrement;
		} 
		
		$i=0;
		foreach($mlDataArray as $x){
			$lineGraph->addXY($times[$i],$mlDataArray[$i]);
			$i++;
		}
		
		for ($j = 0 ; $j < count($markerDataArray) ; $j++) {
			$points->addXY($markerTimes[$j], $mlMarkerValues[$j]);
		}	
		
		$points->Setcolor(Color::RED());
		$lineGraph->Setcolor(Color::BLUE()); 
		$chart1->getAxes()->getBottom()->getTitle()->setText("Time (s)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("Acceleration (m/s/s)"); 
	
		$chart1->render("triaxML.png");	
	
		echo '<img src="triaxML.png" style="border: 1px solid gray;"/>';
	} else {
		echo "<h2>Data for TriaxML does not exist.<h2>";
	}
		
	/****************
	***  TriaxAP  ***
	****************/
	
	if ($apCounter > 0) {
		// Do data processing on the contents of the array to normalize them to the desired values
		$apDataArray = convertData($apDataArray);
		
		$apMarkerValues = array(0);
		for ($k = 0 ; $k < count($markerDataArray) ; $k++) {
			$apMarkerValues[$k] = $apDataArray[$markerDataArray[$k]];
		}
		
		// Given that the sampling was done at 40Hz, obtain the number of values stored in the array and divide by 40.0 to 
		// 1) Convert the string values into floats
		// 2) Find the amount of time (in seconds) that the data was collected over
		$numValues = count($apDataArray);
		$time = $numValues / 40.0;
		// Calculate the time interval between each value in $dataArray (time before the next data was sampled)
		$timeIncrement = $time / $numValues;
	
		//Set up chart
		$chart1 = new TChart(640,480);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText("Plot of TriaxAP, conducted on $apDate");
		$chart1->getLegend()->setVisible(FALSE);
		
		$lineGraph = new Line($chart1->getChart()); 
		$points = new Points($chart1->getChart());
		
		// create an array "$times" to store the values of times that correspond with each point of data.
		$times = array(0);
		for ($i = 1 ; $i < $numValues ; $i++) {
			$times[$i] = $times[$i-1] + $timeIncrement;
		} 
		
		$i=0;
		foreach($apDataArray as $x){
			$lineGraph->addXY($times[$i],$apDataArray[$i]);
			$i++;
		}
		
		for ($j = 0 ; $j < count($markerDataArray) ; $j++) {
			$points->addXY($markerTimes[$j], $apMarkerValues[$j]);
		}	
		
		$points->Setcolor(Color::RED());
		$lineGraph->Setcolor(Color::BLUE()); 
		$chart1->getAxes()->getBottom()->getTitle()->setText("Time (s)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("Acceleration (m/s/s)"); 
	
		$chart1->render("triaxAP.png");	
	
		echo '<img src="triaxAP.png" style="border: 1px solid gray;"/>';
	} else {
		echo "<h2>Data for TriaxAP does not exist.<h2>";
	}
	
	/****************
	***  TriaxVT  ***
	****************/
	
	if ($vtCounter > 0) {
		// Do data processing on the contents of the array to normalize them to the desired values
		$vtDataArray = convertData($vtDataArray);
		
		$vtMarkerValues = array(0);
		for ($k = 0 ; $k < count($markerDataArray) ; $k++) {
			$vtMarkerValues[$k] = $vtDataArray[$markerDataArray[$k]];
		}
			
		// Given that the sampling was done at 40Hz, obtain the number of values stored in the array and divide by 40.0 to 
		// 1) Convert the string values into floats
		// 2) Find the amount of time (in seconds) that the data was collected over
		$numValues = count($vtDataArray);
		$time = $numValues / 40.0;
		// Calculate the time interval between each value in $dataArray (time before the next data was sampled)
		$timeIncrement = $time / $numValues;
	
		//Set up chart
		$chart1 = new TChart(640,480);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText("Plot of TriaxVT, conducted on $vtDate");
		$chart1->getLegend()->setVisible(FALSE);
		
		$lineGraph = new Line($chart1->getChart()); 
		$points = new Points($chart1->getChart());
		
		// create an array "$times" to store the values of times that correspond with each point of data.
		$times = array(0);
		for ($i = 1 ; $i < $numValues ; $i++) {
			$times[$i] = $times[$i-1] + $timeIncrement;
		} 
		
		$i=0;
		foreach($vtDataArray as $x){
			$lineGraph->addXY($times[$i],$vtDataArray[$i]);
			$i++;
		}
		
		for ($j = 0 ; $j < count($markerDataArray) ; $j++) {
			$points->addXY($markerTimes[$j], $vtMarkerValues[$j]);
		}	
		
		$points->Setcolor(Color::RED());
		$lineGraph->Setcolor(Color::BLUE()); 
		$chart1->getAxes()->getBottom()->getTitle()->setText("Time (s)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("Acceleration (m/s/s)"); 
	
		$chart1->render("triaxVT.png");	
	
		echo '<img src="triaxVT.png" style="border: 1px solid gray;"/>';
	} else {
		echo "<h2>Data for TriaxVT does not exist.<h2>";
	}
?>
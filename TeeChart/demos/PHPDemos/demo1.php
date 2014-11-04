<?php
        //Includes
        require_once "../../../../sources/libTeeChart.php";
        //include "../../../../sources/TChart.php";
        //include "../../../../sources/Chart.php";

        $chart1 = new TChart(400,250);


        $chart1->getChart()->getHeader()->setText("Bar Style");
        $chart1->getChart()->getAspect()->setChart3DPercent(30);

        $bar=new Bar($chart1->getChart());
        $chart1->getChart()->getSeries(0)->setColorEach(true);
        $chart1->getChart()->getSeries(0)->fillSampleValues(10);

        $chart2 = new TChart(400,250);
        $chart2->getChart()->getHeader()->setText("HorizBar Style");
        $horizBar=new HorizBar($chart2->getChart());
        $chart2->getChart()->getSeries(0)->setColorEach(true);
        $chart2->getChart()->getSeries(0)->fillSampleValues(5);

        $chart3 = new TChart(400,250);
        $chart3->getChart()->getHeader()->setText("Bar Style");
        $chart3->getChart()->getAspect()->setView3D(false);
        $chart3->getChart()->getPanel()->setMarginTop(5);
        $chart3->getChart()->getLegend()->setVisible(false);

        for ($i=0;$i<4;$i++) {
          $chart3->getChart()->addSeries(new Bar($chart3->getChart()));
          $chart3->getChart()->getSeries($i)->fillSampleValues(5);
        }

        $chart1->render("chart1.png");
        $chart2->render("chart2.png");
        $chart3->render("chart3.png");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Bar Charts</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
  <font face="Verdana" size="2">Vertical Bar Chart</font><p>
  <img alt="Bar Chart" src="chart1.png" style="border: 1px solid gray;"/></p>
	<p><font face="Verdana" size="2">Horizontal Bar Chart</font></p>
	<p>
  <img alt="Horiz. Bar Chart" src="chart2.png" style="border: 1px solid gray;"/></p>
	<p><font face="Verdana" size="2">Multiple Bar Chart</font></p>
	<p>
  <img alt="Multiple Bar Chart" src="chart3.png" style="border: 1px solid gray;"/>
	</p>
</body>
</html>
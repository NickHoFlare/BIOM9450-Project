<?php
        //Includes
        include "../../../../sources/TChart.php";

        $chart1 = new TChart(400,250);
        $chart1->getChart()->getHeader()->setText("Pie Style");
        $chart1->getChart()->getAspect()->setChart3DPercent(45);

        $pie=new Pie($chart1->getChart());
        $pie->getMarks()->setVisible(false);
        // Setup the Pie
        $pie->setBevelPercent(20);
        $pie->fillSampleValues(5);

        //TODO
        // $pie->setEdgeStyle(EdgeStyles::$FLAT);      // TEST IT DON'T WORKS WITH BEVEL PERCENT...
        //$pie->setEdgeStyle(EdgeStyles::$CURVED);      // TEST IT DON'T WORKS WITH BEVEL PERCENT...

        $chart2 = new TChart(400,250);
        $chart2->getChart()->getHeader()->setText("2D Pie Style");
        // Changes View3D aspect
        $chart2->getChart()->getAspect()->setView3D(false);
        $chart2->getLegend()->setTextStyle(LegendTextStyle::$VALUE);

        $pie2d=new Pie($chart2->getChart());
        // Set Circled mode
        $pie2d->setCircled(true);
        $pie2d->fillSampleValues(5);


        $chart1->render("chart1.png");
        $chart2->render("chart2.png");
        $rand=rand();
        print '<font face="Verdana" size="2">3D Pie Style<p>';
        print '<img src="chart1.png?rand='.$rand.'"><p>';          
        print '<font face="Verdana" size="2">2D Pie Style<p>';
        print '<img src="chart2.png?rand='.$rand.'">';          
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Line Charts</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
</body>
</html>
<?php
  
//Includes
include "../../../../sources/TChart.php";

$chart = new TChart(500,300);

$chart->getHeader()->setText("Line with Pointer");
$chart->getPanel()->getGradient()->setVisible(false);
$chart->getPanel()->setColor(Color::getWhite());
$chart->getAspect()->setView3D(false);

$panel=$chart->getPanel();
$panel->getBevel()->setInner(BevelStyle::$NONE);
$panel->getBevel()->setOuter(BevelStyle::$NONE);
$panel->getPen()->setColor(new Color(120,120,120));
$panel->getPen()->setVisible(true);

$line = new Line($chart->getChart());
$line->fillSampleValues(6);

$line->getLinePen()->setWidth(3);

$pointer=$line->getPointer();
$pointer->setVisible(true);
$pointer->setStyle(PointerStyle::$CIRCLE);
$pointer->getBrush()->setColor(Color::getWhite());
$pointer->getPen()->setColor($line->getColor());
$pointer->getPen()->setWidth(2);

$bAxis=$chart->getAxes()->getBottom();
$bAxis->getGrid()->setVisible(false);
$bAxis->setMinimumOffset(15);
$bAxis->setMaximumOffset(15);

$lAxis=$chart->getAxes()->getLeft();
$lAxis->getLabels()->setSeparation(100);
$lAxis->setMinimumOffset(15);
$lAxis->setMaximumOffset(15);
$chart->getPanel()->getBorderPen()->setVisible(false);

$chart->render("chart1.png");
$rand=rand();
print '<font face="Verdana" size="2">Line with Pointer Series Style<p>';
print '<img src="chart1.png?rand='.$rand.'">';   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Line Point</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
</body>
</html>

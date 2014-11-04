<?php
      //Includes
      include "../../../../sources/TChart.php";

      // Get Values from form
      if(isset($_POST["path"]))
        $path = $_POST['path'];

      // Assign Header text
      $chart1 = new TChart(400,250);
      $chart1->getHeader()->setText("WBMP Export Demo");

      // Add Series to the Chart
      $line1 = new Line($chart1->getChart());
      $line2 = new Line($chart1->getChart());
      $line1->fillSampleValues(30);
      $line2->fillSampleValues(30);

      $chart1->render("chart1.png");
      $rand=rand();
      print '<font face="Verdana" size="2">WBMP Export Format<p>';
      print '<img src="chart1.png?rand='.$rand.'"><p>';         
      
      // Save Chart to text
      if(isset($_POST['submit'])) {
          if ($path!="") {
            if (realpath($path)) {
              $chart1->getChart()->getExport()->getImage()->getWBMP()->save($path."\\TChart.wbmp");
              echo "The Chart has been exported correctly !";
            }
          }
          else
          {
              echo "Correct path must be entered ! ";
          }
      }
?>

<html><body>
<font face="Verdana" size="2">
  <br />
<form method="post" action="WBMPExport.php">
  Path:  <input name="path" type="text" value="c:\temp" />
  <input type="submit" name="submit" value="Save To WBMP">
</form>
</font>
</body></html>
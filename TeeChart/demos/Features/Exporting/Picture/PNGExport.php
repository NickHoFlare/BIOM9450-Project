<?php
      //Includes
      include "../../../../sources/TChart.php";

      // Get Values from form
      if(isset($_POST["path"]))
         $path = $_POST['path'];

      // Assign Header text
      $chart1 = new TChart(400,250);
      $chart1->getHeader()->setText("PNG Export Demo");

      // Add Series to the Chart
      $points = new Points($chart1->getChart());
      $points->fillSampleValues(30);

      $chart1->render("chart1.png");
      $rand=rand();
      print '<font face="Verdana" size="2">PNG Export Format<p>';
      print '<img src="chart1.png?rand='.$rand.'"><p>';               

      // Save Chart to text
      if(isset($_POST['submit'])) {
          if ($path!="") {
            if (realpath($path)) {
              $chart1->getChart()->getExport()->getImage()->getPNG()->save($path."\\TChart.png");
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
<form method="post" action="PNGExport.php">
  Path:  <input name="path" type="text" value="c:\temp" />
  <input type="submit" name="submit" value="Save To PNG">
</form>
</font>
</body></html>
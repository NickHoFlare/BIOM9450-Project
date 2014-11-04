<?php
      //Includes
      include "../../sources/TChart.php";

      // Get Values from form
      if(isset($_POST["path"]))
        $path = $_POST['path'];

      // Assign Header text
      $chart1 = new TChart(500,350);
      $chart1->getAspect()->setView3D(false);
      $chart1->getHeader()->setText("Flash Demo");
      $chart1->getPanel()->getGradient()->setVisible(false);      
      $chart1->getPanel()->setColor(Color::WHITE());

      // Add Series to the Chart
      $line = new Line($chart1->getChart());
      $line->fillSampleValues(6);
      $line->setColor(Color::DARK_GRAY());
      $line->getLinePen()->setWidth(3);
      $line->getPointer()->setVisible(true);
      $line->getPointer()->setStyle(PointerStyle::$CIRCLE);

      // Add Tool
      $marksTip = new MarksTip($chart1->getChart());
      $chart1->getChart()->getTools()->add($marksTip);
      $marksTip->setSeries($line);
      
      // Add Animtation 
      $expand = new Expand($chart1->getChart());
      $chart1->getChart()->getAnimations()->add($expand);
      $expand->setTarget(ChartClickedPartStyle::$SeriesPointer);
      $expand->setTrigger(AnimationTrigger::$MouseOver);      
      
      $chart1->render("chart1.png");
      $rand=rand();
      print '<font face="Verdana" size="2">Flash / Flex Export Format is allowed<p>';
      print '<img src="chart1.png?rand='.$rand.'"><p>';         

      // Save Chart to text
      if(isset($_POST['submit'])) {
          if (($path!="") && (realpath($path))) {                
              FlexOptions::CompileDeleteShow($chart1, (int)$chart1->width , 
                $chart1->height, $path, null, false, true, true);

              echo "The Chart has been exported correctly !";
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
<form method="post" action="<?php echo $PHP_SELF;?>">
  Path:  <input name="path" type="text" value="F:\Users\Administrator\Documents" />
  <input type="submit" name="submit" value="Export to Flash / Flex">
</form>
</font>
</body></html>
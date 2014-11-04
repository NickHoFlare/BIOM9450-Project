<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("tchart.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Unit2 extends Page
{
       public $TChartObj1 = null;

       public $edGraEnd = null;
       public $edPanelColor = null;
       public $edGraStart = null;
       public $cbCustomAxesChart = null;
       public $Ed3DPercent = null;
       public $EdBAxisLabelsAngle = null;
       public $cbAxesHorizBoth = null;
       public $cbVerticalAxesBoth = null;
       public $cbAxesVisible = null;
       public $cbLegendShadow = null;
       public $EdLegendTitle = null;
       public $cbLegendInverted = null;
       public $cbLegendFontColor = null;
       public $cbLegendTransparent = null;
       public $cbLegendVisible = null;
       public $cbPanelGradient = null;
       public $cbView3d = null;
       public $EdChartTitle = null;
       public $EdNumSeries = null;
       public $cbMarksStyle = null;
       public $EdMarksAngle = null;
       public $EdMarksDrawEvery = null;
       public $cbMarksShadow = null;
       public $cbMarksPen = null;
       public $cbMarksTransp = null;
       public $cbMarksVisible = null;
       public $cbColorEach = null;
       public $cbSeriesActive = null;
       public $cbSeriesPen = null;
       public $cbStyle = null;
       public $cbAddAnnotationTool=null;
       public $cbAddColorLineTool=null;
       public $cbAddGridBandTool=null;
       public $cbAddColorBandTool=null;

       function Unit2Show($sender, $params)
       {

          $this->cbCustomAxesChart = $_POST["cbCustomAxesChart"];
          $this->EdNumSeries = $_POST["EdNumSeries"];
          $this->cbStyle = $_POST["cbStyle"];
          $this->cbSeriesActive = $_POST["cbSeriesActive"];
          $this->cbSeriesPen = $_POST["cbSeriesPen"];
          $this->EdChartTitle = $_POST["EdChartTitle"];
          $this->cbView3d = $_POST["cbView3d"];
          $this->edGraEnd = $_POST["edGraEnd"];
          $this->cbColorEach = $_POST["cbColorEach"];
          $this->cbMarksVisible = $_POST["cbMarksVisible"];
          $this->cbMarksTransp = $_POST["cbMarksTransp"];
          $this->cbMarksPen = $_POST["cbMarksPen"];
          $this->cbMarksShadow = $_POST["cbMarksShadow"];
          $this->EdMarksDrawEvery = $_POST["EdMarksDrawEvery"];
          $this->EdMarksAngle = $_POST["EdMarksAngle"];
          $this->EdNumSeries = $_POST["EdNumSeries"];
          $this->cbMarksStyle = $_POST["cbMarksStyle"];
          $this->cbPanelGradient = $_POST["cbPanelGradient"];
          $this->cbLegendInverted = $_POST["cbLegendInverted"];
          $this->cbLegendFontColor = $_POST["cbLegendFontColor"];
          $this->cbLegendTransparent = $_POST["cbLegendTransparent"];
          $this->cbLegendVisible = $_POST["cbLegendVisible"];
          $this->cbLegendShadow = $_POST["cbLegendShadow"];
          $this->EdLegendTitle = $_POST["EdLegendTitle"];
          $this->cbAxesVisible = $_POST["cbAxesVisible"];
          $this->cbVerticalAxesBoth = $_POST["cbVerticalAxesBoth"];
          $this->cbAxesHorizBoth = $_POST["cbAxesHorizBoth"];
          $this->EdBAxisLabelsAngle = $_POST["EdBAxisLabelsAngle"];
          $this->Ed3DPercent = $_POST["Ed3DPercent"];
          $this->edGraStart = $_POST["edGraStart"];
          $this->edPanelColor = $_POST["edPanelColor"];
          $this->cbAddAnnotationTool = $_POST["cbAddAnnotationTool"];
          $this->cbAddColorLineTool = $_POST["cbAddColorLineTool"];
          $this->cbAddGridBandTool = $_POST["cbAddGridBandTool"];
          $this->cbAddColorBandTool = $_POST["cbAddColorBandTool"];

          /* By default the rendering is created with imageinterlace, in the case
             you want to change it (this will change the load efect on brwoser)
             you only have to set the imageInterlace property to false, i.e :

             $chart->getCanvas()->setImageInterlace(false);
          */

          // TChart
          $chart = $this->TChartObj1->Chart;
          if ($chart->getSeriesCount()>0)
            $chart->removeAllSeries();

          // Chart object
          $chart=$chart->getChart();

          if ($this->EdNumSeries!="")
          if (!isset($this->cbCustomAxesChart)) {

            // Chart Style  (Series)
            for ($i=0;$i<=(int)$this->EdNumSeries-1;$i++)
            {
              switch ($this->cbStyle) {
              case 0 :
                /* Another way to add Series
                $line = new Line($chart->getChart());
                */
                $chart->addSeries(new Line($chart));
                break;
              case 1 :
                $chart->addSeries(new HorizLine($chart));
                break;
              case 2 :
                $chart->addSeries(new FastLine($chart));
                break;
              case 3 :
                $chart->addSeries(new Bar($chart));
                break;
              case 4 :
                $chart->addSeries(new HorizBar($chart));
                break;
              case 5 :
                $chart->addSeries(new Area($chart));
                break;
              case 6 :
                $chart->addSeries(new HorizArea($chart));
                break;
              case 7 :
                $chart->addSeries(new Points($chart));
                break;
              case 8 :
                $chart->addSeries(new Bubble($chart));
                break;
              case 9 :
                $chart->addSeries(new Pie($chart));
                $chart->getSeries(0)->setBevelPercent(20);
                $chart->getSeries(0)->setCircled(true);
                break;
              case 10 :
                $chart->addSeries(new Shape($chart));
                break;
              case 11 :
                $chart->addSeries(new Gantt($chart));
                break;
              case 12 :
                $chart->addSeries(new Candle($chart));
                break;
              case 13 :
                $chart->addSeries(new Volume($chart));
                break;
              case 14 :
                $chart->addSeries(new Pyramid($chart));
                break;
              case 15 :
                $chart->addSeries(new Histogram($chart));
                break;
              case 16 :
                $chart->addSeries(new Bar3D($chart));
                break;
              }

              // Add Sample Values
              if ($chart->getSeries(0) instanceof Bubble) {
                    // Add random bubble data
                    for ($ii=0;$ii<=5;$ii++)  {
                       $x=rand(0,10);
                       $y=rand(1,100);
                       $radius=rand(10,150);
                       $chart->getSeries($i)->addBubble($x,$y,$radius,"");
                    }
                    $chart->getAspect()->setClipPoints(true);
              }
              else
                $chart->getSeries($i)->fillSampleValues(8);

              // Series Active
              if (!isset($this->cbSeriesActive))
                $chart->getSeries($i)->setActive(isset($this->cbSeriesActive));

              // Color each point of Series
              $chart->getSeries($i)->setColorEach(isset($this->cbColorEach));

              // Series Pen visible
              if (($chart->getSeries($i)instanceof Line) or
                  ($chart->getSeries($i)instanceof FastLine) or
                  ($chart->getSeries($i)instanceof Area) )
                $chart->getSeries($i)->getLinePen()->setVisible(isset($this->cbSeriesPen));
              elseif ($chart->getSeries($i)instanceof Points)
                $chart->getSeries($i)->getPointer()->getPen()->setVisible(isset($this->cbSeriesPen));
              elseif (!$chart->getSeries($i)instanceof Volume)
                $chart->getSeries($i)->getPen()->setVisible(isset($this->cbSeriesPen));


              // Marks
              $marks = $chart->getSeries($i)->getMarks();

              // Marks Visible
              $marks->setVisible(isset($this->cbMarksVisible));

              // Marks Shadow
              $marks->getShadow()->setVisible(isset($this->cbMarksShadow));

              // Marks Pen
              $marks->getPen()->setVisible(isset($this->cbMarksPen));

              // Marks Transparent
              $marks->setTransparent(isset($this->cbMarksTransp));

              // Draw marks every...
              if ($this->EdMarksDrawEvery != 1)
                $marks->setDrawEvery($this->EdMarksDrawEvery);

              // Marks angle
              if ($this->EdMarksAngle != 0)
                $marks->setAngle($this->EdMarksAngle);
            }

          // Marks Style
          switch ($this->cbMarksStyle) {
            case 0:
                $marks->setStyle(MarksStyle::$VALUE);
                break;
            case 1:
                $marks->setStyle(MarksStyle::$PERCENT);
                break;
            case 2:
                $marks->setStyle(MarksStyle::$LABEL);
                break;
            case 3:
                $marks->setStyle(MarksStyle::$LABELPERCENT);
                break;
            case 4:
                $marks->setStyle(MarksStyle::$LABELVALUE);
                break;
            case 5:
                $marks->setStyle(MarksStyle::$LEGEND);
                break;
            case 6:
                $marks->setStyle(MarksStyle::$PERCENTTOTAL);
                break;
            case 7:
                $marks->setStyle(MarksStyle::$LABELPERCENTTOTAL);
                break;
            case 8:
                $marks->setStyle(MarksStyle::$XVALUE);
                break;
            case 9:
                $marks->setStyle(MarksStyle::$XY);
                break;
          }

          // Aspect

          // Chart Title
          if ($this->EdChartTitle != "TeeChart")
            $chart->getHeader()->setText($this->EdChartTitle);

          // View 3D
          $chart->getAspect()->setView3D(isset($this->cbView3d));

          // Panel Gradient
          $chart->getPanel()->getGradient()->setVisible(isset($this->cbPanelGradient));

          $panelGradient=$chart->getPanel()->getGradient();

          if (isset($this->cbPanelGradient)) {
            // Panel Gradient StartColor
            if ($this->edGraStart!="")
              $chart->getPanel()->getGradient()->setStartColor($this->edGraStart);

            // Panel Gradient EndColor
            if ($this->edGraEnd!="")
              $chart->getPanel()->getGradient()->setEndColor($this->edGraEnd);
          }

          if (!isset($this->cbPanelGradient))
            if ($this->edPanelColor!="")
               $chart->getPanel()->setColor(Utils::hex2rgb($this->edPanelColor));

            // 3D Percent
            if ((int)$this->Ed3DPercent!=15)
              $chart->getAspect()->setChart3DPercent((int)$this->Ed3DPercent);


            // Legend

            // Legend Visible
            $chart->getLegend()->setVisible(isset($this->cbLegendVisible));

            // Legend Inverted
            $chart->getLegend()->setInverted(isset($this->cbLegendInverted));

            // Legend Transparent
            $chart->getLegend()->setTransparent(isset($this->cbLegendTransparent));

            // Legend Shadow
            $chart->getLegend()->getShadow()->setVisible(isset($this->cbLegendShadow));

            // Legend Font Series Color
            $chart->getLegend()->setFontSeriesColor(isset($this->cbLegendFontColor));

            // Legend Title
            if ($this->EdLegendTitle != "")
              $chart->getLegend()->getTitle()->setText($this->EdLegendTitle);

            // Axes

            // Axes Visible
            $chart->getAxes()->getLeft()->setVisible(isset($this->cbAxesVisible));
            $chart->getAxes()->getBottom()->setVisible(isset($this->cbAxesVisible));

            // Vertical Axes Both
            if (isset($this->cbVerticalAxesBoth))
              $chart->getSeries(0)->setHorizontalAxis(HorizontalAxis::$BOTH);

            // Horizontal Axes Both
            if (isset($this->cbVerticalAxesBoth))
              $chart->getSeries(0)->setVerticalAxis(VerticalAxis::$BOTH);

            // Bottom Axis Labels Angle
            if ($this->EdBAxisLabelsAngle != 0)
              $chart->getAxes()->getBottom()->getLabels()->setAngle($this->EdBAxisLabelsAngle);

            // Tools
            if (isset($this->cbAddAnnotationTool))
            {
              // Add Annotation tool
              $annotation=new Annotation($chart);
              $annotation->getShape()->setCustomPosition(true);
              //$annotation->getShape()->getFont()->setSize(20);
              //$annotation->getShape()->getFont()->setBold(true);
              $annotation->setTop(rand(10, 200));
              $annotation->setLeft(rand(10, 200));
              $annotation->setText("My Annotation Tool !!");
            }

            if (isset($this->cbAddColorBandTool))
            {
              // Add ColorBand Tool
              $colorBand = new ColorBand($chart);
              $colorBand->setAxis($chart->getAxes()->getLeft());
              $colorBand->setStart($chart->getAxes()->getLeft()->getMaximum() / 3);
              $colorBand->setEnd($chart->getAxes()->getLeft()->getMaximum() / 2);
            }

            if (isset($this->cbAddColorLineTool))
            {
              // Add ColorLine Tool
              $colorLine = new ColorLine($chart);
              $colorLine->setAxis($chart->getAxes()->getLeft());
              $colorLine->setValue($chart->getAxes()->getLeft()->getMaximum() / 2);
            }

            if (isset($this->cbAddGridBandTool))
            {
              // Add GridBand Tool
              $gridBand = new GridBand($chart);
              $gridBand->setAxis($chart->getAxes()->getLeft());
              $gridBand->getBand1()->setColor(new Color(125,125,125));
              $gridBand->getBand2()->setColor(new Color(225,225,225));
            }

            // Do Repaint
            $chart->doBaseInvalidate();
          }
          else
          {

            $chart->getHeader()->setText("Custom Axes Demo");
            $chart->getAspect()->setView3D(false);

            $line1 = new Line($chart);
            $line2 = new Line($chart);
            $line1->setColor(Color::RED());
            $line2->setColor(Color::GREEN());
            $chart->addSeries($line1);
            $chart->addSeries($line2);

            for($t = 0; $t <= 10; $t++) {
              $line1->addXY($t, (10 + $t), Color::RED());
              if($t > 1) {
                $line2->addXY($t, $t, Color::GREEN());
              }
            }

            $chart->getAxes()->getLeft()->setStartPosition(0);
            $chart->getAxes()->getLeft()->setEndPosition(50);
            $chart->getAxes()->getLeft()->getAxisPen()->color = Color::RED();
            $chart->getAxes()->getLeft()->getTitle()->getFont()->setColor(Color::RED());
            $chart->getAxes()->getLeft()->getTitle()->getFont()->setBold(true);
            $chart->getAxes()->getLeft()->getTitle()->setText("1st Left Axis");

            $chart->getAxes()->getTop()->getLabels()->setAngle(45);
            $chart->getAxes()->getTop()->getTitle()->getFont()->setColor(Color::YELLOW());
            $chart->getAxes()->getTop()->getTitle()->getFont()->setBold(true);

            $chart->getAxes()->getBottom()->getLabels()->setAngle(0);
            $chart->getAxes()->getRight()->getLabels()->setAngle(45);
            $chart->getAxes()->getBottom()->getTitle()->getFont()->setColor(new Color(255,25,25));
            $chart->getAxes()->getBottom()->getTitle()->getFont()->setBold(true);
            $chart->getAxes()->getRight()->getTitle()->getFont()->setColor(Color::BLUE());
            $chart->getAxes()->getRight()->getTitle()->getFont()->setBold(true);
            $chart->getAxes()->getRight()->getTitle()->setText("OtherSide Axis");
            $chart->getAxes()->getRight()->getLabels()->getFont()->setColor(Color::BLUE());

            $chart->getAxes()->getTop()->getTitle()->setText("Top Axis");
            $chart->getAxes()->getBottom()->getTitle()->setText("Bottom Axis");

            $line1->setHorizontalAxis(HorizontalAxis::$BOTH);
            $line1->setVerticalAxis(VerticalAxis::$BOTH);

            $axis1 = new Axis(false, false, $chart);
            $chart->getAxes()->getCustom()->add($axis1);
            $line2->setCustomVertAxis($axis1);
            $axis1->setStartPosition(50);
            $axis1->setEndPosition(100);
            $axis1->getAxisPen()->setColor(Color::GREEN());
            $axis1->getTitle()->getFont()->setColor(Color::GREEN());
            $axis1->getTitle()->getFont()->setBold(true);
            $axis1->getTitle()->setText("Extra Axis");
            $axis1->getTitle()->setAngle(90);
            $axis1->setRelativePosition(20);

            $chart->doBaseInvalidate();
            }
     }

}

global $application;

global $Unit2;

//Creates the form
$Unit2=new Unit2($application);

//Read from resource file
$Unit2->loadResource(__FILE__);

//Shows the form
$Unit2->show();

?>
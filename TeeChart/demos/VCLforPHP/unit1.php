<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("tchart.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class TeeChartPHP extends Page
{
       public $cbAddGridBandTool = null;
       public $cbAddColorLineTool = null;
       public $cbAddColorBandTool = null;
       public $cbAddAnnotationTool = null;
       public $ColorSelector = null;
       public $edGraEnd = null;
       public $edPanelColor = null;
       public $edGraStart = null;
       public $bPanelColor = null;
       public $bGradientEnd = null;
       public $bGradientStart = null;
       public $Label13 = null;
       public $Label12 = null;
       public $Label11 = null;
       public $Label10 = null;
       public $cbCustomAxesChart = null;
       public $Ed3DPercent = null;
       public $Label9 = null;
       public $EdBAxisLabelsAngle = null;
       public $Label8 = null;
       public $cbAxesHorizBoth = null;
       public $cbVerticalAxesBoth = null;
       public $cbAxesVisible = null;
       public $GroupBox6 = null;
       public $cbLegendShadow = null;
       public $EdLegendTitle = null;
       public $Label7 = null;
       public $cbLegendInverted = null;
       public $cbLegendFontColor = null;
       public $cbLegendTransparent = null;
       public $cbLegendVisible = null;
       public $GroupBox5 = null;
       public $cbPanelGradient = null;
       public $cbView3d = null;
       public $Label5 = null;
       public $EdChartTitle = null;
       public $GroupBox4 = null;
       public $EdNumSeries = null;
       public $Label6 = null;
       public $Button1 = null;
       public $cbMarksStyle = null;
       public $Label4 = null;
       public $EdMarksAngle = null;
       public $Label3 = null;
       public $EdMarksDrawEvery = null;
       public $Label2 = null;
       public $cbMarksShadow = null;
       public $cbMarksPen = null;
       public $cbMarksTransp = null;
       public $cbMarksVisible = null;
       public $GroupBox3 = null;
       public $cbColorEach = null;
       public $cbSeriesActive = null;
       public $cbSeriesPen = null;
       public $cbStyle = null;
       public $Label1 = null;
       public $GroupBox2 = null;
       public $GroupBox1 = null;


    /**
    * Returns an array with the coordinates to show the color picker
    *
    * @param object $object Button to use to get the coordinates
    * @param boolean $right Align the dialog to the right
    * @param boolean $bottom Align the dialog to the bottom
    * @return array
    */
    function getButtonCoords($object, $right=false, $bottom=false)
    {
      $left=$object->Parent->Left+$object->Left;
      if ($right)
      {
        $left=$left - $this->ColorSelector->Width+$object->Width;
        if ($left<$this->gbXAxis->Left) $left=$this->gbXAxis->Left;
      }

      $top=$object->Parent->Top+$object->Top+$object->Height-1;
      if ($bottom)
      {
        $top=$top-$this->ColorSelector->Height-$object->Height;
      }
      return(array(0=>0,1=>$top+50));
//      return(array(0=>$left,1=>$top));
    }

    /**
    * Called when the color on the selector is changed
    */
    function ColorSelectorJSChange($sender, $params)
    {
    ?>
      //Get the new color and set the edit field with that value
      newColor="#"+qx.lang.String.pad(ColorSelector.getRed().toString(16).toUpperCase(), 2) + qx.lang.String.pad(ColorSelector.getGreen().toString(16).toUpperCase(), 2) + qx.lang.String.pad(ColorSelector.getBlue().toString(16).toUpperCase(), 2);
      editField.value=newColor;

      //Hide the color selector
      ColorSelector.setVisibility(false);

      //Moves the div the original point to prevent a bug in firefox
      var div=findObj('ColorSelector_outer');
      div.style.left="0px";
      div.style.height="0px";
    <?php

    }

       /**
       * A color picker call, common routine to show the picker at the right position
       * and set which field must be udpated
       */
       function bPanelColorJSClick($sender, $params)
       {
          $coords=$this->getButtonCoords($sender);
          ?>
            //Sets which edit field is going to take the value
            editField=findObj('edPanelColor');
            var div=findObj('ColorSelector_outer');
            div.style.left="<?php echo $coords[0]; ?>px";
            div.style.top="<?php echo $coords[1]; ?>px";
            ColorSelector.setVisibility(true);
          <?php
             $this->bPanelColor->Color=$this->edPanelColor->Text;
       }

       /**
       * A color picker call, common routine to show the picker at the right position
       * and set which field must be udpated
       */
       function bGradientEndJSClick($sender, $params)
       {
          $coords=$this->getButtonCoords($sender);
          ?>
            //Sets which edit field is going to take the value
            editField=findObj('edGraEnd');
            var div=findObj('ColorSelector_outer');
            div.style.left="<?php echo $coords[0]; ?>px";
            div.style.top="<?php echo $coords[1]; ?>px";
            ColorSelector.setVisibility(true);
          <?php
             $this->bGradientEnd->Color=$this->edGraEnd->Text;
       }

       /**
       * A color picker call, common routine to show the picker at the right position
       * and set which field must be udpated
       */
       function bGradientStartJSClick($sender, $params)
       {
          $coords=$this->getButtonCoords($sender);
          ?>
            //Sets which edit field is going to take the value
            editField=findObj('edGraStart');
            var div=findObj('ColorSelector_outer');
            div.style.left="<?php echo $coords[0]; ?>px";
            div.style.top="<?php echo $coords[1]; ?>px";
            ColorSelector.setVisibility(true);
          <?php
             $this->bGradientStart->Color=$this->edGraStart->Text;
       }

       function TeeChartPHPShow($sender, $params)
       {
         //
       }
}

global $application;

global $TeeChartPHP;

//Creates the form
$TeeChartPHP=new TeeChartPHP($application);

//Read from resource file
$TeeChartPHP->loadResource(__FILE__);

//Shows the form
$TeeChartPHP->show();

?>
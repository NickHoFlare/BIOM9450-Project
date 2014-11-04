<?php
<object class="TeeChartPHP" name="TeeChartPHP" baseclass="page">
  <property name="Action">unit2.php</property>
  <property name="Background"></property>
  <property name="Caption">TeeChartPHP</property>
  <property name="DocType">dtNone</property>
  <property name="Height">1144</property>
  <property name="IsMaster">0</property>
  <property name="Name">TeeChartPHP</property>
  <property name="Target">frame1</property>
  <property name="Width">610</property>
  <property name="OnShow">TeeChartPHPShow</property>
  <object class="GroupBox" name="GroupBox1" >
    <property name="Caption">TeeChart for PHP</property>
    <property name="Height">544</property>
    <property name="Left">9</property>
    <property name="Name">GroupBox1</property>
    <property name="Top">11</property>
    <property name="Width">569</property>
    <object class="GroupBox" name="GroupBox2" >
      <property name="Caption">Chart Styles</property>
      <property name="Height">336</property>
      <property name="Left">15</property>
      <property name="Name">GroupBox2</property>
      <property name="Top">16</property>
      <property name="Width">296</property>
      <object class="Label" name="Label1" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Style :</property>
        <property name="Height">13</property>
        <property name="Left">16</property>
        <property name="Name">Label1</property>
        <property name="Top">26</property>
        <property name="Width">75</property>
      </object>
      <object class="ComboBox" name="cbStyle" >
        <property name="Height">19</property>
        <property name="ItemIndex">0</property>
        <property name="Items"><![CDATA[a:17:{i:0;s:4:&quot;LINE&quot;;i:1;s:11:&quot;HORIZ. LINE&quot;;i:2;s:8:&quot;FASTLINE&quot;;i:3;s:3:&quot;BAR&quot;;i:4;s:10:&quot;HORIZ. BAR&quot;;i:5;s:4:&quot;AREA&quot;;i:6;s:11:&quot;HORIZ. AREA&quot;;i:7;s:6:&quot;POINTS&quot;;i:8;s:6:&quot;BUBBLE&quot;;i:9;s:3:&quot;PIE&quot;;i:10;s:5:&quot;SHAPE&quot;;i:11;s:5:&quot;GANTT&quot;;i:12;s:6:&quot;CANDLE&quot;;i:13;s:6:&quot;VOLUME&quot;;i:14;s:7:&quot;PYRAMID&quot;;i:15;s:9:&quot;HISTOGRAM&quot;;i:16;s:6:&quot;BAR 3D&quot;;}]]></property>
        <property name="Left">104</property>
        <property name="Name">cbStyle</property>
        <property name="Top">23</property>
        <property name="Width">185</property>
      </object>
      <object class="CheckBox" name="cbSeriesActive" >
        <property name="Caption">Active</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">17</property>
        <property name="Name">cbSeriesActive</property>
        <property name="Top">80</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbSeriesPen" >
        <property name="Caption">Series Pen</property>
        <property name="Checked">1</property>
        <property name="Height">20</property>
        <property name="Left">161</property>
        <property name="Name">cbSeriesPen</property>
        <property name="Top">80</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbColorEach" >
        <property name="Caption">Color Each Point</property>
        <property name="Checked">1</property>
        <property name="Height">24</property>
        <property name="Left">17</property>
        <property name="Name">cbColorEach</property>
        <property name="Top">106</property>
        <property name="Width">121</property>
      </object>
      <object class="GroupBox" name="GroupBox3" >
        <property name="Caption">Marks</property>
        <property name="Height">168</property>
        <property name="Left">9</property>
        <property name="Name">GroupBox3</property>
        <property name="Top">160</property>
        <property name="Width">280</property>
        <object class="CheckBox" name="cbMarksVisible" >
          <property name="Caption">Visible</property>
          <property name="Checked">1</property>
          <property name="Height">21</property>
          <property name="Left">16</property>
          <property name="Name">cbMarksVisible</property>
          <property name="Top">24</property>
          <property name="Width">121</property>
        </object>
        <object class="CheckBox" name="cbMarksTransp" >
          <property name="Caption">Transparent</property>
          <property name="Height">21</property>
          <property name="Left">16</property>
          <property name="Name">cbMarksTransp</property>
          <property name="Top">48</property>
          <property name="Width">121</property>
        </object>
        <object class="CheckBox" name="cbMarksPen" >
          <property name="Caption">Pen Visible</property>
          <property name="Checked">1</property>
          <property name="Height">21</property>
          <property name="Left">144</property>
          <property name="Name">cbMarksPen</property>
          <property name="Top">48</property>
          <property name="Width">121</property>
        </object>
        <object class="CheckBox" name="cbMarksShadow" >
          <property name="Caption">Shadow</property>
          <property name="Checked">1</property>
          <property name="Height">21</property>
          <property name="Left">144</property>
          <property name="Name">cbMarksShadow</property>
          <property name="Top">24</property>
          <property name="Width">121</property>
        </object>
        <object class="Label" name="Label2" >
          <property name="Alignment">agRight</property>
          <property name="Caption">Draw every :</property>
          <property name="Height">13</property>
          <property name="Left">7</property>
          <property name="Name">Label2</property>
          <property name="Top">80</property>
          <property name="Width">75</property>
        </object>
        <object class="Edit" name="EdMarksDrawEvery" >
          <property name="Height">21</property>
          <property name="Left">88</property>
          <property name="Name">EdMarksDrawEvery</property>
          <property name="Text">1</property>
          <property name="Top">76</property>
          <property name="Width">40</property>
        </object>
        <object class="Label" name="Label3" >
          <property name="Alignment">agRight</property>
          <property name="Caption">Angle :</property>
          <property name="Enabled">0</property>
          <property name="Height">13</property>
          <property name="Left">7</property>
          <property name="Name">Label3</property>
          <property name="Top">104</property>
          <property name="Width">75</property>
        </object>
        <object class="Edit" name="EdMarksAngle" >
          <property name="Enabled">0</property>
          <property name="Height">21</property>
          <property name="Left">88</property>
          <property name="Name">EdMarksAngle</property>
          <property name="Text">0</property>
          <property name="Top">100</property>
          <property name="Width">40</property>
        </object>
        <object class="Label" name="Label4" >
          <property name="Alignment">agRight</property>
          <property name="Caption">Style :</property>
          <property name="Height">13</property>
          <property name="Left">31</property>
          <property name="Name">Label4</property>
          <property name="Top">129</property>
          <property name="Width">75</property>
        </object>
        <object class="ComboBox" name="cbMarksStyle" >
          <property name="Height">19</property>
          <property name="Items"><![CDATA[a:10:{i:0;s:5:&quot;VALUE&quot;;i:1;s:7:&quot;PERCENT&quot;;i:2;s:5:&quot;LABEL&quot;;i:3;s:12:&quot;LABELPERCENT&quot;;i:4;s:10:&quot;LABELVALUE&quot;;i:5;s:6:&quot;LEGEND&quot;;i:6;s:12:&quot;PERCENTTOTAL&quot;;i:7;s:17:&quot;LABELPERCENTTOTAL&quot;;i:8;s:6:&quot;XVALUE&quot;;i:9;s:2:&quot;XY&quot;;}]]></property>
          <property name="Left">112</property>
          <property name="Name">cbMarksStyle</property>
          <property name="Top">126</property>
          <property name="Width">153</property>
        </object>
      </object>
      <object class="Label" name="Label6" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Number of Series :</property>
        <property name="Height">13</property>
        <property name="Left">16</property>
        <property name="Name">Label6</property>
        <property name="Top">52</property>
        <property name="Width">115</property>
      </object>
      <object class="Edit" name="EdNumSeries" >
        <property name="Height">21</property>
        <property name="Left">136</property>
        <property name="Name">EdNumSeries</property>
        <property name="Text">1</property>
        <property name="Top">48</property>
        <property name="Width">25</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox4" >
      <property name="Caption">Aspect</property>
      <property name="Height">179</property>
      <property name="Left">19</property>
      <property name="Name">GroupBox4</property>
      <property name="Top">352</property>
      <property name="Width">290</property>
      <object class="Edit" name="EdChartTitle" >
        <property name="Height">21</property>
        <property name="Left">73</property>
        <property name="Name">EdChartTitle</property>
        <property name="Text">TeeChart</property>
        <property name="Top">23</property>
        <property name="Width">209</property>
      </object>
      <object class="Label" name="Label5" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Title :</property>
        <property name="Height">14</property>
        <property name="Left">16</property>
        <property name="Name">Label5</property>
        <property name="Top">27</property>
        <property name="Width">51</property>
      </object>
      <object class="CheckBox" name="cbView3d" >
        <property name="Caption">View 3D</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">17</property>
        <property name="Name">cbView3d</property>
        <property name="Top">49</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbPanelGradient" >
        <property name="Caption">Panel Gradient</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">17</property>
        <property name="Name">cbPanelGradient</property>
        <property name="Top">72</property>
        <property name="Width">121</property>
      </object>
      <object class="Label" name="Label9" >
        <property name="Alignment">agRight</property>
        <property name="Caption">3D Percent :</property>
        <property name="Height">13</property>
        <property name="Left">144</property>
        <property name="Name">Label9</property>
        <property name="Top">53</property>
        <property name="Width">75</property>
      </object>
      <object class="Edit" name="Ed3DPercent" >
        <property name="Height">21</property>
        <property name="Left">225</property>
        <property name="Name">Ed3DPercent</property>
        <property name="Text">15</property>
        <property name="Top">49</property>
        <property name="Width">25</property>
      </object>
      <object class="SpeedButton" name="bGradientStart" >
        <property name="Height">25</property>
        <property name="Left">189</property>
        <property name="Name">bGradientStart</property>
        <property name="Top">91</property>
        <property name="Width">25</property>
        <property name="jsOnClick">bGradientStartJSClick</property>
      </object>
      <object class="SpeedButton" name="bGradientEnd" >
        <property name="Height">25</property>
        <property name="Left">189</property>
        <property name="Name">bGradientEnd</property>
        <property name="Top">118</property>
        <property name="Width">25</property>
        <property name="jsOnClick">bGradientEndJSClick</property>
      </object>
      <object class="Label" name="Label11" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Start Color</property>
        <property name="Height">13</property>
        <property name="Left">24</property>
        <property name="Name">Label11</property>
        <property name="Top">99</property>
        <property name="Width">75</property>
      </object>
      <object class="Label" name="Label12" >
        <property name="Alignment">agRight</property>
        <property name="Caption">End Color</property>
        <property name="Height">13</property>
        <property name="Left">24</property>
        <property name="Name">Label12</property>
        <property name="Top">123</property>
        <property name="Width">75</property>
      </object>
      <object class="Label" name="Label13" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Panel Color</property>
        <property name="Height">13</property>
        <property name="Left">24</property>
        <property name="Name">Label13</property>
        <property name="Top">148</property>
        <property name="Width">75</property>
      </object>
      <object class="SpeedButton" name="bPanelColor" >
        <property name="Height">25</property>
        <property name="Left">189</property>
        <property name="Name">bPanelColor</property>
        <property name="Top">144</property>
        <property name="Width">25</property>
        <property name="jsOnClick">bPanelColorJSClick</property>
      </object>
      <object class="Edit" name="edGraStart" >
        <property name="Height">21</property>
        <property name="Left">112</property>
        <property name="Name">edGraStart</property>
        <property name="Top">95</property>
        <property name="Width">72</property>
      </object>
      <object class="Edit" name="edGraEnd" >
        <property name="Height">21</property>
        <property name="Left">112</property>
        <property name="Name">edGraEnd</property>
        <property name="Top">118</property>
        <property name="Width">72</property>
      </object>
      <object class="Edit" name="edPanelColor" >
        <property name="Height">21</property>
        <property name="Left">112</property>
        <property name="Name">edPanelColor</property>
        <property name="Top">144</property>
        <property name="Width">72</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox5" >
      <property name="Caption">Legend</property>
      <property name="Height">128</property>
      <property name="Left">312</property>
      <property name="Name">GroupBox5</property>
      <property name="Top">16</property>
      <property name="Width">240</property>
      <object class="CheckBox" name="cbLegendVisible" >
        <property name="Caption">Visible</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">16</property>
        <property name="Name">cbLegendVisible</property>
        <property name="Top">18</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbLegendTransparent" >
        <property name="Caption">Transparent</property>
        <property name="Height">21</property>
        <property name="Left">16</property>
        <property name="Name">cbLegendTransparent</property>
        <property name="Top">40</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbLegendFontColor" >
        <property name="Caption">Series Font Color</property>
        <property name="Height">21</property>
        <property name="Left">16</property>
        <property name="Name">cbLegendFontColor</property>
        <property name="Top">64</property>
        <property name="Width">121</property>
      </object>
      <object class="CheckBox" name="cbLegendInverted" >
        <property name="Caption">Inverted</property>
        <property name="Height">21</property>
        <property name="Left">144</property>
        <property name="Name">cbLegendInverted</property>
        <property name="Top">18</property>
        <property name="Width">89</property>
      </object>
      <object class="Edit" name="EdLegendTitle" >
        <property name="Height">21</property>
        <property name="Left">64</property>
        <property name="Name">EdLegendTitle</property>
        <property name="Top">91</property>
        <property name="Width">121</property>
      </object>
      <object class="Label" name="Label7" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Title :</property>
        <property name="Height">13</property>
        <property name="Left">16</property>
        <property name="Name">Label7</property>
        <property name="Top">95</property>
        <property name="Width">43</property>
      </object>
      <object class="CheckBox" name="cbLegendShadow" >
        <property name="Caption">Shadow</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">144</property>
        <property name="Name">cbLegendShadow</property>
        <property name="Top">40</property>
        <property name="Width">88</property>
      </object>
    </object>
    <object class="GroupBox" name="GroupBox6" >
      <property name="Caption">Axes</property>
      <property name="Height">144</property>
      <property name="Left">312</property>
      <property name="Name">GroupBox6</property>
      <property name="Top">144</property>
      <property name="Width">241</property>
      <object class="CheckBox" name="cbAxesVisible" >
        <property name="Caption">Visible Axes (can be set ind.)</property>
        <property name="Checked">1</property>
        <property name="Height">21</property>
        <property name="Left">16</property>
        <property name="Name">cbAxesVisible</property>
        <property name="Top">16</property>
        <property name="Width">217</property>
      </object>
      <object class="CheckBox" name="cbVerticalAxesBoth" >
        <property name="Caption">Vertical Both</property>
        <property name="Height">20</property>
        <property name="Left">14</property>
        <property name="Name">cbVerticalAxesBoth</property>
        <property name="Top">40</property>
        <property name="Width">96</property>
      </object>
      <object class="CheckBox" name="cbAxesHorizBoth" >
        <property name="Caption">Horizontal Both</property>
        <property name="Height">21</property>
        <property name="Left">14</property>
        <property name="Name">cbAxesHorizBoth</property>
        <property name="Top">61</property>
        <property name="Width">113</property>
      </object>
      <object class="Label" name="Label8" >
        <property name="Alignment">agRight</property>
        <property name="Caption">Bottom Axis Labels angle :</property>
        <property name="Height">13</property>
        <property name="Left">14</property>
        <property name="Name">Label8</property>
        <property name="Top">116</property>
        <property name="Width">171</property>
      </object>
      <object class="Edit" name="EdBAxisLabelsAngle" >
        <property name="Height">21</property>
        <property name="Left">192</property>
        <property name="Name">EdBAxisLabelsAngle</property>
        <property name="Text">0</property>
        <property name="Top">112</property>
        <property name="Width">33</property>
      </object>
    </object>
    <object class="CheckBox" name="cbCustomAxesChart" >
      <property name="Caption">Generate Custom Axes Chart</property>
      <property name="Height">21</property>
      <property name="Left">317</property>
      <property name="Name">cbCustomAxesChart</property>
      <property name="Top">424</property>
      <property name="Width">233</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption">(all the other controls wont do anything)</property>
      <property name="Height">13</property>
      <property name="Left">317</property>
      <property name="Name">Label10</property>
      <property name="Top">447</property>
      <property name="Width">238</property>
    </object>
    <object class="CheckBox" name="cbAddAnnotationTool" >
      <property name="Caption">Add Annotation Tool</property>
      <property name="Height">21</property>
      <property name="Left">319</property>
      <property name="Name">cbAddAnnotationTool</property>
      <property name="Top">293</property>
      <property name="Width">227</property>
    </object>
    <object class="CheckBox" name="cbAddColorBandTool" >
      <property name="Caption">Add ColorBand Tool</property>
      <property name="Height">21</property>
      <property name="Left">319</property>
      <property name="Name">cbAddColorBandTool</property>
      <property name="Top">317</property>
      <property name="Width">234</property>
    </object>
    <object class="CheckBox" name="cbAddColorLineTool" >
      <property name="Caption">Add ColorLine Tool</property>
      <property name="Height">21</property>
      <property name="Left">319</property>
      <property name="Name">cbAddColorLineTool</property>
      <property name="Top">341</property>
      <property name="Width">227</property>
    </object>
    <object class="CheckBox" name="cbAddGridBandTool" >
      <property name="Caption">Add GridBand Tool</property>
      <property name="Height">24</property>
      <property name="Left">321</property>
      <property name="Name">cbAddGridBandTool</property>
      <property name="Top">365</property>
      <property name="Width">225</property>
    </object>
  </object>
  <object class="ColorSelector" name="ColorSelector" >
    <property name="Height">314</property>
    <property name="Hidden">1</property>
    <property name="Left">24</property>
    <property name="Name">ColorSelector</property>
    <property name="Top">604</property>
    <property name="Width">557</property>
    <property name="jsOnChange">ColorSelectorJSChange</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Refresh Chart !</property>
    <property name="Height">33</property>
    <property name="Left">444</property>
    <property name="Name">Button1</property>
    <property name="Top">559</property>
    <property name="Width">131</property>
  </object>
</object>
?>

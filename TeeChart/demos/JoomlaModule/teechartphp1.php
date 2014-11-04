 <?php

/**
* @copyright Copyright (C) 2008 Steema Software. All rights reserved.
* See COPYRIGHT.php for copyright notices and details.
*/  
    
include "../../sources/TChart.php";

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
    
$param = $params->get( 'ejemploparametro', 0 );
$view3D = $params->get( 'View3D', 0 );
$panelGradient = $params->get( 'PanelGradient', 0 );
      
echo "TeeChart for PHP - Joomla Demo !<br>";

$chart = new TChart(500,300);

// View 3D
$chart->getAspect()->setView3D($view3D));
$chart->getPanel()->getGradient()->setVisible($panelGradient);
$bar=new Bar($chart->getChart());
$bar->add(10);
$bar->add(20);
$bar->add(30);

        
?>   
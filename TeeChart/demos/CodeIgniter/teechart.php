<?php

class TeeChart extends Controller {

    function TeeChart()
    {
        parent::Controller();

        $this->load->helper('url'); 
        $this->load->library('tcsources/TChart');    
    }
    
    function index()
    {
        
        $data['title'] = "Using TeeChart from CodeIgniter";        
           
        // Setup Chart
        // The Data could com from a function defined into the model, which could be adquired 
        // from a database.
        $ydata = array(20,20,20,20,20);   
        $labels = array('Cars','Phones','Bikes','Computers','Motorbikes');        
        
        $chart = new TChart(500,350);
        $chart->getChart()->getHeader()->setText("Pie Style");
        $chart->getChart()->getAspect()-> setChart3DPercent(35);

        // Here we use the Pie Style, but TeeChart includes many Series types (like Bar, 
        // HorizBar, Line, HorizLine, Area, HorizArea, Candle, Volume, etc.. ). Check them !
        
        $pie=new Pie($chart->getChart());
        $pie->getMarks()->setVisible(true);
        $pie->getMarks()->setTransparent(true);
        $pie->getMarks()->setArrowLength(-65);
        $pie->getMarks()->getArrow()->setVisible(false);
        $pie->setCircled(true);
        ThemesList::applyTheme($chart->getChart(),1);  // BlackIsBack 
        $pie->getMarks()->getFont()->setColor(Color::Black());
                
        // Setup the Pie
        $pie->setBevelPercent(20);
        $pie->addArray($ydata);
        $pie->setLabels($labels);

        // File locations
        // Could possibly add to config file if necessary
        // In the webroot (add directory to .htaccess exclude)
        $chart_temp_directory = 'temp';  
        
        // Create the Chart and write to file 
        $chart->render($chart_temp_directory . '/' . 'chart.png');    
        $data['chart'] = $chart_temp_directory . '/' . 'chart.png';
        
        $this->load->view('chart_view', $data);        
    }
}
?> 
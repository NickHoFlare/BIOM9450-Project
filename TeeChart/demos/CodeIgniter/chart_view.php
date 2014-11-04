<html>
<head>
<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

h2 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}


<title><?php echo $title?></title>
</style>
</head> 
<body>
<h2><?php echo $title;?></h2>
<br>
<img src="<?php echo  base_url(). $chart?>"/>
</body>
</html> 

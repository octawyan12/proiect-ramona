<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		
		<title>Prezentare filme</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="theme/supersized.shutter.min.js"></script>
		
	</head>
	<body>
		<?php
			include ("mySqlConnect.php");
			$sql = "SELECT imagine FROM filme1";
			$resursa = mysql_query($sql);
			$contor = 0;
			while ($row = mysql_fetch_array($resursa))
			{
				$array[$contor]=$row['imagine'];
				$contor ++;
			}
			//for ($i=0; $i<$contor; $i++){
			//	echo $array[$i]."<br>";
			//}
		?>
	
		<script type="text/javascript">
			var jArray= <?php echo json_encode($array ); ?>;
			var dim= <?php echo json_encode($contor ); ?>;
			
			jQuery(function($){
				$.supersized({

					// Functionality
					slide_interval		:	5000,		// Length between transitions
					transition			:   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed	:	700,		// Speed of transition
					
					// Components							
					slide_links			:	'false',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 				:  	[			// Slideshow Images
												{image : 'http://stafidutz.net/wp-content/uploads/2011/11/Ice_Age_2002_Cartoons.jpg', title : 'slide', thumb : '', url : ''},
												{image : 'http://o.scdn.co/300/94c4aa21dbe708160bb6bcd4942a8efa657ce803', title : 'slide', thumb : '', url : ''},
												{image : 'http://www.rhythmhouse.in/ProdImages/images/F065783.jpg', title : 'slide', thumb : '', url : ''},
												{image : 'http://ecx.images-amazon.com/images/I/51KVkBxgm6L._SL500_AA300_.jpg', title : 'slide', thumb : '', url : ''},
												{image : 'https://twimg0-a.akamaihd.net/profile_images/2323746314/w5ejx2gxy8qbnoooi5sv.jpeg', title : 'slide', thumb : '', url : ''}
											]
				});
		    }); 
		</script>
		
		<!--Thumbnail Navigation-->
		<div id="prevthumb"></div>
		<div id="nextthumb"></div>
	
		<!--Arrow Navigation-->
		<a id="prevslide" class="load-item"></a>
		<a id="nextslide" class="load-item"></a>
	
		<div id="thumb-tray" class="load-item">
			<div id="thumb-back"></div>
			<div id="thumb-forward"></div>
		</div>
	
		<!--Time Bar-->
		<div id="progress-back" class="load-item">
			<div id="progress-bar"></div>
		</div>
	
		<!--Control Bar-->
		<div id="controls-wrapper" class="load-item">
			<div id="controls">
			
				<a id="play-button"><img id="pauseplay" src="img/pause.png"/></a>
		
				<!--Slide counter-->
				<div id="slidecounter">
					<span class="slidenumber"></span> / <span class="totalslides"></span>
				</div>
			
				<!--Slide captions displayed here-->
				<div id="slidecaption"></div>
			
				<!--Thumb Tray button-->
				<a id="tray-button"><img id="tray-arrow" src="img/button-tray-up.png"/></a>
			
				<!--Navigation-->
				<ul id="slide-list"></ul>
			
			</div>
		</div>
	</body>
</html>
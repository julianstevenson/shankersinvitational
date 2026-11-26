<?php
include 'dbutils.php';
include 'utils.php';

$err = "";
$comperr="";
$msg = $_GET['msg'];
$currentcomp = getCurrentComp();
//get old comps
$query = "select competition.id as compid, competition.compname, competition.venue, competition.photocount, year.year from competition inner join year on competition.yearid = year.id order by startdate desc";
$comps = mhexecquery($query, $comperr);


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="black" name="apple-mobile-web-app-status-bar-style">
        
        <!-- Page title + Description -->
        <title>The Shankers Invitational - Past event photos</title>
        <meta name="description" content="The Shankers Invitational Tournament is an annual golfing display of some of the most shankingly average golf seen in Australia">
                
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="favicons/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
        
        
		
		<!-- Style Sheets -->
        <link rel="stylesheet" type="text/css" href="css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
		
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  
        <link rel="stylesheet" type="text/css" href="css/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" href="js/media/mediaelementplayer.min.css" />
        <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css"> 
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.4"/> 
        <link rel="stylesheet" type="text/css" href="css/mosaic.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/rs-plugin.css">
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" />
        <link rel="stylesheet" type="text/css" href="css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="css/mega.css" />
        

        <link rel="stylesheet" type="text/css" href="css/skin1.css"> <!-- change to skin2.css for other skin -->
        <link rel="stylesheet" type="text/css" href="css/full.css"> <!-- change to boxed.css for boxed style -->
		
		
		<!-- Scripts -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
    
    	
	<div id="divheader"></div>
        	

    			
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper body-wrapper">
				
		<div class="wrapper ad-pad clearfix">
		
			<!-- Start Main Column  -->
			<div class="col-1-1">
				
				<!-- Start Gallery Section -->
				<div class="clearfix">
					<div class="col-1-4">
						<h3>Shankers Gallery</h3>
						
						<ul class="list-4 widget-list option-set" id="filter" data-option-key="filter">
						 	<li><a href="#show-all" data-option-value="*" class="selected">Show All Images</a></li>
<?php 					$iii = 0;
						while ($row = db_fetch_assoc($comps)) { 
							$iii = $iii+1;
							
							if ($row['photocount'] . 0 > 0 ) {?>
						 	<li><a href="#cat-<?php echo $row['compid']?>" data-option-value=".cat-<?php echo $row['compid']?>"><?php echo $row['compname']?></a></li>
<?php }} 
$compcount = $iii;
db_data_seek($comps, 0);
?>

</ul>

						<p>Capturing the tears, the glory, the pain, the guts and determination of Shankers past and present, the Shankers Gallery tells an epic tale.  These photos capture just some of the glorious moments from the Shankers archives.
						</p>
					</div>				
					
						
						
					<!-- Start Isotope -->
					<div class="col-3-4 last thumb-gallery super-list variable-sizes clearfix" id="thumb-gallery">
						<!-- Start Thumbnail -->
						<?php $iii = 1;
						while ($row = db_fetch_assoc($comps)) { 
							$jjj = 1;
							while ($jjj<=$row['photocount']) {
?>
						<div class="col-1-3 element cat-<?php echo $row['compid']?>">
							<div class="mosaic-block circle"><a href="gallery/<?php echo $row['year'] . "/" . $jjj?>.jpg" class="mosaic-overlay fancybox" data-fancybox-group="gallery" title="<?php echo $row['year'] ?>"></a>
							<div class="mosaic-backdrop"><img src="gallery/<?php echo $row['year'] . "/" . $jjj?>.jpg" alt="" /></div></div>
						</div>
		
<?php 					$jjj = $jjj+1;
							}
						$iii = $iii+1;
						}							
						?>
							
						<!-- End Isotope -->		
					</div>

				</div>
				
				
				

			</div>
			
		</div>
	</div>
    	
    	
		
		
		
		
	<!-- Load jQuery -->
	<script type="text/javascript" src="js/vendor/jquery-1.8.3.min.js"></script>
	
	<!-- Start Scripts --> 
	<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/jquery.sidr.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="js/cleantabs.jquery.js"></script>
	<script type="text/javascript" src="js/fitvids.min.js"></script>
	<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
	<script type="text/javascript" src="js/media/mediaelement-and-player.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/selectivizr-min.js"></script>
	<script type="text/javascript" src="js/placeholder.js"></script>
	<script type="text/javascript" src="js/jquery.stellar.min.js"></script>
	<script type="text/javascript" src="js/mosaic.1.0.1.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/jquery.tooltipster.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.sticky.js"></script>
	<script type="text/javascript" src="js/html5media.js"></script>
    
    <script type="text/javascript" src="js/main.js"></script>
	

				
    <div id="divfooter"></div>
	<div id="divga"></div>
	<script type="text/javascript">

        $(document).ready(function () {
            $("#divheader").load("header.php");
            $("#divfooter").load("footer.html");
            $("#divga").load("ga.html");
        });   
 	</script>
        
    
    </body>
</html>

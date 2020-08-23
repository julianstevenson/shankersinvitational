<?
include 'dbutils.php';
include 'utils.php';
$currentcomp = getCurrentComp();


$query = sprintf( "SELECT distinct golfer.id, golfer.avatar, golfer.firstname, golfer.lastname, golfer.nickname, golfer.description, golfer.handicap, golfer.golflink
			FROM `golfer`
			LEFT OUTER JOIN handicap ON handicap.golfersid = golfer.id
			where golfer.compid=%s order by nickname", sqlsafe($currentcomp) );
$golfers = mhexecquery($query, $err);

$query = sprintf( "SELECT distinct golfer.compid, golfer.id, golfer.avatar, golfer.firstname, golfer.lastname, golfer.nickname, golfer.description, golfer.handicap, golfer.golflink
			FROM `golfer`
			LEFT OUTER JOIN handicap ON handicap.golfersid = golfer.id
			where golfer.compid!=%s and golfer.nickname not in (SELECT distinct golfer.nickname 
			FROM `golfer`
			LEFT OUTER JOIN handicap ON handicap.golfersid = golfer.id
			where golfer.compid=%s) order by nickname", sqlsafe($currentcomp), sqlsafe($currentcomp) );

$golfersold = mhexecquery($query, $err);

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
       <title>The Shankers Invitational - Shankers Past and Present</title>
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
    <body id="top">
    
    	
	<div id="divheader"></div>
        	
       	
    	
    	
   		
    	

    	
    			
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper body-wrapper">		
		<div class="wrapper ad-pad clearfix">
			
			<div class="main-content col-4-5 right last">
				<h1>Shankers</h1>
				<p class="lead">Shankers past and present have all tried to claim the title of Champion Shanker.  Only a few have succeeded.</p> 
				
				<hr/>
				
				<h3 id="section1">Current Shankers</h3>
				<div class="clearfix teams">
<?php 				while ($row = mysql_fetch_assoc($golfers)) { 
						if ($row['nickname'] != "" ) {?>
				<!-- Member -->
					<div class="col-1-3 boxy">
						<div class="mosaic-block circle"><a href="/players/<? echo urlencode(strtolower($row['nickname'])) ?>?compid=<?php echo $row['compid']?>" class="mosaic-overlay link fancybox" data-fancybox-group="gallery" title="<? echo $row['nickname']?>"></a>
						<div class="mosaic-backdrop"><img src="<? echo $row['avatar']?>" alt="Mock" /></div></div>
						<div class="inner-box">
							<h4><a href="/players/<? echo urlencode(strtolower($row['nickname'])) ?>?compid=<?php echo $row['compid']?>"><? echo $row['nickname']?></a></h4>
							<h5>Handicap: <?php echo $row['handicap']?></h5>

							<em><?php echo writeTexttoHTML(firstNChars($row['description'], 0, 100), true)?>&#8230;<a href="player.php?compid=<?php echo $row['compid']?>&player=<? echo urlencode($row['nickname']) ?>" class="read-more">More</a></em>
<!--  							<ul class="social-link">
								<li><a class="fa fa-facebook-square" href="#"></a></li>
								<li><a class="fa fa-twitter-square" href="#"></a></li>
								<li><a class="fa fa-linkedin-square" href="#"></a></li>
								<li><a class="fa fa-instagram" href="#"></a></li>
							</ul>-->
						</div>
					</div>
						    	<?php }} ?>
					
				
				<hr/>
				
				<a href="#top" class="btn-3 xsmall-btn right fa"></a>
				<h3 id="section2">Past Shankers</h3>
				<div class="clearfix teams">
					
<?php 				while ($row = mysql_fetch_assoc($golfersold)) { 
						if ($row['nickname'] != "" ) {?>
				<!-- Member -->
					<div class="col-1-5 boxy">
						<a href="player.php?compid=<?php echo $row['compid']?>&player=<? echo urlencode($row['nickname']) ?>"><img src="<? echo $row['avatar']?>" alt="<? echo $row['nickname']?>" /></a>
						<div class="inner-box">
							<h6><a href="player.php?compid=<?php echo $row['compid']?>&player=<? echo urlencode($row['nickname']) ?>"><? echo $row['nickname']?></a></h6>
						</div>
					</div>
						    	<?php }} ?>
					
					
				</div>
				
				
				<hr/>
		</div>		
				
					
				<!-- Finish Main Content -->
			</div>
			
			
			<!-- Start Main Sidebar  -->
			<aside class="col-1-5">
				<div class="widget">
			    	<h3 class="widget-title">Jump Menu</h3>
			    	<ul class="widget-list  list-1">
			    		<li><a href="#section1">Current Shankers</a></li>
			    		<li><a href="#section2">Shankers Aluminati</a></li>
			    	</ul>	
			    </div>	
			</aside> 
			<!-- Finish Sidebar -->
			
			
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

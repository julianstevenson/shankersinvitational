<?php
include 'dbutils.php';
include 'utils.php';

$err = "";
$msg = $_GET['msg'];
$currentcomp = getCurrentComp();

	//get number of seeding events
	$queryeventcount = sprintf("SELECT count(*) as eventcount FROM seeding WHERE compid=%s and eventdate <=now()", $currentcomp);	
	$eventcountrs = db_fetch_assoc(mhexecquery($queryeventcount, $err));
	
	if (!$eventcountrs) {
		$numEvents=0;
	}
	else {
		$numEvents = $eventcountrs['eventcount'] ;
	}

	$querysummary = sprintf("SELECT golfer.id as golferid, golfer.avatar, golfer.nickname, seed.location, score.score FROM seedingscore score inner join seeding seed on score.seedingid=seed.id inner join golfer on score.golferid=golfer.id WHERE seed.compid=%s order by golfer.nickname asc, seed.id asc", $currentcomp);
	$summary = mhexecquery($querysummary, $err);
	
	$querypoints = sprintf("SELECT seed.compid, golfer.id as golferid, golfer.avatar, golfer.nickname, sum(score.points)  as totalpoints FROM seedingscore score inner join seeding seed on score.seedingid=seed.id inner join golfer on score.golferid=golfer.id WHERE seed.compid=%s group by seed.compid, golfer.id, golfer.avatar, golfer.nickname  order by sum(score.points) desc;", $currentcomp);
	$points = mhexecquery($querypoints, $err);
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
        <title>The Shankers Invitational - Leaderboard</title>
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
				
			<div class="main-content col-1-1">
				<h1>Seeding Event Leaderboard</h1>
				<p>The Shankers thrash it out annually for seeding hnours at a series of pre-competition events in the Melbourne area.  Tactics are key during the lead up to the tournament.</p>
				
			
				
				<!-- Responsive Table Heading Labels -->
				<style>
					@media only screen and (max-width: 767px) {
					td:nth-of-type(1):before { content: "Competitor"; }
					td:nth-of-type(2):before { content: "Round 1"; }
					td:nth-of-type(3):before { content: "Round 2"; }
					td:nth-of-type(4):before { content: "Round 3"; }
					td:nth-of-type(5):before { content: "Total"; }
					td:nth-of-type(6):before { content: "Position"; }
					}
				</style>
				
				
				<h2>Seeding Points</h2>				
				<!-- Time Table -->			
				<table class="table-style-1 mobile-table">
					<thead>
					<tr>
					<th align="center">Competitor</th>
					<th align="center">Seeding Points</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					while ($pointsrow = db_fetch_assoc($points)) {
						?>
						
						<td align="center"><p class="lead"><img src="<?php echo $pointsrow['avatar']?>"  width="35" height="27" border="0">
	       					<b><?php echo $pointsrow['nickname'] ?></b></p></td>
						<td align="center"><p class="lead"><?php echo zerotodash($pointsrow['totalpoints']) ?></p></td>
						</tr>
						<?php		
					}
					?>					
					
					</tbody>
				</table>
				
				<h2>Event Scores Summary</h2>				
				<!-- Time Table -->			
				<table class="table-style-1 mobile-table">
					<thead>
					<tr>
					<th align="center">Competitor</th>

					<?php 
					$xxx=0;
					while ($xxx < $numEvents) {
						?>
						<th align="center"><?php echo $xxx + 1?></th>
												
						<?php 
						$xxx = $xxx+1;
						
						}
					?>
					
					
					</tr>
					</thead>
					<tbody>
					<?php 
					$yyy = 0;
					$summaryplayerid = 0;
					
					while ($summaryrow = db_fetch_assoc($summary)) {
						$iscore= $summaryrow['score'] + 0;
						

						if ($summaryplayerid != $summaryrow['golferid']) {
							$summaryplayerid = $summaryrow['golferid'];
							if ($yyy>0) {
								//pad the cols
								while ($yyy < $numEvents) {?>
										<td >&nbsp;</td>
							
								<?php 	$yyy = $yyy + 1;  
								}
							}
								
							$yyy = 1;
						?>
						</tr>
						<tr  valign="middle">
							<td align="center" ><img src="<?php echo $summaryrow['avatar']?>"  width="35" height="27" border="0"><?php echo $summaryrow['nickname']?></a></td>
							<td align="center" ><?php echo zerotodash($iscore)?></td>
							<?php 
						}
						else {
						?>
							<td align="center" ><?php echo zerotodash($iscore)?></td>
						<?php $yyy = $yyy + 1;
						} ?>
				<?php 	}
							if ($yyy>0) {
								//pad the cols
								while ($yyy < $numEvents) {?>
										<td >&nbsp;</td>
							
								<?php 	$yyy = $yyy + 1;  
								}
							}
				?>
					</tbody>
					</table>			
									
				
						
				<!-- Finish Main Content -->
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
	<script type="text/javascript" src="js/html5media.js"></script>
	<script type="text/javascript" src="js/jquery.sticky.js"></script>
     
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



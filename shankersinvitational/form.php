<?
include 'dbutils.php';
include 'utils.php';

$err = "";
$msg = $_GET['msg'];
$seedingid = $_GET['seedingid'];
$currentcomp = getCurrentComp();

if ($seedingid =="") {
	//redirect to seeding summary page
	header("Location: formsummary.php?compid=" . $currentcomp);
	
}

$query = sprintf("SELECT distinct * from seeding where seeding.id=%s", $seedingid);
$seeding = mhexecquery($query, $err);
$seedingrow = mysql_fetch_assoc($seeding);
if (!$seedingrow) {
	$err = "That doesn't appear to be a valid event id.";
}

//get other seeding events
$query = sprintf("select * from seeding where compid=%s order by eventdate desc", $currentcomp);
$allevents = mhexecquery($query, $err);

//get seeding scores
$query = sprintf("SELECT golfer.id as golferid, golfer.avatar, golfer.nickname, seed.id as seedingid, seed.location, score.score, score.points FROM seedingscore score inner join seeding seed on score.seedingid=seed.id inner join golfer on score.golferid=golfer.id WHERE seed.compid=%s and seed.id=%s order by score.score desc, golfer.nickname asc, seed.id asc", $currentcomp, $seedingid);
$eventscores = mhexecquery($query, $err);

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
        <title>The Shankers Invitational - Seeding Event</title>
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
				
			<div class="main-content clearfix col-3-4">
				
				<h1><?php echo $seedingrow['location']?></h1>
						
				<div class="clearfix evt-single-date">
					<h6 class="left"><?php echo displaydate($seedingrow['eventdate'])?></h6>
					<div class="evt-price right">&nbsp;</div>
				</div>
<?php 
if ($err <> "") {
?>		
   			<div class="message error">
	    				<em class="fa">&#xf071;</em> <?php echo $err?>
	    			</div>

<?php } ?>
				<iframe src="<?php echo $seedingrow['googlemap']?>" width="600" height="250" frameborder="0" style="border:0"></iframe>
				
				
				<div class="boxy boxy-pad col-1-3">
					<h5>Details</h5>
					<ul class="widget-list list-2">
						<li><strong>Start:</strong> <?php echo $seedingrow['starttime']?></li>
						<li><strong>Venue:</strong> <?php echo $seedingrow['location']?> </li>
						<li><strong>Address:</strong> <?php echo $seedingrow['address']?>  </li>
						<li><strong>Web:</strong> <a href="<?php echo $seedingrow['www']?>"><?php echo $seedingrow['www']?></a></li>
					</ul>	
				</div> 
				
				<h3>On The Day</h3>
				<p><? if ($seedingrow['writeup'] == "") {
						echo "No writeup yet - check back soon!";
					}
					else {
					
						echo writeTexttoHTML( $seedingrow['writeup']);
					
					}
					?></p>
				
						
				<!-- Finish Main Content -->
			</div>
			
			
				<!-- Responsive Table Heading Labels -->
				<style>
					@media only screen and (max-width: 767px) {
					td:nth-of-type(1):before { content: "Player"; }
					td:nth-of-type(2):before { content: "Score"; }
					td:nth-of-type(3):before { content: "Points"; }
					}
				</style>
			
			<!-- Start Main Sidebar  -->
			<aside class="col-1-4 last">
<?php    	$rowcount = 0;
$endtable = false;
			while ($eventscoresrow = mysql_fetch_assoc($eventscores))
			{	
				$rowcount .= 1;
				if ($rowcount==1) {?>
				<div class="widget">
				    <h3>Event Scores</h3>
				<table class="table-style-1 mobile-table">
					<thead>
					<tr>
					<th align="center">Player</th>
						<th align="center">Score</th>
						<th align="center">Points</th>
					</tr>
					</thead>
					<tbody>
				<?php $endtable = true; 
				}?>
					<tr valign="middle">
						<td align="center">
	       					<?php echo $eventscoresrow['nickname']?>
						</td>
						<td align="center">
	       					<?php echo zerotodash($eventscoresrow['score'])?>
						</td>
						<td align="center">
	       					<?php echo zerotodash($eventscoresrow['points'])?>
						</td>
					</tr>
		<?php 	
             }
             
             if ($endtable) {?>
					</tbody>
					</table>
				</div>
             
             <?php } ?>
				<div class="widget">
				    <h3>Other Events</h3>
				    <ul class="widget-event-list">				    
<?php 				while ($alleventsrow = mysql_fetch_assoc($allevents)) { 
						if ( $alleventsrow['id'] <> $seedingid) {
							
?>
<li>
				    		<img class="left stay" src="img/logo-white.png" alt="Seeding Event" />
				    		<div class="date"><?php echo displaydate($alleventsrow['eventdate'], false)?></div>
				    		<h6 class="title"><a href="form.php?compid=<?php echo $currentcomp ?>&seedingid=<?php echo $alleventsrow['id']?>"><?php echo $alleventsrow['location']?></a></h6>
				    	</li>
<?php } }?>			    	
				    </ul>
			    </div>
				
			    
			    
			    <a href="admin/seedingscores_update.php?compid=<?php echo $currentcomp?>&seedingid=<?php echo $seedingid?>"><input type="button" value="Enter scores"></a>	
			
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

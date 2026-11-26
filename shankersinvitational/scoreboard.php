<?php
include 'dbutils.php';
include 'utils.php';

$err = "";
$msg = $_GET['msg'];
$currentcomp = getCurrentComp();

	$query = sprintf( "select competition.compname, count(round.id) as roundcount from round inner join competition on round.compid=competition.id where compid=%s and round.number>0 group by competition.compname;", $currentcomp );
	$row = db_fetch_assoc(mhexecquery($query, $err));

	$numrounds = $row['roundcount'];
    $compname = $row['compname'];

	$rounds = mhexecquery(sprintf("select * from round where compid=%s", $currentcomp), $err);
	$query = sprintf( "select golfer.id as golferid, golfer.avatar, golfer.nickname, sum(score.score) as totalscore, sum(score.points) as totalpoints from golfer inner join round on round.compid=golfer.compid left outer join score on score.roundid=round.id and golfer.id=score.golferid where golfer.compid=%s group by golfer.id, golfer.nickname  order by sum(points) desc, sum(score) desc;", $currentcomp );
	$totalscores = mhexecquery($query, $err);

	$query = sprintf( "select count(*) as golfercount from golfer where compid=%s", $currentcomp );
	$golfercount = db_fetch_assoc(mhexecquery($query, $err));
	$numplayers = $golfercount['golfercount'];
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
				<h1><?php echo $compname?> Leaderboard</h1>
				<p>Scores will be updated here during the tournament, at the end of each day's play.</p>
				
			
				
				<!-- Responsive Table Heading Labels -->
				<style>
					@media only screen and (max-width: 767px) {
					td:nth-of-type(1):before { content: "Competitor"; }
					td:nth-of-type(2):before { content: "Round 1"; }
					td:nth-of-type(3):before { content: "Round 2"; }
					td:nth-of-type(4):before { content: "Round 3"; }
					td:nth-of-type(5):before { content: "Total"; }
					td:nth-of-type(6):before { content: "Competition Points"; }
					td:nth-of-type(7):before { content: "Position"; }
					}
				</style>
				
				
				<!-- Time Table -->	
				
				<!-- Time Table -->			
				<table class="table-style-1 mobile-table">
					<thead>
					<tr>
					<th align="center">Competitor</th>
<?php	$iii=1; 
	while ($row = db_fetch_assoc($rounds)) {
	
	if ($row['number'] > 0) { ?>					
						<th align="center">Round <?php echo $iii ?> <br>(<a href="admin/scores_update.php?roundid=<?php echo $row['id']?>"><?php echo $row['location']?></a>)</th>
<?php
	$iii += 1;
}
}?>						<th align="center">Total</th>
						<th align="center">Competition Points</th>
						<th align="center">Position</th>
					</tr>
					</thead>
					<tbody>
<?php
		$position = 1;
		while ($rowtotalscore = db_fetch_assoc($totalscores)) {
				if ($position == 1) {
					$classtotal = "bf_button_leader";
				}
				else if ($position == $numplayers) {
					$classtotal = "bf_button_naga";
				}
				else {
					$classtotal = "bf_button_score";
				}

				if ($rowtotalscore['totalscore'] + 0 == 0) {
					$sumofscore =  "-"; 
					$classtotal = "bf_button_naga";
				}
				else {
					$sumofscore =  $rowtotalscore['totalscore'] ;	
				}

				if ($rowtotalscore['totalpoints']+ 0 == 0) {
					$totalpoints =  "-"; 
				}
				else {
					$totalpoints =  $rowtotalscore['totalpoints'] +0 ;	
				}
				
				
				$query = sprintf("select golfer.id as golferid, golfer.nickname, golfer.avatar, round.location, round.number, score.score from golfer inner join round on round.compid=golfer.compid left outer join score on score.roundid=round.id and golfer.id=score.golferid where golfer.compid=%s and score.golferid=%s order by round.number;", $currentcomp,$rowtotalscore['golferid'] );	
				$scores = mhexecquery($query, $err);
				$jjj = 1;
 ?>
					<tr valign="middle">
						<td align="center">
	       					<p class="lead"><img src="<?php echo $rowtotalscore['avatar']?>"  width="35" height="27" border="0">
	       					<b><?php echo $rowtotalscore['nickname'] ?></b></p>
						</td>
	    			<?php
				while ($row = db_fetch_assoc($scores)) {
						while ($jjj < $row['number']) {
 if ($row['number'] > 0) { ?>
						<td align="center"><p class="lead">-</p></td>
<?php }						$jjj +=1;
						}
						if ($row['score']+ 0 == 0) {
							$score =  "-";
						}
						else {
							$score =  $row['score'] ;
						}
if ($row['number'] > 0) {					?>
						<td align="center"><p class="lead"><?php echo $score ?></p></td>
<?php						$jjj = $row['number'] +1;
}				}
				while ($jjj <= $numrounds) {
 ?>
						<td align="center"><p class="lead">-</p></td>
<?php 
					$jjj += 1;
				}
?>						
						<td align="center"><p class="lead"><?php echo $sumofscore?></p></td>
						<td align="center"><p class="lead"><b><?php echo $totalpoints?></b></p></td>
						<td align="center"><p class="lead"><?php echo $position?></p></td>
						
						
				</tr>
<?php				
				$position += 1;
?>
<?php }
?>
					<tr valign="middle">
						<td align="center">&nbsp;</td>
						<?php	
						if (db_num_rows( $rounds )) {
							db_data_seek($rounds, 0);
						}
						while ($row = db_fetch_assoc($rounds)) {

							if ($row['number'] > 0) { ?>					
							<td align="center"><a href="admin/scores_update.php?roundid=<?php echo $row['id']?>"><input type="button" value="Enter Scores"></a></td>
                                                <?php      } else { ?>
                                                        <td align="center">&nbsp;</td>
							<?php }
						} ?>						
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						</tr>

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

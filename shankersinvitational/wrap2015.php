<?php 
include 'dbutils.php';
include 'utils.php';
$currentcomp = getCurrentComp();
//Set 2015 compid
$compidforwrap = 3;
//get seeding scores
$query = sprintf("SELECT golfer.nickname, sum(score.points) as score FROM  score inner join golfer on score.golferid=golfer.id WHERE golfer.compid=%s group by golfer.nickname order by sum(points) desc", $compidforwrap);

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
        <title>The Shankers Invitational - Tournament Wrap</title>
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
	

		<div class="wrapper blog-roll ad-pad clearfix">
		
			<!-- Start Main Column  -->
			<div class="col-3-4">
			
				<div class="clearfix post">
					
					
					<h1 class="title">2015 Winner - Rimmer!</h1>
					
<!--  					<div class="mosaic-block circle">
						<iframe width="640" height="360" src="http://www.youtube.com/embed/rj9uVnADE5s" frameborder="0" allowfullscreen></iframe>
											</div>
	-->				
					
					<div class="col-2-5 right last pad-left">
						<img class="" src="img/2015winner.jpg" alt="Rimjob - 2015 Shankers Champ" />
						<span class="wp-caption-text">Rimmer - 2015 Shankers Champ</span>
					</div>
					<h4>Coolum - Day 1</h4>
<p class="lead">6 Shankers congregated at Tullamarine airport to kick off the 2015 tournament in some style.  </p>
<p>With Purple and Pussy still perplexed by Jetstar's insistence on flying to the wrong Sunshine Coast, Marker made the most of the time between two breaths and necked his Shankers tipple before Dolphin could say "where's the Dom Perignon". </p>
<p>A smooth flight allowed all players to flawlessly execute their pre-tournament routine.  Rimmer sat in quiet contemplation of the battle to come; Marker made the most of the drinks cart and sank 26 VB's; Dolphin's aeronautical nervousness was apparent through the endless chatter and inane chat; Purple plugged in his ear buds and got jiggy to some Snoop Dog to get the blood pumping; Moley's focus drifted away to a world of statistics, spreadsheets and number crunching as he walked through the 1.3bn variations to the handicapping algorithm;  and Pussy, perhaps leaving his homework a little too late in the day tried to get some last minute tips from the latest addition of Golfing Digest.
<p>After collecting their bags, and packing their bags and bodies into the moving sardine tin, the Shankers arrived at the world famous Coolum resort via a bottle shop and a tumbleweed only to find that the resort closed in 1958.</p>
<p>Undeterred, the organisers found an 86 old ex go-go dancer in the dusty, neglected reception area and were relieved to discover that the resort in fact was fully open to business, but that Clive had decided to go for the minimalist look when it came to staff, guests and amenities.</p>
<p>After a quick change in their private villas, the Shankers were eager to get the competition underway.  Pussy, Rimmer and Marker kicked off the tournament in spectacular fashion and each shanked their first off the tee into either water of love grass.</p>
<p>And so, with the recently roasted skeleton of Jeff the Dinosaur looking on, the Shankers of 2015 were up and away. The humid conditions of the tropical SE Queensland proved to be a real test for the Shankers.  The Marker was keen to ensure he challenged himself - with beer and vodka long gone on the flight, he focused on aiming his shots towards tree stumps, clumps of tropical foliage and snake infested forests.  Rimmer with his usual cool, calm and collected presence made steady progress around the lake and tree lined course.</p>
<p>In the second group, Purple's infamous anger was about to boil over.  After a below par start he decided that the 3-wood was to blame for his under performance, and after violent removal of head from shaft, decided to refocus and start enjoying his return to Shankers competition.  Dolphin decided to focus on beer and vodka to help him swing and knocked off 8 beers and hip flask of vodka to end the day somewhat cross-eyed but certainly happy.</p>
<p>By the end of day 1, all players could be relatively happy, if not ecstatic with their performance - the leaderboard looked closer than a couple of friendly Higgs-Bosens with 4 players scoring between 23 and 25 stableford points, Rimmer on 29.  Happiest of all was a slighty wet & sweaty Pussy who's lips were parted in a wide grin thanks to a healthy score of 35 points on day 1.  While some would say that Pussy looks better when pink, it was clear that the yellow winners vest suited the day 1 winner.  The unfortunate Marker picked up the pink NAGA vest on day 1, but with just 2 stableford points in it, he may reflect on the vodka and beer warm up tactic.</p>

<h4>Coolum - Day 2</h4>
<p class="lead">Clear heads and sharp focus were predictably absent as Shankers woke early to enjoy an al fresco breakfast before embarking on an epic day 2.</p>
					<div class="col-2-5 left last pad-right">
						<img class="" src="img/wrap2015-2.jpg" alt="Golf ball beers" />
						<span class="wp-caption-text">Golf ball beers.</span>
					</div>
<p>Tournament leader Pussy was teamed up with the Smith brothers, Purple and Rimmer while Moley, Dolphin & Marker teamed up in group 2. A more philosophical Purple was happy just to be on the course and even happier to find his 3 wood shaft and head laying where he left it on the 3rd.</p>
<p>Rimmer continued to power through the holes, while golfing technique was in short supply with the rest of group 1.</p>
<p>Group 2 were still pondering the mystery of the Marker's disappearing clubs, and a the presence of a rarely seen 10-iron in his set.  Marker and Moley were here to play and by the end of the days play had both posted 43+ scores to round off a great round.</p>
<p>While Rimmer focused on the golf, Pussy focused on leaving his driver in the bag and turned to his trusty 3 wood to provide a more consistent back 9, but he was unable to repair the damage from a woeful front 9 and 6 on course beers.  A "shot" challenge on the 17th with Purple left them both committed to a short sharp shot in the 19th.</p>
<p>By the end of day 2, the new scoring system introduced by the Shankers Stewards had come into it's own, and the consistent quality of Rimmer meant that he rightly led the pack ahead of day 1 winner Pussy and day 2 runner up Moley.  The unfortunate Marker's day 1 NAGA position hurting his chances of a top 3 finish. While Dolphin performed well on day 2, scoring a healthy 35 stableford points, his 5th position was well deserved thanks to a mediocre day 1.</p>
<p>As for the NAGA, Purple's poor score on day 2 coupled with a below par 25 resulted in him inevitably picking up the pink jersey/guernsey/scilly from the Marker.</p>
<p>The Shankers were rewarded on day 2 with time for a swim in their private pool at the resort.  Pussy modelled his $300 Tiger/Zebra swimmers while Marker was the winner of the "who can hold their breath the longest while drunk underwater" russian roulette swimming competition</p>
<p>After Purple and Moley turned in early for a romantic cuddle in their sleeping quarters, the ever committed Dolphin tried to speak coherently to the captains of industry at his workplace, while Pussy, Marker and Rimmer planned one of the greatest stealth room invasions in Shankers history.</p>

<h4>Coolum - Day 3 (Cancelled)</h4>
<p class="lead">With a 6 point lead going into day 3, and barely enough time to squeeze in breakfast before catching a flight home, ShITOC took the unusual step of cancelling day 3 play and naming Rimmer the 2015 champion.</p>

					<div class="col-2-5 right last pad-left">
						<img class="" src="img/wrap2015-3.jpg" alt="Rimmer's recovery" />
						<span class="wp-caption-text">Rimmer's sandy recovery.</span>
					</div>
<p>All players agreed that Shankers had found a fully deserving winner in the Rimjob.  A deserved winner who has been the man to beat since seeding commenced back in October and capped of a great and consistent 6 months with the clubs, taking out the major prize off a handicap of 24.</p>
<p>After a quick dip in the crashing surf that almost resulted in one empty seat on the plane home, 5 of the Shankers calmly packed up their clubs as another successful Shankers tournament came to an end.  The 6th Shanker, Purple made a last minute decision to check his return flight details and only then realised he was somewhat short of time if he was to make his private jet home.  With barely a whimper he made it to the airport in the nick of time, and after refusing the final beer of the weekend slunk back to his Sandhurst mansions to reflect on a year with pink balls.</p>
<p>The remaining Shankers returned home exhausted and spent, but fulfilled.  Eagerly awaiting the announcement for the 2016 tournament.</p>
<h4>Highights</h4>
<ol>

<li>Purple & Pussy thinking they were in the wrong flight queue when the stewardess mentioned Maroochydore</li>
<li>Marker polishing off his Shankers supplied vodka within 10 mins of receiving it</li>
<li>Purple's broken 3 wood and fixing his attitude with a call of 9 for the back 9 on day one</li>
<li>Dolphin's early exuberance to be 8 beers and Vodka hits down by the close of play on day 1</li>
<li>The pink NAGA balls</li>
<li>Pussy the tour leader on day 1</li>
<li>Romero</li>
<li>Pussy's $300 Tiger/Zebra bathers</li>
<li>Everyone questioning Pussy's handicap</li>
<li>Golf ball beers</li>
<li>Twitter</li>
<li>Moley's robe cladded wake up call</li>
<li>Day 2's golfing effort - a great comeback by all</li>
<li>Peer Pressure Power Play's</li>
<li>Rimmer taking the tour lead on day 2 and finding out later in the night he'd also take out the tournament</li>
<li>The NAGA's constant calls of "Randy - rack up another 6 Corona's!"</li>
<li>Pussy stating adamantly that the Aussies would not make 300</li>
<li>The Aussies making 376</li>
<li>Marker's epic underwater pool lap</li>
<li>Purple's beer shower (sorry Purple)</li>
<li>One of the most cunning room invasion executions ever</li>
<li>Marker wrestling a near nude Moley</li>
<li>Dolphin successfully hosting a work conference call after a big day 2 on tour</li>
<li>Wounded Monday</li>
<li>Rimmers rushed trophy presentation on the bus</li>
<li>The definitions of Shanker</li>
<li>Marker running a beer to Purple whilst he was in the flight boarding queue</li>
<li>Rimmer truly living up to his name... but for rimming every whole he'd have broken the Shankers stableford records</li>
<li>Purple a broken man on day 3</li>
<li>"I'm not blaming you Barry" from the Dolphin</li>
<li>Paige's look of fear throughout Sunday evening</li>
<li>The Marker's mystery extra putter and 10 iron (who's heard of a 10 iron?)</li>
<li>Beer being good for golf</li>
<li>The tequila holes</li>
<li>The Marker in the ocean.  There one second, gone the next</li>
</ol>
</div>
				
				
				
				
				
				
				
						 	    
				
				
			</div>
			
			<!-- Start Right Sidebar  -->
			<aside class="col-1-4 right last">
				<div class="widget">
				    <h3 class="widget-title">Final Scores</h3>
				    <ul class="list-1 widget-list">
				    	<li><a href="scoreboard.php?compid=<?php echo $compidforwrap ?>">Tournament Leaderboard</a></li>
<li><a href="past.php">Photo Gallery</a></li>
				    </ul>
			    </div>
			    
			<!-- Start Main Sidebar  -->
<?php    	$rowcount = 0;
$endtable = false;
			while ($eventscoresrow = db_fetch_assoc($eventscores))
			{	
				$rowcount .= 1;
				if ($rowcount==1) {?>
				<div class="widget">
				    <h3>Event Scores</h3>
				<table class="table-style-1 mobile-table">
					<thead>
					<tr>
					<th align="center">Player</th>
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
					</tr>
		<?php 	
             }
             
             if ($endtable) {?>
					</tbody>
					</table>
				</div>
				<?php }?>
			    			</aside>
			
			
			
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

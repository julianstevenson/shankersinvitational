<?php 
include 'dbutils.php';
include 'utils.php';
$currentcomp = getCurrentComp();
//Set 2014 compid
$compidforwrap = 3;
//get seeding scores
$query = sprintf("SELECT golfer.nickname, sum(score.score) as score FROM  score inner join golfer on score.golferid=golfer.id WHERE golfer.compid=%s group by golfer.nickname order by sum(score) desc", $compidforwrap);

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
					
					
					<h1 class="title">2014 Winner - The Moth!</h1>
					
					<div class="mosaic-block circle">
						<iframe width="640" height="360" src="http://www.youtube.com/embed/rj9uVnADE5s" frameborder="0" allowfullscreen></iframe>
											</div>
					
					
					<div class="col-2-5 right last pad-left">
						<img class="" src="img/2014winner.jpg" alt="The Moth - 2014 Shankers Champ" />
						<span class="wp-caption-text">The Moth - 2014 Shankers Champ</span>
					</div>
					<h4>Barnbougle Dunes - Day 1</h4>
<p class="lead">The day had finally arrived, the official commencement of the Shankers Invitational. As the players made their way to Moorabin airport for the private flight to the course, there was an air of excitement afoot. The Moth proved he was no figment of anyone's imagination and while pensive about the transport he certainly looked to be in god sprits surrounded by what were once just names on a website.</p>
<p>The day started with a breathtaking flight across the southern part of Victoria and onto Bass Strait through to our landing strip at Barnbougle. After a quick stretch and while Hungry relieved his nervous tension on an electric fence it was time for the day to begin.</p>
<p>As the players gathered on the first tee for the press photo's and interviews it was hard not the notice the excitement and eagerness of the contingent. Group 1 consisted of Hungry Jack, Moley, Rimmer and Dolph while Group 2 had the eclectic mix of The Moth, Marker and Pussy.</p>
<p>Hole 1 began with a few nerves especially from the Dolph who skewed the tee shot just short of the rough but on the wrong approach line to the opening Par 5. Hungry was his predictable self drilling the iron down the middle while Rimmer and Moley swerved their tee shots to find the middle of the fairway. Uncharacteristically Hungry duffed his second shot only to call out for a Mulligan (his only one for the day). The tournament was taking its first official twist, among many to come and rivalling the plot of even the best Dan Brown literature.</p>
<p>With glorious sun, low winds and friendly banter Group 1 negotiated the first 3 holes without any exceptional call outs. The 4th however saw the Dolph fall, Moley rise with a sublime shot out of a 4 storey bunker and Rimmer bringing the house down with a glorious 2 on, on a favourable green. High fives over, the group stopped for a quick reminder of the incredible landscape of the course bordering the frigid Bass Strait. Talks of owning beach houses soon began but were quashed once the players ambled their way like the Derwent River through to complete the first 9. Hungry had the group by the turn with the remainder very close behind.</p>
<p>The second 9 saw the smoking brothers really come out and fire with some expertly used power-plays to make the first move of the day. Hungry played consistently and Moley continued his good form from the seeding events coupled with his infectious humour that livened up the remainder of the round. In the club house Dolph has streaked to the front of the group with a 49, followed closely by Rimmer with 46, Hungry on 41 and Moley with a very respectable 40. Scores that in last year's tournament would have seen all four challenge for Day 1 honours. However, as the sun set and with 4 beers in hand, Dolph was crushed to learn that the Marker had obliterated the previous group record score and took the day out with a monstrous 51. An immediate recount was demanded by the Dolph which was just as swiftly rejected and he was lucky not to find himself in contempt of the Shankers rules and avoided further penalties.</p>
<p>The Moth was a story of the day. Riding only on reputation, this reporter understands that the front 9 like his dance moves was one too forget but he should incredible grit to finish with the 35, only in last place by 1 point to Pussy's 36.</p>
<p>The evenings event amounted to a 4 figure bill which put the players in great spirits although the Club House leader ended suffering minor concussion during the evening and was promptly treated for such by Moley who laughed by his side. After all it is the best medicine. Day 1 down, a very close leader-board and all to play for!						</p>
					
					
<h4>Lost Farm - Day 2</h4>
<p class="lead">Tasmania is a land of contrasts. From penal colony to now home of some of the best golf courses and Pinot this country has to offer it has been the eternal paradox of this great Southern Land. It shouldn't have surprised anyone that the second day would be the polar opposite of Day 1. High winds screamed from the ghosts of settlers past as the players fronted up to the first tee resembling the Jamaican bob sled team's arrival in Calgary for the 88 Olympics. Every single ounce of players clothing was duly worn in preparation for what would be an arduous run on "moving day".</p>
<p>The leaders for Day 2 consisted of Marker, Rimmer and Dolph and if the first hole from Group 1 (Hungry, Moley, Pussy and Moth) was anything to go by, the trophy would come down to the 3 aforementioned leaders. Moth scratched the first hole before even vacating the tee and Moley and Pussy barely made the Fairway as the 50 knot head wind drove any power advantage back in their faces. Hungry showed poise yet again by drilling the 3 iron down the middle and gave insight that although he had a slow day 1 he should not be underestimated.</p>
<p>The leaders group was fairly tame for a golf tournament. Marker re-acquainted himself with his trusty caddy for the next 4.5 hours and Rimmer and Dolph kept urging each other on as the success of Day 1 withered away quickly.</p>
<p>The lows were plentiful on the front 9 with the Dolph scoring only 9 points, 6 of which came from one power-play hole. Rimmer was in double figures by the turn but it was really Marker who shone through the otherwise dark and gloomy landscape. His expert ball positioning and unwavering compliance with his caddy saw him score 20+ on the front 9.</p>
<p>By the end of the 10th the Dolph had capitulated and resorted to the drink which the Marker was only too happy to share. The Polish brew seemed to have ignited the faint spark which was barely seen throughout the day and the Dolph managed a respectable 23 on the last 8 holes of the day.</p>
<p>Rimmer remained consistent and ended up on a brave 33 but all the points went to the Marker who, heavily penalised from his day 1 performance notched up a lazy 40 points in very tricky conditions. However the first group were once again left stunned by the bull shit scores dished up by the rabble in group 2.</p>
<p>Scores of 55, 46 and 45 were being chanted which tournament organisers refused to audit based on the first tee performance. Peptides aside, the story of the Day was a tale of 2 almighty players. The first being the Moth who came from obscurity to take the days play with a 55 while his counterpart Moley managed to have a worse score than yours truly to finish the day with 29. Pussy shot a very impressive 46 which but him smack bang in the middle of the pack and Hungry ensured that his 45 would see him tee off with the leaders on Day 3.</p>
<p>Moving Day certainly lived up to its name and after a very contentious debate over round 3 handicaps and penalties; the scene was set for an epic finish to the Shankers. Moth, Marker and Hungry in the lead would surely see the winner come from this group. However no one can write of the calibre in Group 2 and the mind games began as early as dinner.</p>
<p>A 7.00 am tee beckons the contingent on Day 3 which did little to discourage the fun and frivolity of the night. Wine flowed, winners' shots were downed but none would compare to the delicious, fresh and completely harmless but tasty oysters that were engulfed by all. The scene was set for the final day!							</td>

<h4>Barnbougle Dunes - Day 3</h4>
<p class="lead">A chilly start for the group with the mercury barely nudging 2 degrees as they sat down for breakfast. Today was what the tournament was all about and while most players were enjoying the company of each other at breakfast, Hungry was leaving nothing to chance to take out his maiden victory and could be seen at the practise range.</p>
<p>Sore heads and dodgy stomachs commenced the excuses of why players would not perform and few indulged in the banter. As has become tradition at Shankers, TOTO's (Tops Off Tee Off's) were the order of the day and judging by the rig some of the contingent were sporting, TOTO's could well be a short lived tradition. Group 2 which consisted of Moley, Pussy, Rimmer and Dolph lead the charge for TOTO's and it was a hole to forget for Pussy who shanked both drives into the love grass cliffs on the right. The Persian rig of Rimmer monstered his drive and Moley swerved a purposeful drive down the middle.</p>
<p>A tentative start by group 2 was all of a sudden brought to life with the early announcement of Pussy's first power play - the first of 4. The tee shot fell into the bunker but he recovered well to make some god points leading the group 2 charge. However the 2nd hole belonged to Rimmer who drilled an 18ft birdie to dance his way across the green and up the leader board.</p>
<p>Moley was playing sublimely and was on track for a personal record score. Where his shots were good, he capitalised, when they were bad he recovered incredibly to keep the points rolling and rolling high.</p>
<p>By the turn it was obvious that the winner would not come from group 2. Moley played incredibly well to put himself in the mix but had given the leaders too much of a head start. Pussy was consistently battling a fiery encounter with a dodgy oyster and battled admirably to stay out of the bottom. Rimmer and Dolph looked to be the ones fighting for the Naga.</p>
<p>The 10th hole saw one of the most incredible plays ever seen on the Shankers. Moley was 3 on, on the Par 4 10th, the ball precariously positioned at the top of the tier presenting him with a steep downhill 20 footer for par. His first attempt fell well short and he amazingly called for a mulligan only to subsequently nail the putt. Whilst this moment was memorable, it was fairly indicative of his day and he would go on to score a tournament 60 points and a sub 90 round raw score.</p>
<p>The real battle was up the front and down the back. The groups seldom crossed paths but on the odd occasion it looked like the Moth and Marker were going toe to toe with Hungry unable to match them. By the 17th Dolph looked like he had done enough to avoid the Naga. Only an obscene amount of points would see Rimmer overtake him and relegate this author to the red vest. But golf like life can be a cruel mistress. Dolph stumbled on the 18th but was still racking up the points. However the Rim Job stunned the golfing contingent by racking up 14 points in 2 holes. The last being an amazing birdie on a power-play hole to clutch 6th place from the jaws of the Naga.</p>
<p>As the leading group strode into the club house it was clear from the smirking grin on the Moth's face that he had pulled something special out of the rented bag and was supremely confident he was going to be inaugurated the winner. He had ever right to be as the fairy tale was complete. From last to first in 3 days and winning by 6 points the Moth played his best round ever to be crowned 2014 Shankers champion.</p>
<p>And thus ended a memorable and action packed day/weekend. Like the Hawks of 2008, the tournament committee are already looking at rules changes that severely penalise players not attending seeding events. However the biggest question will be where the next event will be held. A subcommittee has been formed and are convening in the month of June to hopefully answer that very question.</p>
<p>Golf was the real winner and I'm sure that all players and not only this writer will take away many fond memories from what was an extremely well organised and coordinated event.</p>
<p>Congratulations again to the Moth and bring on Shankers 2015!</p>

</div>
				
				
				
				
				
				
				
						 	    
				
				
			</div>
			
			<!-- Start Right Sidebar  -->
			<aside class="col-1-4 right last">
				<div class="widget">
				    <h3 class="widget-title">Final Scores</h3>
				    <ul class="list-1 widget-list">
				    	<li><a href="scoreboard.php?compid=<?php echo $compidforwrap ?>">Tournament Leaderboard</a></li>
<li><a href="past.html">Photo Gallery</a></li>
				    </ul>
			    </div>
			    
			<!-- Start Main Sidebar  -->
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

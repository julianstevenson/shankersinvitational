<?php 
include 'dbutils.php';
include 'utils.php';
$currentcomp = getCurrentComp();
//Set 2015 compid
$compidforwrap = 5;
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
					
					
					<h1 class="title">2017 Winner - Hungry!</h1>
					
  					<div class="mosaic-block circle">
						<iframe width="640" height="360" src="http://www.youtube.com/embed/pPe76pbx7VY" frameborder="0" allowfullscreen></iframe>
											</div>
					
					
					<div class="col-2-5 right last pad-left">
						<img class="" src="img/newsimage4.jpg" alt="Hungry - 2017 Shankers Champ" />
						<span class="wp-caption-text">Hungry - 2017 Shankers Champ</span>
					</div>
					<h4>The Grange -  Day 1</h4>
<p class="lead">On a balmy autumn Saturday morning, 4 intrepid Shankers came together for the 5th annual Shankers Invitational Tournament.  ShIT Adelaide was the destination for what would prove to be yet another successful ShITOC&trade; event.
</p>
<p>The Marker started his journey to Tullamarine at 2.30am, and after wheeling his 7 hip flasks and clubs from NSW to Southern Cross, he and Pussy made their way to the Shankers, 8.30am rendezvous at checkin.  The ever-reliable Dolphin was there to greet them, and from the get-go it was clear that Dolphin had turned that 2016 frown, upside down for the 2017 event.
</p>
<p>The ever-unreliable Hungry strolled in 15 minutes late - a clear tactic to limit the number of pre-flight beers.  With only two pre-breakfast beers inside them, and with 2017 merchandise (bag tags and wine glasses) distributed, the players boarded the Shankers Air Transporter (ShAT) on their way to rAdelaide 2017.  
</p>
<p>On arrival at rAdelaide, the Shankers were whisked straight to the first of 3 challenging courses to tee off and get the competition under way.  As always, controversy wasn't far from the Shankers, and as always it was Hungry who courted with this controversy as the only Shanker who failed to sport the Shankers polo shirt. Hungry was determined to test the depleted ShITOC representatives by stating "I looked for it at home, but I've no idea where it is" (rumour has it, Mrs Hungry had hidden it so that she could wear the coveted polo all weekend - the smell and feel of Hungry's manly and rugged aura never far from her, during their time apart).
</p>
<p>Before the display of golfing incompetence began, the Shankers tucked into a cheeky bottle of Shiraz and charcuterie platter - a clear sign that this was going to be a sophisticated event.  However any veneer or respectability was lost when Pussy upset the locals by finishing his pre-match changing routine in full view of the lady members and Doplhin received a lecture from the club president for practice chipping off the 18th green in full view of the under 7's</p>
<p>As the reigning Shankers champ, Dolphin tee'd off in style with a drive down the middle of the open fairway of Grange's 1st.  Organisers had paired the champ with the crowd's NAGA favourite Pussy in an attempt to put him off his swing, but after a steady front 9 the champ was unwaivering on 18 Stableford points and a respectable 2 point bonus on the powerplay.  
</p>
<p>With Hungry and Marker putting in a respectable first 9, and Pussy bringing up the rear with a disappointing 14, the leaders honour was still anyone's to take at the halfway mark.... until Hungry upped his game.  6 pars and 3 bogies on the back nine along with 2 well selected powerplays meant that there was only going to be one winner on the day and Hungry topped the day 1 leaderboard with a massive 50 stableford points.  
</p>
<p>Pussy was well in the pink after a forgettable round even by his woeful standards, so there was little in the way of surprises when he donned the pink cap.  After a short ride back to Shankers Village, a quick shower for Marker and Pussy, a quick change for Hungry and a slow soap, rub and steam for the smokin' Dolphin it was time for the official tournament dinner.  Two leaders shots and a few cheeky beers, wines, ciders later the Shankers took in the sights and sounds of the Adelaide fringe.  After an early night for Hungry and Dolphin, Marker had his dancing shoes on and danced the night away to the sounds of Dexy's Midnight Runners, with Pussy watching on from the bar.  
</p>

<h4>Royal Adelaide - Day 2</h4>
<p class="lead">Dusting off a 3am finish, the Shankers awoke at 8.55am to discover that Hungry has lived up to his name and scoffed down a 4 course brekky to prepare for the day ahead. Pussy had also been up early - disgusted at the state of the Shankers bathroom, he'd spent a good hour scrubbing the walls, floor and bath to ensure the Shankers would awake to the facilities to which they are accustomed.
</p>
<p>
As they arrived at Royal Adelaide for day 2, Pussy could barely walk or talk straight, let alone take part in the challenges of one of Australia's finest courses.  A cheeky pre-round ale for him and Marker seemed to balance things up for him though and a half respectable 16 on the front nine surprised Pussy as much as the other Shankers.  Sharing a cart with Hungry proved to be his downfall on the back 9 however... that earlier beer wearing off, and having to walk the course in pursuit of his golf clubs as Hungry took the scenic route on his way to his ball.  But Pussy was having the last laugh, with his influence rubbing off on the tournament leader... a spectacular collapse from Hungry after his Day 1 performance saw him take last place for the day on a pathetic 29 points.  Pussy could thank a flukey par 3 on the 17th for his narrow victory over Hungry to take out 3rd place.
</p>
                                        <div class="col-2-5 left last pad-right">
                                                <img class="" src="gallery/2017/12.jpg" alt="Hungry - 2017 Shankers Champ" />
                                                <span class="wp-caption-text">Hungry - 2017 Shankers Champ</span>
                                        </div>

<p>
Dolphin and Marker were demonstrating the kind of Shankers love that warms ShITOC's cockles and shared everything from hipflasks, club selection, ball position and bowel movements.  So it was no surprise that they tied for the day to share the day's honours on 42 stableford points... including 6 bonus points.  Pussy's lack of understanding of even the most basic golf concepts led him to question the handicapping of players who scored 36 stableford points (excluding powerplays), and to this day he maintains that the handicappers got it wrong.
</p>
<p>
Not that Dolphin gave two milligrams of a monkey's toss as he celebrated taking the lead on day 2 of a topsy turvy Shankers tournament.  He celebrated his lead by taking full control of the wining and dining menu for the despondents in positions 2 to 4.  Hungry couldn't grasp how he'd given up the lead to end the day in 3rd place and in catching distance by the 2-day NAGA.  Marker rued a few dropped points on day 1 that saw him 2 points behind the leader but in a strong position to play for the honours on the final day.
</p>
<p>
An early night for all Shankers saw them turning in at 1am after a 15 minute comedy show, a fired up Hungry upsetting the local barmaids with a conversation that was as confronting as his woodchop.
</p>
<h4>Kooyonga - Day 3</h4>
<p class="lead">
Day 3, saw the Shankers up early for an 8am checkout and onto Kooyonga for the 3rd and final, deciding round.  Absence of coffee, food or any kind of spiritual or culinary inspiration suggested a challenging day was on the cards.  Luckily the club pro knew a broken set of souls when he saw one and delivered a flat white to each of the players in the nick of time before tee-off.  
</p>
<p>
And what a day!  Hungry had time for his pre-round 258 ball practice off the range and this made all the difference ... picking up where he'd left off before the 2 players shots on day 1, he played like a pro and had a stonking 18 stableford points plus a 4 bonus points of his first powerplay at the half way mark.  As for the Marker - wow!  He was moving like Travolta in the 70's and playing with an eye for the hole like Tiger in a strip bar to hit a whopping 27 points on the front 9 with no powerplays taken!  His card read like the first 9 overs of an England innings with 3,3,3,4,3,3,4,2,2
</p>
<p>
Dolphin was walking the course like a man who knows he has been beaten by 2 on-form golfers.. not helped by the extra 24,000 steps he took to get his stick each time Hungry drove off with his clubs.  With Pussy putting in a solid, yet ineffective 16 it was Marker who led the leader board with just 9 holes to go....
</p>
                                        <div class="col-2-5 right last pad-left">
                                                <img class="" src="gallery/2017/19.jpg" alt="Hungry - 2017 Shankers Champ" />
                                                <span class="wp-caption-text">Hungry - 2017 Shankers Champ</span>
                                        </div>

<p>
And so to the final 9 holes that would decide which name would be added to the Shankers trophy.  Marker had everything to lose and like the pure Englishman he is, the final stages of the game saw him choking like a gay man in a public toilet.  Only adding 4 stableford points to his total next 7 holes, it was all over for the nearly champ... and with Hungry getting better and better the more distance he put between himself and the woodchopper phase, there was only one winner and that was <b>HUNGRY - SHANKERS CHAMPION 2017</b>. All the more remarkable given Hungry's two penalty holes due to flagrant breaking of ShITOC rules during seeding... a par and a bogie on holes where he could only use a single club!
</p>
<p>
With Pussy putting in a solid performance to come 2nd on the day, he was disappointed to end the competition as he started... a pink, sore and smelly NAGA Pussy.
</p>
<p>
And so wrapped up another successful Shankers year... almost.... controversy yet again paid a visit. Shankers leaving (unused) bag tags and wine glasses in the hotel; Pussy's failure to wear the pink cap; Dolphin's failure to partake in one final beer in Melbourne... lots for ShiTOC to review.
</p>
<p>
Bring on 2018!
 

</p>

	<ol><b>Highlights</b>
<li>Crazy guitary guy</li>
<li>Food - pasta and steak</li>
<li>Brandy in the rain</li>
<li>Adelaide Fringe - Garden of Extraordinary Delights</li>
<li>Hungry hitting like a pro off a 14 handicap!</li>
<li>Wine and cheese</li>
<li>Moley's Whatsapp contributions</li>
<li>All tranfers included</li>
<li>Pussy's toilet cleaning</li>
<li>Marker sleeping fully clothed where he fell on his bed</li>
<li>Pre-game beer after 3am finish at RACG</li>
<li>Marker's first 9 at Kooyonga</li>
<li>Self service snack huts</li>
<li>Dexy's Midnight Runners</li>
<li>Hungry making Dolphin walk everywhere</li>
<li>Table tennis in popup bars</li>
<li>Coopers</li>
<li>Hungry's two penalty shots - bogey and par on 1 club holes</li>
</ol>
</div>
				
				
				
				
				
				
				
						 	    
				
				
			</div>
			
			<!-- Start Right Sidebar  -->
			<aside class="col-1-4 right last">
				<div class="widget">
				    <h3 class="widget-title">Final Scores</h3>
				    <ul class="list-1 widget-list">
				    	<li><a href="scoreboard.php?compid=<?php echo $compidforwrap ?>">Tournament Results</a></li>
<li><a href="past.php">Photo Gallery</a></li>
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

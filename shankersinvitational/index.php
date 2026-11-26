<?php
include 'dbutils.php';
include 'utils.php';

$currentcomp = getCurrentComp();


$query = sprintf( "SELECT distinct golfer.id, golfer.avatar, golfer.firstname, golfer.lastname, golfer.nickname, golfer.description, handicap.handicap
			FROM `golfer`
			LEFT OUTER JOIN handicap ON handicap.golfersid = golfer.id
			where golfer.compid=%s order by nickname", sqlsafe($currentcomp) );
$golfers = mhexecquery($query, $err);

//get other seeding events
$query = sprintf("select * from seeding where compid=%s order by eventdate desc", $currentcomp);
$allevents = mhexecquery($query, $err);

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
        <title>Shankers Invitational Tournament</title>
        <meta name="description" content="More than just a display of golfing mediocrity. The Shankers Invitational tournament is one of the most prestigous golfing tournaments attended by the small group of golfing amateurs from Melbourne and beyond. More than just a display of golfing mediocrity, this annual event has been firmly established in the golfing calendar since 2013. This is Shankers. This is history.">
        
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
   	    	
    	
    	
    	
   		
	<!-- Revolution Slider -->
	<div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>
                                <li data-transition="fade" data-masterspeed="500" >
                                        <!-- MAIN IMAGE -->
                                        <img src="img/slider2018.jpg" alt="Shankers Yarrawonga 2018" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
                                                data-x="0" data-hoffset="0"
                                                data-y="155" data-voffset="0"
                                                data-captionhidden="off"
                                                data-speed="800"
                                                data-start="500"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">
                                                A new logo, a new champ.  Same old NAGA.
                                                <div>- Yarrawonga</div>
                                        </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
                                                data-x="0" data-hoffset="0"
                                                data-y="280" data-voffset="0"
                                                data-captionhidden="off"
                                                data-speed="800"
                                                data-start="750"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">3 rounds at country Victoria's finest. Les.  Murray. A Bull.  A Lake. 
                                                                                        </div>
                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption fadeout sfr tp-resizeme"
                                                data-x="0" data-hoffset="0"
                                                data-y="400" data-voffset="0"
                                                data-speed="800"
                                                data-start="1000"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">
                                                <a class="btn" href="scoreboard.php?compid=6">Leaderboard</a>&nbsp; <a class="btn-2" href="past.php">Photos</a>
                                        </div>
				</li>
                                <li data-transition="fade" data-masterspeed="500" >
                                        <!-- MAIN IMAGE -->
                                        <img src="img/slider2017.jpg" alt="Shankers Adelaide 2017" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
                                                data-x="0" data-hoffset="0"
                                                data-y="155" data-voffset="0"
                                                data-captionhidden="off"
                                                data-speed="800"
                                                data-start="500"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">
                                                Wine, Whine and Wind Ups.
                                                <div>- rAdelaide</div>
                                        </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
                                                data-x="0" data-hoffset="0"
                                                data-y="280" data-voffset="0"
                                                data-captionhidden="off"
                                                data-speed="800"
                                                data-start="750"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">In an attempt at culture and sophistication, Shankers embraced the tastes, sights and <br>delights of Adelaide's finest.  And attempted to play some golf.
                                                                                        </div>
                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption fadeout sfr tp-resizeme"
                                                data-x="0" data-hoffset="0"
                                                data-y="400" data-voffset="0"
                                                data-speed="800"
                                                data-start="1000"
                                                data-easing="Power4.easeInOut"
                                                data-splitin="none"
                                                data-splitout="none"
                                                data-elementdelay="0.05"
                                                data-endelementdelay="0.1"
                                                data-endspeed="1000"
                                                data-endeasing="Power1.easeOut">
                                                <a class="btn" href="scoreboard.php?compid=5">Leaderboard</a>&nbsp; <a class="btn-2" href="past.php">Photos</a>
                                        </div>
                                </li>
					
				<!-- SLIDE  -->
				<li data-transition="fade" data-masterspeed="500" >
					<!-- MAIN IMAGE -->
					<img src="img/slider2016.jpg" alt="Shankers Roadtrip 2016" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
						data-x="0" data-hoffset="0"
						data-y="155" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="500"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						Shankers 2016 Roadtrip.  
						<div>- KEEPING IT LOCAL</div>
					</div>
					
					<!-- LAYER NR. 2 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
						data-x="0" data-hoffset="0"
						data-y="280" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="750"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">In 2016, the Shankers were taken on a mystery roadtrip to some of the best courses in Victoria. <br>Sanctions, drama, controversy and Kelly Pool.  This had it all. 
											</div>
					
					<!-- LAYER NR. 3 -->
					<div class="tp-caption fadeout sfr tp-resizeme"
						data-x="0" data-hoffset="0"
						data-y="400" data-voffset="0"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						<a class="btn" href="scoreboard.php?compid=4">Leaderboard</a>&nbsp; <a class="btn-2" href="past.php">Photos</a>
					</div>
				</li>
				
				<li data-transition="fade" data-masterspeed="500" >
					<!-- MAIN IMAGE -->
					<img src="img/mock4.jpg" alt="Slider Image 1" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
						data-x="0" data-hoffset="0"
						data-y="155" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="500"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						"My name is Randy"
						<div>Romero</div>
					</div>
					
					<!-- LAYER NR. 2 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
						data-x="0" data-hoffset="0"
						data-y="280" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="750"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						Labour Day weekend saw 6 brave Shankers battle it out against<br> the Palmersaurus, mozzies and giant spiders of the Coolum Palmer Resort. <br> Shankers were all winners.  Thanks Randy. 
											</div>
					
					<!-- LAYER NR. 3 -->
					<div class="tp-caption fadeout sfr tp-resizeme"
						data-x="0" data-hoffset="0"
						data-y="400" data-voffset="0"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						<a class="btn" href="tour2016.php">Tour Details</a>&nbsp; <a class="btn-2" href="past.php">Photos</a>
					</div>
				</li>
				<!-- SLIDE  -->
				<li data-transition="fade" data-masterspeed="500" >
					<!-- MAIN IMAGE -->
					<img src="img/mock2.jpg" alt="Slider Image 1" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
						data-x="0" data-hoffset="0"
						data-y="155" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="500"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						Shank, Drink, Shank, Think. <br/> 
						And Drink <div>- SHANKERS MOTTO</div>
					</div>
					<!-- LAYER NR. 2 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
						data-x="0" data-hoffset="0"
						data-y="280" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="750"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						As the sun starts to fade on another Australian summer, <br>a band of battling golfers shank it out <br>for the ultimate golfing honour 
											</div>
					<!-- LAYER NR. 3 -->
					<div class="tp-caption fadeout sfr tp-resizeme"
						data-x="0" data-hoffset="0"
						data-y="400" data-voffset="0"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						<a class="btn" href="rules.php">Tournament Rules</a>&nbsp; <a class="btn-2" href="scoreboard.php">Leader Board</a>
					</div>
				</li>
				<!-- SLIDE  -->
				<li data-transition="fade" data-masterspeed="500" >
					<!-- MAIN IMAGE -->
					<img src="img/mock3.jpg" alt="Slider Image 3" data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-heading"
						data-x="0" data-hoffset="0"
						data-y="155" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="500"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						Shank, Drink, Shank, Think. <br/> 
						And Drink <div>- SHANKERS MOTTO</div>
											</div>
					
					<!-- LAYER NR. 2 -->
					<div class="tp-caption fadeout sfr sport-rs-boxed sport-rs-text"
						data-x="0" data-hoffset="0"
						data-y="280" data-voffset="0"
						data-captionhidden="off"
						data-speed="800"
						data-start="750"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						As the sun starts to fade on another Australian summer, <br>a band of battling golfers shank it out <br>for the ultimate golfing honour 
											</div>
					
					<!-- LAYER NR. 3 -->
					<div class="tp-caption fadeout sfr tp-resizeme"
						data-x="0" data-hoffset="0"
						data-y="400" data-voffset="0"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeInOut"
						data-splitin="none"
						data-splitout="none"
						data-elementdelay="0.05"
						data-endelementdelay="0.1"
						data-endspeed="1000"
						data-endeasing="Power1.easeOut">
						<a class="btn" href="tour2016.php">Tour Details</a>&nbsp; <a class="btn-2" href="rules.php">Tournament Rules</a>
											</div>
				</li>
				
			</ul>
		</div>
	</div>
   			
    	
    	
    	
    	
    	
    			
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper body-wrapper">		
		<div class="wrapper ad-pad clearfix">
			
			<!-- Column -->
			<div class="col-1-4">
				<h3>Shankers Invitational Tournament</h3>
<p class="lead">More than just a display of golfing mediocrity.</p>
				<p>The Shankers Invitational tournament is one of the most prestigous golfing tournaments attended by the small group of golfing amateurs from Melbourne and beyond.  More than just a display of golfing mediocrity, this annual event has been firmly established in the golfing calendar since 2013.  This is Shankers.  This is history.
				<a class="read-more" href="wrap2015.php">2015 Review</a></p>    					
			</div>
			
			
			<!-- Column -->
			<div class="col-1-4">
				<h3>Latest News</h3>
				<div class="mosaic-block circle">
					<a href="scoreboard.php?compid=6" class="mosaic-overlay link" title="2018 Champion Shanker - Marker"></a><div class="mosaic-backdrop">
					<div class="corner date">27 May</div><img src="img/2018champ.jpg" alt="2018 Champ and NAGA" /></div>
				</div>
				<h6 class="title"><a href="scoreboard.php?compid=6">2018 Winner and Loser</a></h6>
				<p>Yet another first time Shankers Champ.  Marker finally pops his champion cherry and steals the trophy on the last day, after Moley looked like the bookie and the crowd favourite all weekend.  Some sledging from old man Les was enough to shatter Pussy's fragile mental approach to sporting contests, resulting in him taking home the pink for the 2nd consecutive year</p>
			</div>
			
			
			<!-- Column -->
			<div class="col-1-2 last">
				<h3>Seeding Events</h3>
				<ul class="widget-event-list">

				
<?php 				
				$iii=0;
				while (($row = db_fetch_assoc($allevents)) && $iii<4) { ?>
				<li>
						<img class="left stay" src="img/logo-white.png" alt="" />
						<div class="date"><?php echo displaydate($row['eventdate'])?></div>
						<h6 class="title"><a href="form.php?seedingid=<?php echo $row['id']?>"><?php echo $row['location']?></a></h6>
						<p><?php 
						if ($row['writeup'] == "") {
							echo "Seeding Event";
						}
						else {
						
							echo writeTexttoHTML( firstNChars($row['writeup'], 0, 200));
					
					}
					?>
						&#8230;<a href="form.php?seedingid=<?php echo $row['id']?>" class="read-more">More</a></p>
					</li>
<?php $iii=$iii+1; } ?>
					
				</ul>		
			</div>
			
			
		</div>
	</div>
    	
    	
    	
    	
    	
    	
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper divider"></div>
	
	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper centered paralax-block" style="background-image: url(img/parallax-bg2.jpg);" data-stellar-background-ratio="0.75">		
		<div class="wrapper clearfix">
			<blockquote>The object of golf is not just to win. It is to play like a gentleman, and win.
			<cite>Phil Mickleson</cite>
			</blockquote>
		</div>
	</div>
	

	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper divider"></div>
    	




    	
    	
    	
    	
    	
    	
	<!-- Start Outter Wrapper -->
	<div class="outter-wrapper divider"></div>
	
	<!-- Start Outter Wrapper -->	
	<div class="outter-wrapper social-block centered">
		<div class="main-container">
			<div class="wrapper">
				<h3>More than 8 Shankers and growing, <span>We love our Shankers.</span></h3>
			</div>
			
			<div class="clearfix">  	              
    			<!-- Start Main Content -->
    	 	
    			<ul class="social-thumbs">
<?php 				while ($row = db_fetch_assoc($golfers)) { ?>
    			<li><a href="player.php?player=<?php echo $row['nickname']?>"><img src="<?php echo $row['avatar']?>" alt="<?php echo $row['nickname']?>" /></a></li>
<?php } ?>
    			</ul>
    			

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
	<script type="text/javascript" src="js/slider-1.js"></script>
    
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


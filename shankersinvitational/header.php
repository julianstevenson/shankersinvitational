<?php

include 'dbutils.php';
include 'utils.php';

$err = "";
$comperr="";
$msg = $_GET['msg'];
$currentcomp = getCurrentComp();


	$query = sprintf( "SELECT distinct golfer.id, golfer.avatar, golfer.firstname, golfer.lastname, golfer.nickname, golfer.description, handicap.handicap
			FROM `golfer`
			LEFT OUTER JOIN handicap ON handicap.golfersid = golfer.id
			where golfer.compid=%s order by nickname", sqlsafe($currentcomp) );
	$golfers = mhexecquery($query, $err);

	
	//get old comps
	$query = "SELECT distinct competition.compname, competition.id FROM `competition` order by startdate desc";
	$comps = mhexecquery($query, $comperr);
	
	//get seeding events
	$query = "select seeding.id as seedingid, seeding.location, competition.compname, competition.id as compid from competition inner join seeding on seeding.compid=competition.id order by competition.startdate desc, seeding.eventdate asc";
	$seedings = mhexecquery($query, $comperr);

	//current competition, for the countdown in the pre-header
	$query = sprintf("SELECT competition.startdate, year.year FROM competition LEFT JOIN year ON year.id = competition.yearid WHERE competition.id=%d", $currentcomp);
	$countdownrow = db_fetch_assoc(mhexecquery($query, $comperr));
	$countdownyear = $countdownrow ? ($countdownrow['year'] ?: substr($countdownrow['startdate'], 0, 4)) : '';
	$countdowndate = $countdownrow ? date('F j, Y 09:00:00', strtotime($countdownrow['startdate'])) : '';
	?>
    <script type="text/javascript" src="js/main.js"></script>
	
<!-- Pre Header Area -->
	<div class="outter-wrapper pre-header-area header-style-5">
		<div class="wrapper clearfix">
			
			<div class="pre-header-left left">
				<ul class="social-links boxy">
					<li><a class="fa" title="Twitter" href="https://twitter.com/TheShankers">&#xf099;</a></li>
				</ul>
			</div>
		<div class="pre-header-left left">
				<!-- Second Nav -->
				<ul>
					<li><a href="/index.php?compid-<?php echo $currentcomp?>">Current Comp</a></li>
	<!--  				<li><a href="/sitemap.html">Pages</a></li>
					<li><a href="/styles.html">Typography</a></li>-->
				</ul>
				</div>
				<!-- Social Icons -->
			<div class="pre-header-right right">
				<strong><?php echo htmlspecialchars($countdownyear) ?> Tournament Starts In:</strong> <div class="countdown styled" data-date="<?php echo htmlspecialchars($countdowndate) ?>"></div> 
			</div>
			
		</div>	
	</div> 
		
		   	
    	
    	
	<!-- Header Area -->
	<div class="outter-wrapper header-area header-style-5">
		<div class="wrapper clearfix logo-container with-menu">

			<!-- Start Mobile Menu Icon -->
			<div id="mobile-header" class="">
				<a id="responsive-menu-button" href="#sidr-main">
					<em class="fa fa-bars"></em> Menu
				</a>
			</div>
			
			<header>
				<div id="navigation" class="clearfix">

					<ul class="menuHideBtn">
						<li><a id="closebtn" class="fa" href="#">&#xf00d;</a></li>
					</ul>
					
						
					<div class="main-header-left left adjust-left" style="padding-top:5px;padding-bottom:5px;">
						<a class="logo" href="/index.php">
							<img src="/img/shankerlogomain.png" alt="Shankers Invitational Tournament" />
						</a>
					</div>
					
			 	    	    	
					<div class="main-header-right right adjust-right">
						<nav class="megamenu_container">
						<ul id="nav" class="right megamenu">
						    <li class="nav-parent">
						    	<a href="/players">Players</a>
						    	<ul>
<?php 				while ($row = db_fetch_assoc($golfers)) { 
						if ($row['nickname'] != "" ) {?>
						    	<li><a href="/players/<?php echo urlencode(strtolower($row['nickname'])) ?>"><?php echo $row['nickname']?></a></li>
<?php }} ?>
						    	</ul>
						    </li>
						    
						    <li class="nav-parent"><a href="/form.php">Seeding Events</a>
						    	<ul>
<?php				$seedingcompid = 0;
	 				while ($row = db_fetch_assoc($seedings)) { 
						if ($seedingcompid <> $row['compid'] . 0) {
							if ($seedingcompid>0) {
								echo "</li></ul>";
							}
							$seedingcompid = $row['compid'] . 0;
?>
						    	<li><a href="/form.php?compid=<?php echo urlencode($row['compid']) ?>"><?php echo $row['compname']?></a>
								<ul>
								<?php } ?>
								<li><a href="/form.php?compid=<?php echo urlencode($row['compid']) ?>&seedingid=<?php echo urlencode($row['seedingid']) ?>"><?php echo $row['location']?></a></li>
						    	
						    	
			<?php } ?>
								</ul>
							</ul>	
						    </li>
						    <li class="nav-parent"><a href="/leaderboard">Leader Board</a>
						    	<ul>
<?php 				while ($row = db_fetch_assoc($comps)) { ?>
						    	<li><a href="/scoreboard.php?compid=<?php echo urlencode($row['id']) ?>"><?php echo $row['compname']?></a></li>
<?php } 
					db_data_seek($comps, 0);

?>
						    	</ul>	
						    </li>
						    <li class="nav-parent"><a href="/rules.php">Rules</a>
						    </li>
						    <li class="nav-parent"><a href="/past.php">Photos</a>
						    </li>
						    <li class="nav-parent"><a href="/tour2019.php">Tournament</a>
						    	<ul>
<li><a href="/tour2019.php">2019</a>
       <ul>

                     <li><a href="/tour2019.php">Tour Info</a></li>


        </ul>
</li>
						    	
<li><a href="/tour2018.php">2018</a>
       <ul>

                     <li><a href="/tour2018.php">Tour Info</a></li>


        </ul>
</li>

<li><a href="/wrap2017.php">2017</a>
       <ul>

<li><a href="/presentationround2017.php">Presentation Round</a></li>
                     <li><a href="/wrap2017.php">Review</a></li>
                     <li><a href="/tour2017.php">Tour Info</a></li>
                     <li><a href="/teasers2017.php">Build Up</a></li>


        </ul>
</li>


			<li><a href="/tour2016.php">2016</a>
        <ul>



                <li><a href="/teasers2016.php">Build Up</a></li>                                     <li><a href="/tour2016.php">Tour Info</a></li>
                                                                                        </ul>
</li>
						    				<li><a href="/wrap2015.php">2015</a>
						    					<ul>	
						    						<li><a href="/wrap2015.php">Review</a></li>
						    						<li><a href="/presentationround.php">Presentation Round</a></li>
						    						<li><a href="/teasers2015.php">Build Up</a></li>
						    						<li><a href="/tour2015.php">Tour Info</a></li>
						    					</ul>
								    		</li>
						    				<li><a href="/wrap2014.php">2014</a>
						    					<ul>	
						    						<li><a href="/wrap2014.php">Review</a></li>
						    						<li><a href="/teasers2014.php">Build Up</a></li>
						    						<li><a href="/tour2014.php">Tour Info</a></li>
						    					</ul>
								    		</li>
						    		</ul>	
						    </li>
						    						   						                
						               						                
						</ul>
						</nav>
					</div>

    			</div>
			</header>
		</div>
	</div>	    	
    	    	
    	    	

	<!-- Post Header Area -->
<!--  	<div class="outter-wrapper nav-container post-header-area header-style-5 page-sticky">
    	<div class="wrapper clearfix">

			<div class="post-header-left left stay">
				<ul class="social-links boxy">
					<li><a class="fa" title="Twitter" href="https://twitter.com/TheShankers">&#xf099;</a></li>
				</ul>
			</div>
	    	
			<div class="post-header-right right stay">
			</div>

    	</div>
	</div>
--> 

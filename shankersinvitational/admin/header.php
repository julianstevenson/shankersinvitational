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
	?>
    <script type="text/javascript" src="js/main.js"></script>
	
<!-- Pre Header Area -->
	<div class="outter-wrapper pre-header-area header-style-5">
		<div class="wrapper clearfix">
			
			<div class="pre-header-left left">
				<!-- Second Nav -->
				<ul>
					<li><a href="index.php?compid-<?php echo $currentcomp?>">Current Comp</a></li>
					<li><a href="sitemap.html">Pages</a></li>
					<li><a href="styles.html">Typography</a></li>
				</ul>
				</div>
			
			<div class="pre-header-right right">
				<strong>2015 Tournament Starts In:</strong> <div class="countdown styled"></div> 
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
					
						
					<div class="main-header-left left adjust-left">
						<a class="logo" href="index.php">
							<img src="img/logo-header.png" alt="Scene" />
						</a>
					</div>
					
			 	    	    	
					<div class="main-header-right right adjust-right">
						<nav class="megamenu_container">
						<ul id="nav" class="right megamenu">
						    <li class="nav-parent">
						    	<a href="#">Players</a>
						    	<ul>
<?php 				while ($row = db_fetch_assoc($golfers)) { 
						if ($row['nickname'] != "" ) {?>
						    	<li><a href="player.php?player=<?php echo urlencode($row['nickname']) ?>"><?php echo $row['nickname']?></a></li>
<?php }} ?>
						    	</ul>
						    </li>
						    
						    <li class="nav-parent"><a href="form.php">Seeding Events</a>
						    	<ul>
<?php				$seedingcompid = 0;
	 				while ($row = db_fetch_assoc($seedings)) { 
						if ($seedingcompid <> $row['compid'] . 0) {
							if ($seedingcompid>0) {
								echo "</li></ul>";
							}
							$seedingcompid = $row['compid'] . 0;
?>
						    	<li><a href="form.php?compid=<?php echo urlencode($row['compid']) ?>"><?php echo $row['compname']?></a>
								<ul>
								<?php } ?>
								<li><a href="form.php?compid=<?php echo urlencode($row['compid']) ?>&seedingid=<?php echo urlencode($row['seedingid']) ?>"><?php echo $row['location']?></a></li>
						    	
						    	
			<?php } ?>
								</ul>
							</ul>	
						    </li>
						    <li class="nav-parent"><a href="scoreboard.php?compid=<?php echo $currentcomp?>">Leader Board</a>
						    	<ul>
<?php 				while ($row = db_fetch_assoc($comps)) { ?>
						    	<li><a href="scoreboard.php?compid=<?php echo urlencode($row['id']) ?>"><?php echo $row['compname']?></a></li>
<?php } 
					db_data_seek($comps, 0);

?>
						    	</ul>	
						    </li>
						    <li class="nav-parent"><a href="rules.php">Rules</a>
						    </li>
						    <li class="nav-parent"><a href="past.php">Photos</a>
						    </li>
						    <li class="nav-parent"><a href="wrap2014.php">Tournament Review</a>
						    	<ul>
						    		<li><a href="wrap2014.php">2014</a></li>
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
	<div class="outter-wrapper nav-container post-header-area header-style-5 page-sticky">
    	<div class="wrapper clearfix">

			<div class="post-header-left left stay">
				<!-- Social Icons -->
				<ul class="social-links boxy">
					<li><a class="fa" title="Twitter" href="https://twitter.com/TheShankers">&#xf099;</a></li>
				</ul>
			</div>
	    	
			<div class="post-header-right right stay">
				<a href="404.html"><i class="fa">&#xf002;</i></a>
			</div>

    	</div>
	</div>
 
<?php
include '../dbutils.php';
include '../utils.php';


$currentcomp = getCurrentComp();
$seedingId = $_GET['seedingid'];

if ($seedingId=="") {
	$seedingId = $_POST['seedingid'];
}


if ($_POST['cancel'] == 'Cancel') {
	
	header("Location: ../form.php?compid=" . $currentcomp . "&seedingid=" . $seedingId);
}
elseif ($_POST['submit'] == 'Save') {
	$passworderr='';
	if ($_POST['password'] == 'shit') {
	
		//Save all values
		$allgood = true;
		$iii = 0;
		$maxid = $_POST['maxid'] + 0;
		$query = "";
		while ($iii <= $maxid) {
			 
			if ($_POST['seedingscoreid' . $iii] == $iii .'') {
			
				 $query = sprintf( 'update seedingscore set score=%s, points=%s where id=%s; ' ,
				 sqlsafe($_POST['score' . $iii]),
				 sqlsafe($_POST['points' . $iii]),
				 		$iii
					); 
				    if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$iii = $iii + 1;
		}
		$iii = 1;
		while ($iii <= $maxid) {
			 
			if ($_POST['scorenew' . $iii] != '') {
			
				 $query = sprintf( 'insert seedingscore (golferid, seedingid, score, points) values (%s, %s, %s, %s); ' ,
				 sqlsafe($_POST['golferidnew' . $iii]),
				 sqlsafe($seedingId),
				 sqlsafe($_POST['scorenew' . $iii]),
				 sqlsafe($_POST['pointsnew' . $iii] .  0)
				 );
				    if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$iii = $iii + 1;
		}
		//echo $query;
		if ($allgood) {
			header("Location: ../form.php?compid=" . $currentcomp . "&seedingid=" . $seedingId);
		}
		else {
			echo $err;
		}
	}
	else {
		$passworderr = 'incorrect password.  Not saved';
	}
	
	}
	



$err = "";
$msg = $_GET['msg'];

	$query = sprintf( "select golfer.id as golferid, golfer.nickname as nickname, seedingscore.score as score, seedingscore.points, seedingscore.id as seedingscoreid from golfer inner join seeding on golfer.compid=seeding.compid left outer join seedingscore on golfer.id=seedingscore.golferid and seedingscore.seedingid=seeding.id  where seeding.id=%s order by nickname;", sqlsafe($seedingId));
	$golfers = mhexecquery($query, $err);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shankers Invitational</title>
		<!-- Style Sheets -->
        <link rel="stylesheet" type="text/css" href="../css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="../styles.css">
		
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">  
        <link rel="stylesheet" type="text/css" href="../css/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" href="../js/media/mediaelementplayer.min.css" />
        <link rel="stylesheet" type="text/css" href="../js/owl-carousel/owl.carousel.css"> 
        <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css?v=2.1.4"/> 
        <link rel="stylesheet" type="text/css" href="../css/mosaic.css" />
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../css/rs-plugin.css">
        <link rel="stylesheet" type="text/css" href="../js/rs-plugin/css/settings.css" />
        <link rel="stylesheet" type="text/css" href="../css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="../css/tooltipster.css">
        <link rel="stylesheet" type="text/css" href="../css/mega.css" />

        <link rel="stylesheet" type="text/css" href="../css/skin1.css"> <!-- change to skin2.css for other skin -->
        <link rel="stylesheet" type="text/css" href="../css/full.css"> <!-- change to boxed.css for boxed style -->
		
		
		<!-- Scripts -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
	<div class="outter-wrapper body-wrapper">		
		<div class="wrapper ad-pad clearfix">
<div class="main-content col-1-1">
<h1>Enter Seeding Scores </h1>
<form name="form1" id="form1" action="seedingscores_update.php" method="post">
	    			<fieldset><legend>Seeding Event Scores</legend>
	    				<b>Password:</b><input name="password" type="password" value="" />
<?php 
	if ($passworderr != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $passworderr?>
	    			</div>
<?php 
	}


		
if (!$golfers) {?>

   			<div class="message notice">
	    				<em class="fa">&#xf071;</em> No Events
	    			</div>
	 
<?php } 
if ($err != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $err?>
	    			</div>
						
<?php 


} else {

				 
 				$rowcount = 0;
 				$maxid = 0;
				while ($row = db_fetch_assoc($golfers)) {
						$rowcount += 1;
				if ($row['seedingscoreid']=="") {
					$rowid= "new".$rowcount;
				}
				else {
					$rowid = $row['seedingscoreid'];
				}
		?>

		
				<input type="hidden" name="seedingscoreid<?php echo $rowid?>" value="<?php echo $rowid?>"><input type="hidden" name="golferid<?php echo $rowid?>" value="<?php echo $row['golferid']?>"><b><?php echo $row['nickname']?></b>
				<input type="text" name="score<?php echo $rowid?>" size="5" maxlength="3" value="<?php echo $row['score']?>" placeholder="Score">
				<input type="text" name="points<?php echo $rowid?>" size="5" maxlength="3" value="<?php echo $row['points']?>" placeholder="Points">
				</tr>
<?php 
		if ($row['seedingscoreid']>$maxid) {$maxid=$row['seedingscoreid'];
		}
	}	
}
?>
<input type="hidden" name="seedingid" value="<?php echo $seedingId?>"><input type="submit" name="submit" value ="Save">&nbsp;<input type="submit" name="cancel" value ="Cancel">&nbsp;
<?php
		if ($maxid==0) {$maxid=10;};
?>

<input type="hidden" name="maxid" value="<?php echo $maxid?>">

</form>
</body>
</html>
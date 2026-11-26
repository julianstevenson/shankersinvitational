<?
include '../dbutils.php';
include '../utils.php';

$passworderr ='';
$currentcomp = getCurrentComp();
$roundid = $_GET['roundid'];
if ($roundid=="") {
	$roundid = $_POST['roundid'];
	}


if ($_POST['cancel'] == 'Cancel') {
	
	header("Location: ../scoreboard.php");
}
elseif ($_POST['submit'] == 'Save') {
	
		if ($_POST['password'] == 'shit') {
			//Save all values
			$allgood = true;
			$iii = 0;
		    $maxid = $_POST['maxid'] + 0;
			$query = "";
			while ($iii <= $maxid) {
				
				if ($_POST['scoreid' . $iii] == $iii .'') {
						
					 $query = sprintf( 'update score set score=%s, points=%s where id=%s; ' ,
					 sqlsafe($_POST['score' . $iii]),
					 sqlsafe($_POST['points' . $iii] + 0),
					 		$iii
						);
//                                           echo $query . '<br>';
					 if (!mhexecquery($query, $err)) {
							$allgood = false;
			    		}
				}
				$iii = $iii + 1;
			}
			$iii = 1;
			while ($iii <= $maxid) {
				if ($_POST['scorenew' . $iii] != '') {
					 $query = sprintf( 'insert score (golferid, roundid, score, points) values (%s, %s, %s, %s); ' ,
					 sqlsafe($_POST['golferidnew' . $iii]),
					 sqlsafe($roundid),
					 sqlsafe($_POST['scorenew' . $iii]),
					 sqlsafe($_POST['pointsnew' . $iii])
					 );
  //                                         echo $query . '<br>';
					 if (!mhexecquery($query, $err)) {
							$allgood = false;
			    		}
				}
				$iii = $iii + 1;
			}
			if ($allgood) {
				Header("Location: ../scoreboard.php?msg=" . urlencode("Scores Updated Successfuly") ) ;
			}
			else {
				echo $err;
			}
		}
	else {
		$passworderr = 'Incorrect password.  Not saved';
	}
	}
	



$err = "";
$msg = $_GET['msg'];

//get comp name
	$query = sprintf( "select round.location, round.number from round where round.id=%s", sqlsafe($roundid));
	$roundrec = mhexecquery($query, $err);
	if (!$roundrec)  {	
		$err = "Error getting round details";
		$roundname ="Error";
	} 
	else {
	 	if ($row =  mysql_fetch_assoc($roundrec)) {
			$roundname =  $row['location'] . " round " . $row['number'];
	 	}
	 	else {
	 		$err = "Oh dear.  That Round id isn't right.";
	 		$roundname ="Unknown round id";
	 			 	}
	 }
    if ($err=="") {
		$query = sprintf( "select golfer.id as golferid, golfer.nickname, round.*, score.id as scoreid, score.score, score.points from golfer inner join round on round.compid=golfer.compid left outer join score on score.roundid=round.id and golfer.id=score.golferid where round.id=%s", sqlsafe($roundid));
		$golfers = mhexecquery($query, $err);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script>
function checkpassword() {
	if (document.form1.password.value=='') {
		alert('Don\'t forget the password bro!');
		return false;
	}	
	else {
		return true;
		}
}
				
</script>

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
<h1>Enter Tournament Scores - <?php echo $roundname?></h1>
<form name="form1" id="form1" action="scores_update.php" method="post">
	    			<fieldset><legend>Leaderboard Scores</legend>
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
?>
<?php 
 				$rowcount = 0;
 				$maxid = 10;
				while ($row = mysql_fetch_assoc($golfers)) {
						$rowcount += 1;
				if ($row['scoreid']=="") {
					$rowid= "new".$rowcount;
				}
				else {
					$rowid = $row['scoreid'];
				}
		?>
				<input type="hidden" name="scoreid<? echo $rowid?>" value="<? echo  $row['scoreid']?>">
				<input type="hidden" name="golferid<? echo $rowid?>" value="<? echo  $row['golferid']?>">
				<b><? echo $row['nickname']?></b>
				<input type="text" name="score<? echo $rowid?>" placeholder="Score" size="5" maxlength="3" value="<?php echo $row['score']?>">
				<input type="text" name="points<? echo $rowid?>" placeholder="Points" size="5" maxlength="3" value="<?php echo $row['points'] + 0?>">
				<?php 
		if ($row['scoreid'] + 0>$maxid) {$maxid=$row['scoreid'];}
	}	
}
?>
<input type="hidden" name="roundid" value="<?php echo $roundid?>"><input type="submit" onclick="return checkpassword()" name="submit" value ="Save">&nbsp;<input type="submit" name="cancel" value ="Cancel">&nbsp;
<input type="hidden" name="maxid" value="<?php echo $maxid?>">
</form>
</div>
</div>
</div></body>
</html>

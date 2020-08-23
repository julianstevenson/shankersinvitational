<?
include '../dbutils.php';
include '../utils.php';


$allgood = true;

$currentcomp = getCurrentComp();


if ($_GET['delete'] != '') {
	$query = sprintf( 'delete from round where id=%s; ' ,
			$_GET['delete']
	);
	if (!mhexecquery($query, $err)) {
		$allgood = false;
	}

		if ($allgood) {
			echo "Deleted";
		}
		else {
			echo $err;
		}
}
elseif ($_POST['submit'] == 'Save') {


		//Save all values
		$iii = 0;
		$maxid = $_POST['maxid'] + 0;
		$query = "";
		$round= 0;
		while ($iii <= $maxid) {
			 
			if ($_POST['id' . $iii] == $iii .'') {
			
				 $query = sprintf( 'update  round set location=%s where id=%s; ' ,
				 sqlsafe($_POST['location' . $iii]),
				 		$iii
					);
				 if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
		    		$rounds +=1;
			}
			$iii = $iii + 1;
		}
		while ($round <= 3) {
			if ($_POST['numbernew' . $round] == $round .'') {
			
				 $query = sprintf( 'insert round (number, location, compid) values (%s, %s, %s); ' ,
				 sqlsafe($_POST['numbernew' . $round]),
				 sqlsafe($_POST['locationnew' . $round]),
				 		$currentcomp
					);
				    if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$round = $round + 1;
		}
		$iii = 1;
		//echo $query;
		if ($allgood) {
			echo "Saved";
		}
		else {
			echo $err;
		}

$currentcomp = getCurrentComp();
		$golfers = mhexecquery(sprintf("select * from round where compid=%s", $currentcomp), $err);
		
		
}
	



$err = "";
$msg = $_GET['msg'];


	$query = sprintf( "select * from round where compid=%s;", sqlsafe($currentcomp) );

	$golfers = mhexecquery($query, $err);

		
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shankers Invitational</title>
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
<form name="form1" id="form1" action="rounds_update.php" method="post">
<table width="800" cellpadding="0" cellspacing="0">
 <tr>
	<td align="left" class="bgwhite"><a href="index.html"><img src="shankers.jpg" height="150" width="200" border="0"/></a></td>
	<td align="left"><h1>The Rounds</h1></td>	
 </tr>
			 <tr><td align="center">&nbsp;</td></tr>
 <tr valign="top">
	<td align="left">
<?php include 'leftmenu_admin.php';?>
	</td>
	<td align="left">
		<table cellpadding="10" cellspacing="0" width="200" border="0">
						
		<?php 
if (!$golfers) {?>

<?php } elseif ($err != '') {
?>
						<tr valign="middle">
						  <td align="center" nowrap><?php echo $err?></td>
						</tr>
								
<?php 

} else { ?>
			<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
			    <td align="left" nowrap><h3>No.</h3></td>
				<td align="left" nowrap><h3>Where</h3></td>
								</tr>

<?php 
 				$rowcount = 0;
 				$maxid = 0;
				while ($row = mysql_fetch_assoc($golfers)) {
						$rowcount += 1;

		?>
			<tr valign="top">
				<td align="center" nowrap><a href="rounds_update.php?delete=<? echo $row['id'] ?>">Delete</a></td>
			<td align="center" nowrap><input type="hidden" name="id<? echo $row['id']?>" value="<? echo $row['id']?>"><? echo $row['number']?></td>
				<td align="left" nowrap><?php echo createinput_text("location".$row['id'], $row['location'], "20", "50")?></td>
								</tr>

<?php 
		if ($row['id']>$maxid) {$maxid=$row['id'];}
	}
	}	
	$rowcount +=1;
while ($rowcount<4) {
?>
			<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
			<td align="center" nowrap><input type="hidden" name="numbernew<? echo $rowcount?>" value="<? echo $rowcount?>"><? echo $rowcount?></td>
				<td align="left" nowrap><?php echo createinput_text("locationnew".$rowcount, "", "20", "50")?></td>
								</tr>
<?php 
		$rowcount +=1;
}
				
if ($rowcount == 0) {?>

						<tr valign="middle">
						  <td align="center" nowrap>No rounds</td>
						</tr>

<?php }?>

<tr valign="top">
				<td align="left" colspan="4" nowrap><input type="submit" name="submit" value ="Save">&nbsp;<input type="submit" name="cancel" value ="Cancel">&nbsp;</td>
								</tr>
</table>
	</td>	
 </tr>

</table>
<input type="hidden" name="maxid" value="<?php echo $maxid?>">
</form>
</body>
</html>

<?
include '../dbutils.php';
include '../utils.php';

$allgood = true;

$currentcomp = getCurrentComp();
$err = "";
$updateerr = "";
$deleteerr = "";
$inserterr = "";
$updatemsg = "";
$deletemsg = "";
$insertmsg = "";
$maxid = $_POST['maxid'];

if ($_GET['delete'] != '') {
	$query = sprintf( 'delete from seeding where id=%s; ' ,
			$_GET['delete']
	);
	if (!mhexecquery($query, $deleteerr)) {
		$allgood = false;
	}

		if ($allgood) {
			$deletemsg =  "Seeding event deleted";
		}
}
elseif ($_POST['submit'] == 'Save') {


		//Save all values
		$iii = 0;
		$query = "";
		while ($iii <= $maxid) {
			 
			if ($_POST['id' . $iii] == $iii .'') {
			

				$query = sprintf( 'update  seeding set location=%s, eventdate=%s, writeup=%s, googlemap=%s, address=%s, starttime=%s, www=%s where id=%s; ' ,
				 sqlsafe($_POST['location' . $iii]),
				 sqlsafe($_POST['eventdate' . $iii]),
				 sqlsafe($_POST['writeup' . $iii]),
				 sqlsafe($_POST['googlemap' . $iii], false),
						sqlsafe($_POST['address' . $iii], false),
						sqlsafe($_POST['starttime' . $iii], false),
						sqlsafe($_POST['www' . $iii], false),
						
						
						$iii
					);
				 if (!mhexecquery($query, $updateerr)) {
						$allgood = false;
		    		}
		    	 else {
		    	 	$updatemsg = "Seeding events updated";
		    	 }
		    	 
			}
			$iii = $iii + 1;
		}
		$iii = 1;
		if ($_POST['location'] != '') {
			     if ($_POST['eventdate'] == 'yyyy-mm-dd') {
			     	$eventdate = '0000-00-00';
			     }
			     else {
			     	$eventdate = $_POST['eventdate'];
			     }
			     
				 $query = sprintf( 'insert into seeding (location, eventdate, compid, googlemap, address, starttime, www) values (%s, %s, %s, %s, %s, %s, %s); ' ,
				 sqlsafe($_POST['location']),
				 sqlsafe($eventdate),
				 $currentcomp,
				 sqlsafe($_POST['googlemap' ], false),
				 sqlsafe($_POST['address' ], false),
				 sqlsafe($_POST['starttime'], false),
				 sqlsafe($_POST['www' ], false)
				 );
				 if (!mhexecquery($query, $inserterr)) {
						$allgood = false;
		    		}
				    	 else {
		    	 	$insertmsg = "New seeding event added";
		    	 }
		}
			$iii = $iii + 1;
		
$currentcomp = getCurrentComp();
		
}
	



$msg = $_GET['msg'];


	$query = sprintf( "select * from seeding where compid=%s;", sqlsafe($currentcomp) );

	$golfers = mhexecquery($query, $err);

		
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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
<form name="form1" id="form1" action="seeding_update.php" method="post">
<?php 
if ($deletemsg != '') {
?>
	    			<div class="message success">
	    				<em class="fa">&#xf00d;</em> <?php echo $deletemsg?>
	    			</div>
						
<?php } 
if ($updatemsg != '') {
?>
	    			<div class="message success">
	    				<em class="fa">&#xf00d;</em> <?php echo $updatemsg?>
	    			</div>
						
<?php } 
if ($insertmsg != '') {
?>
	    			<div class="message success">
	    				<em class="fa">&#xf00d;</em> <?php echo $insertmsg?>
	    			</div>
						
<?php }?>

<?php 
if ($deleteerr != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $deleteerr?>
	    			</div>
						

<?php } 
if ($updateerr != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $updateerr?>
	    			</div>
						

<?php } 
if ($inserterr != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $inserterr?>
	    			</div>
						
<?php }

if ($err != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $err?>
	    			</div>
						
<?php }?>

<table width="1000" cellpadding="0" cellspacing="0">
 <tr>
	<td align="left" class="bgwhite"><a href="index.html"><img src="shankers.jpg" height="150" width="200" border="0"/></a></td>
	<td align="left"><h1>The Seeding Events</h1></td>	
 </tr>
			 <tr><td align="center">&nbsp;</td></tr>
 <tr valign="top">
	<td align="left">
<?php include 'leftmenu_admin.php';?>
	</td>
	<td align="left">
		<table cellpadding="10" cellspacing="0" border="0">
						
		<?php 
if (!$golfers) {?>

						<tr valign="middle">
						  <td align="center" nowrap>No events</td>
						</tr>

<?php } elseif ($err != '') {
?>
						<tr valign="middle">
						  <td align="center" nowrap><?php echo $err?></td>
						</tr>
								
<?php 

} else { ?>
			<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" nowrap><h3>Location</h3></td>
				<td align="left" nowrap><h3>Date</h3></td>
				<td align="left" nowrap><h3>Google Map</h3></td>
				</tr>
			<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" colspan="3"  nowrap><h4>Add New Event</h4></td>
				</tr>
				<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" nowrap><?php  createinput_text("location", "", "20", "50", "Course")?></td>
				<td align="left" nowrap><?php  createinput_text("eventdate", "", "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text("googlemap", "", "30", "300", "Google Map Embed Link")?></td>
				</tr>
				<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" nowrap><?php  createinput_text("address", "", "20", "50", "Address")?></td>
				<td align="left" nowrap><?php  createinput_text("starttime", "", "10", "10", "hh:mm")?></td>
				<td align="left" nowrap><?php  createinput_text("www", "", "30", "300", "URL")?></td>
				</tr>
				
<?php 
 				$rowcount = 0;
 				$maxid = 0;
				while ($row = mysql_fetch_assoc($golfers)) {
						$rowcount += 1;

		?>
			<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" colspan="3"  nowrap><h4>Seeding Event <?php echo $rowcount ?></h4></td>
				</tr>
		<tr valign="top">
				<td align="left" nowrap><a href="seeding_update.php?delete=<? echo $row['id'] ?>"><input type="button" value="Delete"></a></td>
			<td align="left" nowrap><input type="hidden" name="id<? echo $row['id']?>" value="<? echo $row['id']?>">
			<?php  createinput_text("location".$row['id'], $row['location'], "20", "50", "Course")?></td>
				<td align="left" nowrap><?php  createinput_text("eventdate".$row['id'], $row['eventdate'], "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text( "googlemap".$row['id'], $row['googlemap'], "30", "300", "Google map link")?></td>
				</tr>
		<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
			<td align="left" nowrap>
			<?php  createinput_text("address".$row['id'], $row['address'], "20", "100", "Address")?></td>
				<td align="left" nowrap><?php  createinput_text("starttime".$row['id'], $row['starttime'], "10", "10", "hh:mm")?></td>
				<td align="left" nowrap><?php  createinput_text( "www".$row['id'], $row['www'], "30", "300", "URL")?></td>
				</tr>
				<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" colspan="3"  nowrap><b>Writeup</b><?php  createinput_textarea( "writeup".$row['id'], $row['writeup'], 10, 50) ?></td>
				</tr>
				
<?php 
		if ($row['id']>$maxid) {$maxid=$row['id'];}
	}	

				}
if ($rowcount == 0) {?>

						<tr valign="middle">
						  <td align="center" nowrap>No events</td>
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
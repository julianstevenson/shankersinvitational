<?php
include '../dbutils.php';
include '../utils.php';

$allgood = true;

$currentcomp = getCurrentComp();
date_default_timezone_set("Australia/Victoria");
if ($_GET['delete'] != '') {
	$query = sprintf( 'delete from competition where id=%s; ' ,
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
		while ($iii <= $maxid) {
			 
			if ($_POST['id' . $iii] == $iii .'') {
				 $photocount = $_POST['photocount' . $iii];
				 if ($photocount=="") { $photocount=0;  };
				 $query = sprintf( 'update  competition set yearid=%s, venue=%s, compname=%s, startdate=%s, enddate=%s, photocount=%s where id=%s; ' ,
				 sqlsafe($_POST['year' . $iii]),
				 sqlsafe($_POST['venue' . $iii]),
				 sqlsafe($_POST['compname' . $iii]),
				 sqlsafe($_POST['startdate' . $iii]),
				 sqlsafe($_POST['enddate' . $iii]),
				 sqlsafe($photocount),
				 		$iii
					);
				 if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$iii = $iii + 1;
		}
		$iii = 1;
		if ($_POST['year'] != '') {
			     if ($_POST['startdate'] == 'yyyy-mm-dd') {
			     	$startdate = '0000-00-00';
			     }
			     else {
			     	$startdate = $_POST['startdate'];
			     }
			     if ($_POST['enddate'] == 'yyyy-mm-dd') {
			     	$enddate = '0000-00-00';
			     }
			     else {
			     	$enddate = $_POST['enddate'];
			     }
			     
				 $photocount = $_POST['photocount' ];
				 if ($photocount=="") { $photocount=0;  };
			     $query = sprintf( 'insert into competition (yearid, venue, compname, startdate, enddate, photocount) values (%s, %s, %s, %s, %s, %s ); ' ,
				 sqlsafe($_POST['year']),
				 sqlsafe($_POST['venue' ]),
				 sqlsafe($_POST['compname' ]),
				 sqlsafe($startdate),
				 sqlsafe($enddate),
				 sqlsafe($photocount)
				 );
				 if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$iii = $iii + 1;
		//echo $query;
		if ($allgood) {
			echo "Saved";
		}
		else {
			echo $err;
		}

		if ($currentcomp!='') {
			$query = sprintf( 'update currentcomp set compid = %s; ' ,
					sqlsafe($_POST['currentcomp'])
			);
		
		}
		else {
			$query = sprintf( 'insert into currentcomp (compid) values ( %s ); ' ,
					sqlsafe($_POST['currentcomp'])
			);
		}
		mhexecquery($query, $err);
		
$currentcomp = getCurrentComp();
		
}
	



$err = "";
$msg = $_GET['msg'];


	$query = sprintf( "select * from competition;" );
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
<form name="form1" id="form1" action="competitions_update.php" method="post">
<?php  if ($err != '') {
?>
	    			<div class="message error">
	    				<em class="fa">&#xf00d;</em> <?php echo $err?>
	    			</div>
<?php }?>								
<table width="1000" cellpadding="0" cellspacing="0">
 <tr>
	<td align="left" class="bgwhite"><a href="index.html"><img src="shankers.jpg" height="150" width="200" border="0"/></a></td>
	<td align="left"><h1>The Competitions</h1></td>	
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

<?php 

} else { ?>
			<tr valign="top">
				<td align="left" colspan="7" nowrap><h3>Current Comp</h3></td>
								</tr>
			<tr valign="middle">
				<td align="center" colspan="7" nowrap><?php  echo createinput_select("currentcomp", "competition", "compname", $currentcomp)?></td>
								</tr>
			<tr valign="middle">
				<td align="left" nowrap>&nbsp;</td>
			    <td align="left" nowrap><h4>Year</h4></td>
				<td align="left" nowrap><h4>Competition</h4></td>
				<td align="left" nowrap><h4>Venue</h4></td>
				<td align="left" nowrap><h4>Start Date</h4></td>
				<td align="left" nowrap><h4>End Date</h4></td>
				<td align="left" nowrap><h4>Photo Count</h4></td>
				</tr>
			<tr valign="middle">
				<td align="left" nowrap>&nbsp;</td>
			<td align="left" nowrap><?php  echo createinput_select( "year", "year", "year", (date("Y") + 1) . "") ?></td>
				<td align="left" nowrap><?php  createinput_text("compname", "", "20", "50", "Competition Name")?></td>
				<td align="left" nowrap><?php  createinput_text("venue", "", "20", "50", "Course")?></td>
				<td align="left" nowrap><?php  createinput_text("startdate", "", "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text("enddate", "", "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text("photocount", "", "10", "3", "Photo Count")?></td>
				</tr>

<?php 
 				$rowcount = 0;
 				$maxid = 0;
				while ($row = db_fetch_assoc($golfers)) {
						$rowcount += 1;

		?>
			<tr valign="middle">
				<td align="left" nowrap><a href="competitions_update.php?delete=<?php echo $row['id'] ?>"><input type="button" value="Delete"></a></td>
			<td align="left" nowrap><input type="hidden" name="id<?php echo $row['id']?>" value="<?php echo $row['id']?>"><?php echo createinput_select("year".$row['id'], "year", "year", $row['yearid'])?></td>
				<td align="left" nowrap><?php  createinput_text("compname".$row['id'], $row['compname'], "20", "50", "Competition Name")?></td>
				<td align="left" nowrap><?php  createinput_text("venue".$row['id'], $row['venue'], "20", "50", "Course")?></td>
				<td align="left" nowrap><?php  createinput_text("startdate".$row['id'], $row['startdate'], "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text("enddate".$row['id'], $row['enddate'], "10", "10", "yyyy-mm-dd")?></td>
				<td align="left" nowrap><?php  createinput_text("photocount".$row['id'], $row['photocount'], "10", "3", "Photo count")?></td>
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
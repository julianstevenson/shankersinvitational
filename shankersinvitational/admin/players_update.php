<?php
include '../dbutils.php';
include '../utils.php';


$currentcomp = getCurrentComp();

if ($_POST['cancel'] == 'Cancel') {
	
	header("Location: players.php");
}
elseif ($_POST['submit'] == 'Save') {


		//Save all values
		$allgood = true;
		$iii = 0;
		$maxid = $_POST['maxid'] + 0;
		$query = "";
		while ($iii <= $maxid) {
			 
			if ($_POST['id' . $iii] == $iii .'') {
				 if ($_POST['handicap' . $iii] == "") {
				 	$handicap = 0;
				 }
				 else {
				 	$handicap = sqlsafe($_POST['handicap' . $iii]);
				 }
				 $query = sprintf( 'update golfer set description=%s, handicap=%s, nickname=%s, firstname=%s, lastname=%s, avatar=%s where id=%s; ' ,
				 sqlsafe($_POST['description' . $iii], false),
				 $handicap,
				 sqlsafe($_POST['nickname' . $iii]),
				 sqlsafe($_POST['firstname' . $iii]),
				 sqlsafe($_POST['lastname' . $iii]),
				 sqlsafe($_POST['avatar' . $iii]),
				 		$iii
					);
				    if (!mhexecquery($query, $err)) {
						$allgood = false;
		    		}
			}
			$iii = $iii + 1;
		}
		$iii = 0;
		while ($iii <= 8) {
			 
			if (($_POST['idnew' . $iii] == $iii .'') && ($_POST['nicknamenew' . $iii] !='')) {
				if ($_POST['handicapnew' . $iii] == "") {
					$handicap = 0;
				}
				else {
					$handicap = sqlsafe($_POST['handicapnew' . $iii]);
				}
				
				 $query = sprintf( 'insert golfer (description, handicap, nickname, firstname, lastname, avatar, admin, compid) values (%s, %s, %s,  %s, %s, %s, 0, %s)' , 
				 sqlsafe($_POST['descriptionnew' . $iii], false),
				 $handicap,
				 sqlsafe($_POST['nicknamenew' . $iii]),
				 sqlsafe($_POST['firstnamenew' . $iii]),
				 sqlsafe($_POST['lastnamenew' . $iii]),
				 sqlsafe($_POST['avatarnew' . $iii]),
				 		$currentcomp, 
				 		$currentcomp,
				 		sqlsafe($_POST['handicapnew' . $iii])		 			
					);
				 
				    if (!mhexecmultiquery($query, $err)) {
						$allgood = false;

				  }
			}
			$iii = $iii + 1;
		}
		//echo $query;
		if ($allgood) {
		//	Header("Location: players.php?msg=" . urlencode("Golfers Updated Successfuly") ) ;
		}
		else {
			echo $err;
		}
	}
	



$err = "";
$msg = $_GET['msg'];


	$query = sprintf( "select golfer.*, golfer.handicap from golfer where golfer.compid=%s;", sqlsafe($currentcomp));

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
<form name="form1" id="form1" action="players_update.php" method="post">
<table width="1000" cellpadding="0" cellspacing="0">
 <tr>
	<td align="left" class="bgwhite"><a href="index.html"><img src="shankers.jpg" height="150" width="200" border="0"/></a></td>
	<td align="left"><h1>The Players</h1></td>	
 </tr>
			 <tr><td align="center">&nbsp;</td></tr>
 <tr valign="top">
	<td align="left">
<?php include 'leftmenu_admin.php';?>
	</td>
	<td align="left">
		<table cellpadding="10" cellspacing="0"  border="0">
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

} else {
?>
			<tr valign="top">
				<td align="left" nowrap><b>Nickname</b></td>
				<td align="left" nowrap><b>Description</b></td>
				<td align="left" nowrap><b>First Name</b></td>
				<td align="left" nowrap><b>Last Name</b></td>
				<td align="left" nowrap><b>Handicap</b></td>
				</tr>

<?php  				$rowcount = 0;
 				$maxid = 0;
				while ($row = db_fetch_assoc($golfers)) {
						$rowcount += 1;

		?>
			<tr valign="top">
				<td align="left" nowrap><input type="hidden" name="id<?php echo $row['id']?>" value="<?php echo $row['id']?>"><input type="text" name="nickname<?php echo $row['id']?>" id="nickname<?php echo $row['id']?>" value="<?php echo $row['nickname']?>"></td>
				<td align="left" nowrap><textarea rows="10" cols="40" name="description<?php echo $row['id']?>" id="description<?php echo $row['id']?>"><?php echo $row['description']?></textarea></td>
				<td align="left" nowrap><input type="text" name="firstname<?php echo $row['id']?>" id="firstname<?php echo $row['id']?>" value="<?php echo $row['firstname']?>"></td>
			    <td align="left" nowrap><input type="text" name="lastname<?php echo $row['id']?>" id="lastname<?php echo $row['id']?>" value="<?php echo $row['lastname']?>"></td>
			    <td align="left" nowrap><input type="text" name="handicap<?php echo $row['id']?>" id="handicap<?php echo $row['id']?>" value="<?php echo $row['handicap']?>"></td>
			    </tr>
				<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" nowrap><b>Avatar:</b> </b><input type="text" name="avatar<?php echo $row['id']?>" id="avatar<?php echo $row['id']?>" value="<?php echo $row['avatar']?>"></td>
				<td align="left" nowrap>&nbsp;</td>
			    <td align="left" nowrap>&nbsp;</td>
			    <td align="left" nowrap>&nbsp;</td>
			    </tr>
				<?php 
		if ($row['id']>$maxid) {$maxid=$row['id'];}
	}	

				while ($rowcount<=8) { ?>
				<tr valign="top">
				<td align="left" nowrap><input type="hidden" name="idnew<?php echo $rowcount?>" value="<?php echo $rowcount?>"><input type="text" name="nicknamenew<?php echo $rowcount?>" id="nicknamenew<?php echo $rowcount?>" value=""></td>
				<td align="left" nowrap><textarea rows="10" cols="40"  name="descriptionnew<?php echo $rowcount?>" id="descriptionnew<?php echo $rowcount?>"></textarea></td>
				<td align="left" nowrap><input type="text" name="firstnamenew<?php echo $rowcount?>" id="firstnamenew<?php echo $rowcount?>" value=""></td>
			    <td align="left" nowrap><input type="text" name="lastnamenew<?php echo $rowcount?>" id="lastnamenew<?php echo $rowcount?>" value=""></td>
			    <td align="left" nowrap><input type="text" name="handicapnew<?php echo $rowcount?>" id="handicapnew<?php echo $rowcount?>" value=""></td>
			    </tr>
				<tr valign="top">
				<td align="left" nowrap>&nbsp;</td>
				<td align="left" nowrap><b>Avatar:</b> <input type="text" name="avatarnew<?php echo $rowcount?>" id="avatarnew<?php echo $rowcount?>" value=""></td>
				<td align="left" nowrap>&nbsp;</td>
			    <td align="left" nowrap>&nbsp;</td>
								</tr>
								<?php 					$rowcount += 1;
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
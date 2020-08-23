<?
function mhdbconnect(&$err) {
  $UID	= "shankers";
  $PWD	= "mKS6dAMUNCvF5R8Y";

  $dbcon =  mysql_connect('127.0.0.1', $UID, $PWD);

  if (!$dbcon) {
	$err = 'Could not connect: ' . mysql_error();
  }

 return $dbcon;

}

function mhexecquery($query, &$err) {
  $dbcon =  mhdbconnect($err);

  if ($dbcon) {
    $result = mysql_db_query ('shankersinvitational', $query);
    if (!$result) {
      $err  = 'Invalid query: ' . mysql_error() . "\n";
      $err  .= '<br><i>SQL: ' . $query . "</i>\n";
    }
  }
  return $result;

}

function mhexecmultiquery($query, &$err) {
  $UID	= "jewels_shankers";
  $PWD	= "shankers2014";
	$mysqli = new mysqli('127.0.0.1', $UID, $PWD, 'jewels_shankers');
	
		$result =  $mysqli->multi_query($query);
		if (!$result) {
			$err  = 'Invalid query: ' . mysql_error() . "\n";
			$err  .= '<br><i>SQL: ' . $query . "</i>\n";
		}
	return $result;

}

?>

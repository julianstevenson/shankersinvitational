<?
$urlArr=parse_url($_SERVER['REQUEST_URI']);
parse_str($urlArr['path'], $path);

$paths = explode('/', $urlArr['path']);

if (count($paths)>0) {
  if (($paths[1]=='players') && (strlen($paths[2])>0)) {
    	$_GET['player'] = $paths[2]; 
    	include("player.php");
  }
  else if (($paths[1]=='players')) {
  	include("players.php");
 }
  else if (($paths[1]=='tour')) {
        include("tour2019.php");
 }
  else if (($paths[1]=='leaderboard')) {
        include("scoreboard.php");
 }
  else if (($paths[1]=='rules')) {
        include("rules.php");
 }
 else {
 	include("index.php");
 }
}
else {

	include("index.php");
}

?>

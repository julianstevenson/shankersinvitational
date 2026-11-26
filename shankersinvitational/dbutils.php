<?php
// Database helpers. Uses mysqli (the old mysql_* functions were removed in PHP 7).
// Connection settings can be overridden with environment variables (see docker-compose.yml).

mysqli_report(MYSQLI_REPORT_OFF); // keep the old behaviour: failed queries return false and set $err

function mhdbconnect(&$err) {
  static $dbcon = null;

  if ($dbcon === null) {
    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $user = getenv('DB_USER') ?: 'shankers';
    $pass = getenv('DB_PASSWORD') ?: 'mKS6dAMUNCvF5R8Y';
    $name = getenv('DB_NAME') ?: 'shankersinvitational';
    $port = (int)(getenv('DB_PORT') ?: 3306);

    $dbcon = mysqli_connect($host, $user, $pass, $name, $port);
    if (!$dbcon) {
      $err = 'Could not connect: ' . mysqli_connect_error();
      $dbcon = null;
      return false;
    }
    mysqli_set_charset($dbcon, 'utf8');
    // The site was written for MySQL 5.5's lenient mode (e.g. inserts that leave
    // NOT NULL columns like golfer.golflink empty). Newer servers default to strict mode.
    mysqli_query($dbcon, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");
  }

  return $dbcon;
}

function mhexecquery($query, &$err) {
  $result = false;
  $dbcon = mhdbconnect($err);

  if ($dbcon) {
    $result = mysqli_query($dbcon, $query);
    if (!$result) {
      $err  = 'Invalid query: ' . mysqli_error($dbcon) . "\n";
      $err  .= '<br><i>SQL: ' . $query . "</i>\n";
    }
  }
  return $result;
}

function mhexecmultiquery($query, &$err) {
  $result = false;
  $dbcon = mhdbconnect($err);

  if ($dbcon) {
    $result = mysqli_multi_query($dbcon, $query);
    if (!$result) {
      $err  = 'Invalid query: ' . mysqli_error($dbcon) . "\n";
      $err  .= '<br><i>SQL: ' . $query . "</i>\n";
    }
    // Flush all result sets so the connection can be used for the next query.
    while (mysqli_more_results($dbcon) && mysqli_next_result($dbcon)) {
      if ($extra = mysqli_store_result($dbcon)) {
        mysqli_free_result($extra);
      }
    }
    if (mysqli_errno($dbcon)) {
      $err  = 'Invalid query: ' . mysqli_error($dbcon) . "\n";
      $result = false;
    }
  }
  return $result;
}

// Wrappers that behave like the old mysql_* functions when a query failed
// (PHP 8 throws an error if you pass false to the mysqli_* versions).
function db_fetch_assoc($result) {
  return ($result instanceof mysqli_result) ? mysqli_fetch_assoc($result) : false;
}

function db_num_rows($result) {
  return ($result instanceof mysqli_result) ? mysqli_num_rows($result) : 0;
}

function db_data_seek($result, $offset) {
  return ($result instanceof mysqli_result && mysqli_num_rows($result) > $offset) ? mysqli_data_seek($result, $offset) : false;
}

?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
exit;
######################################################################
#
# Open PDO Database Connection Read Only
#
######################################################################
require_once('./assets/class/pdo_mysql.php');
$DB_HOST = 'localhost';
$DB_USER = "";
$DB_PASS = "";
$DB_DB = "";
$db= pdo_pconnect ( $DB_HOST , $DB_USER , $DB_PASS );
pdo_select_db ( $DB_DB )  or die ( "DATABASE ERROR! Line 20" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>

<link rel="stylesheet" href="../theme/theme/bootstrap.css" media="screen">
<link rel="stylesheet" href="../theme/theme/usebootstrap.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="../theme/bootstrap/html5shiv.js"></script>
    <script src="../theme/bootstrap/respond.min.js"></script>
<![endif]-->

</head>
<body>
<?php
function test($n){
$table = "greekjyson";
$query = "SELECT * FROM $table WHERE number=$n";
$pdoresult = pdo_query($query);
while ($resultit = pdo_fetch_array($pdoresult))
      {
      return $resultit["text"] ;
      }
}


//
//
//
$gj="/zh-rcn/words/greek.json";
$hj="/zh-rcn/words/hebrew.json";
//
//
echo $gj;
// Get the contents of the JSON file
$strJsonFileContents = file_get_contents($gj);
// Convert to array
$array = json_decode($strJsonFileContents, true);
//var_dump($array); // print array
echo "<hR>records=";
echo count($array);
echo "<hR>";

//$array = array_shift($array);
//var_dump($array); // print array
foreach ($array as $key => $val) {
    foreach ($val as $key2 => $val2) {

    echo $key2 .'=<BR>';
    echo $val2.'<BR>';
    $rtest=test($key2);
    echo $rtest;
    if($val2!=$rtest){echo "<h1>ERROR</h1>";}
    echo"<hr>";
  	}
}
?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../theme/bootstrap/bootstrap.min.js"></script>
<script src="../theme/bootstrap/usebootstrap.js"></script>

</body>
</html>

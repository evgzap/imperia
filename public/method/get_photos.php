<?
function cors() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    }
}
cors();

$json = file_get_contents("php://input");
$json = json_decode($json);

$quantity = trim($json->{"quantity"});
$sort = trim($json->{"sort"});


$host = "localhost";
$db = "imperia-clean07";
$user = "imperia-clean07";
$password = "1zap9unn9yy8";
$link = mysqli_connect($host, $user, $password, $db) or die("Ошибка " . mysqli_error($link));

$sql = mysqli_query($link, 'SELECT * FROM `photos` ORDER by other '.$sort.' LIMIT 0, '.$quantity);
$answer  = array();
while ($result = mysqli_fetch_array($sql)) {
    array_push($answer, $result['name']);
  }
print_r(json_encode($answer))

?>
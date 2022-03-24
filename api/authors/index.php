<$php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    if ($method === 'PUT'){
      include('update.php');
    }
    elseif ($method === 'GET' && isset($_GET['id'])){
      include('read_single.php');
    elseif ($method === 'GET'){
      include('read.php');
    elseif ($method === 'DELETE'){
      include('delete.php');
    elseif ($method === 'POST'){
      include('create.php');
    

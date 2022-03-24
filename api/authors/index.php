<$php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    if ($method === 'PUT'){
      require('update.php');
    }
    elseif ($method === 'GET' && isset($_GET['id'])){
      require('read_single.php');
    elseif ($method === 'GET'){
      header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        include_once '../../config/database.php';
        include_once '../../models/authors.php';

        $database = new database();
        $db = $database->connect();

        $author = new authors($db);

        $result = $author->read();

        $num = $result->rowCount();

        if($num > 0){
            $author_arr = array();
            $author_arr['data'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $author_item = array(
                    'id' => $id,
                    'author' => $author
                );
                array_push($author_arr['data'], $author_item);
            }

            echo json_encode($author_arr);

        }
        else{
            echo json_encode(
                array('message' => 'No authors found')
            );
        }
    elseif ($method === 'DELETE'){
      require('delete.php');
    elseif ($method === 'POST'){
      require('create.php');
    

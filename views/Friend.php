<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'controllers/Friend.php';


$requestMethod = $_SERVER['REQUEST_METHOD'];


$friendController = new FriendController();

switch ($requestMethod) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $friendController->createFriend($data);
    break;
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $friendController->getIDFriend($id);
        }else{
            $friendController->getAllFriend();
        }
    break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $friendController->updateFriend($data);
    break;
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        $friendController->deleteFriend($data);
    break;

    default:
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST, PUT, DELETE');
    break;
}
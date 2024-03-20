<?php

// Import Frieds Model
require_once 'models/Friend.php';

// CLASS Controller
class FriendController {

    public function createFriend($data) {
        $name = $data['name'];
        $age = $data['age'];
        $itemModel = new FriendModel();
        $itemModel->createFriend($name, $age);
        if ($itemModel) {
            $response = array(
                "name" => $name,
                "age" => $age
            );
        } else {
            $response = array(
                "message" => "Item creation failed."
            );
        }
        echo json_encode($response);
    }

    public function getAllFriend(){
        $itemModel = new FriendModel();
        $items = $itemModel->getAllFriend();
        echo json_encode($items);
    }
    public function getIDFriend($id){
        $itemModel = new FriendModel();
        $item = $itemModel->getIDFriend($id);
        if ($item) {  
            echo json_encode($item);
        }else{
            echo json_encode(['error' => 'Item not found']);
        }
    }
    public function updateFriend($data,) {
        $id = $data['id'];
        $name = $data['name'];
        $age = $data['age'];
        $itemModel = new FriendModel();
        $itemModel = $itemModel->updateFriend($id, $name, $age);
        if ($itemModel) {
            $response = array(
                "name" => $name,
                "age" => $age
            );
        } else {
            $response = array(
                "message" => "Item update failed."
            );
        }
        echo json_encode($response);
    }
    public function deleteFriend($data) {
        $id = $data['id'];
        $itemModel = new FriendModel();
        $itemModel->deleteFriend($id);
        echo json_encode([ "message" => "Item Is Deleted."]);
    }
}
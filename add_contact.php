<?php 
require_once "vendor/autoload.php";

use App\Models\AddressBook;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if(!empty($name) && !empty($email)){
        $addressBook = new AddressBook();
        
        $content = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        ];

        if($addressBook->create($content)){
            header('Location: index.php');
            exit;
        }else {
            echo "<p style='color:red;'>Something went wrong. Please try again later.</p>";
        }
    }else {
        echo "<p style='color:red;'>All fields are required.</p>";
    }
}
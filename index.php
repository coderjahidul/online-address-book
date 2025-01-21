<?php 
require_once "vendor/autoload.php";
use App\Models\AddressBook;
$addressBook = new AddressBook();
$contacts = $addressBook->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Address Book</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
        <h1>Online Address Book</h1>
        <form action="add_contact.php" method="post" class="contact-form">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Add Contact</button>
        </form>
        <div class="contacts">
            <h2>Contact List</h2>
            <ul>
                <?php foreach ($contacts as $id => $contact): ?>
                    <li>
                        <span><strong>Name:</strong> <?= htmlspecialchars($contact['name']) ?></span>
                        <span><strong>Phone:</strong> <?= htmlspecialchars($contact['phone']) ?></span>
                        <span><strong>Email:</strong> <?= htmlspecialchars($contact['email']) ?></span>
                        <a href="edit_contact.php?id=<?= $id ?>">Edit</a> |
                        <a href="delete_contact.php?id=<?= $id ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 80%;
    max-width: 600px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #333;
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.contact-form input, .contact-form button {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.contact-form button {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.contact-form button:hover {
    background-color: #0056b3;
}

.contacts {
    margin-top: 20px;
}

.contacts ul {
    list-style: none;
    padding: 0;
}

.contacts li {
    padding: 10px;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.contacts li span {
    display: block;
}

.contacts li a {
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
}

.contacts li a:hover {
    text-decoration: underline;
}
    </style>
</body>
</html>

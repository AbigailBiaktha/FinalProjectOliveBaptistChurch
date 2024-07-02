<?php
require_once("logic/contact/getmessages.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="css/userlist.css">
    <style>
        .btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-sm {
            font-size: 12px;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
        }

        .btn-primary {
            background-color: #337ab7;
            color: white;
        }

        .action-buttons {
            display: flex;
        }
    </style>
</head>
<body>
<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h2>Contact Messages</h2>
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th style="width: 40%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $messages = getContactMessages(); 
                        if (!empty($messages)) : ?>
                            <?php foreach ($messages as $message) : ?>
                                <tr id="messageRow<?= htmlspecialchars($message['id']); ?>">
                                    <td><?= htmlspecialchars($message["name"]); ?></td>
                                    <td><?= htmlspecialchars($message["email"]); ?></td>
                                    <td><?= htmlspecialchars($message["subject"]); ?></td>
                                    <td><?= htmlspecialchars($message["message"]); ?></td>
                                    <td>
                                    <a href="logic/contact/deletemessages.php?id=<?= htmlspecialchars($message['id']); ?>" onclick="return confirm('Are you sure you want to delete this message?')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">No messages found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

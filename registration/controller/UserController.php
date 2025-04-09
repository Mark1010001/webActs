<?php
    require_once "../config/database.php";
    require_once "../model/User.php";

    $db = new Database();
    $conn = $db->getConnection();
    $user = new User($conn);

    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'create':
            $user->create($_POST['lastname'], $_POST['firstname']);
            header("Location: ../index.php");
            break;

        case 'update':
            $user->update($_POST['id'], $_POST['lastname'], $_POST['firstname']);
            header("Location: ../index.php");
            break;

        case 'delete':
            $user->delete($_GET['id']);
            header("Location: ../index.php");
            break;
    }
?>
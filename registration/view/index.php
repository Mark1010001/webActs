<?php
    require_once "../config/database.php";
    require_once "../model/User.php";

    $db = new Database();
    $conn = $db->getConnection();
    $user = new User($conn);
    $stmt = $user->read();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    </head>

    <body class="container mt-5">
        <h2>User List</h2>
        <a href="create.php" class="btn btn-success mb-3">Add New</a>
        <table class="table table-bordered">
            <thead><tr><th>ID</th><th>Lastname</th><th>Firstname</th><th>Actions</th></tr></thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>&lastname=<?= $row['lastname'] ?>&firstname=<?=
                            $row['firstname'] ?>" class="btn btn-primary btn-sm">Edit</a>

                            <a href="../controller/UserController.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-
                            danger btn-sm">Delete</a>

                        </td>
                     </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
</html>
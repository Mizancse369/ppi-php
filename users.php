<?php
require_once 'database/connection.php';

$query = 'SELECT id, email, photo FROM users';
$stmt = $connection->query($query);
$stmt->execute();

$users = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-hovered">
            <thead>
            <tr>
                <td>Serial</td>
                <td>User ID</td>
                <td>Email</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <img src="uploads/profile_photo/<?php echo $user['photo']; ?>"
                             alt="<?php echo $user['email']; ?>" width="150">
                    </td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>"
                           class="btn btn-sm btn-info">
                            Edit
                        </a>

                        <a href="delete_user.php?id=<?php echo $user['id']; ?>"
                           onclick=" return confirm('Are you sure?')"
                           class="btn btn-sm btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

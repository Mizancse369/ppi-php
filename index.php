<?php
$message = false;

if (isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);

    if (!empty($_FILES['photo']['tmp_name'])) {
        $name = $_FILES['photo']['name'];
        $filename_parts = explode('.', $name);
        $extension = end($filename_parts);
        $new_filename = uniqid('pp_', true) . time() . '.' . $extension;

        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/profile_photo/' . $new_filename);
    }
    $photo = $new_filename;

    require_once 'database/connection.php';
    $query = 'INSERT INTO users (`first_name`, `last_name`, `username`, `email`, `password`, `photo`, `email_verification_token`, `email_verified_at`, `active`, `role`) VALUES (:first_name, :last_name, :username, :email, :password, :photo, :email_verification_token, :email_verified_at, :active, :role)';
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindValue(':email_verification_token', '');
    $stmt->bindValue(':email_verified_at', date('Y-m-d'));
    $stmt->bindValue(':active', 1);
    $stmt->bindValue(':role', 'admin');
    $response = $stmt->execute();

    if ($response) {
        $message = 'Registration successful.';
    } else {
        $message = 'Registration unsuccessful.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php if ($message): ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form class="form-signin" action="" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
        <label for="inputFirstName" class="sr-only">First Name</label>
        <input type="text" id="inputFirstName" class="form-control" name="first_name" placeholder="First Name" required>

        <label for="inputLastName" class="sr-only">Last Name</label>
        <input type="text" id="inputLastName" class="form-control" name="last_name" placeholder="Last Name" required>

        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

        <label for="inputPhoto" class="sr-only">Photo</label>
        <input type="file" name="photo" class="form-control" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
</div>
</body>
</html>

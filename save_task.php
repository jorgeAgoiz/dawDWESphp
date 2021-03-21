<?php
require("db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Something went wrong!";
        echo mysqli_error($conn);
    }

    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

<?php

require("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_GET['id'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'info';

    header("Location: index.php");
}

?>

<?php require("./includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Update Title" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description">
                            <?php echo $description; ?>
                        </textarea>
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("./includes/footer.php") ?>
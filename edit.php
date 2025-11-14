<?php 
require "config.php";

if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo set title='$title',description='$desc' WHERE id ='$id' ");
    $result = $pdostatement->execute();
     if($result) {
    echo "<script>alert('todo is edited');window.location.href=`index.php`</script>";
   }
}
else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit New</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <div class="card">

        <div class="card-body">
            <h2>Edit new todo</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result['0']['id'] ?>">
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result['0']['title']  ?>" required>

                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                <textarea type="text" class="form-control" rows="8" cols="80" name="description"><?php echo $result['0'] ['description'] ?>
</textarea> </div>
<br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name=""  value="Edit">
                <a type="button" href="index.php" class="btn btn-warning" name="" value= "Back">Back</a>
                </div>

            </form>

        </div>
    </div>
</body>
</html>
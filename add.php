<?php

require "config.php";

if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

   $sql = "INSERT INTO todo(title,description) VALUES (:title, :description)";
   $pdostatement = $pdo->prepare($sql);
 $result = $pdostatement-> execute(
    array(
        ':title'=> $title,
        ':description'=>$desc
    )
    );
   
   if($result) {
    echo "<script>alert('New todo is add');window.location.href=`index.php`</script>";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <div class="card">

        <div class="card-body">
            <h2>create new todo</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>

                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                <textarea type="text" class="form-control" rows="8" cols="80" name="description">
</textarea> </div>
<br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name=""  value="Summit">
                <a type="button" href="index.php" class="btn btn-warning" name="" value= "Back">Back</a>
                </div>

            </form>

        </div>
    </div>
</body>
</html>
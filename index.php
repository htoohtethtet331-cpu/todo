<?php
require 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo order by id desc");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
<div>
                <a href="add.php" type='button' class="btn btn-success">Create New</a>

</div><br>
            <table class = "table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if($result){
                    foreach($result as $value){
                        
                    
                ?>
                 <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description']?></td>
                    <td><?php  echo date("d-m-y",strtotime($value['created_at']))?></td>
                    <td>
                    <a type="button" class ="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>" >Edit</a>
                    <a type="button" class = "btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>" >Delete</a>

                    </td>
                </tr>
               <?php
               $i++;
               }
                }
               
               ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
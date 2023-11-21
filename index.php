<?php
include("db.php");

?>
<?php include("includes/header.php"); 
?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message']))  { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION ['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();}  //session_unset(); borra los datos en session?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        
                        <div class="form-group mt-2">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <input type="submit" class="btn btn-success" name="save_task" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Title</th>
                                <th>Descripcion</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM task";
                            $resultados_tareas = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($resultados_tareas)){ ?>
                                <tr>
                                    <td> <?php echo $row['title'] ?> </td>
                                    <td> <?php echo $row['description'] ?> </td>
                                    <td> <?php echo $row['created-at'] ?> </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']?>"><button class="btn btn-warning">editar</button></a>
                                        <a href="delete_task.php?id=<?php echo $row['id']?>"> <button class="btn btn-danger">eliminar</button></a>
                                    </td>
                                    

                                </tr>
                                
                           <?php } ?>
                        </tbody>
                        
                    </table>
            </div>
        </div>
    </div>

<?php include("includes/foother.php");
    //col-md-4 se usa para una columna de 4 o de 8
?>

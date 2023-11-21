<?php 
    include('db.php');
    if(isset($_GET['id'])){
        $id =   $_GET['id'];
        $query = "SELECT * FROM task WHERE id = '$id'";
        $resultado =mysqli_query($conn , $query);
        if(mysqli_num_rows($resultado) ==1){
            $row = mysqli_fetch_array($resultado);
            $title = $row['title'];
            $description = $row['description'];
        }
        if(isset($_POST['update'])){
            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $query ="UPDATE  task SET title = '$title' description = $description WHERE id = '$id'";
            mysqli_query($conn,$query);
            $_SESSION['message'] = 'Tarea Actualizada correctamente';
        $_SESSION['message_type'] ='primary';
            header("Location: index.php");
        }
    }
?>

<?php include("includes/header.php"); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control mb-2" placeholder="Actualiza el titulo">
                            <textarea name="description" rows="2" class="form-control mb-2" placeholder="Actualiza la descripción"><?php echo $description; ?></textarea>
                        </div>
                        <button name="update" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/foother.php");?>
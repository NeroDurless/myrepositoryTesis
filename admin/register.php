<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('scripts.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <div class="modal-body">

            <div class="form-group">
                <label> Nombre </label>
                <input type="text" name="Nom" class="form-control" placeholder="Ingrese Nombre...">
            </div>
            
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="Ape" class="form-control" placeholder="Ingrese Apellido...">
            </div>
            
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="Dir" class="form-control" placeholder="Ingrese Dirección...">
            </div>
            
            <div class="form-group">
                <label>Edad</label>
                <input type="text" name="Eda" class="form-control" placeholder="Ingrese Edad....">
            </div>
            
            <div class="form-group">
                <label>Sexo</label>
                <input type="text" name="Sex" class="form-control" placeholder="Ingrese Sexo...">
            </div>
        
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name='cr' id='cr' class="btn btn-primary">Guardar</button>
        </div>
        
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Agregar Nuevo Paciente 
            </button>
    </h6>
  </div>

  <div class="card-body">
  
  <?php
		if(isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
			echo '<h2> '.$_SESSION['success'].' </h2>';
			unset ($_SESSION['success']);
		}
		
		if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		{
			echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
			unset ($_SESSION['status']);
		}
?>

    <div class="table-responsive">
    
    
 <?php 
	  
	  
	  	$connection = mysqli_connect("localhost","root", "",  "pruebas");

		$query = "SELECT * FROM DATOS_PERSONAS";
		
		$query_run = mysqli_query($connection, $query);

	  
	  ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th>Apellido </th>
            <th>Dirección</th>
            <th>Edad </th>
            <th>Sexo</th>
            <th>Editar </th>
            <th>Eliminar </th>
          </tr>
        </thead>
        <tbody>
     
     
     
      <?php
 
			if(mysqli_num_rows($query_run) > 0)
		{
		
			while($row = mysqli_fetch_assoc($query_run))
			{
		?>
          <tr>
  	  <td><?php echo $row['Id'];?> </td>
      <td><?php echo $row['Nombre'];?> </td>
      <td><?php echo $row['Apellido'];?> </td>
      <td><?php echo $row['Direccion'];?> </td>
      <td><?php echo $row['Edad'];?> </td>
      <td><?php echo $row['Sexo'];?> </td>
            <td>

            
                <form action="register_edit.php" method="post" >
                    <input type="hidden" name="edit_id" value="<?php echo $row['Id'];?>" >
                    <button type="submit" name="edit_btn" class="btn btn-success"> Editar</button>
                     
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Eliminar</button>
                 
                </form>
            </td>
          </tr>
          
                      
               <?php
			}
		
		
		}
		else
		{
			echo "Info no encontrada";
			}
	?>
  
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?>
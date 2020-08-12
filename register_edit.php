<?php
include('includes/header.php'); 
include('includes/navbar.php');
include('scripts.php');
?>

<div class="container-fluid">

<div class= "card shadow mb-4">
  <div class= "card-header mb-4">
    <h6 class= "n-0 font-weight-bold text-primary">Editar Información de Paciente</h6>
</div>
<div class= "card-body">


      
      
       <?php
	  
	  $connection = mysqli_connect("localhost","root", "",  "pruebas");
	  
      	if(isset($_POST['edit_btn']))
		{
		
			$id = $_POST['edit_id'];
			
			
		$query = "SELECT * FROM DATOS_PERSONAS WHERE Id='$id'";
		$query_run = mysqli_query($connection, $query);
		
		
		foreach($query_run as $row)

{
			
      ?>
      
      
      <form action="scripts.php" method="post" >
      
      
      <input type="hidden" name="edit_Id" value="<?php echo $row['Id'];?>"></td>
      
            <div class="form-group">
                <label> Nombre </label>
                <input type="text" name="edit_Nom" value="<?php echo $row['Nombre'];?>" class="form-control" placeholder="Ingrese Nombre...">
            </div>
            
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="edit_Ape" value="<?php echo $row['Apellido'];?>" class="form-control" placeholder="Ingrese Apellido...">
            </div>
            
            <div class="form-group">
                <label>Cédula</label>
                <input type="text" name="edit_Ced" value="<?php echo $row['Cedula'];?>" class="form-control" placeholder="Ingrese Cédula...">
            </div>
            
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="edit_Ema" value="<?php echo $row['Correo'];?>" class="form-control" placeholder="Ingrese Correo electrónico...">
            </div>
            
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="edit_Dir" value="<?php echo $row['Direccion'];?>" class="form-control" placeholder="Ingrese Dirección...">
            </div>
            
            <div class="form-group">
                <label>Edad</label>
                <input type="text" name="edit_Eda" value="<?php echo $row['Edad'];?>" class="form-control" placeholder="Ingrese Edad....">
            </div>
            
            <div class="form-group">
                <label>Sexo</label>
                <input type="text" name="edit_Sex" value="<?php echo $row['Sexo'];?>" class="form-control" placeholder="Ingrese Sexo...">
            </div>
            
            <div class="form-group">
                <label>Historia médica</label>
                <textarea type="text" name="edit_His" value="<?php echo $row['Historia'];?>" class="form-control" placeholder="Ingrese breve Historia médica..."></textarea>
            </div>
            
            <a href="register2.php" class="btn btn-danger pull-left" role="button"> Cancelar</a>
         <button type="submit" name="updatebtn" class="btn btn-primary"> Actualizar</button>

  </form>

     <?php      
      }
 }

 ?>  


    

    </div>
  </div>
</div>

</div>






<?php
include('includes/footer.php');
?>
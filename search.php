<?php
include('includes/header.php'); 
include('includes/navbar.php');
include('scripts.php');
?>


<div class="container-fluid">

  <?php
		if(isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
			echo '<h2 class="bg-primary"> '.$_SESSION['success'].' </h2>';
			unset ($_SESSION['success']);
		}
		
		if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		{
			echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
			unset ($_SESSION['status']);
		}
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
  
        <h6 class= "n-0 font-weight-bold text-primary"></h6>
      <div align="left"><span class="n-0 font-weight-bold text-primary">Búsqueda de Pacientes</span>
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
 <?php 
	  	$connection = mysqli_connect("localhost","root", "",  "pruebas");

		       
		 @$busqueda=$_GET["buscar"];  
			
		$query = "SELECT * FROM DATOS_PERSONAS WHERE CEDULA='$busqueda'";
		$query_run = mysqli_query($connection, $query);
	  ?>  
  
  
  
          <!-- Topbar Search -->
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-1 big" name="buscar" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
              
                <button class="btn btn-primary" type="submit" name="searchdata">
                  <i class="fas fa-search fa-sm"></i>
                </button>
                
              </div>
            </div>
          </form>
          
    
          
          
    </h6>
  </div>

  <div class="card-body">
  


    <div class="table-responsive">
    
    
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th>Apellido </th>
            <th>Cédula </th>
            <th>Correo </th>
            <th>Dirección</th>
            <th>Edad </th>
            <th>Sexo</th>
            <th>Historia médica</th>
          </tr>
        </thead>
        <tbody>
     
     
     
      <?php
 
		foreach($query_run as $row):


			
      ?>
		
          <tr>
  	  <td><?php echo $row['Id'];?> </td>
      <td><?php echo $row['Nombre'];?> </td>
      <td><?php echo $row['Apellido'];?> </td>
      <td><?php echo $row['Cedula'];?> </td>
      <td><?php echo $row['Correo'];?> </td>
      <td><?php echo $row['Direccion'];?> </td>
      <td><?php echo $row['Edad'];?> </td>
      <td><?php echo $row['Sexo'];?> </td>
      <td><?php echo $row['Historia'];?> </td>
            
          </tr>
          
                      
     <?php      
      endforeach;


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
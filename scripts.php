  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- New scripts -->  

  <script src="vendor/js/jquery.min.js"></script>
  <script src="vendor/js/moment.min.js"></script>
  
  
<script src="vendor/js/fullcalendar.min.js"></script>
<script src="vendor/js/es.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/js/bootstrap-clockpicker.js"></script>
<link href="css/bootstrap-clockpicker.css" rel="stylesheet">




<?php


//*****************************INICIO DE LA BD*****************************//
	try{
		$base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET UTF8");
		
		}catch(Exception $e){
			
			die('Error: ' . $e->getMessage());
			echo "Línea del error: " . $e->getLine();
			error_reporting(E_ALL ^ E_NOTICE);
}
//*****************************INICIO DE LA BD*****************************//

//*****************************INICIO DE LA BD*****************************//

	$registros=$base->query("SELECT * FROM DATOS_PERSONAS")->fetchAll(PDO::FETCH_OBJ);
	$registroscitas=$base->query("SELECT * FROM DATOS_CITAS")->fetchAll(PDO::FETCH_ASSOC);

	//Dentro de la variable $registros tengo un Array de objetos

	if(isset($_POST["cr"]))
		{	
			$Nom=$_POST["Nom"];
			$Ape=$_POST["Ape"];
			$Ced=$_POST["Ced"];
			$Ema=$_POST["Ema"];
			$Dir=$_POST["Dir"];
			$Eda=$_POST["Eda"];
			$Sex=$_POST["Sex"];
			$His=$_POST["His"];

			
			$sql="INSERT INTO DATOS_PERSONAS (NOMBRE, APELLIDO, CEDULA, CORREO, DIRECCION, EDAD, SEXO, HISTORIA) VALUES (:nom, :ape, :ced, :ema, :dir, :eda, :sex, :his)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":nom"=>$Nom, ":ape"=>$Ape, ":ced"=>$Ced,
			 ":ema"=>$Ema, ":dir"=>$Dir, ":eda"=>$Eda, ":sex"=>$Sex, ":his"=>$His));
	    }	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	  	$connection = mysqli_connect("localhost","root", "",  "pruebas");
	
	
		if(isset($_POST["updatebtn"]))
		{          
		    $Id=$_POST["edit_Id"];      
			$Nom=$_POST["edit_Nom"];
			$Ape=$_POST["edit_Ape"];
			$Ced=$_POST["edit_Ced"];
			$Ema=$_POST["edit_Ema"];
			$Dir=$_POST["edit_Dir"];
			$Eda=$_POST["edit_Eda"];
			$Sex=$_POST["edit_Sex"];
			$His=$_POST["edit_His"];
			
		$query = "UPDATE DATOS_PERSONAS SET Nombre='$Nom', Apellido='$Ape',Cedula='$Ced',Correo='$Ema',Direccion='$Dir',Edad='$Eda',Sexo='$Sex,Historia='$His' WHERE Id='$Id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your data is update";
			header("location:register2.php");

			}
	else
	{
			$_SESSION['status'] = "Your data is NO update";
			header("location:register2.php");

			}

		}
		
		
		if(isset($_POST["delete_btn"]))
		{          
		    $Id=$_POST["delete_id"];   
			
		$query = "DELETE FROM DATOS_PERSONAS WHERE Id='$Id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Usuario Eliminado Correctamente";
			header("location:register2.php");

			}
	else
	{
			$_SESSION['status'] = "El Usuario no ha podido ser Eliminado";
			header("location:register2.php");

			}

		}
		
		
		
		
		
	

		
		
				

?>
		









<?php /*?><?php $connection = mysqli_connect("mysql:host=localhost; dbname=pruebas", "root", "");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['usu'];
    $password = $_POST['password'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
    }

}?><?php */?>


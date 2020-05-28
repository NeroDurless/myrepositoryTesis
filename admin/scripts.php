  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


<?php

	try{
		$base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET UTF8");
		
		}catch(Exception $e){
			
			die('Error: ' . $e->getMessage());
			echo "Línea del error: " . $e->getLine();
			error_reporting(E_ALL ^ E_NOTICE);
}

	$registros=$base->query("SELECT * FROM DATOS_PERSONAS")->fetchAll(PDO::FETCH_OBJ);
	//Dentro de la variable $registros tengo un Array de objetos

	if(isset($_POST["cr"]))
		{	
			$Nom=$_POST["Nom"];
			$Ape=$_POST["Ape"];
			$Dir=$_POST["Dir"];
			$Eda=$_POST["Eda"];
			$Sex=$_POST["Sex"];
			
			$sql="INSERT INTO DATOS_PERSONAS (NOMBRE, APELLIDO, DIRECCION, EDAD, SEXO) VALUES (:nom, :ape, :dir, :eda, :sex)";
			
			$resultado=$base->prepare($sql);
			
			$resultado->execute(array(":nom"=>$Nom, ":ape"=>$Ape, ":dir"=>$Dir, ":eda"=>$Eda, ":sex"=>$Sex));
			
			
	    }	
		
	
	  	$connection = mysqli_connect("localhost","root", "",  "pruebas");
	
	
		if(isset($_POST["updatebtn"]))
		{          
		    $Id=$_POST["edit_Id"];      
			$Nom=$_POST["edit_Nom"];
			$Ape=$_POST["edit_Ape"];
			$Dir=$_POST["edit_Dir"];
			$Eda=$_POST["edit_Eda"];
			$Sex=$_POST["edit_Sex"];
			
		$query = "UPDATE DATOS_PERSONAS SET Nombre='$Nom', Apellido='$Ape',Direccion='$Dir',Edad='$Eda',Sexo='$Sex' WHERE Id='$Id'";
		$query_run = mysqli_query($connection, $query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your data is update";
			header("location:register.php");

			}
	else
	{
			$_SESSION['status'] = "Your data is NO update";
			header("location:register.php");

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


<?php
include('scripts.php');
include('includes/header.php'); 
include('includes/navbar.php');

?>



<div class="container-fluid">


<div class= "card shadow mb-4">
  <div class= "card-header mb-4">
    <h6 class= "n-0 font-weight-bold text-primary">Registro de Citas</h6>
</div>
<div class= "card-body">






<div class="col-12"></div>
<div class="col-12"> <div id="calendar"></div></div>
<div class="col-12"></div>


<!--MODAL AGREGAR, MODIFICAR, ELIMINAR-->

<div class="modal fade" id="addcita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      

        <div class="modal-body">
        
            <div class="form-group col-md-8">
                <input type="hidden" id="txtId" name="txtId" class="form-control" placeholder="Id...">
            </div>
        
       
         <div class="form-group">
                <input type="hidden" id="txtFecha" name="txtFecha" class="form-control" placeholder="Ingrese Fecha...">
            </div>
            
          <div class="form-row">
            <div class="form-group col-md-8">
                <label> Título </label>
                <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Ingrese Título...">
            </div>
            
            <div class="form-group col-md-4">
                <label>Hora</label>
                <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="txtHora" name="txtHora" value="10:30" class="form-control" placeholder="Ingrese Hora....">
                </div>
            </div>
         </div>
            
            <div class="form-group">
                <label>Descripción</label>
                <textarea id="txtDescripcion" name="txtDescripcion" rows="3" class="form-control" placeholder="Ingrese Descripción..."></textarea>
            </div>
            
            <div class="form-group">
                <label>Color</label>
                <input type="color" id="txtColor" name="txtColor" value="#ff0000" class="form-control" placeholder="Seleccione un color...">
            </div>
            
            
            
           
        
        </div>
        
       <div class="modal-footer">
            <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
            <button type="button" id="btnModificar" class="btn btn-primary">Modificar</button>
            <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
        

    </div>
  </div>
</div>



<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
		
		
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
	  
	  dayClick: function(date, jsEvent, view) {
		  
		    $('#btnAgregar').prop("disabled",false);
			$('#btnModificar').prop("disabled",true);
			$('#btnEliminar').prop("disabled",true);
	
	LimpiarFormulario();
	
	$('#txtDescription').val(date.format());
	$('#txtFecha').val(date.format());
	$("#addcita").modal();

  },
	  
      defaultDate: '2020-06-01',
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
	  events: 'http://localhost/myrepositoryTesis/citas.php',
//     events: 'http://localhost/lara/ALL/Sistema%20BKS/myrepositoryTesis/citas.php',
	  
  eventClick: function(calEvent, jsEvent, view) {
	  
	  		 $('#btnAgregar').prop("disabled",true);
			$('#btnModificar').prop("disabled",false);
			$('#btnEliminar').prop("disabled",false);
		   
		$('#exampleModalLabel').html(calEvent.title);

		$('#txtDescripcion').val(calEvent.description);
		$('#txtId').val(calEvent.id);
		$('#txtTitulo').val(calEvent.title);
		$('#txtColor').val(calEvent.color);
		
		FechaHora= calEvent.start._i.split(" ");
		$('#txtFecha').val(FechaHora[0]);
		$('#txtHora').val(FechaHora[1]);
	
	    $("#addcita").modal();
 	 },
	 editable:true,
	 eventDrop:function(calEvent){
		 
		$('#txtId').val(calEvent.id);
		$('#txtTitulo').val(calEvent.title);
		$('#txtColor').val(calEvent.color);
		$('#txtDescripcion').val(calEvent.description);
		
		var FechaHora= calEvent.start.format().split("T");
		$('#txtFecha').val(FechaHora[0]);
		$('#txtHora').val(FechaHora[1]);
		
	   RecolectarDatosGUI();
	   EnviarInformacion('modificar', NuevoEvento,true);		

}


	 
	 
	 
	 
	 
	 
	 
	 
});
	  

  });
</script>

<script>
var NuevoEvento;

   $("#btnAgregar").click(function() {
	RecolectarDatosGUI();
   EnviarInformacion('agregar', NuevoEvento);
    });
	
	$("#btnEliminar").click(function() {
	RecolectarDatosGUI();
   EnviarInformacion('eliminar', NuevoEvento);
    });
	
	$("#btnModificar").click(function() {
	RecolectarDatosGUI();
   EnviarInformacion('modificar', NuevoEvento);
    });
	
	function RecolectarDatosGUI()
		{
			NuevoEvento= 
			{
				id:$('#txtId').val(),
				title:$('#txtTitulo').val(),
				start: $("#txtFecha").val()+" "+$("#txtHora").val(),
				color: $("#txtColor").val(),
				description: $("#txtDescripcion").val(),
				textColor: "#FFFFFF",
				end:$("#txtFecha").val()+" "+$("#txtHora").val(),
			};
		}
		
		function EnviarInformacion(accion, objEvento){
			$.ajax({

					type: 'POST',
					url:'citas.php?accion='+accion,
					data:objEvento,
					
					success:function(msg)
					{
						if(msg)
						{
							$("#calendar").fullCalendar('refetchEvents');
							
							if(!modal){
							$("#addcita").modal('toggle');
							}
						}
					},
					
					error:function()
						{
							alert("Hay un error...");
						}

			});
		}
		
		
$('.clockpicker').clockpicker();

function LimpiarFormulario(){
	
		$('#txtId').val('');
		$('#txtTitulo').val('');
		$('#txtColor').val('');
		$('#txtDescripcion').val('');
	
	
	
}
		
		
</script>






    </div>
  </div>
</div>

</div>



<?php
include('includes/footer.php');
?>
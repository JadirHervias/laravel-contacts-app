<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Agenda de Contactos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Agenda de <b>Contactos</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Contacto</span></a>				
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Direcci&oacute;n</th>
							<th>Tel&eacute;fono</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
            <!-- <tr>
							<td>1</td>
							<td>Jadir Hervias</td>
							<td>jadirhervias@gmail.com</td>
							<td>Av. Lima 123</td>
							<td>928341233<td>
							<td>
								<a href="#editEmployeeModal"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
							</td>
						</tr> -->
            @forelse ($contacts as $contact)
              <tr>
                <td>
                </td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>
                  <a id="editContact" data-id="{{ $contact->id }}" href="#editEmployeeModal"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                  <a id="deleteContact" data-id="{{ $contact->id }}" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                </td>
              </tr>
            @empty
              <tr class="text-center">  
                <td>No hay contactos que mostrar</td>
              </tr>
            @endforelse
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="contactForm">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Contacto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                    <div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input id="name" mame="name" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="email" mame="email" type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Direcci&oacute;n</label>
							<textarea id="address" mame="address" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Tel&eacute;fono</label>
							<input id="phone_number" mame="phone_number" type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input id="btnSave" type="submit" class="btn btn-success" value="Agregar">
					</div>
				</form>
			</div>
		</div>
    </div>
    
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Editar Contacto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="contactId" id="contactId" />
						<div class="form-group">
							<label>Nombre</label>
							<input id="contactName" type="text" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="contactEmail" type="email" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Direcci&oacute;n</label>
							<input id="contactAddress" type="text" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Tel&eacute;fono</label>
							<input id="contactPhoneNumber" type="text" class="form-control" required />
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar" />
						<input type="submit" class="btn btn-info" value="Guardar" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Contacto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Est&aacute; seguro que desea eliminar este contacto?</p>
						<p class="text-warning"><small>Esta acci&oacute;n es permanente</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function () {
				// $.ajaxSetup({
				// 		headers: {
				// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				// 		}
				// });

				$('body').on('click', '#editContact', function () {
					var contactId = $(this).data('id');
					$.post("{{ route('contacts.index') }}", function (data) {
							$('#contactId').val(data.id);
							$('#contactName').val(data.name);
							$('#contactEmail').val(data.email);
							$('#contactAddress').val(data.address);
							$('#contactPhoneNumber').val(data.phone_number);
					})
				});

				$('#btnSave').click(function (e) {
					e.preventDefault();
					$(this).html('Enviando...');
					$.ajax({
						data: $('#contactForm').serialize(),
						headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: "{{ route('contacts.store') }}",
						type: "POST",
						dataType: 'json',
						success: function (data) {
							console.log(data)
							$('#contactForm').trigger("reset");
							// const textDanger = document.querySelectorAll('.text-danger');
							// textDanger.forEach((element) => element.textContent = '');
							// const formControls = document.querySelectorAll('.form-control');
							// formControls.forEach((element) => element.classList.remove('border', 'border-danger'));
							// // document.insertAdjacentHTML('afterend', '<div id="successCrear" class="alert alert-success" role="alert">' + data.success + '</div>');
							// // document.getElementById("successCrear").scrollIntoView();
							// $('#btnGuardar').html('Guardar cambios');
							// $('#ajaxModal').modal('hide');
							// table.draw();
							// $('#notificacion').append('<div id="successNuevaArea" class="alert alert-success" role="alert">' + data.success + '</div>');
							// window.setTimeout(function () { 
							// 		$("#successNuevaArea").alert('close');
							// }, 2000);
						},
						error: function (error) {

							console.log(error)

							// // Capturar los errores
							// const errorMessages = error.responseJSON;
							// const nombreDOM = document.getElementById("nombre");
							// const firstErrorMessage = errorMessages.errors.nombre[0]
							// // dirigirse al mensaje de error
							// nombreDOM.scrollIntoView();
							// // quitar todos los mensajes de error
							// const errors = document.querySelectorAll('.text-danger');
							// errors.forEach((element) => element.textContent = '');
							// // mostrar el mensaje de error
							// nombreDOM.insertAdjacentHTML('afterend', '<div class="text-danger">' + firstErrorMessage + '</div>');
							// // quitar todos los form controls con borde rojo de error
							// const formControls = document.querySelectorAll('.form-control');
							// formControls.forEach((element) => element.classList.remove('border', 'border-danger'));
							// // borde de rojo al form control con error
							// nombreDOM.classList.add('border', 'border-danger');
							// $('#btnGuardar').html('Guardar cambios');
						}
					});
				});
		});
	</script>

</body>
</html>
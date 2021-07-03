<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="./js/jquery.dataTables.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="clientes" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="no-sort" width="5%">ID</th>
							<th class="no-sort" width="35%">Nome</th>
							<th class="no-sort" width="25%">E-mail</th>
							<th class="no-sort" width="25%">CPF</th>
							<th class="no-sort" width="25%">Crédito</th>
							<th class="no-sort" width="15%">Nascimento</th>
							<th class="no-sort" width="10%">Edit</th>
							<th class="no-sort" width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="cliente_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Cliente</h4>
				</div>
				<div class="modal-body">
					<label>Nome</label>
					<input type="text" name="nome" id="nome" class="form-control" />
					<br />
					<label>E-mail</label>
					<input type="text" name="email" id="email" class="form-control" />
					<br />
					<label>CPF</label>
					<input type="text" name="cpf" id="cpf" class="form-control" />
					<br />
					<label>Crédito</label>
					<input type="text" name="credito_liberado" id="credito_liberado" class="form-control" />
					<br />

					<label>Nascimento</label>
					<input type="text" name="nascimento" id="nascimento" class="form-control" />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Adicionar" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#cliente_form')[0].reset();
		$('.modal-title').text("Novo Cliente");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#nascimento').val("");
	});
	
	var dataTable = $('#clientes').DataTable({
		"processing":true,
		"serverSide":true,
		//"order": [[1, 'asc']],
		"order": [],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
/*
	// Desabilitar ordenação
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
      "order": []
    }]
*/
		"columnDefs":[
			{
				"targets":'no-sort',//[0, 3, 4, 5],
				"orderable":false,
			},
		],
	});

	$(document).on('submit', '#cliente_form', function(event){
		event.preventDefault();
		var nome = $('#nome').val();
		var email = $('#email').val();
		var cpf = $('#cpf').val();
		var credito_liberado = $('#credito_liberado').val();
		var nascimento = $('#nascimento').val();
		if(nome != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#cliente_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}else{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#nome').val(data.nome);
				$('#email').val(data.email);
				$('#cpf').val(data.cpf);
				$('#credito_liberado').val(data.credito_liberado);
				$('.modal-title').text("Editar Cliente");
				$('#id').val(id);
				$('#nascimento').val(data.nascimento);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Excluir realmente?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}else{
			return false;	
		}
	});		
});
</script>

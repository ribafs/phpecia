<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
					<button type="button" id="add_button" data-toggle="modal" data-target="#clienteModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="cliente_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th width="30%">Nome</th>
							<th width="25%">E-mail</th>
							<th width="10%">Nascimento</th>
							<th width="10%">CPF</th>
							<th width="10%" class="no-sort">Editar</th>
							<th width="10%" class="no-sort">Excluir</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="clienteModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="cliente_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Cliente</h4>
				</div>
				<div class="modal-body">
					<label>ID</label>
					<input type="text" name="id" id="id" class="form-control" />
					<br />
					<label>Nome</label>
					<input type="text" name="nome" id="nome" class="form-control" />
					<br />
					<label>E-mail</label>
					<input type="email" name="email" id="email" class="form-control" />
					<br />
					<label>Nascimento</label>
					<input type="date" name="nascimento" id="nascimento" class="form-control" />
					<br />
					<label>CPF</label>
					<input type="text" name="cpf" id="cpf" class="form-control" />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#cliente_form')[0].reset();
		$('.modal-title').text("Add Cliente");
		$('#action').val("Add");
		$('#operation').val("Add");
	});
	
	var dataTable = $('#cliente_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
		    {
				"targets":[0, 5, 6],
				"orderable":false,
		    },
		],
            "language": {
                //"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "_START_ a _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
	});

	$(document).on('submit', '#cliente_form', function(event){
		event.preventDefault();
		var id = $('#id').val();
		var nome = $('#nome').val();
		var email = $('#email').val();
		var nascimento = $('#nascimento').val();
		var cpf = $('#cpf').val();
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
					$('#clienteModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
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
				$('#clienteModal').modal('show');
				$('#id').val(data.id);
				$('#nome').val(data.nome);
				$('#email').val(data.email);
				$('#nascimento').val(data.nascimento);
				$('#cpf').val(data.cpf);
				$('.modal-title').text("Edit");
				$('#cliente_id').val(id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
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
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

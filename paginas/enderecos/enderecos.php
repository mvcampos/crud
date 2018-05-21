<?php require_once 'template/header.php'; ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Endereços
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Endereços</li>
			</ol>
		</section>

		<section class="content">

			<div class="msg"></div>

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Lista de Esdereços</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">

					<a href="<?php echo href('enderecos/enderecos-cadastro') ?>" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">
						<i class="fa fa-plus" style="margin-right: 10px;"></i> Adicionar
					</a>

					<table id='data-table' class="table table-bordered table-striped table-condensed">
						<thead>
						<tr>
							<th>CEP</th>
							<th>Logradouro</th>
							<th>Numero</th>
							<th>Bairro</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th width="15%"></th>
						</tr>
						</thead>
						<tbody>
						<?php $query = $db->query('SELECT e.*,c.cidade,es.estado FROM enderecos as e INNER JOIN cidades AS c ON e.idCidade=c.id INNER JOIN estados AS es ON c.idEstado=es.id AND e.idEstado=es.id ORDER BY e.logradouro'); ?>
						<?php while ($row = mysqli_fetch_assoc($query)) { ?>
							<tr>
								<td><?php echo $row['cep'] ?></td>
								<td><?php echo $row['logradouro'] ?></td>
								<td><?php echo $row['numero'] ?></td>
								<td><?php echo $row['bairro'] ?></td>
								<td><?php echo $row['cidade'] ?></td>
								<td><?php echo $row['estado'] ?></td>
								<td>
									<a href="<?php echo href('enderecos/enderecos-cadastro/' . encode($row['id'])) ?>" class="btn btn-info btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="#" id="remover" data-id="<?php echo encode($row['id']) ?>" data-cadastro="<?php echo $row['logradouro'] ?>" class="btn btn-danger btn-sm btn-remover">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

		</section>
	</div>
	<script>
        $('a[id="remover"]').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var cadastro = $(this).data('cadastro');
            $('#cadastro').html(cadastro);
            $('#modal-remover').modal('show');

            $('button[id="confirmar"]').click(function () {

                $('#modal-remover').modal('hide');
                $('.overlay').removeClass('hidden');

                $.get('<?php echo href('enderecos/enderecos-controller/remover-enderecos/') ?>/' + id, function (data) {
                    $('.overlay').addClass('hidden');
                    msg(data[0], data[1]);
                    if (data[0] == 'success') {
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }, 'json');
            });
        });
		$('#buscarCEP').on('click', function () {
			var cep = $('#cep').val();
			cep = cep.replace("-", "");
			$.get( "https://viacep.com.br/ws/"+cep+"/json/" , function(data){
				if(data){
					console.log(data);
				}
			})
		})
	</script>
<?php require_once 'template/footer.php'; ?>
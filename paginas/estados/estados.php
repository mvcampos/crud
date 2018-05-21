<?php require_once 'template/header.php'; ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Estados
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Estados</li>
			</ol>
		</section>

		<section class="content">

			<div class="msg"></div>

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Lista de Estados</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">

					<a href="<?php echo href('estados/estados-cadastro') ?>" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">
						<i class="fa fa-plus" style="margin-right: 10px;"></i> Adicionar
					</a>

					<table id='data-table' class="table table-bordered table-striped table-condensed">
						<thead>
						<tr>
							<th>Estado</th>
							<th>UF</th>
							<th width="15%"></th>
						</tr>
						</thead>
						<tbody>
						<?php $query = $db->query('SELECT * FROM estados ORDER BY estado ASC'); ?>
						<?php while ($row = mysqli_fetch_assoc($query)) { ?>
							<tr>
								<td><?php echo $row['estado'] ?></td>
								<td><?php echo $row['uf'] ?></td>
								<td>
									<a href="<?php echo href('estados/estados-cadastro/' . encode($row['id'])) ?>" class="btn btn-info btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="#" id="remover" data-id="<?php echo encode($row['id']) ?>" data-cadastro="<?php echo $row['estado'] ?>" class="btn btn-danger btn-sm btn-remover">
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

                $.get('<?php echo href('estados/estados-controller/remover-estados/') ?>/' + id, function (data) {
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
	</script>

<?php require_once 'template/footer.php'; ?>
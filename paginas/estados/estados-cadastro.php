<?php require_once 'template/header.php'; ?>

<?php
$id = !empty(get_url(2)) ? decode(get_url(2)) : 0;

if ($id != 0) {
    $query = $db->query("SELECT * FROM estados WHERE id = " . $id);
    $row = mysqli_fetch_assoc($query);
}
?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Estados
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo href('estados/estados') ?>">Estados</a></li>
                <li class="active">Cadastro de Estados</li>
            </ol>
        </section>

        <section class="content">
            <div class="msg"></div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastro de Estado</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <form name="" action="" method="post" autocomplete="off" id="formulario" class="">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Estado <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="estado" id="estado"
                                           value="<?php echo isset($row['estado']) ? $row['estado'] : ''; ?>"
                                           required=""/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>UF <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="uf" id="uf"
                                           value="<?php echo isset($row['uf']) ? $row['uf'] : ''; ?>" required=""/>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">
                                    <i class="fa fa-floppy-o" style="margin-right: 10px;"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
        //Ação para efetuar o cadastro dos dados do usuário
        $('#formulario').submit(function (e) {
            e.preventDefault();
            $(this).ajaxSubmit({
                url: '<?php echo href('estados/estados-controller/estados-cadastro') ?>',
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    msg(data[0], data[1]);
                    if (data[0] == 'success') {
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });
    </script>
<?php require_once 'template/footer.php'; ?>
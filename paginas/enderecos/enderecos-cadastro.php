<?php require_once 'template/header.php'; ?>

<?php
$id = !empty(get_url(2)) ? decode(get_url(2)) : 0;

if ($id != 0) {
    $query = $db->query("SELECT * FROM enderecos WHERE id = " . $id);
    $row = mysqli_fetch_assoc($query);
}
?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Endereços
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo href('enderecos/enderecos') ?>">Endereços</a></li>
                <li class="active">Cadastro de Endereço</li>
            </ol>
        </section>

        <section class="content">
            <div class="msg"></div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastro de Endereço</h3>

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
                                    <select class="form-control" name="idEstado" id="idEstado"  required="">
                                        <option value=""> - Selecione -</option>
                                        <?php $estados = $db->query("SELECT * FROM estados ORDER BY estado ASC") ?>
                                        <?php while ($row_estados = mysqli_fetch_assoc($estados)) { ?>
                                            <option <?php echo isset($row['idEstado']) && $row['idEstado'] == $row_estados['id'] ? ' selected ' : ''; ?> value="<?php echo $row_estados['id'] ?>"><?php echo $row_estados['estado'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Cidade <span class="text-red">*</span></label>
                                    <select class="form-control" name="idCidade" id="idCidade"  required="">
                                        <option value=""> - Selecione -</option>
                                        <?php $cidades = $db->query("SELECT * FROM cidades ORDER BY cidade ASC") ?>
                                        <?php while ($row_cidades = mysqli_fetch_assoc($cidades)) { ?>
                                            <option <?php echo isset($row['idCidade']) && $row['idCidade'] == $row_cidades['id'] ? ' selected ' : ''; ?> value="<?php echo $row_cidades['id'] ?>"><?php echo $row_cidades['cidade'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>CEP <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="cep" id="cep"
                                           value="<?php echo isset($row['cep']) ? $row['cep'] : ''; ?>" required=""/>
                                    <i class="glyphicon glyphicon-search"  id="buscarCEP" style="cursor:pointer"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Logradouro <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro"
                                           value="<?php echo isset($row['logradouro']) ? $row['logradouro'] : ''; ?>"
                                           required=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Numero <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="numero" id="numero"
                                           value="<?php echo isset($row['numero']) ? $row['numero'] : ''; ?>"
                                           required=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento"
                                           value="<?php echo isset($row['complemento']) ? $row['complemento'] : ''; ?>"
                                           required=""/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Bairro <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="bairro" id="bairro"
                                           value="<?php echo isset($row['bairro']) ? $row['bairro'] : ''; ?>"
                                           required=""/>
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
                url: '<?php echo href('enderecos/enderecos-controller/enderecos-cadastro') ?>',
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

        $('#buscarCEP').on('click', function () {
            var cep = $('#cep').val();
            cep = cep.replace("-", "");
            $.get( "https://viacep.com.br/ws/"+cep+"/json/" , function(data){
                if(data){
                    $("#logradouro").val(data.logradouro);
                    $("#complemento").val(data.complemento);
                    $("#bairro").val(data.bairro);
                }
            },'JSON')
        })

        $("#idEstado").on('change',function(){
            var estado = $(this).val();
            if(estado != ''){
                $.get('<?php echo href('enderecos/enderecos-controller/cidades/') ?>'+estado,function(data){
                    var options = "<option value=''>- Selecione -</option>";
                    $.each( data, function( key, value ) {
                        options += "<option value='"+value.id+"'>"+value.cidade+"  </option>";
                    })
                    $('#idCidade').html(options);
                },'JSON')
            }
        })
    </script>
<?php require_once 'template/footer.php'; ?>
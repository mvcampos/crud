<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017</strong>
</footer>
</div>

<div class="modal fade bs-example-modal-sm" id="modal-remover" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Remover Cadastro</h4>
            </div>
            <div class="modal-body">
                <p>Você deseja remover este cadastro?</p>
                <strong id="cadastro"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                    <i class="fa fa-times" style="margin-right: 10px;"></i> Cancelar
                </button>
                <button type="button" id="confirmar" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash" style="margin-right: 10px;"></i> Remover
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo href('assets/') ?>components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo href('assets/components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo href('assets/components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo href('assets/components/morris.js/morris.min.js') ?>"></script>
<script src="<?php echo href('assets/components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo href('assets/components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<script src="<?php echo href('assets/components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo href('assets/components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo href('assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo href('assets/components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') ?>"></script>
<script src="<?php echo href('assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') ?>"></script>
<script src="<?php echo href('assets/components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo href('assets/components/fastclick/lib/fastclick.js') ?>"></script>
<script src="<?php echo href('assets/dist/js/adminlte.min.js') ?>"></script>
<script src="<?php echo href('assets/js/custom.js') ?>"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

</body>
</html>
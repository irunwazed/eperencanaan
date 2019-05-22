<div id="pengaturan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <form class="form-horizontal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="mdi mdi-settings"></i> Pengaturan Password</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group no-margin">
              <label class="col-md-3 control-label">Password Lama</label>
              <div class="col-md-9">
                <input type="password" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">Password Baru</label>
              <div class="col-md-8">
                <input type="password" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">Password Baru (Ulangi)</label>
              <div class="col-md-8">
                <input type="password" class="form-control" id="" name="" required>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>
      </div>
    </div>
    </form>
  </div>
</div><!-- /.modal -->

<footer class="footer text-right">
    <?= date('Y'); ?> © Kabupaten Morowali
    <span style="float: right; color: #7fc1fc;">Version 1.0</span>
</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.min.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/detect.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/fastclick.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.blockUI.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/waves.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.slimscroll.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/plugins/switchery/switchery.min.js"></script>


<!-- Sweet-Alert  -->
<script src="<?=base_url("public/bappeda/")?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
<!-- <script src="<?=base_url("public/bappeda/")?>assets/pages/jquery.sweet-alert.init.js"></script> -->

<!-- App js -->
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.core.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/js/jquery.app.js"></script>

<script src="<?=base_url("public/bappeda/")?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url("public/bappeda/")?>assets/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- init -->
<script src="<?=base_url("public/bappeda/")?>assets/pages/jquery.datatables.init.js"></script>

</body>
</html>
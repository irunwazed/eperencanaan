
<?php include 'header.php'; ?>
<!-- Start content -->
<div class="content">
    <div class="container">

        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">Menyusun Urusan</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">E-Perencanaan</a>
                        </li>

                        <li class="active">
                            Menyusun Urusan
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-color panel-info"> 
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="mdi mdi mdi-apps"></i> Menyusun Urusan</h3>
                    </div>
                    
                    <div class="panel-body text-center">
                                              
<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-check-all"></i>
    <strong>Sukses!</strong> Pesan Sukses.
</div>

<div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-alert"></i>
    <strong>Peringatan!</strong> Pesan Peringatan
</div>

<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-block-helper"></i>
    <strong>Gagal!</strong> Pesan Gagal
</div>

                        <p style="text-align: left; margin-bottom: 10px">
                          <button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-plus"></i> Tambah Data</button>
                        </p>
                        <div>
                        <table id="datatable2" class="table table-colored-bordered table-bordered-info table-hover" style="width: 100%;">
                            <thead>
                              <tr>
                                <th width="15px">Kode</th>
                                <th>Nama Urusan</th>
                                <th width="160px">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                               <tr>
                                <td>1</td>
                                <td>Urusan Wajib Pelayanan Dasar</td>
                                <td>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                  |
                                  <button class="btn btn-danger sa-warning" id=""><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                </td>
                               </tr>

                               <tr>
                                <td>2</td>
                                <td>Urusan Wajib Bukan Pelayanan Dasar</td>
                                <td>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                  |
                                  <button class="btn btn-danger sa-warning" id=""><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                </td>
                               </tr>

                               <tr>
                                <td>3</td>
                                <td>Urusan Pilihan</td>
                                <td>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                  |
                                  <button class="btn btn-danger sa-warning" id=""><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                </td>
                               </tr>

                               <tr>
                                <td>4</td>
                                <td>Urusan Pemerintahan Fungsi Penunjang</td>
                                <td>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#edit-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                  |
                                  <button class="btn btn-danger sa-warning" id=""><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                </td>
                               </tr>
                              
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

</div> <!-- content -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <form>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group no-margin">
              <label for="field-7" class="control-label">Urusan *</label>
              <input type="text" class="form-control" id="" name="" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Tambah Data</button>
      </div>
    </div>
    </form>
  </div>
</div><!-- /.modal -->

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <form>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group no-margin">
              <label for="field-7" class="control-label">Urusan *</label>
              <input type="text" class="form-control" id="" name="" required>
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

<?php include 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable2').dataTable();
    });
    TableManageButtons.init();

      //Warning Message
    $('.sa-warning').click(function () {
        swal({
            title: "Data Akan Dihapus ?",
            text: "Data yang terhapus tidak dapat dikembalikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: "Hapus",
            closeOnConfirm: false
        });
    });
</script>

<?php include 'header.php'; ?>
<!-- Start content -->
<div class="content">
    <div class="container">

        <div class="row">
			<div class="col-xs-12">
				<div class="page-title-box">
                    <h4 class="page-title">PAGU</h4>
                    <ol class="breadcrumb p-0 m-0">
                        <li>
                            <a href="#">E-Perencanaan</a>
                        </li>

                        <li class="active">
                            PAGU
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
			</div>
		</div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-color panel-primary"> 
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="mdi mdi mdi-apps"></i> Menyusun Pagu OPD</h3>
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

                        <p class="" style="font-size: 17px;">
                            RENCANA KERJA PEMERINTAH DAERAH TAHUN NaN (Tahun Berjalan) <button style="float: right;" class="btn btn-custom btn-primary" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Tambah Data</button>
                        </p>
                        <hr>
                        
                        <div style="overflow: auto;">
                        <table id="datatable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                  <th rowspan="3">Nama OPD</th>
                                  <th colspan="2">Tahun 1</th>
                                  <th colspan="2">Tahun 2</th>
                                  <th colspan="2">Tahun 3</th>
                                  <th colspan="2">Tahun 4</th>
                                  <th colspan="2">Tahun 5</th>
                                  <th rowspan="3" style="border-left: 1px solid #fff">Aksi</th>
                                </tr>
                                <tr>
                                  <th colspan="2">PAGU</th>
                                  <th colspan="2">PAGU</th>
                                  <th colspan="2">PAGU</th>
                                  <th colspan="2">PAGU</th>
                                  <th colspan="2">PAGU</th>
                                </tr>
                                <tr>
                                  <th>Sebelum Perubahan</th>
                                  <th>Setelah Perubahan</th>
                                  <th>Sebelum Perubahan</th>
                                  <th>Setelah Perubahan</th>
                                  <th>Sebelum Perubahan</th>
                                  <th>Setelah Perubahan</th>
                                  <th>Sebelum Perubahan</th>
                                  <th>Setelah Perubahan</th>
                                  <th>Sebelum Perubahan</th>
                                  <th>Setelah Perubahan</th>
                                </tr>
                                <tr>
                                  <th>(1)</th>
                                  <th>(2)</th>
                                  <th>(3)</th>
                                  <th>(4)</th>
                                  <th>(5)</th>
                                  <th>(6)</th>
                                  <th>(7)</th>
                                  <th>(8)</th>
                                  <th>(9)</th>
                                  <th>(10)</th>
                                  <th>(11)</th>
                                  <th>(12)</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                               <tr>
                                   <td>Dinas Pendidikan Dan Kebudayaan</td>
                                   <td>5000000000</td>
                                   <td>5000000000213</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>

                                   <td style="text-align: center;">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                    <br><br>
                                    <button class="btn btn-danger sa-warning" id=""><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                   </td>
                               </tr>

                               <tr>
                                   <td>Badan Koordinasi Penanggulangan Bencana Daerah</td>
                                   <td>5000000000</td>
                                   <td>5000000000213</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>
                                   <td>5000000000</td>

                                   <td style="text-align: center;">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal"><i class="mdi mdi-pencil"></i> Edit</button>
                                    <br><br>
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
  <div class="modal-dialog modal-lg">
    <form class="form-horizontal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Tambah Data / Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            <div class="form-group no-margin">
              <label class="col-md-3 control-label">Nama OPD</label>
              <div class="col-md-9">
                <select class="form-control" id="" name="" required>
                  <option value="">-- Pilih OPD --</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 1) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 1) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 2) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 2) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 3) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 3) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 4) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 4) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 5) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 5) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" id="" name="" required>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Data</button>
      </div>
    </div>
    </form>
  </div>
</div><!-- /.modal -->
<?php include 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
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

<?php $this->load->view("include/header"); ?>
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
<?php if(@$this->session->flashdata('msg')['pesan']){ $msg = $this->session->flashdata('msg'); ?>                 
<div class="alert alert-icon alert-<?=$msg['status']?> alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?=$msg['status']=='success'?'<i class="mdi mdi-check-all"></i>':'<i class="mdi mdi-block-helper"></i>'?>
    
    <strong>Sukses!</strong> <?=$msg['pesan']?> 
</div>
<script>
    
</script>
<?php } ?>


                        <p class="" style="font-size: 17px;">
                            RENCANA KERJA PEMERINTAH DAERAH TAHUN NaN (Tahun Berjalan) <button style="float: right;" class="btn btn-custom btn-primary" data-toggle="modal" data-target="#con-close-modal" onclick="create()" ><i class="fa fa-plus"></i> Tambah Data</button>
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
                               <?php foreach($data as $row){ ?>
                               <tr>
                                   <td><?=$row['Nm_Sub_Unit']?></td>
                                   <td><?=$row['tahun1_sebelum']?></td>
                                   <td><?=$row['tahun1_sesudah']?></td>
                                   <td><?=$row['tahun2_sebelum']?></td>
                                   <td><?=$row['tahun2_sesudah']?></td>
                                   <td><?=$row['tahun3_sebelum']?></td>
                                   <td><?=$row['tahun3_sesudah']?></td>
                                   <td><?=$row['tahun4_sebelum']?></td>
                                   <td><?=$row['tahun4_sesudah']?></td>
                                   <td><?=$row['tahun5_sebelum']?></td>
                                   <td><?=$row['tahun5_sesudah']?></td>

                                   <td style="text-align: center;">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" data-id="<?=$row['opd_pagu_id']?>" onclick="edit(this)"><i class="mdi mdi-pencil"></i> Edit</button>
                                    <br><br>
                                    <button class="btn btn-danger sa-warning" data-id="<?=$row['opd_pagu_id']?>"><i class="mdi mdi-delete-forever"></i> Hapus</button>
                                   </td>
                               </tr>
                               <?php } ?>
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
    <form class="form-horizontal" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Tambah Data / Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" name="opd_pagu_id">
            <div class="form-group no-margin">
              <label class="col-md-3 control-label">Nama OPD</label>
              <div class="col-md-9">
                <select class="form-control" name="kode_opd" required>
                  <option value="">-- Pilih OPD --</option>
                  <?php foreach($dataAllOpd as $rowOpd){ ?>
                    <option value="<?=$rowOpd['Kd_Urusan']."-".$rowOpd['Kd_Bidang']."-".$rowOpd['Kd_Unit']."-".$rowOpd['Kd_Sub']?>"><?=$rowOpd['Nm_Sub_Unit']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 1) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun1_sebelum" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 1) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun1_sesudah" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 2) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun2_sebelum" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 2) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun2_sesudah" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 3) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun3_sebelum" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 3) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun3_sesudah" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 4) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun4_sebelum" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 4) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun4_sesudah" required>
              </div>
            </div>
            <hr>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 5) => Sebelum Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun5_sebelum" required>
              </div>
            </div>
            <div class="form-group no-margin">
              <label class="col-md-4 control-label">PAGU (Tahun 5) => Setelah Perubahan</label>
              <div class="col-md-8">
                <input type="number" class="form-control" name="tahun5_sesudah" required>
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
<?php $this->load->view("include/footer"); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
    });
    TableManageButtons.init();
    
      //Warning Message
    $('.sa-warning').click(function () {
        // alert($(this).attr("data-id"))
        let id = $(this).attr("data-id");
        swal({
            title: "Data Akan Dihapus ?",
            text: "Data yang terhapus tidak dapat dikembalikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: "Hapus",
            closeOnConfirm: false
        }, function () {
            $(location).attr("href", "<?=base_url($link.'/delete/')?>"+id);
        });
    });

    function create(){
        $(".form-horizontal").attr("action", "<?=base_url($link.'/create')?>");
    }

    function edit(obj){
        let id = $(obj).attr("data-id");
        $(".form-horizontal").attr("action", "<?=base_url($link.'/update')?>");
        $("input[name^='opd_pagu_id']").val(id);
        getOneData(id);
    }

    function getOneData(id){
        var url = "<?=base_url($link.'/get-data/')?>"+id;
        
        return $.ajax({
			type: "POST",
			url: url,
			dataType: "JSON",
			data: {},
			success: function(respon)
			{   
                setData(respon.data[0]);
                console.log(respon.data[0]);
                // loading(false);
			},
			error:function(error){
                console.log(error);
                // loading(false);
			}
		});
    }

    function setData(data){
        $("input[name^='opd_pagu_id']").val(data.opd_pagu_id);
        $("select[name^='kode_opd']").val(data.Kd_Urusan+"-"+data.Kd_Bidang+"-"+data.Kd_Unit+"-"+data.Kd_Sub);
        $("input[name^='tahun1_sebelum']").val(data.tahun1_sebelum);
        $("input[name^='tahun1_sesudah']").val(data.tahun1_sesudah);
        $("input[name^='tahun2_sebelum']").val(data.tahun2_sebelum);
        $("input[name^='tahun2_sesudah']").val(data.tahun2_sesudah);
        $("input[name^='tahun3_sebelum']").val(data.tahun3_sebelum);
        $("input[name^='tahun3_sesudah']").val(data.tahun3_sesudah);
        $("input[name^='tahun4_sebelum']").val(data.tahun4_sebelum);
        $("input[name^='tahun4_sesudah']").val(data.tahun4_sesudah);
        $("input[name^='tahun5_sebelum']").val(data.tahun5_sebelum);
        $("input[name^='tahun5_sesudah']").val(data.tahun5_sesudah);
    }

</script>

  ///////////////////////////////////////////////// SETTING ///////////////////////////////////////////  
    var link = 'opd/menyusun/renstra-kab';
    var dataAll;
    var dataPilih = {};

    var dataTable = {
        judul: "Menyusun Renstra Kabupaten",
    };
    var dataForm = [];
    
    $("#component").show();
    $(document).ready( function() {
        $("#judul-modal").text(dataTable.judul);  
        $("#judul-page").text(dataTable.judul);  
        createHeadTable();
        setForm();
        getData();
        loading(false);
    });

    // load data (auto muncul ketika masuk ke fungsi getData())
    function setDataAll(respon){
        dataAll = respon.data;
        inputData(respon.data);
    }

    // tambah data di table
    function inputData(data){
        $("#dataTable").empty();
        data.forEach(element => {
            let row = "<tr id='row"+element[dataForm[0].name]+"'>";
            no = 1;
            if(element.Kd_Keg == ""){
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td colspan='24'></td>";
            }else{
                
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+(parseInt(element[dataForm[15].name])+parseInt(element[dataForm[18].name])+parseInt(element[dataForm[21].name])+parseInt(element[dataForm[24].name])+parseInt(element[dataForm[27].name]))+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+element[dataForm[no].name]+"</td>"; no++;
                row += "<td>"+
                        '<button class="btn btn-primary waves-effect m-r-20" data-id="'+element[dataForm[0].name]+'" onclick="editRow(this)">Edit</button>'+
                        '<button class="btn btn-danger waves-effect m-r-20" data-id="'+element[dataForm[0].name]+'" onclick="hapusModal(this)">Hapus</button>'+
                    "</td>";
            }
                row += "</tr>";
            $("#dataTable").append(row);
        });
    }

    // buat tag form
    function setForm(){
        dataForm = [
            { status:true, tag: 'hidden', name: "perumusan_program_id", value: "1"}, // sebagai id, harus duluan
            { status:false, tag:'select', name:"tujuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"sasaran_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"indikator_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Kd_Urusan", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Kd_Bidang", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Kd_Unit", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Kd_Sub", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Ket_Program", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Ket_Kegiatan", judul: "", type: "", value: "", viewForm: true },
            { status:false, tag:'select', name:"outcome", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"outcome_kegiatan", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"kondisi_awal", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target1_tahun", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target1_satuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target1_harga", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target2_tahun", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target2_satuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target2_harga", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target3_tahun", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target3_satuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target3_harga", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target4_tahun", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target4_satuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target4_harga", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target5_tahun", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target5_satuan_nama", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"target5_harga", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"akhir_target", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"lokasi", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"lokasi", judul: "", type: "", value: "", viewForm: false },
            { status:false, tag:'select', name:"Nm_Sub_Unit", judul: "", type: "", value: "", viewForm: false },
        ]
        
        dataForm.forEach(element => {
            $("#modal-body").empty();
            if(element.viewForm){
                $("#modal-body").append(form(element));
            }
        });
    }

    // make head table
    function createHeadTable(){
        $("#headTable").empty();
        headTable = '<tr>'+
                        '<th rowSpan="3">Tujuan</th>'+
                        '<th rowSpan="3">Sasaran</th>'+
                        '<th rowSpan="3">Indikator</th>'+
                        '<th rowSpan="3" colSpan="4">Kode</th>'+
                        '<th rowSpan="3">Program</th>'+
                        '<th rowSpan="3">Kegiatan</th>'+
                        '<th rowSpan="2" colSpan="2">Indikator Kinerka (Outcome)</th>'+
                        '<th rowSpan="3">Kondisi Kinerja pada Awal RPJMD (Tahun 0)</th>'+
                        '<th colSpan="17">Capaian Kerja</th>'+
                        '<th rowSpan="3">Lokasi</th>'+
                        '<th rowSpan="3">Penanggung Jawab</th>'+
                        '<th rowSpan="3">Aksi</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<th colSpan="3">{this.rpjmdTahun}</th>'+
                        '<th colSpan="3">{this.rpjmdTahun+1}</th>'+
                        '<th colSpan="3">{this.rpjmdTahun+2}</th>'+
                        '<th colSpan="3">{this.rpjmdTahun+3}</th>'+
                        '<th colSpan="3">{this.rpjmdTahun+4}</th>'+
                        '<th colSpan="2">Kondisi Kinerja Akhir Periode</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<th>Program</th>'+
                        '<th>Kegiatan</th>'+
                        '<th colSpan="2">Target</th>'+
                        '<th>Rp</th>'+
                        '<th colSpan="2">Target</th>'+
                        '<th>Rp</th>'+
                        '<th colSpan="2">Target</th>'+
                        '<th>Rp</th>'+
                        '<th colSpan="2">Target</th>'+
                        '<th>Rp</th>'+
                        '<th colSpan="2">Target</th>'+
                        '<th>Rp</th>'+
                        '<th>Target</th>'+
                        '<th>Rp</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<th>(1)</th>'+
                        '<th>(2)</th>'+
                        '<th>(3)</th>'+
                        '<th colSpan="4">(4)</th>'+
                        '<th colSpan="2">(5)</th>'+
                        '<th colSpan="2">(6)</th>'+
                        '<th>(7)</th>'+
                        '<th colSpan="2">(8)</th>'+
                        '<th>(9)</th>'+
                        '<th colSpan="2">(10)</th>'+
                        '<th>(11)</th>'+
                        '<th colSpan="2">(12)</th>'+
                        '<th>(13)</th>'+
                        '<th colSpan="2">(14)</th>'+
                        '<th>(15)</th>'+
                        '<th colSpan="2">(16)</th>'+
                        '<th>(17)</th>'+
                        '<th>(18)</th>'+
                        '<th>(19)</th>'+
                        '<th>(20)</th>'+
                        '<th>(21)</th>'+
                        '<th></th>'+
                    '</tr>';
         $("#headTable").append(headTable);   
    }
    
    function setData(id = null){
        
        if(id == null){

            //tetap
            dataPilih.session = getCookie('codexv-session');
            dataPilih.rpjmd = getCookie('codexv-rpjmd');


            //otomatis mengisi
            dataForm.forEach(element =>{
                if(element.status)
                    dataPilih[element.name] = $("input[name^='"+element.name+"']").val();
            });
            
            
        }else{
            getDataId(id);
            //manual isi karena berstatus false
            $("select[name^='Nm_Sub_Unit']").val(dataPilih.Kd_Urusan+'-'+dataPilih.Kd_Bidang+'-'+dataPilih.Kd_Unit+'-'+dataPilih.Kd_Sub);
            
            //otomatis mengisi
            dataForm.forEach(element =>{
                if(element.status)
                    $("input[name^='"+element.name+"']").val(dataPilih[element.name]);
            });
        }
        
    }

    // ambil satu data dari dataAll
    function getDataId(id){
        dataAll.forEach(element =>{
            if(element[dataForm[0].name] == id){
                dataPilih = element;
            }
        });
    }

    function getKegiatan(){
        let url = config.apiRoot+'opd/get-data/kegiatan';
        setData();
        console.log(dataPilih);
        // $.when(sendAjax(url, dataPilih)).done(function(a1){
        //     $.when(getData()).done(function(a1){
        //         rowpos = $('#table tr:last').position();
        //         $("html, body").animate({ scrollTop: rowpos.top });
        //     });
        // });
    }

    // tambah proses
    function tambahRow(){
        url = config.apiRoot+link+'/create';
        setData();
        $.when(sendAjax(url, dataPilih)).done(function(a1){
            $.when(getData()).done(function(a1){
                $('#table tr:last').attr("style", "background-color: #CCC");
                rowpos = $('#table tr:last').position();
                $("html, body").animate({ scrollTop: rowpos.top });
            });
        });
    }
    // . tambah proses

    // edit proses
    function editRow(obj){
        let id = $(obj).attr('data-id');
        setData(id);
        $("input[name^='"+dataForm[0].name+"']").val(id);
        $('#modal').modal('show');
    }

    $('#form').submit(function( event ) {
        event.preventDefault();
        setData();
        url = config.apiRoot+link+'/update';
        $.when(sendAjax(url, dataPilih)).done(function(a1){
            $('#modal').modal('hide');
            $.when(getData()).done(function(a1){
                $('#row'+dataPilih[dataForm[0].name]).attr("style", "background-color: #CCC");
                rowpos = $('#row'+dataPilih[dataForm[0].name]).position();
                $("html, body").animate({ scrollTop: rowpos.top });
            });
        });
    });
    // . edit proses

    // hapus proses
    function hapusModal(obj){
        $('#mdModal').modal('show');
        id = $(obj).attr('data-id');
        $("#hapus-data").attr('data-id', id);
    }

    function hapusRow(obj){
        url = config.apiRoot+link+'/delete';
        id = $(obj).attr('data-id');

        dataPilih.session = getCookie('codexv-session');
        dataPilih.rpjmd = getCookie('codexv-rpjmd');
        dataPilih[dataForm[0].name] = id;

        $.when(sendAjax(url, dataPilih)).done(function(a1){
            $.when(getData()).done(function(a1){
                $('#mdModal').modal('hide');
            });
        });
    }
    // . hapus proses

    function getData(page = 1){
        var url = config.apiRoot+link+'/page-'+page;

        loading();
		return $.ajax({
			type: "POST",
			url: url,
			dataType: "JSON",
			data: {
                session: getCookie('codexv-session'),
                rpjmd: getCookie('codexv-rpjmd'), 
			},
			success: function(respon)
			{   
                setDataAll(respon);
                console.log(respon);
                loading(false);
			},
			error:function(error){
                console.log(error);
                loading(false);
			}
		});
    }

    function sendAjax(url, dataKirim){
        loading();
        return $.ajax({
			type: "POST",
			url: url,
			dataType: "JSON",
			data: dataKirim, 
			success: function(respon)
			{   
                if(respon.status){
                    message(respon.pesan);
                }else{
                    message(respon.pesan, "warning");
                }
                console.log(respon);
                loading(false);
			},
			error:function(error){
                console.log(error);
                loading(false);
                message("Gagal Terhubung Pada Server", "danger");
			}
		});
    }

    
    function loading(loading = true){
        if(loading){
            $('#loading').show();
            $('#table').hide();
        }else{
            $('#loading').hide();
            $('#table').show();
        }
        
    }

    function form(data = null){
        
        let tag = {};

        tag['hidden'] = '<input type="hidden" name="'+data.name+'" value="'+data.value+'">';
        tag['input'] = '<div class="row clearfix">'+
                        '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">'+
                            '<label for="email_address_2">'+data.judul+'</label>'+
                        '</div>'+
                        '<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">'+
                            '<div class="form-group">'+
                                '<div class="form-line">'+
                                    '<input type="'+data.type+'" class="form-control" value="'+data.value+'" placeholder="Masukkan '+data.judul+'" name="'+data.name+'"  required autofocus>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        tag['select'] = '<div class="row clearfix">'+
                            '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">'+
                                '<label for="email_address_2">'+data.judul+'</label>'+
                            '</div>'+
                            '<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<select class="form-control show-tick" name="'+data.name+'" value="'+data.value+'" required autofocus>'+
                                            '<option value="">-- Pilih '+data.judul+' --</option>'+
                                        '</select>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

        return tag[data.tag];
    }

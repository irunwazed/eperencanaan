(window.webpackJsonp=window.webpackJsonp||[]).push([[53],{267:function(a,t,e){a.exports=e.p+"static/media/loading.557336d4.gif"},377:function(a,t,e){"use strict";e.r(t);var n=e(274),l=e(85),r=e(86),d=e(88),u=e(87),s=e(89),m=e(90),c=e(1),i=e.n(c),o=e(101),h=e(91),g=e(92),p=e(93),E=e(106),b=e(107),_=e(96),v=e(108),S=e(109),f=e(95),K=e(94),P=e(105),T=e(102),k=e(98),y=e(99),j=e(100),C=e(270),O=e.n(C),A=e(268),D=e(267),U=e.n(D),x=function(a){function t(a){var e;return Object(l.a)(this,t),(e=Object(d.a)(this,Object(u.a)(t).call(this,a))).componentWillMount=function(){e.getData()},e.handleChange=function(a){return function(t){var l=parseInt(t.target.attributes.getNamedItem("data-number").value);if(1===l){var r=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{Kd_Urusan:t.target.value}),e.setState({dataPilih:d}),e.getDataTambahan(d),d)});e.setState({dataAll:r})}if(2===l){var d=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{Kd_Bidang:t.target.value}),e.setState({dataPilih:d}),e.getDataTambahan(d),d)});e.setState({dataAll:d})}if(3===l){var u=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{Kd_Prog:t.target.value}),e.setState({dataPilih:d}),e.getDataTambahan(d),d)});e.setState({dataAll:u})}if(4===l){var s=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{Kd_Keg:t.target.value}),e.setState({dataPilih:d}),d)});e.setState({dataAll:s})}if(5===l){var m=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{outcome:t.target.value}),e.setState({dataPilih:d}),d)});e.setState({dataAll:m})}if(6===l){var c=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(d=Object(n.a)({},l,{outcome_kegiatan:t.target.value}),e.setState({dataPilih:d}),d)});e.setState({dataAll:c})}if(7===l){var i=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_lokasi:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_lokasi:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_lokasi:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_lokasi:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_lokasi:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:i})}if(8===l){var o=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_tahun:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_tahun:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_tahun:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_tahun:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_tahun:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:o})}if(9===l){var h=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_satuan:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_satuan:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_satuan:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_satuan:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_satuan:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:h})}if(10===l){var g=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_harga:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_harga:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_harga:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_harga:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_harga:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:g})}if(11===l){var p=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_sumber_dana:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_sumber_dana:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_sumber_dana:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_sumber_dana:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_sumber_dana:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:p})}if(12===l){var E=e.state.dataAll.map(function(l,r){var d=l;return a!==r?d:(1===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target1_catatan:t.target.value})),2===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target2_catatan:t.target.value})),3===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target3_catatan:t.target.value})),4===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target4_catatan:t.target.value})),5===e.state.dataTambah.tahun&&(d=Object(n.a)({},l,{target5_catatan:t.target.value})),e.setState({dataPilih:d}),d)});e.setState({dataAll:E})}else if(13===l){var b=e.state.dataAll.map(function(l,r){var d=l,u=t.target.value.split("-");return console.log(u[1]),a!==r?d:(d=Object(n.a)({},l,{Kd_Unit:u[0],Kd_Sub:u[1]}),e.setState({dataPilih:d}),d)});e.setState({dataAll:b})}}},e.changePesan=function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"success";null===a?e.setState({pesan:""}):e.setState({pesan:i.a.createElement(o.a,{color:t},a)}),setTimeout(function(){e.setState({pesan:""})},3e3)},e.setData=function(a){a.status&&e.setState({dataAll:a.data,jumlahPage:a.jumlahPage,jumlahAll:a.jumlahAll,dataTambah:a.dataTambah,dataUrusan:a.dataUrusan,dataSatuan:a.dataSatuan}),a.data.length>0?e.rpjmdTahun=parseInt(a.data[0].rpjmd_tahun):e.rpjmdTahun=0,console.log(e.state.dataTambah.tahun)},e.getData=function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;e.setState({loading:!0});var t=new FormData;t.append("session",localStorage.getItem("codexv-session")),t.append("rpjmd",localStorage.getItem("codexv-rpjmd")),t.append("search",e.state.pencarian),O.a.post(A.apiRoot+e.link+"/page-"+a,t).then(function(a){e.setData(a.data),console.log(a),e.setState({loading:!1})}).catch(function(a){console.log(a),e.setState({loading:!1}),e.changePesan("Tidak dapat terhubung pada server!","danger")})},e.getOpd=function(a,t){e.setState({loading:!0});var n=new FormData;n.append("session",localStorage.getItem("codexv-session")),n.append("rpjmd",localStorage.getItem("codexv-rpjmd")),n.append("urusan",a),n.append("bidang",t),O.a.post(A.apiRoot+"rpjmd/get-data/opd",n).then(function(a){a.data.status&&e.setState({dataOpd:a.data.data}),e.setState({loading:!1})}).catch(function(a){console.log(a),e.setState({loading:!1})})},e.getBidang=function(a){e.setState({loading:!0});var t=new FormData;t.append("session",localStorage.getItem("codexv-session")),t.append("urusan",a),O.a.post(A.apiRoot+"rpjmd/get-data/bidang",t).then(function(a){a.data.status&&e.setState({dataBidang:a.data.data}),e.setState({loading:!1})}).catch(function(a){console.log(a),e.setState({loading:!1})})},e.getProgram=function(a,t){e.setState({loading:!0});var n=new FormData;n.append("session",localStorage.getItem("codexv-session")),n.append("urusan",a),n.append("bidang",t),O.a.post(A.apiRoot+"rpjmd/get-data/program",n).then(function(a){a.data.status&&e.setState({dataProgram:a.data.data}),e.setState({loading:!1})}).catch(function(a){console.log(a),e.setState({loading:!1})})},e.getKegiatan=function(a,t,n){e.setState({loading:!0});var l=new FormData;l.append("session",localStorage.getItem("codexv-session")),l.append("urusan",a),l.append("bidang",t),l.append("program",n),O.a.post(A.apiRoot+"opd/get-data/kegiatan",l).then(function(a){a.data.status&&e.setState({dataKegiatan:a.data.data}),e.setState({loading:!1}),console.log(a)}).catch(function(a){console.log(a),e.setState({loading:!1})})},e.handleSubmit=function(){e.setState({loading:!0});var a="";"Edit"===e.state.aksi?a=A.apiRoot+e.link+"/update":"Tambah"===e.state.aksi&&(a=A.apiRoot+e.link+"/create");var t=new FormData;t.append("session",localStorage.getItem("codexv-session")),t.append("rpjmd",localStorage.getItem("codexv-rpjmd")),t.append("perumusan_program_id",e.state.dataPilih.perumusan_program_id),t.append("Kd_Urusan",e.state.dataPilih.Kd_Urusan),t.append("Kd_Bidang",e.state.dataPilih.Kd_Bidang),t.append("Kd_Unit",e.state.dataPilih.Kd_Unit),t.append("Kd_Sub",e.state.dataPilih.Kd_Sub),t.append("Kd_Prog",e.state.dataPilih.Kd_Prog),t.append("Kd_Keg",e.state.dataPilih.Kd_Keg),t.append("outcome",e.state.dataPilih.outcome),t.append("outcome_kegiatan",e.state.dataPilih.outcome_kegiatan),t.append("target"+e.state.dataTambah.tahun+"_lokasi",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_lokasi"]),t.append("target"+e.state.dataTambah.tahun+"_tahun",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_tahun"]),t.append("target"+e.state.dataTambah.tahun+"_satuan",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_satuan"]),t.append("target"+e.state.dataTambah.tahun+"_harga",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_harga"]),t.append("target"+e.state.dataTambah.tahun+"_sumber_dana",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_sumber_dana"]),t.append("target"+e.state.dataTambah.tahun+"_catatan",e.state.dataPilih["target"+e.state.dataTambah.tahun+"_catatan"]),t.append("tahun",e.state.dataTambah.tahun),O.a.post(a,t,{headers:{"Content-Type":"multipart/form-data"}}).then(function(a){a.data.status?(e.modalCreateClose(),e.getData(e.state.page),e.changePesan(a.data.pesan)):e.changePesan(a.data.pesan,"warning"),e.setState({loading:!1}),console.log(a.data)}).catch(function(a){console.log(a),e.setState({loading:!1}),e.changePesan("Tidak dapat terhubung pada server!","danger")})},e.handleDelete=function(){e.setState({loading:!0});var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("rpjmd",localStorage.getItem("codexv-rpjmd")),a.append("perumusan_program_id",e.state.dataPilih.perumusan_program_id),a.append("tahun",e.state.dataTambah.tahun),O.a.post(A.apiRoot+e.link+"/delete",a).then(function(a){a.data.status?(e.getData(e.state.page),e.changePesan(a.data.pesan)):e.changePesan(a.data.pesan,"warning"),e.modalDelete(),e.setState({loading:!1}),console.log(a)}).catch(function(a){console.log(a),e.setState({loading:!1}),e.changePesan("Tidak dapat terhubung pada server!","danger")})},e.handleCariSubmit=function(a){a.preventDefault(),e.getData()},e.changePage=function(a){e.setState({page:a}),e.getData(a)},e.pageNation=function(){var a=[];e.state.page>1?a.push(i.a.createElement(h.a,{onClick:function(){return e.changePage(e.state.page-1)},key:0},i.a.createElement(g.a,{previous:!0,tag:"button"},"Prev"))):a.push(i.a.createElement(h.a,{disabled:!0,key:0},i.a.createElement(g.a,{previous:!0,tag:"button"},"Prev")));for(var t=!1,n=!1,l=function(l){n=t,t=!1,l+2>=e.state.page&&l-2<=e.state.page&&(t=!0),1!==l&&l!==e.state.jumlahPage||(t=!0),t?l===e.state.page?a.push(i.a.createElement(h.a,{active:!0,key:l},i.a.createElement(g.a,{tag:"button"},l))):a.push(i.a.createElement(h.a,{key:l,onClick:function(){return e.changePage(l)}},i.a.createElement(g.a,{tag:"button"},l))):n!==t&&a.push(i.a.createElement(h.a,{key:l,disabled:!0},i.a.createElement(g.a,{tag:"button"},"...")))},r=1;r<=e.state.jumlahPage;r++)l(r);return e.state.page<e.state.jumlahPage?a.push(i.a.createElement(h.a,{onClick:function(){return e.changePage(e.state.page+1)},key:e.state.jumlahPage+2},i.a.createElement(g.a,{next:!0,tag:"button"},"Next"))):a.push(i.a.createElement(h.a,{disabled:!0,key:e.state.jumlahPage+2},i.a.createElement(g.a,{next:!0,tag:"button"},"Next"))),i.a.createElement(p.a,null,a)},e.styleForm={minWidth:300},e.dataPilihAwal={id:0,name:"0",ageid:0},e.state={loading:!1,dataAll:[],jumlahPage:1,modalCreate:!1,modalDelete:!1,modalPesan:!1,dataPilih:e.dataPilihAwal,dataTambah:[],dataOpd:[],dataUrusan:[],dataBidang:[],dataProgram:[],dataKegiatan:[],dataSatuan:[],pencarian:"",page:1,aksi:"Tambah",name:"",age:0,edit:0},document.title="Menyusun RKPD Verifikasi",e.link="opd/menyusun/rkpd-verifikasi",e.modalDelete=e.modalDelete.bind(Object(m.a)(Object(m.a)(e))),e.handlePencarianChange=e.handlePencarianChange.bind(Object(m.a)(Object(m.a)(e))),e}return Object(s.a)(t,a),Object(r.a)(t,[{key:"handlePencarianChange",value:function(a){this.setState({pencarian:a.target.value})}},{key:"modalCreateClose",value:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.setState({modalCreate:!1})}},{key:"modalCreate",value:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];0===a.length?this.setState({dataPilih:this.dataPilihAwal}):(this.setState({dataPilih:a}),console.log(a))}},{key:"modalDelete",value:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];this.setState({modalDelete:!this.state.modalDelete,dataPilih:a})}},{key:"getDataTambahan",value:function(a){this.getBidang(a.Kd_Urusan),this.getOpd(a.Kd_Urusan,a.Kd_Bidang),this.getProgram(a.Kd_Urusan,a.Kd_Bidang),this.getKegiatan(a.Kd_Urusan,a.Kd_Bidang,a.Kd_Prog)}},{key:"tambah",value:function(a){this.setState({dataPilih:a,edit:0,page:this.state.jumlahPage}),this.handleSubmit()}},{key:"edit",value:function(a){this.getDataTambahan(a),0!==this.state.edit&&this.simpan(a),this.setState({dataPilih:a,edit:a.idAll})}},{key:"simpan",value:function(a){this.setState({edit:0,aksi:"Tambah"}),this.handleSubmit(),console.log(this.state.dataPilih)}},{key:"isi",value:function(){var a=this;return this.state.loading?i.a.createElement("div",null,i.a.createElement("img",{src:U.a,alt:"logo"})):i.a.createElement("div",null,this.state.pesan,i.a.createElement(E.a,null,i.a.createElement(b.a,{xs:"128",md:"10"}),i.a.createElement(b.a,{xs:"12",md:"2"})),i.a.createElement(_.a,{responsive:!0,striped:!0,bordered:!0},i.a.createElement("thead",{style:{textAlign:"center",backgroundColor:"#0066ff",color:"white"}},i.a.createElement("tr",null,i.a.createElement("th",{rowSpan:"2",colSpan:"4"},"Kode"),i.a.createElement("th",{rowSpan:"2",colSpan:"4"},"Urusan / Bidang / Program / Kegiatan"),i.a.createElement("th",{colSpan:"2"},"Indikator Kinerka (Outcome)"),i.a.createElement("th",{colSpan:"5"},"Tahun ",this.rpjmdTahun+parseInt(this.state.dataTambah.tahun)-1," (Tahun Berjalan)"),i.a.createElement("th",{rowSpan:"2"},"Catatan Penting"),i.a.createElement("th",{colSpan:"3"},"Tahun ",this.rpjmdTahun+parseInt(this.state.dataTambah.tahun)," (Tahun Berikutnya)"),i.a.createElement("th",{rowSpan:"2"},"OPD"),i.a.createElement("th",{rowSpan:"2"},"Aksi")),i.a.createElement("tr",null,i.a.createElement("th",null,"Program"),i.a.createElement("th",null,"Kegiatan"),i.a.createElement("th",null,"Lokasi"),i.a.createElement("th",{colSpan:"2"},"Target capaian kinerja"),i.a.createElement("th",null,"Kebutuhan Dana/ pagu indikatif (Rp)"),i.a.createElement("th",null,"Sumber Dana"),i.a.createElement("th",{colSpan:"2"},"Target capaian kinerja"),i.a.createElement("th",null,"Kebutuhan Dana/ pagu indikatif (Rp)")),i.a.createElement("tr",null,i.a.createElement("th",{colSpan:"4"},"(1)"),i.a.createElement("th",{colSpan:"4"},"(2)"),i.a.createElement("th",{colSpan:"2"},"(3)"),i.a.createElement("th",null,"(4)"),i.a.createElement("th",{colSpan:"2"},"(5)"),i.a.createElement("th",null,"(6)"),i.a.createElement("th",null,"(7)"),i.a.createElement("th",null,"(8)"),i.a.createElement("th",{colSpan:"2"},"(9)"),i.a.createElement("th",null,"(10)"),i.a.createElement("th",null,"(11)"),i.a.createElement("th",null,"(12)"))),i.a.createElement("tbody",null,this.state.dataAll.map(function(t,e){return t.idAll!==a.state.edit?0===t.Kd_Keg&&0!==t.Kd_Prog?t?i.a.createElement("tr",{key:e},i.a.createElement("td",null,t.Kd_Urusan),i.a.createElement("td",null,t.Kd_Bidang),i.a.createElement("td",null,t.Kd_Prog),i.a.createElement("td",null,t.Kd_Keg),i.a.createElement("td",null,t.Nm_Urusan),i.a.createElement("td",null,t.Nm_Bidang),i.a.createElement("td",null,t.Ket_Program),i.a.createElement("td",null,t.Ket_Kegiatan),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null,i.a.createElement(v.a,{color:"info",onClick:function(){a.setState({aksi:"Tambah"}),a.tambah(t)},className:"mr-1"},"Tambah"))):null:0===t.Kd_Keg?t?i.a.createElement("tr",{key:e},i.a.createElement("td",null,t.Kd_Urusan),i.a.createElement("td",null,t.Kd_Bidang),i.a.createElement("td",null,t.Kd_Prog),i.a.createElement("td",null,t.Kd_Keg),i.a.createElement("td",null,t.Nm_Urusan),i.a.createElement("td",null,t.Nm_Bidang),i.a.createElement("td",null,t.Ket_Program),i.a.createElement("td",null,t.Ket_Kegiatan),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null)):null:t?i.a.createElement("tr",{key:e},i.a.createElement("td",null,t.Kd_Urusan),i.a.createElement("td",null,t.Kd_Bidang),i.a.createElement("td",null,t.Kd_Prog),i.a.createElement("td",null,t.Kd_Keg),i.a.createElement("td",null,t.Nm_Urusan),i.a.createElement("td",null,t.Nm_Bidang),i.a.createElement("td",null,t.Ket_Program),i.a.createElement("td",null,t.Ket_Kegiatan),i.a.createElement("td",null,t.outcome),i.a.createElement("td",null,t.outcome_kegiatan),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_lokasi"]),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_tahun"]),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_satuan_nama"]),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_harga"]),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_sumber_dana"]),i.a.createElement("td",null,t["target"+a.state.dataTambah.tahun+"_catatan"]),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_tahun"]),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_satuan_nama"]),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_harga"]),i.a.createElement("td",null,t.Nm_Sub_Unit),i.a.createElement("td",null,i.a.createElement(v.a,{color:"info",onClick:function(){a.setState({aksi:"Edit"}),a.edit(t)},className:"mr-1"},"Edit"),i.a.createElement(v.a,{color:"danger",onClick:function(){return a.modalDelete(t)},className:"mr-1"},"Hapus"))):null:0===t.Kd_Keg&&0!==t.Kd_Prog?t?i.a.createElement("tr",{key:e},i.a.createElement("td",null,t.Kd_Urusan),i.a.createElement("td",null,t.Kd_Bidang),i.a.createElement("td",null,t.Kd_Prog),i.a.createElement("td",null,t.Kd_Keg),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_harga"],"data-number":"10",onChange:a.handleChange(e)})),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null),i.a.createElement("td",null,i.a.createElement(v.a,{color:"success",onClick:function(){a.simpan(t)},className:"mr-1"},"Simpan"))):null:t?i.a.createElement("tr",{key:e},i.a.createElement("td",null,t.Kd_Urusan),i.a.createElement("td",null,t.Kd_Bidang),i.a.createElement("td",null,t.Kd_Prog),i.a.createElement("td",null,t.Kd_Keg),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t.Kd_Urusan,"data-number":"1",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih Urusan =-"),a.state.dataUrusan.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Urusan},a.Nm_Urusan):null}))),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t.Kd_Bidang,"data-number":"2",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih Bidang =-"),a.state.dataBidang.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Bidang},a.Nm_Bidang):null}))),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t.Kd_Prog,"data-number":"3",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih Program =-"),a.state.dataProgram.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Prog},a.Ket_Program):null}))),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t.Kd_Keg,"data-number":"4",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih Kegiatan =-"),a.state.dataKegiatan.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Keg},a.Ket_Kegiatan):null}))),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t.outcome,"data-number":"5",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t.outcome_kegiatan,"data-number":"6",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_lokasi"],"data-number":"7",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_tahun"],"data-number":"8",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_satuan"],"data-number":"9",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih Satuan =-"),a.state.dataSatuan.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Satuan},a.Uraian):null}))),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_harga"],"data-number":"10",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_sumber_dana"],"data-number":"11",onChange:a.handleChange(e)})),i.a.createElement("td",null,i.a.createElement(S.a,{type:"text",style:a.styleForm,value:t["target"+a.state.dataTambah.tahun+"_catatan"],"data-number":"12",onChange:a.handleChange(e)})),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_tahun"]),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_satuan_nama"]),i.a.createElement("td",null,t["target"+(parseInt(a.state.dataTambah.tahun)+1)+"_harga"]),i.a.createElement("td",null,i.a.createElement(S.a,{type:"select",style:a.styleForm,value:t.Kd_Unit+"-"+t.Kd_Sub,"data-number":"13",onChange:a.handleChange(e),required:!0,autoFocus:!0},i.a.createElement("option",{key:"-1",value:""},"-= Pilih OPD =-"),a.state.dataOpd.map(function(a,t){return a?i.a.createElement("option",{key:t,value:a.Kd_Unit+"-"+a.Kd_Sub},a.Nm_Sub_Unit):null}))),i.a.createElement("td",null,i.a.createElement(v.a,{color:"success",onClick:function(){a.simpan(t)},className:"mr-1"},"Simpan"))):null}))),this.pageNation())}},{key:"render",value:function(){return i.a.createElement("div",{className:"animated fadeIn"},i.a.createElement(E.a,null,i.a.createElement(b.a,{xs:"12",lg:"12"},i.a.createElement(f.a,null,i.a.createElement(K.a,null,i.a.createElement("i",{className:"fa fa-align-justify"})," ",document.title),i.a.createElement(P.a,null,i.a.createElement("h5",{style:{textAlign:"center"}},"RENCANA KERJA PEMERINTAH DAERAH TAHUN ",this.rpjmdTahun+parseInt(this.state.dataTambah.tahun)-1," ( Tahun Berjalan)"),i.a.createElement("hr",null),i.a.createElement(T.a,{isOpen:this.state.modalDelete,toggle:this.modalDelete,className:this.props.className},i.a.createElement(k.a,{toggle:this.modalDelete},"Hapus Data"),i.a.createElement(y.a,null,"Apakah Anda Yakin Menghapus Data?"),i.a.createElement(j.a,null,i.a.createElement(v.a,{color:"danger",onClick:this.handleDelete},"Ya"),i.a.createElement(v.a,{color:"secondary",onClick:this.modalDelete},"Batal"))),this.isi())))))}}]),t}(c.Component);t.default=x}}]);
//# sourceMappingURL=53.33b53d5a.chunk.js.map
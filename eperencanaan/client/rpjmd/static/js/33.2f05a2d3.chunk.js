(window.webpackJsonp=window.webpackJsonp||[]).push([[33],{267:function(e,a,t){e.exports=t.p+"static/media/loading.557336d4.gif"},359:function(e,a,t){"use strict";t.r(a);var n=t(90),l=t(85),r=t(86),u=t(88),i=t(87),c=t(89),o=t(1),d=t.n(o),h=t(106),m=t(107),s=t(95),E=t(101),p=t(105),g=t(96),b=t(108),v=t(102),C=t(98),P=t(103),f=t(99),S=t(104),j=t(110),k=t(109),T=t(351),A=t(100),D=t(270),O=t.n(D),y=t(268),w=t(267),x=t.n(w),I=function(e){function a(e){var t;return Object(l.a)(this,a),(t=Object(u.a)(this,Object(i.a)(a).call(this,e))).state={loading:!1,pencarian:"",urusan:"",bidang:"",visi:"",dataAll:[],jumlahPage:1,page:1,dataTambah:[],dataBidang:[]},t.temp=0,document.title="Strategi dan Arah Kebijakan",t}return Object(c.a)(a,e),Object(r.a)(a,[{key:"render",value:function(){return d.a.createElement("div",{className:"animated fadeIn"},d.a.createElement(h.a,null,d.a.createElement(m.a,{xs:"12",lg:"12"},d.a.createElement(s.a,null,d.a.createElement(R,null),d.a.createElement(N,null),d.a.createElement(F,null)))))}}]),a}(o.Component),R=function(e){function a(e){var t;return Object(l.a)(this,a),(t=Object(u.a)(this,Object(i.a)(a).call(this,e))).componentWillMount=function(){t.getData()},t.changePesan=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"success";null===e?t.setState({pesan:""}):t.setState({pesan:d.a.createElement(E.a,{color:a},e)}),setTimeout(function(){t.setState({pesan:""})},3e3)},t.setData=function(e){e.status&&t.setState({dataAll:e.data,jumlahPage:e.jumlahPage,jumlahAll:e.jumlahAll,dataKategori:e.kategori,dataMisi:e.misi})},t.getData=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;t.setState({loading:!0});var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("search",t.state.pencarian),O.a.post(y.apiRoot+"rpjmd/tampil/kebijakan/pagu/page-"+e,a).then(function(e){t.setData(e.data),console.log(e),t.setState({loading:!1})}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleSubmit=function(e){e.preventDefault(),t.setState({loading:!0});var a="";"Edit"===t.state.aksi?a=y.apiRoot+"rpjmd/tampil/kebijakan/pagu/update":"Tambah"===t.state.aksi&&(a=y.apiRoot+"rpjmd/tampil/kebijakan/pagu/update");var n=new FormData;n.append("session",localStorage.getItem("codexv-session")),n.append("id",t.state.dataPilih.strategi_id),n.append("tahun1",t.state.dataPilih.tahun1),n.append("tahun2",t.state.dataPilih.tahun2),n.append("tahun3",t.state.dataPilih.tahun3),n.append("tahun4",t.state.dataPilih.tahun4),n.append("tahun5",t.state.dataPilih.tahun5),O.a.post(a,n,{headers:{"Content-Type":"multipart/form-data"}}).then(function(e){e.data.status?(t.modalCreateClose(),t.getData(),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1}),console.log(e.data)}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleDelete=function(){t.setState({loading:!0});var e=new FormData;e.append("session",localStorage.getItem("codexv-session")),e.append("id",t.state.dataPilih.tujuan_id),O.a.post(y.apiRoot+"rpjmd/menyusun/tujuan/delete",e).then(function(e){e.data.status?(t.modalDelete(),t.getData(),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1})}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleCariSubmit=function(e){e.preventDefault(),t.getData()},t.dataPilihAwal={strategi_id:0,tahun1:0,tahun2:0,tahun3:0,tahun4:0,tahun5:0},t.state={loading:!1,dataAll:[],jumlahPage:1,modalCreate:!1,modalDelete:!1,dataPilih:t.dataPilihAwal,dataMisi:[],pencarian:"",page:1,aksi:"Tambah"},t.modalCreateClose=t.modalCreateClose.bind(Object(n.a)(Object(n.a)(t))),t.modalCreate=t.modalCreate.bind(Object(n.a)(Object(n.a)(t))),t.modalDelete=t.modalDelete.bind(Object(n.a)(Object(n.a)(t))),t.handleChange=t.handleChange.bind(Object(n.a)(Object(n.a)(t))),t.handlePencarianChange=t.handlePencarianChange.bind(Object(n.a)(Object(n.a)(t))),t.handleDelete=t.handleDelete.bind(Object(n.a)(Object(n.a)(t))),t}return Object(c.a)(a,e),Object(r.a)(a,[{key:"handlePencarianChange",value:function(e){this.setState({pencarian:e.target.value})}},{key:"handleChange",value:function(e){var a=parseInt(e.target.attributes.getNamedItem("data-number").value),t=this.state.dataPilih;1===a?t.tahun1=e.target.value:2===a?t.tahun2=e.target.value:3===a?t.tahun3=e.target.value:4===a?t.tahun4=e.target.value:5===a&&(t.tahun5=e.target.value),this.setState({dataPilih:t})}},{key:"modalCreateClose",value:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.setState({modalCreate:!1})}},{key:"modalCreate",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];0===e.length?this.setState({modalCreate:!0,dataPilih:this.dataPilihAwal}):(this.setState({modalCreate:!0,dataPilih:e}),console.log(e))}},{key:"modalDelete",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];this.setState({modalDelete:!this.state.modalDelete,dataPilih:e})}},{key:"isi",value:function(){var e=this;return this.state.loading?d.a.createElement("div",null,d.a.createElement("img",{src:x.a,alt:"loading"})):d.a.createElement(p.a,null,d.a.createElement("h4",{style:{textAlign:"center"}},"PRAKIRAAN PAGU INDIKATIF PER-URUSAN/ADMINISTRASI/PENUNJANG"),d.a.createElement(g.a,{responsive:!0,striped:!0,bordered:!0},d.a.createElement("thead",{style:{textAlign:"center",backgroundColor:"#0066ff",color:"white"}},d.a.createElement("tr",null,d.a.createElement("th",{rowSpan:"3",colSpan:"2"},"Kode"),d.a.createElement("th",{rowSpan:"3"},"Urusan/Penunjang"),d.a.createElement("th",{colSpan:"5"},"Prakiraan Pagu Indikatif"),d.a.createElement("th",{rowSpan:"3"},"Aksi")),d.a.createElement("tr",null,d.a.createElement("th",null,"Tahun 1"),d.a.createElement("th",null,"Tahun 2"),d.a.createElement("th",null,"Tahun 3"),d.a.createElement("th",null,"Tahun 4"),d.a.createElement("th",null,"Tahun 5")),d.a.createElement("tr",null,d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp")),d.a.createElement("tr",null,d.a.createElement("th",{colSpan:"2"},"(1)"),d.a.createElement("th",null,"(2)"),d.a.createElement("th",null,"(3)"),d.a.createElement("th",null,"(4)"),d.a.createElement("th",null,"(5)"),d.a.createElement("th",null,"(6)"),d.a.createElement("th",null,"(7)"),d.a.createElement("th",null))),d.a.createElement("tbody",null,d.a.createElement("tr",null,d.a.createElement("td",{colSpan:"2"}),d.a.createElement("td",null,"TOTAL BELANJA PROGRAM & KEGIATAN"),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null)),this.state.dataAll.map(function(a,t){return e.temp!==a.urusan?(e.temp=a.urusan,a?d.a.createElement("tr",{key:t},d.a.createElement("td",null,a.urusan),d.a.createElement("td",null),d.a.createElement("td",{colSpan:"7"},a.Nm_Urusan)):null):a?d.a.createElement("tr",{key:t},d.a.createElement("td",null,a.urusan),d.a.createElement("td",null,a.bidang),d.a.createElement("td",null,a.Nm_Bidang),d.a.createElement("td",null,a.tahun1),d.a.createElement("td",null,a.tahun2),d.a.createElement("td",null,a.tahun3),d.a.createElement("td",null,a.tahun4),d.a.createElement("td",null,a.tahun5),d.a.createElement("td",null,d.a.createElement(b.a,{color:"info",onClick:function(){e.setState({aksi:"Edit"}),e.modalCreate(a)},className:"mr-1"},"Edit"))):null}))))}},{key:"render",value:function(){return d.a.createElement("div",null,d.a.createElement(v.a,{isOpen:this.state.modalCreate,toggle:this.modalCreateClose,className:"modal-lg "+this.props.className},d.a.createElement(C.a,{toggle:this.modalCreateClose},this.state.aksi," Data"),d.a.createElement(P.a,{method:"post",onSubmit:this.handleSubmit,className:"form-horizontal",id:"form-data"},d.a.createElement(f.a,null,d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 1 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"1",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun1,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 1"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 2 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"2",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun2,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 2"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 3 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"3",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun3,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 3"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 4 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"4",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun4,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 4"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 5 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"5",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun5,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 5")))),d.a.createElement(A.a,null,d.a.createElement(b.a,{color:"primary",type:"submit",form:"form-data",value:"Submit"},this.state.aksi," Data"),d.a.createElement(b.a,{color:"secondary",onClick:this.modalCreateClose},"Cancel")))),this.isi())}}]),a}(o.Component),N=function(e){function a(e){var t;return Object(l.a)(this,a),(t=Object(u.a)(this,Object(i.a)(a).call(this,e))).componentWillMount=function(){t.getData()},t.changePesan=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"success";null===e?t.setState({pesan:""}):t.setState({pesan:d.a.createElement(E.a,{color:a},e)}),setTimeout(function(){t.setState({pesan:""})},3e3)},t.setData=function(e){e.status&&t.setState({dataAll:e.data,jumlahPage:e.jumlahPage,jumlahAll:e.jumlahAll,dataKategori:e.kategori,dataMisi:e.misi})},t.getData=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;t.setState({loading:!0});var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("search",t.state.pencarian),O.a.post(y.apiRoot+"rpjmd/tampil/kebijakan/pagu/page-"+e,a).then(function(e){t.setData(e.data),console.log(e),t.setState({loading:!1})}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleSubmit=function(e){e.preventDefault(),t.setState({loading:!0});var a="";"Edit"===t.state.aksi?a=y.apiRoot+"rpjmd/tampil/kebijakan/pagu/update":"Tambah"===t.state.aksi&&(a=y.apiRoot+"rpjmd/tampil/kebijakan/pagu/update");var n=new FormData;n.append("session",localStorage.getItem("codexv-session")),n.append("id",t.state.dataPilih.strategi_id),n.append("tahun1",t.state.dataPilih.tahun1),n.append("tahun2",t.state.dataPilih.tahun2),n.append("tahun3",t.state.dataPilih.tahun3),n.append("tahun4",t.state.dataPilih.tahun4),n.append("tahun5",t.state.dataPilih.tahun5),O.a.post(a,n,{headers:{"Content-Type":"multipart/form-data"}}).then(function(e){e.data.status?(t.modalCreateClose(),t.getData(),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1}),console.log(e.data)}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleDelete=function(){t.setState({loading:!0});var e=new FormData;e.append("session",localStorage.getItem("codexv-session")),e.append("id",t.state.dataPilih.tujuan_id),O.a.post(y.apiRoot+"rpjmd/menyusun/tujuan/delete",e).then(function(e){e.data.status?(t.modalDelete(),t.getData(),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1})}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleCariSubmit=function(e){e.preventDefault(),t.getData()},t.dataPilihAwal={strategi_id:0,tahun1:0,tahun2:0,tahun3:0,tahun4:0,tahun5:0},t.state={loading:!1,dataAll:[],jumlahPage:1,modalCreate:!1,modalDelete:!1,dataPilih:t.dataPilihAwal,dataMisi:[],pencarian:"",page:1,aksi:"Tambah"},t.modalCreateClose=t.modalCreateClose.bind(Object(n.a)(Object(n.a)(t))),t.modalCreate=t.modalCreate.bind(Object(n.a)(Object(n.a)(t))),t.modalDelete=t.modalDelete.bind(Object(n.a)(Object(n.a)(t))),t.handleChange=t.handleChange.bind(Object(n.a)(Object(n.a)(t))),t.handlePencarianChange=t.handlePencarianChange.bind(Object(n.a)(Object(n.a)(t))),t.handleDelete=t.handleDelete.bind(Object(n.a)(Object(n.a)(t))),t}return Object(c.a)(a,e),Object(r.a)(a,[{key:"handlePencarianChange",value:function(e){this.setState({pencarian:e.target.value})}},{key:"handleChange",value:function(e){var a=parseInt(e.target.attributes.getNamedItem("data-number").value),t=this.state.dataPilih;1===a?t.tahun1=e.target.value:2===a?t.tahun2=e.target.value:3===a?t.tahun3=e.target.value:4===a?t.tahun4=e.target.value:5===a&&(t.tahun5=e.target.value),this.setState({dataPilih:t})}},{key:"modalCreateClose",value:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.setState({modalCreate:!1})}},{key:"modalCreate",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];0===e.length?this.setState({modalCreate:!0,dataPilih:this.dataPilihAwal}):(this.setState({modalCreate:!0,dataPilih:e}),console.log(e))}},{key:"modalDelete",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];this.setState({modalDelete:!this.state.modalDelete,dataPilih:e})}},{key:"isi",value:function(){var e=this;return this.state.loading?d.a.createElement("div",null,d.a.createElement("img",{src:x.a,alt:"loading"})):d.a.createElement(p.a,null,d.a.createElement("h4",{style:{textAlign:"center"}},"ANALISIS KEUANGAN DAERAH PROVINSI/KABUPATEN/KOTA"),d.a.createElement(g.a,{responsive:!0,striped:!0,bordered:!0},d.a.createElement("thead",{style:{textAlign:"center",backgroundColor:"#0066ff",color:"white"}},d.a.createElement("tr",null,d.a.createElement("th",{rowSpan:"3"},"Kode"),d.a.createElement("th",{rowSpan:"3"},"Jenis Belanja/Program Pembangunan"),d.a.createElement("th",{rowSpan:"3"},"Data Tahun Dasar (Rp)"),d.a.createElement("th",{rowSpan:"3"},"Tingkat Pertumbuhan (%)"),d.a.createElement("th",{colSpan:"5"},"Prakiraan Pagu Indikatif"),d.a.createElement("th",{rowSpan:"3"},"Aksi")),d.a.createElement("tr",null,d.a.createElement("th",null,"Tahun 1"),d.a.createElement("th",null,"Tahun 2"),d.a.createElement("th",null,"Tahun 3"),d.a.createElement("th",null,"Tahun 4"),d.a.createElement("th",null,"Tahun 5")),d.a.createElement("tr",null,d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp")),d.a.createElement("tr",null,d.a.createElement("th",null,"(1)"),d.a.createElement("th",null,"(2)"),d.a.createElement("th",null,"(3)"),d.a.createElement("th",null,"(4)"),d.a.createElement("th",null,"(5)"),d.a.createElement("th",null,"(6)"),d.a.createElement("th",null,"(7)"),d.a.createElement("th",null,"(8)"),d.a.createElement("th",null,"(9)"),d.a.createElement("th",null))),d.a.createElement("tbody",null,this.state.dataAll.map(function(a,t){return e.temp!==a.urusan?(e.temp=a.urusan,null):a?d.a.createElement("tr",{key:t},d.a.createElement("td",null,a.Kd_Program),d.a.createElement("td",null,a.Nm_Program),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null,a.tahun1),d.a.createElement("td",null,a.tahun2),d.a.createElement("td",null,a.tahun3),d.a.createElement("td",null,a.tahun4),d.a.createElement("td",null,a.tahun5),d.a.createElement("td",null,d.a.createElement(b.a,{color:"info",onClick:function(){e.setState({aksi:"Edit"}),e.modalCreate(a)},className:"mr-1"},"Edit"))):null}))))}},{key:"render",value:function(){return d.a.createElement("div",null,d.a.createElement(v.a,{isOpen:this.state.modalCreate,toggle:this.modalCreateClose,className:"modal-lg "+this.props.className},d.a.createElement(C.a,{toggle:this.modalCreateClose},this.state.aksi," Data"),d.a.createElement(P.a,{method:"post",onSubmit:this.handleSubmit,className:"form-horizontal",id:"form-data"},d.a.createElement(f.a,null,d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 1 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"1",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun1,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 1"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 2 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"2",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun2,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 2"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 3 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"3",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun3,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 3"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 4 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"4",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun4,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 4"))),d.a.createElement(S.a,{row:!0},d.a.createElement(m.a,{md:"3"},d.a.createElement(j.a,{htmlFor:"text-input"},"Tahun 5 *")),d.a.createElement(m.a,{xs:"12",md:"9"},d.a.createElement(k.a,{type:"text","data-number":"5",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.tahun5,required:!0,autoFocus:!0}),d.a.createElement(T.a,{color:"muted"},"Isi Tahun 5")))),d.a.createElement(A.a,null,d.a.createElement(b.a,{color:"primary",type:"submit",form:"form-data",value:"Submit"},this.state.aksi," Data"),d.a.createElement(b.a,{color:"secondary",onClick:this.modalCreateClose},"Cancel")))),this.isi())}}]),a}(o.Component),F=function(e){function a(){return Object(l.a)(this,a),Object(u.a)(this,Object(i.a)(a).apply(this,arguments))}return Object(c.a)(a,e),Object(r.a)(a,[{key:"render",value:function(){return d.a.createElement(p.a,null,d.a.createElement("h4",{style:{textAlign:"center"}},"PROYEKSI KEMAMPUAN KEUANGAN DAERAH"),d.a.createElement(g.a,{responsive:!0,striped:!0,bordered:!0},d.a.createElement("thead",{style:{textAlign:"center",backgroundColor:"#0066ff",color:"white"}},d.a.createElement("tr",null,d.a.createElement("th",{rowSpan:"3"},"Kode"),d.a.createElement("th",{rowSpan:"3"},"Jenis Belanja / Program Pembangunan"),d.a.createElement("th",{colSpan:"5"},"Proyeksi")),d.a.createElement("tr",null,d.a.createElement("th",null,"Tahun 1"),d.a.createElement("th",null,"Tahun 2"),d.a.createElement("th",null,"Tahun 3"),d.a.createElement("th",null,"Tahun 4"),d.a.createElement("th",null,"Tahun 5")),d.a.createElement("tr",null,d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp"),d.a.createElement("th",null,"Rp")),d.a.createElement("tr",null,d.a.createElement("th",null,"(1)"),d.a.createElement("th",null,"(2)"),d.a.createElement("th",null,"(3)"),d.a.createElement("th",null,"(4)"),d.a.createElement("th",null,"(5)"),d.a.createElement("th",null,"(6)"),d.a.createElement("th",null,"(7)"))),d.a.createElement("tbody",null,d.a.createElement("tr",null,d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null),d.a.createElement("td",null)))))}}]),a}(o.Component);a.default=I}}]);
//# sourceMappingURL=33.2f05a2d3.chunk.js.map
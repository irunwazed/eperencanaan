(window.webpackJsonp=window.webpackJsonp||[]).push([[44],{267:function(e,a,t){e.exports=t.p+"static/media/loading.557336d4.gif"},271:function(e,a,t){"use strict";var n=t(85),l=t(86),i=t(88),o=t(87),s=t(89),r=t(1),c=t.n(r),d=t(109),u=t(106),m=t(107),h=t(103),p=t(108),g=t(268),E=function(e){function a(e){var t;return Object(n.a)(this,a),(t=Object(i.a)(this,Object(o.a)(a).call(this,e))).getRka=function(){return t.props.rka,c.a.createElement("div",null,c.a.createElement(d.a,{type:"hidden",name:"tahun",value:t.props.tahun}),c.a.createElement(d.a,{type:"hidden",name:"perumusan_program_id",value:t.props.perumusan_program_id}))},t.state={loading:!1},t}return Object(s.a)(a,e),Object(l.a)(a,[{key:"render",value:function(){return c.a.createElement("div",{className:"animated fadeIn"},c.a.createElement(u.a,null,c.a.createElement(m.a,{xs:"128",md:"10"},c.a.createElement(u.a,null,c.a.createElement(m.a,{xs:"18",md:"3"},c.a.createElement(h.a,{method:"post",action:g.apiRoot+this.props.link+"/save/pdf"},c.a.createElement(d.a,{type:"hidden",name:"session",value:localStorage.getItem("codexv-session")}),c.a.createElement(d.a,{type:"hidden",name:"rpjmd",value:localStorage.getItem("codexv-rpjmd")}),c.a.createElement(d.a,{type:"hidden",name:"search",value:this.state.pencarian}),this.getRka(),c.a.createElement(p.a,{color:"",style:{backgroundColor:"#d61515",color:"#fff"}},"PDF"))),c.a.createElement(m.a,{xs:"18",md:"3"},c.a.createElement(h.a,{method:"post",action:g.apiRoot+this.props.link+"/save/excel"},c.a.createElement(d.a,{type:"hidden",name:"session",value:localStorage.getItem("codexv-session")}),c.a.createElement(d.a,{type:"hidden",name:"rpjmd",value:localStorage.getItem("codexv-rpjmd")}),c.a.createElement(d.a,{type:"hidden",name:"search",value:this.state.pencarian}),this.getRka(),c.a.createElement(p.a,{color:"",style:{backgroundColor:"#23bc3a",color:"#fff"}},"Excel")))))))}}]),a}(r.Component);a.a=E},368:function(e,a,t){"use strict";t.r(a);var n=t(274),l=t(85),i=t(86),o=t(88),s=t(87),r=t(89),c=t(90),d=t(1),u=t.n(d),m=t(101),h=t(91),p=t(92),g=t(93),E=t(106),v=t(107),f=t(103),b=t(104),k=t(109),j=t(108),P=t(96),S=t(95),y=t(94),_=t(105),C=t(102),D=t(98),x=t(99),w=t(100),A=t(270),O=t.n(A),N=t(268),T=t(267),I=t.n(T),R=t(271),F=function(e){function a(e){var t;return Object(l.a)(this,a),(t=Object(o.a)(this,Object(s.a)(a).call(this,e))).componentWillMount=function(){t.getData()},t.handleChange=function(e){return function(a){var l=parseInt(a.target.attributes.getNamedItem("data-number").value);if(1===l){var i=t.state.dataAll.map(function(l,i){if(e!==i)return l;var o=Object(n.a)({},l,{opd_misi_id:a.target.value});return t.setState({dataPilih:o}),o});t.setState({dataAll:i})}if(2===l){var o=t.state.dataAll.map(function(l,i){if(e!==i)return l;var o=Object(n.a)({},l,{opd_tujuan_nama:a.target.value});return t.setState({dataPilih:o}),o});t.setState({dataAll:o})}}},t.changePesan=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"success";null===e?t.setState({pesan:""}):t.setState({pesan:u.a.createElement(m.a,{color:a},e)}),setTimeout(function(){t.setState({pesan:""})},3e3)},t.setData=function(e){e.status&&t.setState({dataAll:e.data,jumlahPage:e.jumlahPage,jumlahAll:e.jumlahAll,dataTambah:e.dataTambah})},t.getData=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;t.setState({loading:!0});var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("rpjmd",localStorage.getItem("codexv-rpjmd")),a.append("search",t.state.pencarian),O.a.post(N.apiRoot+t.link+"/page-"+e,a).then(function(e){t.setData(e.data),console.log(e),t.setState({loading:!1})}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleSubmit=function(){t.setState({loading:!0});var e="";"Edit"===t.state.aksi?e=N.apiRoot+t.link+"/update":"Tambah"===t.state.aksi&&(e=N.apiRoot+t.link+"/create");var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("rpjmd",localStorage.getItem("codexv-rpjmd")),a.append("opd_tujuan_id",t.state.dataPilih.opd_tujuan_id),a.append("opd_misi_id",t.state.dataPilih.opd_misi_id),a.append("opd_tujuan_nama",t.state.dataPilih.opd_tujuan_nama),O.a.post(e,a,{headers:{"Content-Type":"multipart/form-data"}}).then(function(e){e.data.status?(t.modalCreateClose(),t.getData(t.state.page),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1}),console.log(e.data)}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleDelete=function(){t.setState({loading:!0});var e=new FormData;e.append("session",localStorage.getItem("codexv-session")),e.append("rpjmd",localStorage.getItem("codexv-rpjmd")),e.append("opd_tujuan_id",t.state.dataPilih.opd_tujuan_id),O.a.post(N.apiRoot+t.link+"/delete",e).then(function(e){e.data.status?(t.modalDelete(),t.getData(t.state.page),t.changePesan(e.data.pesan)):t.changePesan(e.data.pesan,"warning"),t.setState({loading:!1}),console.log(e)}).catch(function(e){console.log(e),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleCariSubmit=function(e){e.preventDefault(),t.getData()},t.changePage=function(e){t.setState({page:e}),t.getData(e)},t.pageNation=function(){var e=[];t.state.page>1?e.push(u.a.createElement(h.a,{onClick:function(){return t.changePage(t.state.page-1)},key:0},u.a.createElement(p.a,{previous:!0,tag:"button"},"Prev"))):e.push(u.a.createElement(h.a,{disabled:!0,key:0},u.a.createElement(p.a,{previous:!0,tag:"button"},"Prev")));for(var a=!1,n=!1,l=function(l){n=a,a=!1,l+2>=t.state.page&&l-2<=t.state.page&&(a=!0),1!==l&&l!==t.state.jumlahPage||(a=!0),a?l===t.state.page?e.push(u.a.createElement(h.a,{active:!0,key:l},u.a.createElement(p.a,{tag:"button"},l))):e.push(u.a.createElement(h.a,{key:l,onClick:function(){return t.changePage(l)}},u.a.createElement(p.a,{tag:"button"},l))):n!==a&&e.push(u.a.createElement(h.a,{key:l,disabled:!0},u.a.createElement(p.a,{tag:"button"},"...")))},i=1;i<=t.state.jumlahPage;i++)l(i);return t.state.page<t.state.jumlahPage?e.push(u.a.createElement(h.a,{onClick:function(){return t.changePage(t.state.page+1)},key:t.state.jumlahPage+2},u.a.createElement(p.a,{next:!0,tag:"button"},"Next"))):e.push(u.a.createElement(h.a,{disabled:!0,key:t.state.jumlahPage+2},u.a.createElement(p.a,{next:!0,tag:"button"},"Next"))),u.a.createElement(g.a,null,e)},t.dataPilihAwal={id:0,name:"0",ageid:0},t.state={loading:!1,dataAll:[],jumlahPage:1,modalCreate:!1,modalDelete:!1,modalPesan:!1,dataPilih:t.dataPilihAwal,dataTambah:[],pencarian:"",page:1,aksi:"Tambah",name:"",age:0,edit:0},document.title="Menyusun Tujuan OPD",t.link="opd/menyusun/tujuan",t.modalDelete=t.modalDelete.bind(Object(c.a)(Object(c.a)(t))),t.handlePencarianChange=t.handlePencarianChange.bind(Object(c.a)(Object(c.a)(t))),t}return Object(r.a)(a,e),Object(i.a)(a,[{key:"handlePencarianChange",value:function(e){this.setState({pencarian:e.target.value})}},{key:"modalCreateClose",value:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.setState({modalCreate:!1})}},{key:"modalCreate",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];0===e.length?this.setState({dataPilih:this.dataPilihAwal}):(this.setState({dataPilih:e}),console.log(e))}},{key:"modalDelete",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];this.setState({modalDelete:!this.state.modalDelete,dataPilih:e})}},{key:"tambah",value:function(){this.state.jumlahPage>0?this.setState({dataPilih:this.dataPilihAwal,edit:0,page:this.state.jumlahPage}):this.setState({dataPilih:this.dataPilihAwal,edit:0,page:1}),this.handleSubmit()}},{key:"edit",value:function(e){0!==this.state.edit&&this.simpan(e),this.setState({dataPilih:this.dataPilihAwal,edit:e.opd_tujuan_id})}},{key:"simpan",value:function(e){this.setState({edit:0,aksi:"Tambah"}),this.handleSubmit(),console.log(this.state.dataPilih)}},{key:"isi",value:function(){var e=this;return this.state.loading?u.a.createElement("div",null,u.a.createElement("img",{src:I.a,alt:"logo"})):u.a.createElement("div",null,this.state.pesan,u.a.createElement(E.a,null,u.a.createElement(v.a,{xs:"128",md:"10"},u.a.createElement(R.a,{link:"opd/menyusun/tujuan"}),u.a.createElement(f.a,{method:"post",onSubmit:this.handleCariSubmit,className:"form-horizontal"},u.a.createElement(b.a,{row:!0},u.a.createElement(v.a,{xs:"9",md:"5"},u.a.createElement(k.a,{type:"text",placeholder:"Pencarian",onChange:this.handlePencarianChange,value:this.state.pencarian})),u.a.createElement(v.a,{xs:"3",md:"2"},u.a.createElement(j.a,{color:"primary"},"Cari"))))),u.a.createElement(v.a,{xs:"12",md:"2"},u.a.createElement(j.a,{color:"info",onClick:function(){e.setState({aksi:"Tambah"}),e.tambah()},className:"mr-1"},"Tambah"))),u.a.createElement(P.a,{responsive:!0,striped:!0,bordered:!0},u.a.createElement("thead",{style:{textAlign:"center",backgroundColor:"#0066ff",color:"white"}},u.a.createElement("tr",null,u.a.createElement("th",null,"No"),u.a.createElement("th",null,"Misi"),u.a.createElement("th",null,"Tujuan"),u.a.createElement("th",null,"Aksi"))),u.a.createElement("tbody",null,this.state.dataAll.map(function(a,t){return a.opd_tujuan_id!==e.state.edit?a?u.a.createElement("tr",{key:t},u.a.createElement("td",null,20*(e.state.page-1)+t+1),u.a.createElement("td",null,a.opd_misi_nama),u.a.createElement("td",null,a.opd_tujuan_nama),u.a.createElement("td",null,u.a.createElement(j.a,{color:"info",onClick:function(){e.setState({aksi:"Edit"}),e.edit(a)},className:"mr-1"},"Edit"),u.a.createElement(j.a,{color:"danger",onClick:function(){return e.modalDelete(a)},className:"mr-1"},"Hapus"))):null:a?u.a.createElement("tr",{key:t},u.a.createElement("td",null,20*(e.state.page-1)+t+1),u.a.createElement("td",null,u.a.createElement(k.a,{type:"select",value:a.opd_misi_id,"data-number":"1",onChange:e.handleChange(t),required:!0,autoFocus:!0},u.a.createElement("option",{key:"-1",value:""},"-= Pilih Misi =-"),e.state.dataTambah.map(function(e,a){return e?u.a.createElement("option",{key:a,value:e.opd_misi_id},e.opd_misi_nama):null}))),u.a.createElement("td",null,u.a.createElement(k.a,{type:"text",value:a.opd_tujuan_nama,"data-number":"2",onChange:e.handleChange(t)})),u.a.createElement("td",null,u.a.createElement(j.a,{color:"success",onClick:function(){e.simpan(a)},className:"mr-1"},"Simpan"))):null}))),this.pageNation())}},{key:"render",value:function(){return u.a.createElement("div",{className:"animated fadeIn"},u.a.createElement(E.a,null,u.a.createElement(v.a,{xs:"12",lg:"12"},u.a.createElement(S.a,null,u.a.createElement(y.a,null,u.a.createElement("i",{className:"fa fa-align-justify"})," ",document.title),u.a.createElement(_.a,null,u.a.createElement(C.a,{isOpen:this.state.modalDelete,toggle:this.modalDelete,className:this.props.className},u.a.createElement(D.a,{toggle:this.modalDelete},"Hapus Data"),u.a.createElement(x.a,null,"Apakah Anda Yakin Menghapus Data?"),u.a.createElement(w.a,null,u.a.createElement(j.a,{color:"danger",onClick:this.handleDelete},"Ya"),u.a.createElement(j.a,{color:"secondary",onClick:this.modalDelete},"Batal"))),this.isi())))))}}]),a}(d.Component);a.default=F}}]);
//# sourceMappingURL=44.d3063f57.chunk.js.map
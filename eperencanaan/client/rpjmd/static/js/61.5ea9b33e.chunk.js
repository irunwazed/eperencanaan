(window.webpackJsonp=window.webpackJsonp||[]).push([[61],{267:function(a,e,t){a.exports=t.p+"static/media/loading.557336d4.gif"},384:function(a,e,t){"use strict";t.r(e);var n=t(85),l=t(86),s=t(88),i=t(87),r=t(89),o=t(90),c=t(1),d=t.n(c),u=t(101),m=t(91),g=t(92),h=t(93),p=t(106),E=t(107),b=t(103),v=t(104),f=t(109),C=t(108),P=t(96),k=t(95),N=t(94),j=t(105),y=t(102),D=t(98),O=t(99),S=t(110),x=t(351),F=t(100),_=t(270),w=t.n(_),T=t(268),U=t(267),K=t.n(U),M=function(a){function e(a){var t;return Object(n.a)(this,e),(t=Object(s.a)(this,Object(i.a)(e).call(this,a))).componentWillMount=function(){t.getData()},t.changePesan=function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"success";null===a?t.setState({pesan:""}):t.setState({pesan:d.a.createElement(u.a,{color:e},a)}),setTimeout(function(){t.setState({pesan:""})},3e3)},t.setData=function(a){a.status&&t.setState({dataAll:a.data,jumlahPage:a.jumlahPage,jumlahAll:a.jumlahAll,dataKategori:a.kategori,dataUrusan:a.dataUrusan,dataFungsi:a.dataFungsi})},t.getData=function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;t.setState({loading:!0});var e=new FormData;e.append("session",localStorage.getItem("codexv-session")),e.append("search",t.state.pencarian),w.a.post(T.apiRoot+"sotk/bidang/page-"+a,e).then(function(a){t.setData(a.data),console.log(a),t.setState({loading:!1})}).catch(function(a){console.log(a),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleSubmit=function(a){a.preventDefault(),t.setState({loading:!0});var e="";"Edit"===t.state.aksi?e=T.apiRoot+"sotk/bidang/update":"Tambah"===t.state.aksi&&(e=T.apiRoot+"sotk/bidang/create");var n=new FormData;n.append("session",localStorage.getItem("codexv-session")),n.append("id",t.state.dataPilih.Kd_Bidang),n.append("urusan",t.state.dataPilih.Kd_Urusan),n.append("bidang",t.state.dataPilih.Nm_Bidang),n.append("fungsi",t.state.dataPilih.Kd_Fungsi),w.a.post(e,n,{headers:{"Content-Type":"multipart/form-data"}}).then(function(a){a.data.status?(t.modalCreateClose(),t.getData(),t.changePesan(a.data.pesan)):t.changePesan(a.data.pesan,"warning"),t.setState({loading:!1})}).catch(function(a){console.log(a),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleDelete=function(){t.setState({loading:!0});var a=new FormData;a.append("session",localStorage.getItem("codexv-session")),a.append("id",t.state.dataPilih.Kd_Bidang),a.append("urusan",t.state.dataPilih.Kd_Urusan),w.a.post(T.apiRoot+"sotk/bidang/delete",a).then(function(a){a.data.status?(t.modalDelete(),t.getData(),t.changePesan(a.data.pesan)):t.changePesan(a.data.pesan,"warning"),t.setState({loading:!1})}).catch(function(a){console.log(a),t.setState({loading:!1}),t.changePesan("Tidak dapat terhubung pada server!","danger")})},t.handleCariSubmit=function(a){a.preventDefault(),t.getData()},t.changePage=function(a){t.setState({page:a}),t.getData(a)},t.pageNation=function(){var a=[];t.state.page>1?a.push(d.a.createElement(m.a,{onClick:function(){return t.changePage(t.state.page-1)},key:0},d.a.createElement(g.a,{previous:!0,tag:"button"},"Prev"))):a.push(d.a.createElement(m.a,{disabled:!0,key:0},d.a.createElement(g.a,{previous:!0,tag:"button"},"Prev")));for(var e=!1,n=!1,l=function(l){n=e,e=!1,l+2>=t.state.page&&l-2<=t.state.page&&(e=!0),1!==l&&l!==t.state.jumlahPage||(e=!0),e?l===t.state.page?a.push(d.a.createElement(m.a,{active:!0,key:l},d.a.createElement(g.a,{tag:"button"},l))):a.push(d.a.createElement(m.a,{key:l,onClick:function(){return t.changePage(l)}},d.a.createElement(g.a,{tag:"button"},l))):n!==e&&a.push(d.a.createElement(m.a,{key:l,disabled:!0},d.a.createElement(g.a,{tag:"button"},"...")))},s=1;s<=t.state.jumlahPage;s++)l(s);return t.state.page<t.state.jumlahPage?a.push(d.a.createElement(m.a,{onClick:function(){return t.changePage(t.state.page+1)},key:t.state.jumlahPage+2},d.a.createElement(g.a,{next:!0,tag:"button"},"Next"))):a.push(d.a.createElement(m.a,{disabled:!0,key:t.state.jumlahPage+2},d.a.createElement(g.a,{next:!0,tag:"button"},"Next"))),d.a.createElement(h.a,null,a)},t.dataPilihAwal={Kd_Urusan:"",Kd_Fungsi:"",Kd_Bidang:"",Nm_Bidang:""},t.state={loading:!1,dataAll:[],jumlahPage:1,modalCreate:!1,modalDelete:!1,dataPilih:t.dataPilihAwal,dataTambah:[],dataUrusan:[],dataFungsi:[],pencarian:"",page:1,aksi:"Tambah"},document.title="Menyusun Bidang",t.modalCreateClose=t.modalCreateClose.bind(Object(o.a)(Object(o.a)(t))),t.modalCreate=t.modalCreate.bind(Object(o.a)(Object(o.a)(t))),t.modalDelete=t.modalDelete.bind(Object(o.a)(Object(o.a)(t))),t.handleChange=t.handleChange.bind(Object(o.a)(Object(o.a)(t))),t.handlePencarianChange=t.handlePencarianChange.bind(Object(o.a)(Object(o.a)(t))),t.handleDelete=t.handleDelete.bind(Object(o.a)(Object(o.a)(t))),t}return Object(r.a)(e,a),Object(l.a)(e,[{key:"handlePencarianChange",value:function(a){this.setState({pencarian:a.target.value})}},{key:"handleChange",value:function(a){var e=parseInt(a.target.attributes.getNamedItem("data-number").value),t=this.state.dataPilih;1===e?t.Nm_Bidang=a.target.value:2===e?t.Kd_Urusan=a.target.value:3===e&&(t.Kd_Fungsi=a.target.value),console.log(a.target.value),this.setState({dataPilih:t})}},{key:"modalCreateClose",value:function(){arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.setState({modalCreate:!1})}},{key:"modalCreate",value:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];0===a.length?this.setState({modalCreate:!0,dataPilih:this.dataPilihAwal}):(this.setState({modalCreate:!0,dataPilih:a}),console.log(a))}},{key:"modalDelete",value:function(){var a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];this.setState({modalDelete:!this.state.modalDelete,dataPilih:a})}},{key:"isi",value:function(){var a=this;return this.state.loading?d.a.createElement("div",null,d.a.createElement("img",{src:K.a,alt:"logo"})):d.a.createElement("div",null,this.state.pesan,d.a.createElement(p.a,null,d.a.createElement(E.a,{xs:"128",md:"10"},d.a.createElement(b.a,{method:"post",onSubmit:this.handleCariSubmit,className:"form-horizontal"},d.a.createElement(v.a,{row:!0},d.a.createElement(E.a,{xs:"9",md:"5"},d.a.createElement(f.a,{type:"text",onChange:this.handlePencarianChange,value:this.state.pencarian,placeholder:"Pencarian"})),d.a.createElement(E.a,{xs:"3",md:"2"},d.a.createElement(C.a,{color:"primary"},"Cari"))))),d.a.createElement(E.a,{xs:"12",md:"2"},d.a.createElement(C.a,{color:"info",onClick:function(){a.setState({aksi:"Tambah"}),a.modalCreate()},className:"mr-1"},"Tambah"))),d.a.createElement(P.a,{responsive:!0,striped:!0},d.a.createElement("thead",null,d.a.createElement("tr",null,d.a.createElement("th",null,"No"),d.a.createElement("th",null,"Urusan"),d.a.createElement("th",null,"Bidang"),d.a.createElement("th",null,"Fungsi"),d.a.createElement("th",null,"Aksi"))),d.a.createElement("tbody",null,this.state.dataAll.map(function(e,t){return e?d.a.createElement("tr",{key:t},d.a.createElement("td",null,20*(a.state.page-1)+t+1),d.a.createElement("td",null,e.Nm_Urusan),d.a.createElement("td",null,e.Nm_Bidang),d.a.createElement("td",null,e.Nm_Fungsi),d.a.createElement("td",null,d.a.createElement(C.a,{color:"info",onClick:function(){a.setState({aksi:"Edit"}),a.modalCreate(e)},className:"mr-1"},"Edit"),"|",d.a.createElement(C.a,{color:"danger",onClick:function(){return a.modalDelete(e)},className:"mr-1"},"Delete"))):null}))),this.pageNation())}},{key:"render",value:function(){return d.a.createElement("div",{className:"animated fadeIn"},d.a.createElement(p.a,null,d.a.createElement(E.a,{xs:"12",lg:"12"},d.a.createElement(k.a,null,d.a.createElement(N.a,null,d.a.createElement("i",{className:"fa fa-align-justify"})," ",document.title),d.a.createElement(j.a,null,d.a.createElement(y.a,{isOpen:this.state.modalCreate,toggle:this.modalCreateClose,className:"modal-lg "+this.props.className},d.a.createElement(D.a,{toggle:this.modalCreateClose},this.state.aksi," Data"),d.a.createElement(b.a,{method:"post",onSubmit:this.handleSubmit,className:"form-horizontal",id:"form-data"},d.a.createElement(O.a,null,d.a.createElement(v.a,{row:!0},d.a.createElement(E.a,{md:"3"},d.a.createElement(S.a,{htmlFor:"text-input"},"Urusan *")),d.a.createElement(E.a,{xs:"12",md:"9"},d.a.createElement(f.a,{type:"select","data-number":"2",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.Kd_Urusan,required:!0,autoFocus:!0},d.a.createElement("option",{key:"-1",value:""},"-= Pilih Urusan =-"),this.state.dataUrusan.map(function(a,e){return a?d.a.createElement("option",{key:e,value:a.Kd_Urusan},a.Nm_Urusan):null})),d.a.createElement(x.a,{color:"muted"},"Pilih Urusan"))),d.a.createElement(v.a,{row:!0},d.a.createElement(E.a,{md:"3"},d.a.createElement(S.a,{htmlFor:"text-input"},"Bidang *")),d.a.createElement(E.a,{xs:"12",md:"9"},d.a.createElement(f.a,{type:"text",id:"visi","data-number":"1",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.Nm_Bidang,required:!0,autoFocus:!0}),d.a.createElement(x.a,{color:"muted"},"Isi Bidang"))),d.a.createElement(v.a,{row:!0},d.a.createElement(E.a,{md:"3"},d.a.createElement(S.a,{htmlFor:"text-input"},"Fungsi *")),d.a.createElement(E.a,{xs:"12",md:"9"},d.a.createElement(f.a,{type:"select","data-number":"3",placeholder:"",onChange:this.handleChange,value:this.state.dataPilih.Kd_Fungsi,required:!0,autoFocus:!0},d.a.createElement("option",{key:"-1",value:""},"-= Pilih Fungsi =-"),this.state.dataFungsi.map(function(a,e){return a?d.a.createElement("option",{key:e,value:a.Kd_Fungsi},a.Nm_Fungsi):null})),d.a.createElement(x.a,{color:"muted"},"Pilih Fungsi")))),d.a.createElement(F.a,null,d.a.createElement(C.a,{color:"primary",type:"submit",form:"form-data",value:"Submit"},this.state.aksi," Data"),d.a.createElement(C.a,{color:"secondary",onClick:this.modalCreateClose},"Cancel")))),d.a.createElement(y.a,{isOpen:this.state.modalDelete,toggle:this.modalDelete,className:this.props.className},d.a.createElement(D.a,{toggle:this.modalDelete},"Hapus Data"),d.a.createElement(O.a,null,"Apakah Anda Yakin Menghapus Data?"),d.a.createElement(F.a,null,d.a.createElement(C.a,{color:"danger",onClick:this.handleDelete},"Ya")," ",d.a.createElement(C.a,{color:"secondary",onClick:this.modalDelete},"Batal"))),this.isi())))))}}]),e}(c.Component);e.default=M},91:function(a,e,t){"use strict";var n=t(263),l=t(264),s=t(1),i=t.n(s),r=t(0),o=t.n(r),c=t(262),d=t.n(c),u=t(261),m={active:o.a.bool,children:o.a.node,className:o.a.string,cssModule:o.a.object,disabled:o.a.bool,tag:u.m},g=function(a){var e=a.active,t=a.className,s=a.cssModule,r=a.disabled,o=a.tag,c=Object(l.a)(a,["active","className","cssModule","disabled","tag"]),m=Object(u.i)(d()(t,"page-item",{active:e,disabled:r}),s);return i.a.createElement(o,Object(n.a)({},c,{className:m}))};g.propTypes=m,g.defaultProps={tag:"li"},e.a=g},92:function(a,e,t){"use strict";var n=t(263),l=t(264),s=t(1),i=t.n(s),r=t(0),o=t.n(r),c=t(262),d=t.n(c),u=t(261),m={"aria-label":o.a.string,children:o.a.node,className:o.a.string,cssModule:o.a.object,next:o.a.bool,previous:o.a.bool,tag:u.m},g=function(a){var e,t=a.className,s=a.cssModule,r=a.next,o=a.previous,c=a.tag,m=Object(l.a)(a,["className","cssModule","next","previous","tag"]),g=Object(u.i)(d()(t,"page-link"),s);o?e="Previous":r&&(e="Next");var h,p=a["aria-label"]||e;o?h="\xab":r&&(h="\xbb");var E=a.children;return E&&Array.isArray(E)&&0===E.length&&(E=null),m.href||"a"!==c||(c="button"),(o||r)&&(E=[i.a.createElement("span",{"aria-hidden":"true",key:"caret"},E||h),i.a.createElement("span",{className:"sr-only",key:"sr"},p)]),i.a.createElement(c,Object(n.a)({},m,{className:g,"aria-label":p}),E)};g.propTypes=m,g.defaultProps={tag:"a"},e.a=g},93:function(a,e,t){"use strict";var n=t(263),l=t(264),s=t(1),i=t.n(s),r=t(0),o=t.n(r),c=t(262),d=t.n(c),u=t(261),m={children:o.a.node,className:o.a.string,listClassName:o.a.string,cssModule:o.a.object,size:o.a.string,tag:u.m,listTag:u.m,"aria-label":o.a.string},g=function(a){var e,t=a.className,s=a.listClassName,r=a.cssModule,o=a.size,c=a.tag,m=a.listTag,g=a["aria-label"],h=Object(l.a)(a,["className","listClassName","cssModule","size","tag","listTag","aria-label"]),p=Object(u.i)(d()(t),r),E=Object(u.i)(d()(s,"pagination",((e={})["pagination-"+o]=!!o,e)),r);return i.a.createElement(c,{className:p,"aria-label":g},i.a.createElement(m,Object(n.a)({},h,{className:E})))};g.propTypes=m,g.defaultProps={tag:"nav",listTag:"ul","aria-label":"pagination"},e.a=g},94:function(a,e,t){"use strict";var n=t(263),l=t(264),s=t(1),i=t.n(s),r=t(0),o=t.n(r),c=t(262),d=t.n(c),u=t(261),m={tag:u.m,className:o.a.string,cssModule:o.a.object},g=function(a){var e=a.className,t=a.cssModule,s=a.tag,r=Object(l.a)(a,["className","cssModule","tag"]),o=Object(u.i)(d()(e,"card-header"),t);return i.a.createElement(s,Object(n.a)({},r,{className:o}))};g.propTypes=m,g.defaultProps={tag:"div"},e.a=g}}]);
//# sourceMappingURL=61.5ea9b33e.chunk.js.map
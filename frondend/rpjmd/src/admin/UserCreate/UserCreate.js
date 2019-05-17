import React, { Component } from 'react';
import { Label, FormText, Alert, FormGroup, Input, Card, CardBody, CardHeader, Col, Pagination, PaginationItem, PaginationLink, Row, Table, Modal, ModalBody, ModalFooter, ModalHeader, Button, Form, } from 'reactstrap';
import axios from 'axios';
import config from '../../config';
import loadingImage from '../../assets/img/loading.gif';


class UserCreate extends Component {
  
  constructor(props) {
    super(props);

    this.styleForm = {
      minWidth:300,
    }

    this.dataPilihAwal = {
      id:0,
      username:'',
      ageid:0,
    };

    this.state = {
      loading:false,
      dataAll: [],
      jumlahPage: 1,
      modalCreate: false,
      modalDelete: false,
      modalPesan: false,
      dataPilih: this.dataPilihAwal,
      dataTambah:[],
      dataOpd:[],
      dataAllOpd:[],
      akunOpd:false,
      pencarian: '',
      page: 1,
      aksi:'Tambah',
      name:"",
      age:0,
      edit:0,
    }

    document.title = "Menyusun Pegawai OPD";
    this.link = 'admin/user';

    this.modalCreateClose = this.modalCreateClose.bind(this);
    this.modalCreate = this.modalCreate.bind(this);
    this.modalPesan = this.modalPesan.bind(this);
    this.modalDelete = this.modalDelete.bind(this);

    this.handlePencarianChange = this.handlePencarianChange.bind(this);
    this.handleChangeTambah = this.handleChangeTambah.bind(this);
    
  }

  componentWillMount = () => {
    this.getData();
  }

  handlePencarianChange(event){
    this.setState({ pencarian: event.target.value});
  }


  handleChangeTambah(event){

    let no = parseInt(event.target.attributes.getNamedItem('data-number').value);
    // let no = event.target.attributes.getNamedItem('data-number').value;
    // console.log(this.state.dataPilih);
    var setData = this.state.dataPilih;
    setData.level_id = 1;
    if(no === 1){
      setData.username = event.target.value;
    }else if(no === 2){
      setData.email = event.target.value;
    }else if(no === 3){
      setData.password = event.target.value;
    }else if(no === 4){
      setData.level_id = event.target.value;
    }else if(no === 5){
      setData.akun_id = event.target.value;

      if(setData.akun_id === '3'){
        this.setState({ akunOpd: true});
        
      }else{
        this.setState({ akunOpd: false});
      }

    }else if(no === 6){

      let kode = event.target.value.split("-");
      setData.Kd_Urusan = kode[0];
      setData.Kd_Bidang = kode[1];
      setData.Kd_Unit = kode[2];
      setData.Kd_Sub_Unit = kode[3];
      console.log(kode);
    }

    this.setState({ dataPilih: setData});
    console.log(this.state.dataPilih);
  }

  handleChange = idx => evt => {

    let no = parseInt(evt.target.attributes.getNamedItem('data-number').value);
    if(no === 1){
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {
        if (idx !== sidx) return shareholder;
        let data = { ...shareholder, username: evt.target.value };
        console.log(data)
        this.setState({dataPilih:data});
        return data;
      });
      this.setState({ dataAll: newdataTests });
    }else if(no === 2){
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {
        if (idx !== sidx){ return shareholder;}
        let data = { ...shareholder, email: evt.target.value };
        this.setState({dataPilih:data});
        return data;
      });
      this.setState({ dataAll: newdataTests });
    }else if(no === 3){
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {
        if (idx !== sidx){ return shareholder;}
        let data = { ...shareholder, password: evt.target.value };
        this.setState({dataPilih:data});
        return data;
      });
      this.setState({ dataAll: newdataTests });
    }else if(no === 4){
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {
        if (idx !== sidx){ return shareholder;}
        let data = { ...shareholder, level_id: evt.target.value };
        this.setState({dataPilih:data});
        return data;
      });
      this.setState({ dataAll: newdataTests });
    }else if(no === 5){
      let pilih = evt.target.value;
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {
        if (idx !== sidx){ return shareholder;}
        let data = { ...shareholder, akun_id: pilih };
        this.setState({dataPilih:data});
        return data;
      });
      // console.log(pilih);
      if(pilih === '3'){
        this.setState({ dataAll: newdataTests, akunOpd: true});
        
      }else{
        this.setState({ dataAll: newdataTests, akunOpd: false});
      }
      
    }else if(no === 6){
      const newdataTests = this.state.dataAll.map((shareholder, sidx) => {

        let kode = evt.target.value.split("-");
        if (idx !== sidx){ return shareholder;}
        let data = { ...shareholder, Kd_Urusan: kode[0], Kd_Bidang: kode[1], Kd_Unit: kode[2], Kd_Sub_Unit: kode[3] };
        this.setState({dataPilih:data});
        return data;
      });
      this.setState({ dataAll: newdataTests});
      // console.log(this.state.dataPilih);
    }
  };
//////modal
  modalCreateClose(e = []) {
    this.setState({
      modalCreate: false,
    });
    
  }

  modalCreate(e = []) {
    // this.setState({dataPilih:this.dataPilihAwal, edit:0, page:1});
    // if(e.length === 0){
      this.setState({
        modalCreate: true,
        dataPilih: this.dataPilihAwal
      });
      console.log(this.dataPilihAwal);
    // }
    
  }
  modalPesan(e = []) {
    this.setState({
      modalPesan: !this.state.modalPesan,
      dataPilih: e
    });
  }
  modalDelete(e = []) {
    this.setState({
      modalDelete: !this.state.modalDelete,
      dataPilih: e
    });
  }
  /////. modal

  // pesan
  changePesan = (e = null, status = 'success') =>{
    if(e === null){
      this.setState({pesan: ''});
    }else{
      this.setState({pesan: <Alert color={status}>{e}</Alert>});
    }
    setTimeout(()=>{ this.setState({pesan: ''}); }, 3000);
  }
  // .pesan

  /// set data

  setData = (dataAll) => {
    if(dataAll.status){
      this.setState({ 
        dataAll: dataAll.data, 
        jumlahPage: dataAll.jumlahPage, 
        jumlahAll: dataAll.jumlahAll, 
        dataAllOpd: dataAll.dataAllOpd, 
        // dataTambah:dataAll.dataTambah
      });
    }
  }

  getData = (page = 1) => {
    
    this.setState({ loading: true });
    // console.log('response');
    let data = new FormData();
    data.append('session', localStorage.getItem('codexv-session'));
    data.append('rpjmd', localStorage.getItem('codexv-rpjmd'));
    data.append('search', this.state.pencarian);
    axios
    .post(config.apiRoot+this.link+'/page-'+page, data)
    .then(response => {
      this.setData(response.data)
      console.log(response);
      this.setState({ loading: false });
    })
    .catch(error => {
      console.log(error);
      this.setState({ loading: false });
      this.changePesan('Tidak dapat terhubung pada server!', 'danger');
    });
  }

///. set data

// submit

  handleSubmit = event => {
    // if(event.length > 0 )
    try {
      event.preventDefault();
    }
    catch(err) {
      console.log(err);
    }
      
    this.setState({ loading: true });
    let link = '';
    if(this.state.aksi === 'Edit'){
      link = config.apiRoot+this.link+'/update';
      
    }else if(this.state.aksi === 'Tambah'){
      link = config.apiRoot+this.link+'/create';
      
    }

    const head = { headers: { 'Content-Type': 'multipart/form-data' } };
    let data = new FormData();
    data.append('session', localStorage.getItem('codexv-session'));
    data.append('rpjmd', localStorage.getItem('codexv-rpjmd'));
    data.append('user', this.state.dataPilih.user_id);
    data.append('email', this.state.dataPilih.email);
    data.append('username', this.state.dataPilih.username);
    data.append('password', this.state.dataPilih.password);
    data.append('level_id', this.state.dataPilih.level_id);
    data.append('akun_id', this.state.dataPilih.akun_id);
    // data.append('kodeOpd', this.state.dataPilih.kodeOpd);
    data.append('Kd_Urusan', this.state.dataPilih.Kd_Urusan);
    data.append('Kd_Bidang', this.state.dataPilih.Kd_Bidang);
    data.append('Kd_Unit', this.state.dataPilih.Kd_Unit);
    data.append('Kd_Sub_Unit', this.state.dataPilih.Kd_Sub_Unit);

    axios
    .post(link, data, head)
    .then(response => {
      if(response.data.status){
        this.modalCreateClose();
        this.getData(this.state.page);
        this.changePesan(response.data.pesan);
      }else{
        this.changePesan(response.data.pesan, 'warning');
      }
      this.setState({ loading: false });
      // this.toggleClose();
      
      console.log(response.data);
    })
    .catch(error=> {
      console.log(error);
      this.setState({ loading: false });
      this.changePesan('Tidak dapat terhubung pada server!', 'danger');
    });
  }

  handleDelete = () =>{
    // console.log(this.state.dataPilih);
    this.setState({ loading: true });
    let data = new FormData();
    data.append('session', localStorage.getItem('codexv-session'));
    data.append('user', this.state.dataPilih.user_id);
    axios
    .post(config.apiRoot+this.link+'/delete', data)
    .then(response => {
      if(response.data.status){
        this.modalDelete();
        this.getData(this.state.page);
        this.changePesan(response.data.pesan);
      }else{
        this.changePesan(response.data.pesan, 'warning');
      }
      this.setState({ loading: false });
      console.log(response);
    })
    .catch(error => {
      console.log(error);
      this.setState({ loading: false });
      this.changePesan('Tidak dapat terhubung pada server!', 'danger');
    });
  }

  handleCariSubmit = event => {
    event.preventDefault();
    this.getData();
  }
//. submit


/// pagenation

  changePage = (page) =>{
    this.setState({page: page});
    this.getData(page);
  }

  pageNation = () => {

    const page = [];
    if(this.state.page>1){
      page.push(<PaginationItem onClick={()=> this.changePage(this.state.page-1)} key={0}><PaginationLink previous tag="button">Prev</PaginationLink></PaginationItem>);
    }else{
      page.push(<PaginationItem disabled key={0}><PaginationLink previous tag="button">Prev</PaginationLink></PaginationItem>);
    }

    let tulis = false;
    let tempTulis = false;
    for(let i=1;i<=this.state.jumlahPage;i++){
      tempTulis = tulis;
      tulis = false;
      if(i + 2 >= this.state.page && i - 2 <= this.state.page){
        tulis = true;
      }
      if(i === 1 || i === this.state.jumlahPage){
        tulis = true;
      }
      if(tulis){
        if(i===this.state.page)
          page.push(<PaginationItem active key={i}><PaginationLink tag="button">{i}</PaginationLink></PaginationItem>);
        else
          page.push(<PaginationItem key={i} onClick={()=> this.changePage(i)}><PaginationLink tag="button">{i}</PaginationLink></PaginationItem>);
      }else{
        if(tempTulis !== tulis){
          page.push(<PaginationItem key={i} disabled><PaginationLink tag="button">...</PaginationLink></PaginationItem>);
        }
      }
      
    }

    if(this.state.page < this.state.jumlahPage){
      page.push(<PaginationItem onClick={()=> this.changePage(this.state.page+1)} key={this.state.jumlahPage+2}><PaginationLink next tag="button">Next</PaginationLink></PaginationItem>);
    }else{
      page.push(<PaginationItem disabled key={this.state.jumlahPage+2}><PaginationLink next tag="button">Next</PaginationLink></PaginationItem>);
    }
    // disabled
    return (
      <Pagination>
        {page}
      </Pagination>
    );
  }
  ////. pagenation

  tambah(){
    if(this.state.jumlahPage > 0)
      this.setState({dataPilih:this.dataPilihAwal, edit:0, page:this.state.jumlahPage});
    else
      this.setState({dataPilih:this.dataPilihAwal, edit:0, page:1});
    // this.setState({dataPilih:this.dataPilihAwal, edit:0, page:this.state.jumlahPage});
    // this.handleSubmit();
  }

  edit(data){
    if(this.state.edit !== 0){
      this.simpan(data);
    }
    if(data.akun_id === '3'){
      this.setState({dataPilih:this.dataPilihAwal, edit:data.user_id, akunOpd: true});
    }else{
      this.setState({dataPilih:this.dataPilihAwal, edit:data.user_id});
    }
    
    console.log(data);
  }

  simpan(data){
    this.setState({edit:0});
    this.handleSubmit();
    console.log(this.state.dataPilih);
  }

  namaAkun(kode){
    if(kode === '2'){
      return ('Admin RPJMD');
    }else if(kode === '3'){
      return ('OPD');
    }else if(kode === '4'){
      return ('BAPPEDA');
    }
  }

  cekAkunOpd(data, key){
    if(this.state.akunOpd){
      if(key === -1){
        // console.log('tambahdata');
        return (
          <Input type="select" style={this.styleForm} value={data.Kd_Urusan+"-"+data.Kd_Bidang+"-"+data.Kd_Unit+"-"+data.Kd_Sub_Unit} data-number="6" onChange={this.handleChangeTambah} required autoFocus >
            <option key="-1" value="">-= Pilih OPD =-</option>
            {this.state.dataAllOpd.map((data, key) => {
              return data ? (
                <option key={key} value={data.Kd_Urusan+"-"+data.Kd_Bidang+"-"+data.Kd_Unit+"-"+data.Kd_Sub}>{data.Nm_Sub_Unit}</option>
              ) : (null);
            })}
          </Input>
        );
      }else{
        return (
          <Input type="select" style={this.styleForm} value={data.Kd_Urusan+"-"+data.Kd_Bidang+"-"+data.Kd_Unit+"-"+data.Kd_Sub_Unit} data-number="6" onChange={this.handleChange(key)} required autoFocus >
            <option key="-1" value="">-= Pilih OPD =-</option>
            {this.state.dataAllOpd.map((data, key) => {
              return data ? (
                <option key={key} value={data.Kd_Urusan+"-"+data.Kd_Bidang+"-"+data.Kd_Unit+"-"+data.Kd_Sub}>{data.Nm_Sub_Unit}</option>
              ) : (null);
            })}
          </Input>
        );
      }
      
    }
  }

// isi
  isi(){
    if(this.state.loading){
      return(
        <div>
          <img src={loadingImage} alt="logo"/>
        </div>
      );
    }else{
      return(
        <div>
          {this.state.pesan}
          <Row>
            <Col xs="128" md="10">
            <Form method="post" onSubmit={this.handleCariSubmit} className="form-horizontal">
              <FormGroup row>
                <Col xs="9" md="5">
                <Input type="text" placeholder="Pencarian" onChange={this.handlePencarianChange} value={this.state.pencarian} />
                </Col>
                <Col xs="3" md="2">
                  <Button color="primary" >Cari</Button>
                </Col>
              </FormGroup>
            </Form>
            </Col>
            <Col xs="12" md="2">
              <Button color="info" onClick={() => {this.setState({aksi:'Tambah'});this.modalCreate();}} className="mr-1">Tambah</Button>
            </Col> 
          </Row> 
          <Table responsive striped bordered>
          <thead style={{textAlign: 'center', backgroundColor:'#0066ff', color: 'white'}}>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
              <th>Level</th>
              <th>Akun</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            {this.state.dataAll.map((data, key) => {
              if(data.user_id !== this.state.edit){
                return data ? (
                  <tr key={key}>
                    <td>{((this.state.page-1)*20)+key+1}</td>
                    <td>{data.username}</td>
                    <td>{data.email}</td>
                    <td>{data.password}</td>
                    <td>{data.level_id}</td>
                    <td>{this.namaAkun(data.akun_id)}</td>
                    <td>
                      <Button color="info" onClick={() => {this.setState({aksi:'Edit'});this.edit(data);}} className="mr-1">Edit</Button>
                      <Button color="danger" onClick={() => this.modalDelete(data)} className="mr-1">Hapus</Button>
                    </td>
                  </tr>
                ) : (null);
              }else{
                return data ? (
                  <tr key={key}>
                    <td>{((this.state.page-1)*20)+key+1}</td>
                    <td><Input type="text" style={this.styleForm} value={data.username} data-number="1" onChange={this.handleChange(key)} /></td>
                    <td><Input type="text" style={this.styleForm} value={data.email} data-number="2" onChange={this.handleChange(key)} /></td>
                    <td><Input type="text" style={this.styleForm} value={data.password} data-number="3" onChange={this.handleChange(key)} /></td>
                    <td><Input type="text" style={this.styleForm} value={data.level_id} data-number="4" onChange={this.handleChange(key)} /></td>
                    <td>
                      <Input type="select" style={this.styleForm} value={data.akun_id} data-number="5" onChange={this.handleChange(key)} required autoFocus >
                        <option value="">-= Pilih Jenis Admin =-</option>
                        <option value="2">Admin RPJMD</option>
                        <option value="3">OPD</option>
                        <option value="4">Bappeda</option>
                      </Input>
                      {this.cekAkunOpd(data, key)}
                    </td>
                    <td>
                      <Button color="success" onClick={() => {this.simpan(data)}}  className="mr-1">Simpan</Button>
                    </td>
                  </tr>
                ) : (null);
              }
            })}
            </tbody>
          </Table>
          {this.pageNation()}
        </div>
      );
    }
  }

//. isi

  render() {
    return (
      <div className="animated fadeIn">
        <Row>
          <Col xs="12" lg="12">
            <Card>
              <CardHeader>
                <i className="fa fa-align-justify"></i> {document.title}
              </CardHeader>
              <CardBody>
                <h5 style={{textAlign: 'center',}}>Daftar User</h5>
                <hr/>
                <Modal isOpen={this.state.modalCreate} toggle={this.modalCreateClose} className={'modal-lg ' + this.props.className}>
                  <ModalHeader toggle={this.modalCreateClose}>{this.state.aksi} Data</ModalHeader>
                  <Form method="post"  onSubmit={this.handleSubmit} className="form-horizontal" id="form-data">
                    <ModalBody>
                    <FormGroup row>
                        <Col md="3">
                          <Label htmlFor="text-input">Username *</Label>
                        </Col>
                        <Col xs="12" md="9">
                          <Input type="text" data-number="1" onChange={this.handleChangeTambah}  required autoFocus/>
                          <FormText color="muted">Isi Username</FormText>
                        </Col>
                      </FormGroup>
                      <FormGroup row>
                        <Col md="3">
                          <Label htmlFor="text-input">Email / No.Hp *</Label>
                        </Col>
                        <Col xs="12" md="9">
                          <Input type="text" data-number="2" onChange={this.handleChangeTambah}  required autoFocus/>
                          <FormText color="muted">Isi Email / No.Hp</FormText>
                        </Col>
                      </FormGroup>
                      <FormGroup row>
                        <Col md="3">
                          <Label htmlFor="text-input">Password *</Label>
                        </Col>
                        <Col xs="12" md="9">
                          <Input type="password" data-number="3" onChange={this.handleChangeTambah}  required autoFocus/>
                          <FormText color="muted">Isi Password</FormText>
                        </Col>
                      </FormGroup>
                      <FormGroup row>
                        <Col md="3">
                          <Label htmlFor="text-input">Akun *</Label>
                        </Col>
                        <Col xs="12" md="9">
                          <Input type="select" style={this.styleForm} data-number="5" onChange={this.handleChangeTambah} required autoFocus >
                            <option value="">-= Pilih Jenis Admin =-</option>
                            <option value="2">Admin RPJMD</option>
                            <option value="3">OPD</option>
                            <option value="4">Bappeda</option>
                          </Input>
                          {this.cekAkunOpd(this.state.dataPilih, -1)}
                          <FormText color="muted">Isi Akun</FormText>
                        </Col>
                      </FormGroup>

                      
                    </ModalBody>
                    <ModalFooter>
                      <Button color="primary" type="submit" form="form-data" value="Submit">{this.state.aksi} Data</Button>
                      <Button color="secondary" onClick={this.modalCreateClose}>Cancel</Button>
                    </ModalFooter>
                  </Form>
                </Modal>
                <Modal isOpen={this.state.modalPesan} toggle={this.modalPesan} className={ this.props.className}>
                  <ModalHeader toggle={this.modalPesan}>Hapus Data</ModalHeader>
                  <ModalBody>
                    Apakah Anda Yakin Menghapus Data?
                  </ModalBody>
                  <ModalFooter>
                    <Button color="danger" onClick={this.handleDelete}>Ya</Button>{' '}
                    <Button color="secondary" onClick={this.modalPesan}>Batal</Button>
                  </ModalFooter>
                </Modal>
                <Modal isOpen={this.state.modalDelete} toggle={this.modalDelete} className={ this.props.className}>
                  <ModalHeader toggle={this.modalDelete}>Hapus Data</ModalHeader>
                  <ModalBody>
                    Apakah Anda Yakin Menghapus Data?
                  </ModalBody>
                  <ModalFooter>
                    <Button color="danger" onClick={this.handleDelete}>Ya</Button>{' '}
                    <Button color="secondary" onClick={this.modalDelete}>Batal</Button>
                  </ModalFooter>
                </Modal>
                {this.isi()}
              </CardBody>
            </Card>
          </Col>
        </Row>
      </div>
    );
    
  }
}

export default UserCreate;

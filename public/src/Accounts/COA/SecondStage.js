import React,{Component} from 'react';
import {Grid,Table, Dimmer, Loader,Label,Form,Button, Dropdown, Input,Popup} from 'semantic-ui-react';
import axios from 'axios';
class SecondStage extends Component{
    constructor(){
        super();
        this.state = {
            main: [],
            second: [],
            status: [
                {key : 1, text: 'Active', value: '1'},
                {key : 2, text: 'In Active', value: '0'},
            ],
            codeLoading : false,
            dataLoading: true,
            selectedMain : '',
            newCode: '',
            statusCode: '',
            name: '',
            parentType: '1',
            type: '2',
            deletePopup: false
        }
        this.getCode = this.getCode.bind(this);
        this.sendData = this.sendData.bind(this);
        this.getSecond = this.getSecond.bind(this);
        this.deletePop = this.deletePop.bind(this);
        
    }
componentWillMount(){
     axios.get('/accounts/mainHeadsAsSelect')
    .then(response =>{
      this.setState({main: response.data});    
    });
    this.getSecond();
    
}

getSecond(){
    axios.get('/accounts/getAllSeconds').then(response => {
        this.setState({second : response.data, dataLoading: false});
        //console.log(JSON.stringify(response.data));
    })
}
getCode(e, data){
    this.setState({codeLoading: true});
axios.get('/accounts/getCode/'+data.value).then(response =>{
    this.setState({newCode: response.data, selectedMain: data.value});
    this.setState({codeLoading: false});
})
}
sendData(){
    var post = new URLSearchParams();
    post.append('account', this.state.name);
    post.append('code', this.state.newCode);
    post.append('parent_id', this.state.selectedMain);
    post.append('status', this.state.statusCode);
    post.append('type', this.state.type);
    post.append('parent_type', this.state.parentType);
    axios.post('/account/saveAccount',post).then(response => {
        if(response.data.hasOwnProperty('success')){
            alert(response.data.msg);
            this.setState({dataLoading : true, newCode: '',account: ''});
            this.getSecond()
        }else{
            alert('Account Not Added');
        }
    })
}
deletePop(){
    var o = this.state.deletePopup;
    if(o === true){
        this.setState({deletePopup : false});
    }else{
        this.setState({deletePopup : true});
    }
}
changeStatus(index,id,status){
var newStatus = status === 1 ? 0 : 1;
const second = [...this.state.second];
second[index].status = newStatus;
axios.get('/accounts/changeAccountStatus/'+id+'/'+newStatus).then(response=>{
    if(response.data.hasOwnProperty('success')){
        alert(response.data.msg);
        this.setState({second});
    }
})

//console.log(index+" "+status)

}
deleteAccount(id){
    axios.get('/accounts/deleteAccount/'+id).then(response => {
        if(response.data.hasOwnProperty('success')){
            this.getSecond();
            this.deletePop();
        }
    })
}
    render(){
        return(
            <Grid style={{marginLeft: 10}}>
                <Grid.Row>
                    <Grid.Column width="4">
                             <Form onSubmit={this.sendData}>
                                <Form.Field>
                                <label>Main Head</label>
                                <Dropdown placeholder='Select Main Head' fluid search selection options={this.state.main} onChange={this.getCode}/>
                                </Form.Field>
                                <Form.Field>
                                <label>Code</label>
                                <Input placeholder='Code' loading={this.state.codeLoading}  value={this.state.newCode} readOnly/>
                                </Form.Field>
                                <Form.Field>
                                <label>Account Name</label>
                                <Input placeholder='New Account Name' onChange={(e) => this.setState({name : e.target.value})} required/>
                                </Form.Field>
                                <Form.Field>
                                <label>Select Status</label>
                                <Dropdown text='Status' options={this.state.status} onChange={(e,data) => this.setState({statusCode : data.value})} simple item required/>
                                </Form.Field>
                                <Button type='submit'>Save</Button>
                            </Form>
                    </Grid.Column>
                    <Grid.Column width="12">
                        <Loader active={this.state.dataLoading} inline='centered' content="Getting Data..."/>
                        <Table celled>
                            <Table.Header>
                                <Table.Row>
                                    <Table.HeaderCell>Account Code</Table.HeaderCell>
                                    <Table.HeaderCell>Account Name</Table.HeaderCell>
                                    <Table.HeaderCell>Parent Account</Table.HeaderCell>
                                    <Table.HeaderCell>Status</Table.HeaderCell>
                                    <Table.HeaderCell>Actions</Table.HeaderCell>
                                </Table.Row>
                            </Table.Header>
                            <Table.Body>
                                {
                                    this.state.second.map((v,i) => {
                                        return(
                                    <Table.Row key={i}>
                                        <Table.Cell><Label circular color="blue">{v.code}</Label></Table.Cell>
                                        <Table.Cell>{v.account}</Table.Cell>
                                        <Table.Cell>{v.parentHead}</Table.Cell>
                                        <Table.Cell><Label circular color={v.status ? 'blue' : 'red'}>{v.status ? 'Active' : 'In Active'}</Label></Table.Cell>
                                        <Table.Cell><Button.Group>
                                            <Popup style={{width: 200, height: 'auto'}} on='click' size="small" trigger={<Button negative onClick={() => this.setState({deletePopup: true})}>Delete</Button>} header={<strong>Are you sure you want to delete this?</strong>} content={
                                                <div style={{padding: 20, marginLeft: 35}}>
                                                <Button onClick={this.deleteAccount.bind(this,v.id)} negative>Yes</Button>
                                               
                                                </div>
                                            }
                                            onClose={this.deletePop}
                                            onOpen={this.deletePop}></Popup>
                                            <Button.Or text='or' />
                                            <Button color="blue" onClick={this.changeStatus.bind(this,i,v.id,v.status)}>Change Status</Button>
                                            </Button.Group>
                                        </Table.Cell>
                                    </Table.Row>
                                        )
                                    })
                                }
                                
                               
                            </Table.Body>
                        </Table>
                    </Grid.Column>
                </Grid.Row>
            </Grid>
        );
    }
}
export default SecondStage
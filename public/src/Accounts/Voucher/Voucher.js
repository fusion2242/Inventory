import React,{Component} from 'react';
import { Container, Header, Grid,Divider, Dropdown , Input,Button} from 'semantic-ui-react'


class Voucher extends Component{
constructor(){
        super();
        this.state = {
            mainHeads : [
                {key : '01',value : '01', text : 'Current Assets'},
                {key : '02',value : '02', text : 'NonCurrent Assets'},
                {key : '03',value : '03', text : 'Current Liabilities'},
            ],
            
        }
    }
    componentDidMount(){
         $('.vDate').datepicker({
            autoclose: true
            }).datepicker("setDate", new Date());
    }
    
    render(){
        return(
               <Container fluid style={styles.container}>
                <Grid style={{marginLeft: 10}}>
                    <Grid.Row> 
                        <Grid.Column width="4" style={{textAlign: 'left', top: 44}}>Date : <input type="text" className="vDate" style={styles.dateInput}/></Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center',wordWrap: 'break-word'}}><Header as="h4">AL MEHRAN BUILDERS PAK (PVT) LTD B-4, BLOCK 16,<br/> GULSHAN-E-IQBAL, KARACHI<br/> Journal Voucher</Header></Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right', top: 44}}>Serial</Grid.Column>
                    </Grid.Row>
                </Grid>
                 <Grid style={{marginLeft: 10}}>
                    <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left'}}><strong>Account Name</strong></Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center'}}><strong>Debit</strong></Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right'}}><strong>Credit</strong></Grid.Column>
                    </Grid.Row>
                </Grid>
                <Divider/>
                  <Grid style={{marginLeft: 10}}>
                    <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left'}}><strong> <Dropdown placeholder='Select Main Head' fluid search selection options={this.state.mainHeads} /></strong></Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center'}}>
                                        <Input
                                            label={{ basic: true, content: 'PKR' }}
                                            labelPosition='right'
                                            placeholder='Enter Amount...'
                                        />
                        </Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right'}}><strong></strong></Grid.Column>
                    </Grid.Row>
                </Grid>
                  <Grid style={{marginLeft: 10}}>
                    <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left'}}><strong> <Dropdown placeholder='Select Main Head' fluid search selection options={this.state.mainHeads} /></strong></Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center'}}><strong></strong></Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right'}}>
                             <Input
                                            label={{ basic: true, content: 'PKR' }}
                                            labelPosition='right'
                                            placeholder='Enter Amount...'
                                        />
                        </Grid.Column>
                    </Grid.Row>
                </Grid>
                <Divider/>
                 <Input fluid placeholder='Enter Narration...' />
                 <Divider/>
                 <Grid>
                 <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left'}}><Button style={{marginLeft: 15}}>Save</Button> </Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center'}}><strong></strong></Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right'}}>
                            
                        </Grid.Column>
                    </Grid.Row>
                </Grid>
                </Container>
        );
    }
}
let title = 'AL MEHRAN BUILDERS PAK (PVT) LTD B-4, BLOCK 16, GULSHAN-E-IQBAL, KARACHI General Voucher';
let styles = {
container : {backgroundColor: 'white', borderRadius: 5, borderTopColor: 'blue', borderTopStyle: 'inset', padding: 20},
dateInput : {borderRadius: 2,borderStyle: 'groove',borderWidth: 1,textAlign: 'center',padding: 8}
}

export default Voucher;
import React,{Component} from 'react';
import { Container, Header, Grid } from 'semantic-ui-react'


class Voucher extends Component{

    render(){
        return(
               <Container fluid style={styles.container}>
                <Grid style={{marginLeft: 10}}>
                    <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left', top: 44}}>Date</Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center',wordWrap: 'break-word'}}><Header as="h4">AL MEHRAN BUILDERS PAK (PVT) LTD B-4, BLOCK 16,<br/> GULSHAN-E-IQBAL, KARACHI<br/> General Voucher</Header></Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right', top: 44}}>Serial</Grid.Column>
                    </Grid.Row>
                </Grid>
                 <Grid style={{marginLeft: 10}}>
                    <Grid.Row>
                        <Grid.Column width="4" style={{textAlign: 'left'}}>Account Name</Grid.Column>
                        <Grid.Column width="8" style={{textAlign: 'center'}}>Debit</Grid.Column>
                        <Grid.Column width="4" style={{textAlign: 'right'}}>Credit</Grid.Column>
                    </Grid.Row>
                </Grid>
      
                </Container>
        );
    }
}
let title = 'AL MEHRAN BUILDERS PAK (PVT) LTD B-4, BLOCK 16, GULSHAN-E-IQBAL, KARACHI General Voucher';
let styles = {
container : {backgroundColor: 'white', borderRadius: 5, borderTopColor: 'blue', borderTopStyle: 'inset', padding: 20}
}
export default Voucher;
import React,{Component} from 'react';
import {Grid,Table, Dimmer, Loader,Label} from 'semantic-ui-react';
class FirstStage extends Component{
    constructor(){
        super();
        this.state = {
            dimmer : '',
        }
    }
componentWillMount(){
    this.setState({
        dimmer: true
    })
}
componentDidMount(){
      this.setState({
        dimmer: false
    })
}


   render(){
       return(
           <div>
                <Dimmer active={this.state.dimmer}>
                <Loader indeterminate>Preparing Main Heads</Loader>
                </Dimmer>
         <Table celled>
            <Table.Header>
                <Table.Row>
                    <Table.HeaderCell>Account Code</Table.HeaderCell>
                    <Table.HeaderCell>Account Name</Table.HeaderCell>
                </Table.Row>
            </Table.Header>
            <Table.Body>
                <Table.Row>
                    <Table.Cell><Label circular color="blue">01</Label></Table.Cell>
                    <Table.Cell>Current Assets</Table.Cell>
                </Table.Row>
                <Table.Row>
                    <Table.Cell><Label circular color="blue">02</Label></Table.Cell>
                    <Table.Cell>Non Current Assets</Table.Cell>
                </Table.Row>
                <Table.Row>
                    <Table.Cell><Label circular color="blue">03</Label></Table.Cell>
                    <Table.Cell>Liabilities</Table.Cell>
                </Table.Row>
            </Table.Body>
         </Table>
         </div>
       );
   } 
}
export default FirstStage
import React,{Component} from 'react';
import {Grid,Table, Dimmer, Loader,Label} from 'semantic-ui-react';
import axios from 'axios';
class FirstStage extends Component{
    constructor(){
        super();
        this.state = {
            dimmer : '',
           main : [],
           dataLoading: true,
        }
    }
componentWillMount(){
    this.setState({
        dimmer: true
    });
    axios.get('/accounts/getAllParents')
    .then(response =>{
      this.setState({main: response.data, dataLoading: false});
      
      
    });
}
componentDidMount(){
      this.setState({
        dimmer: false
    })
}


   render(){
       return(
           <div>
                <Loader active={this.state.dataLoading} inline='centered' content="Getting Data..."/>
         <Table celled>
            <Table.Header>
                <Table.Row>
                    <Table.HeaderCell>Account Code</Table.HeaderCell>
                    <Table.HeaderCell>Account Name</Table.HeaderCell>
                </Table.Row>
            </Table.Header>
            <Table.Body>
                {
                    this.state.main.map(function(v, i){
                        return(
                            <Table.Row key={i}>
                            <Table.Cell><Label circular color="blue">{v.code}</Label></Table.Cell>
                            <Table.Cell>{v.account}</Table.Cell>
                            </Table.Row>
                            );
                        })
                }
                 
               
            </Table.Body>
         </Table>
         </div>
       );
   } 
}
export default FirstStage
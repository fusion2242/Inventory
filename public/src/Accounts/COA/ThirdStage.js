import React,{Component} from 'react';
import {Grid,Table, Dimmer, Loader,Label,Form,Button} from 'semantic-ui-react';

class ThirdStage extends Component{
    constructor(){
        super();
    }
    render(){
        return(
            <Grid style={{marginLeft: 10}}>
                <Grid.Row>
                    <Grid.Column width="4">
                             <Form>
                                <Form.Field>
                                <label>Main Head</label>
                                <Dropdown placeholder='Select Main Head' fluid search selection options={this.state.mainHeads} />
                                </Form.Field>
                                <Form.Field>
                                <label>Sub Head</label>
                                <Dropdown placeholder='Select Sub Head' fluid search selection options={this.state.mainHeads} />
                                </Form.Field>
                                <Form.Field>
                                <label>Code</label>
                                <input placeholder='Code' readOnly/>
                                </Form.Field>
                                <Form.Field>
                                <label>Account Name</label>
                                <input placeholder='New Account Name' />
                                </Form.Field>
                                <Form.Field>
                                <label>Select Status</label>
                                <Dropdown text='Status' options={this.state.status} simple item />
                                </Form.Field>
                                <Button type='submit'>Save</Button>
                            </Form>
                    </Grid.Column>
                    <Grid.Column width="12">

                        <Table celled>
                            <Table.Header>
                                <Table.Row>
                                    <Table.HeaderCell>Account Code</Table.HeaderCell>
                                    <Table.HeaderCell>Account Name</Table.HeaderCell>
                                    <Table.HeaderCell>Parent Account</Table.HeaderCell>
                                    <Table.HeaderCell>Actions</Table.HeaderCell>
                                </Table.Row>
                            </Table.Header>
                            <Table.Body>
                                <Table.Row>
                                    <Table.Cell><Label circular color="blue">01</Label></Table.Cell>
                                    <Table.Cell>Current Assets</Table.Cell>
                                    <Table.Cell><Label circular color="blue">01</Label></Table.Cell>
                                    <Table.Cell>Current Assets</Table.Cell>
                                </Table.Row>
                                <Table.Row>
                                    <Table.Cell><Label circular color="blue">02</Label></Table.Cell>
                                    <Table.Cell>Non Current Assets</Table.Cell>
                                    <Table.Cell><Label circular color="blue">02</Label></Table.Cell>
                                    <Table.Cell>Non Current Assets</Table.Cell>
                                </Table.Row>
                                <Table.Row>
                                    <Table.Cell><Label circular color="blue">03</Label></Table.Cell>
                                    <Table.Cell>Liabilities</Table.Cell>
                                    <Table.Cell><Label circular color="blue">03</Label></Table.Cell>
                                    <Table.Cell>Liabilities</Table.Cell>
                                </Table.Row>
                            </Table.Body>
                        </Table>
                    </Grid.Column>
                </Grid.Row>
            </Grid>
        );
    }
}
export default ThirdStage
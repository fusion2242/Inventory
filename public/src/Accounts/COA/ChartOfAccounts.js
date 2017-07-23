import React,{Component} from 'react';
import FirstStage from './FirstStage';
import SecondStage from './SecondStage';
import ThirdStage from './ThirdStage';
import { Tab } from 'semantic-ui-react';

class ChartOfAccounts extends Component{
    constructor(){
        super();
    }

   render(){
       const panes = [
                    { menuItem: 'Stage One', render: () => <Tab.Pane attached={false}><FirstStage/></Tab.Pane> },
                    { menuItem: 'Stage Two', render: () => <Tab.Pane attached={false}><SecondStage/></Tab.Pane> },
                    { menuItem: 'Stage Three', render: () => <Tab.Pane attached={false}><ThirdStage/></Tab.Pane> },
                    ]
       return(
          <Tab menu={{ secondary: true, pointing: true }} panes={panes} />
       );
   } 
}
export default ChartOfAccounts
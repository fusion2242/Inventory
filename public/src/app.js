import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import ChartOfAccounts from './Accounts/COA/ChartOfAccounts';

function run(){


ReactDOM.render(
<ChartOfAccounts/>,
document.getElementById('coa')
);

}// run end



const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
  run();
} else {
  window.addEventListener('DOMContentLoaded', run, false);
}


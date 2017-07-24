import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import Voucher from './Accounts/Voucher/Voucher';


function run(){


ReactDOM.render(
<Voucher/>,
document.getElementById('voucher')
);

}// run end



const loadedStates = ['complete', 'loaded', 'interactive'];

if (loadedStates.includes(document.readyState) && document.body) {
  run();
} else {
  window.addEventListener('DOMContentLoaded', run, false);
}


import 'jquery/dist/jquery';

import 'popper.js';

import './js/bootstrap.min';

import './js/jquery.slimscroll.min';

import React from 'react';

import {render} from 'react-dom';

import './js/biblio';

import './styles/app.css';

import App from "./js/react/App";

const domContainer = document.querySelector('#react');
render(<App />, domContainer);
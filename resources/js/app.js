require('./bootstrap');

import { createApp } from 'vue';
import Welcome from './components/Welcome.vue'
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import DropdownHeader from './components/DropdownHeader.vue';
import TableData from './components/TableData.vue';
import Select2 from './components/Select2.vue';
import { store } from './store/index';
import AntiquesUserCustomer from './components/antiques_user/Customer.vue';
import SaveCashier from './components/SaveCashier.vue';
import CashierHeader from './components/cashier/Header.vue';
import CashierCategory from './components/cashier/CategoryInput.vue';
import CashierTable from './components/cashier/TableData.vue';
import CashierPrint from './components/cashier/Print.vue';
import CashierCustomer from './components/cashier/Customer.vue';

import SaveCashier2 from './components/SaveCashier2.vue';
import ProductFiles from './components/DASHBOARD_ADMIN/product_files/ProductFiles.vue';
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import AntiquesUserHeader from './components/antiques_user/Header.vue';

import 'datatables.net-select';
import 'datatables.net-responsive';
import Modal from './components/Modal.vue'
import ThaiSmartcardReader from 'thai-smartcard-reader'

DataTable.use(DataTablesCore);

const app = createApp({})
app.use(store)
app.use(VueSweetalert2);

app.component('welcome', Welcome)
app.component('AntiquesUserHeader', AntiquesUserHeader)
app.component('ThaiSmartcardReader', ThaiSmartcardReader)
app.component('DataTable', DataTable)
app.component('Modal', Modal)
app.component('DropdownHeader', DropdownHeader)
app.component('TableData', TableData)
app.component('Select2', Select2)
app.component('AntiquesUserCustomer', AntiquesUserCustomer)
app.component('SaveCashier', SaveCashier)
app.component('CashierHeader', CashierHeader)
app.component('SaveCashier2', SaveCashier2)
app.component('ProductFiles', ProductFiles)
app.component('CashierCategory', CashierCategory)
app.component('CashierTable', CashierTable)
app.component('CashierPrint', CashierPrint)
app.component('CashierCustomer', CashierCustomer)

app.mount('#app')

import './bootstrap'
import Vue from 'vue'

Vue.prototype.$isDev = process.env.MIX_APP_ENV !== "production"

Vue.component('categoryForm', require('./components/category/form').default)
Vue.component('categoryList', require('./components/category/list').default)

Vue.component('itemForm', require('./components/item/form').default)
Vue.component('itemList', require('./components/item/list').default)

var app = new Vue({
    el: '#app',
})

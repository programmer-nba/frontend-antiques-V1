import { createStore } from 'vuex'

export const store = createStore({
  state () {
    return {
      count: 1,
      items: [],
      customers: [],
      orderId: '',
      queueDate: [],
      dataOpen: []

    }
  },
//   MUTATE_ITEMS: (state, items) => {
//     Vue.set(state, 'items', items);
//     // or, better yet create a copy of the array
//     Vue.set(state, 'items', [...items]);
// },
mutations: {
    MUTATE_ITEMS(state,item){
        // store.state.data = item;
            // Vue.set(state, 'items', items);
            store.state.items = item;


    },
    MUTATE_CUSTOMERS(state, item){
        store.state.customers = item;

    },
    MUTATE_ORDERID(state, item){
        store.state.orderId = item;

    },
    MUTATE_QUEUE_DATE(state, item){
        store.state.queueDate = item;

    },
    MUTATE_OPEN(state, item){
        store.state.dataOpen = item;
    }
},

actions: {
    loadItems: (context, items) => {
        context.commit('MUTATE_ITEMS', items);
    },
    loadCustomers: (context, items) => {
        context.commit('MUTATE_CUSTOMERS', items);

    },
    loadOrderId: (context, items) => {
        context.commit('MUTATE_ORDERID', items);

    },
    loadQueueAndDate: (context, items) => {
        context.commit('MUTATE_QUEUE_DATE', items);

    },
    loadOpen: (context, items) => {

        context.commit('MUTATE_OPEN', items);
    },

}
})

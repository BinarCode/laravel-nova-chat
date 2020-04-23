require('./tool');

Nova.booting((Vue, router, store) => {
  Vue.component('chat', require('./components/Chat'));
});


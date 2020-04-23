import Chat from './components/Chat';

Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'Chat',
      path: '/chat',
      component: Chat,
    },
  ]);
});

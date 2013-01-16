# Cassie web client
--
Web client for the chat bot [Cassie](https://github.com/olyckne/cassie)

- Uses [socket.io](http://socket.io) to communicate with Cassie server.
- Uses [Laravel](http://laravel.com/) web framework
- and [Bootstrap](http://getbootstrap.com) for good looking stuff.
- Uses github for authorization

### Install
--
- Make sure you meet [Laravels requirements](http://laravel.com/docs/install#requirements) 
- Download
- Set your github username in bundles/fileoauth/users.php


### Customize
--
As standard it uses ws://localhost:3030.
Change it in and other stuff in `public/js/main.js`

### "Wow, this is awful, it's better I write my on web client"
--
Go on, check out `public/js/cassie-client.js` for something kind of like a js-client (yeah, it might be reasonable to have its own repo)

# Cassie web client
--
Web client for the chat bot [Cassie](https://github.com/olyckne/cassie)

- Uses [socket.io](http://socket.io) to communicate with Cassie server.
- Uses [Laravel](http://laravel.com/) web framework
- and [Bootstrap](http://getbootstrap.com) for good looking stuff.
- Uses username-password or github for authorization

### Install
--
- Make sure you meet [Laravels requirements](http://laravel.com/docs/install#requirements) 
- Download
- cd to directory and generate key: `php artisan key:generate`
- For username-password authorization
  - Setup credentials in bundles/fileoatuh/users.php  
- For github authorization:
  - Set up an application on github
  - Set your credentials in bundles/fileoauth/users.php

### Customize
--
As standard it uses ws://localhost:3030.
Change it in and other stuff in `public/js/main.js`
If you change the url don't forget to change `Asset::add("socket", "http://localhost:3030/socket.io/socket.io.js")` to point to `socket.io/socket.io.js` on the server in `application/controllers/base.php`

### "Wow, this is awful, it's better I write my on web client"
--
Go on, check out `public/js/cassie-client.js` for something kind of like a js-client (yeah, it might be reasonable to have its own repo)

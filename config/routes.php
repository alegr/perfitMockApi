<?php 

// User
Router::post('/user/login', '/user/login.json');
Router::post('/user/logout', '/user/logout.json');
Router::post('/user/resetpassword', '/user/resetpassword.json');

// Contacts resource
Router::get('/contacts/:id/lists/:listId', '/contacts/id/lists/id/get.json');
Router::put('/contacts/:id/lists/:listId', '/contacts/id/lists/id/put.json');
Router::delete('/contacts/:id/lists/:listId', '/contacts/id/lists/id/delete.json');
Router::get('/contacts/:id/lists', '/contacts/lists/get.json');
Router::post('/contacts/:id/unsubscribe', '/contacts/id/actions/unsubscribe.json');
Router::get('/contacts/:id', '/contacts/id/get.json');
Router::put('/contacts/:id', '/contacts/id/put.json');
Router::delete('/contacts/:id', '/contacts/id/delete.json');

// Contacts lists

// Contacts actions
Router::post('/contacts/import', '/contacts/actions/import.json');
Router::post('/contacts/clean', '/contacts/actions/clean.json');

Router::get('/contacts', '/contacts/get.json');
Router::post('/contacts', '/contacts/post.json');







<?php

//Rotas ds dashboard, admins e perfil
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/admins-view', 'AdminController@adminsView')->name('admins.view');
Route::get('/admin-perfil', 'AdminController@adminPerfil')->name('admin.perfil');
Route::post('/admin-perfil', 'AdminRegisterController@adminEditarPerfil')->name('admin.perfil.editar');

// Rotas de login e logout do admin
Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.show-login-form');
Route::post('/login', 'AdminLoginController@login')->name('admin.login');
Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');

// Rotas de registro do admin
Route::get('/register', 'AdminRegisterController@showRegisterForm')->name('admin.show-register-form');
Route::post('/register', 'AdminRegisterController@register')->name('admin.register');

// Rotas de conhecimentos
Route::get('/conhecimentos-view', 'Conhecimento\ConhecimentoController@conhecimentosView')->name('conhecimentos.view');
Route::get('/conhecimentos-view/novo', 'Conhecimento\ConhecimentoController@conhecimentoNovo')->name('conhecimento.show-form-novo');
Route::post('/conhecimentos-view/novo', 'Conhecimento\ConhecimentoController@conhecimentoCadastrar')->name('conhecimento.cadastrar');
Route::get('/conhecimento-view/editar/{conhecimento}', 'Conhecimento\ConhecimentoController@editarForm')->name('conhecimento.show-form-edit');
Route::post('/conhecimento-view/editar', 'Conhecimento\ConhecimentoController@conhecimentoEditar')->name('conhecimento.editar');
Route::get('/conhecimento-view/excluir/{conhecimento}', 'Conhecimento\ConhecimentoController@conhecimentoExcluir')->name('conhecimento.excluir');

// Rotas de notícias
Route::get('/noticias-view', 'NoticiasController@noticiasView')->name('noticias.view');


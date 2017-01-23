<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the 'welcome' class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user';
$route['entrar'] = 'user/login';
$route['sair'] = 'user/logout';
$route['perfil'] = 'user/profile';
$route['autenticar'] = 'user/authenticate';
$route['usuario/inserir'] = 'user/insert';
$route['usuario/atualizar'] = 'user/updateaccount';
$route['recuperarsenha'] = 'user/recoverypass';
$route['recuperarsenha/(:any)'] = 'user/updatepass/$1';
$route['confirmarsenha'] = 'user/confirmupdatepass';

$route['times'] = 'team';
$route['time'] = 'team';
$route['time/novo'] = 'team/add';
$route['time/inserir'] = 'team/insert';
$route['time/excluir/(:num)'] = 'team/delete/$1';
$route['time/editar/(:num)'] = 'team/edit/$1';
$route['time/atualizar/(:num)'] = 'team/update/$1';

$route['time/(:num)'] = 'teamMember/view/$1';
$route['time/membro/adicionar/(:num)/(:num)'] = 'teamMember/addmember/$1/$2';
$route['time/membro/adicionar'] = 'teamMember/addmember';
$route['time/membro/remover/(:num)/(:num)'] = 'teamMember/removemember/$1/$2';

$route['time/etiqueta/inserir/(:num)'] = 'teamTag/insert/$1';
$route['time/etiqueta/editar/(:num)/(:num)'] = 'teamTag/edit/$1/$2';
$route['time/etiqueta/atualizar/(:num)/(:num)'] = 'teamTag/update/$1/$2';
$route['time/etiqueta/excluir/(:num)/(:num)'] = 'teamTag/delete/$1/$2';

$route['time/tarefa/inserir/(:num)'] = 'teamTask/insert/$1';
$route['time/tarefa/excluir/(:num)/(:num)'] = 'teamTask/delete/$1/$2';
$route['time/tarefa/editar/(:num)/(:num)'] = 'teamTask/edit/$1/$2';
$route['time/tarefa/atualizar/(:num)/(:num)'] = 'teamTask/update/$1/$2';
$route['time/tarefa/concluir/(:num)/(:num)'] = 'teamTask/complete/$1/$2';
$route['time/tarefa/reabrir/(:num)/(:num)'] = 'teamTask/reopen/$1/$2';

$route['etiqueta/inserir'] = 'tag/insert';
$route['etiqueta/editar/(:num)'] = 'tag/edit/$1';
$route['etiqueta/excluir/(:num)'] = 'tag/delete/$1';
$route['etiqueta/atualizar/(:num)'] = 'tag/update/$1';

$route['tarefas'] = 'task';
$route['inserir'] = 'task/insert';
$route['editar/(:num)'] = 'task/edit/$1';
$route['atualizar/(:num)'] = 'task/update/$1';
$route['excluir/(:num)'] = 'task/delete/$1';
$route['concluir/(:num)'] = 'task/complete/$1';
$route['reabrir/(:num)'] = 'task/reopen/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

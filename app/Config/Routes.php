<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('contact', 'Home::contact_us');
$routes->post('contact_message', 'Home::contact_message');

$routes->add('article', 'Home::article');
$routes->add('article/(:segment)', 'Home::article_detail/$1');
$routes->get('article/like/(:num)', 'Home::likeArticle/$1');

// ----------------------------------------------------------------user
$routes->get('dashboard', 'User\Dashboard::index');
$routes->get('membership', 'User\Membership::index');
$routes->get('transaction', 'User\Transaction::index');
$routes->get('checkout/(:num)', 'User\Membership::checkout/$1');
$routes->get('payment/(:num)', 'User\Membership::payment/$1');
$routes->post('process_checkout', 'User\Membership::process_checkout');
$routes->post('payment_confirmation', 'User\Transaction::payment_confirmation');
$routes->get('chat', 'User\Chat::index');
$routes->post('chat/add', 'User\Chat::add');
$routes->get('discusion/(:num)', 'User\Chat::discusion/$1');

$routes->get('login', 'User\Login::index');
$routes->get('register', 'User\Login::register');
$routes->get('logout', 'User\Login::logout');
$routes->post('login/auth', 'User\Login::auth');
$routes->post('login/regis', 'User\Login::regis');
$routes->add('/profile', 'User\Profile::index');
$routes->get('/forgot_password', 'User\Login::forgot_password');
$routes->post('/forgot', 'User\Login::forgot');
$routes->get('/reset_password', 'User\Login::reset_password');
$routes->post('/reset', 'User\Login::reset');
// ----------------------------------------------------------------end

// ----------------------------------------------------------------ADMIN ----------------------------------------------------------------
$routes->group('admin', function ($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('login', 'Admin\Login::index');
    $routes->get('forgot_password', 'Admin\Login::forgot_password');
    $routes->post('forgot', 'Admin\Login::forgot');
    $routes->get('reset_password', 'Admin\Login::reset_password');
    $routes->post('reset', 'Admin\Login::reset');
    $routes->post('auth', 'Admin\Login::auth');
    $routes->get('logout', 'Admin\Login::logout');

    //main menu
    $routes->get('dashboard', 'Admin\Dashboard::index');

    //counselor
    $routes->get('counselor', 'Admin\Counselor::index');
    $routes->get('counselor/new', 'Admin\Counselor::create');
    $routes->add('counselor/(:segment)/edit', 'Admin\Counselor::edit/$1');
    $routes->add('counselor/(:segment)/delete', 'Admin\Counselor::delete/$1');
    $routes->post('counselor/add', 'Admin\Counselor::add');

    //membership
    $routes->get('membership', 'Admin\Membership::index');
    $routes->get('membership/new', 'Admin\Membership::create');
    $routes->add('membership/(:segment)/edit', 'Admin\Membership::edit/$1');
    $routes->add('membership/(:segment)/delete', 'Admin\Membership::delete/$1');
    $routes->post('membership/add', 'Admin\Membership::add');


    //transaction
    $routes->get('transaction', 'Admin\Transaction::index');
    $routes->add('transaction/(:segment)/edit', 'Admin\Transaction::edit/$1');

    //user
    $routes->get('user', 'Admin\User::index');
    $routes->get('user/new', 'Admin\User::create');
    $routes->add('user/(:segment)/edit', 'Admin\User::edit/$1');
    $routes->add('user/(:segment)/delete', 'Admin\User::delete/$1');
    $routes->post('user/add', 'Admin\User::add');

    //article
    $routes->get('article', 'Admin\Article::index');
    $routes->get('article/new', 'Admin\Article::create');
    $routes->add('article/(:segment)/edit', 'Admin\Article::edit/$1');
    $routes->add('article/(:segment)/delete', 'Admin\Article::delete/$1');
    $routes->post('article/add', 'Admin\Article::add');

    //chat
    $routes->get('chat', 'Admin\Chat::index');
    $routes->get('discusion/(:num)', 'Admin\Chat::discusion/$1');
    $routes->post('chat/add', 'Admin\Chat::add');
}); 

// ---------------------------------------------------------------- END AD  DEAD ----------------------------------------------------------------

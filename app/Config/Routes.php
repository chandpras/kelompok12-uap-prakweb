<?php

use CodeIgniter\Router\RouteCollection;
use Config\Auth;

/**
 * @var RouteCollection $routes
 */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(Auth::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});

// General Routes
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/login', 'Home::login');

// Admin Routes
$routes->get('/admin', 'AdminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'AdminController::index', ['filter' => 'role:admin']);

// Applicant Routes
$routes->get('/applicant', 'ApplicantController::index', ['filter' => 'role:applicant']);
$routes->get('/applicant/index', 'ApplicantController::index', ['filter' => 'role:applicant']);
$routes->get('/applicant/profile', 'ApplicantController::profile', ['filter' => 'role:applicant']);

// Company Routes
$routes->get('/company', 'CompanyController::index', ['filter' => 'role:company']);
$routes->get('/company/index', 'CompanyController::index', ['filter' => 'role:company']);
$routes->get('/company/profile', 'CompanyController::profile', ['filter' => 'role:company']);
$routes->get('/create-company', 'CompanyController::create');
$routes->post('/create-company', 'CompanyController::save');

$routes->get('/edit-company', 'UpdateCompanyController::index');


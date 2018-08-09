<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home',function (BreadcrumbsGenerator $crumb){
    $crumb->push('Home',route('home'));
});

Breadcrumbs::register('register',function (BreadcrumbsGenerator $crumb){
    $crumb->parent('home');
    $crumb->push('Register',route('register'));
});

Breadcrumbs::register('login',function (BreadcrumbsGenerator $crumb){
    $crumb->parent('home');
    $crumb->push('Login',route('login'));
});

Breadcrumbs::register('cabinet',function (BreadcrumbsGenerator $crumb){
    $crumb->parent('home');
    $crumb->push('Cabinet',route('cabinet'));
});

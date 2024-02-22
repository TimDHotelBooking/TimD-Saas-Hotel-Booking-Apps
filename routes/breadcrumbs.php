<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Users;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User List', route('users.index'));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, Users $user) {
    $trail->parent('users.index');
    $trail->push(ucwords($user->name), route('users.show', $user));
});

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Role List', route('roles.index'));
});

Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('roles.index');
    $trail->push(ucwords($role->name), route('roles.show', $role));
});

Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permission List', route('permissions.index'));
});

Breadcrumbs::for('property.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Property List', route('property.index'));
});

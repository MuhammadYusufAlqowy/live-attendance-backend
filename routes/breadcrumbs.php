<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('user.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});

Breadcrumbs::for('user.show', function ($trail, $id) {
    $trail->parent('user.index');
    $user = User::findOrFail($id);
    $trail->push($user->name, route('user.show',$user));
});

Breadcrumbs::for('user.edit', function ($trail, $id) {
    $trail->parent('user.show',$id);
    $user = User::findOrFail($id);
    $trail->push('Edit', route('user.edit', $user));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push('Add', route('user.create'));
});
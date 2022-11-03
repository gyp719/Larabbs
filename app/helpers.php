<?php

use Illuminate\Support\Facades\Route;

function route_class(): array|string|null
{
    return str_replace('.', '-', Route::currentRouteName());
}

function category_nav_active($category_id): string
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}

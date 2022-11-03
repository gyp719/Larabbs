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

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str()->limit($excerpt, $length);
}

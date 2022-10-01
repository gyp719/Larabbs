<?php

use Illuminate\Support\Facades\Route;

function route_class(): array|string|null
{
    return str_replace('.', '-', Route::currentRouteName());
}

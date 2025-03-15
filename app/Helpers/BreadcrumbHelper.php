<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class BreadcrumbHelper
{
    public static function generate()
    {
        $routeName = Route::currentRouteName();
        $segments = request()->segments();
        $breadcrumbs = [['label' => 'Início', 'url' => route('home')]];

        $url = '';

        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = ['label' => ucfirst(str_replace('-', ' ', $segment)), 'url' => url($url)];
        }

        return $breadcrumbs;
    }
}

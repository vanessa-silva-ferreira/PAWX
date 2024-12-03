<?php

namespace App\Providers;

use App\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin.*', SidebarComposer::class);
        View::composer('employee.*', SidebarComposer::class);
        View::composer('client.*', SidebarComposer::class);

        View::composer('partials.dashboard.sidebar', SidebarComposer::class);
    }
}

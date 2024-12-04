<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class SidebarComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $menuItems = [];

        if ($user && $user->hasRole('admin')) {
            $menuItems = [
                ['href' => '/admin/dashboard', 'icon' => 'M148.644...', 'label' => 'Home'],
                ['href' => '/admin/appointments', 'icon' => 'M148.644...', 'label' => 'Marcações'],
                ['href' => '/admin/employees', 'icon' => 'M185.5...', 'label' => 'Colaboradores'],
                ['href' => '/admin/clients', 'icon' => '#', 'label' => 'Clientes'],
                ['href' => '/admin/pets', 'icon' => '#', 'label' => 'Animais'],
            ];
        } elseif ($user && $user->hasRole('employee')) {
            $menuItems = [
                ['href' => '/employee/dashboard', 'icon' => 'M148.644...', 'label' => 'Home'],
                ['href' => '/employee/appointments', 'icon' => 'M148.644...', 'label' => 'Marcações'],
                ['href' => '/employee/clients', 'icon' => '#', 'label' => 'Clientes'],
                ['href' => '/employee/pets', 'icon' => '#', 'label' => 'Animais'],
            ];
        } elseif ($user && $user->hasRole('client')) {
            $menuItems = [
                ['href' => '/client/dashboard', 'icon' => '#', 'label' => 'Client Dashboard'],
            ];
        }
        $view->with('menuItems', $menuItems);
    }
}
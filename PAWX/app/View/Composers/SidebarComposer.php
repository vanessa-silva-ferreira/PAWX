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
                ['href' => '/admin/services', 'icon' => 'M148.644...', 'label' => 'Serviços'],
                ['href' => '/admin/employees', 'icon' => 'M185.5...', 'label' => 'Colaboradores'],
                ['href' => '/admin/pets', 'icon' => 'M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z', 'label' => 'Animais'],
                ['href' => '/admin/clients', 'icon' => '#', 'label' => 'Clientes'],
                ['href' => '/admin/financial-reports', 'icon' => 'M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2V5z', 'label' => 'Finanças'],

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

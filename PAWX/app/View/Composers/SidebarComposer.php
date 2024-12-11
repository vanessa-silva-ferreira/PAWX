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
                [
                    'href' => '/admin/dashboard',
                    'iconPaths' => [
                        ['d' => 'M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Home',
                ],
                [
                    'href' => '/admin/appointments',
                    'iconPaths' => [
                        ['d' => 'M8 2v4', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M16 2v4', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M3 4h18v18H3z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M3 10h18', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M10 16h4', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M12 14v4', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Marcações',
                ],
                [
                    'href' => '/admin/services',
                    'iconPaths' => [
                        ['d' => 'M8.12 8.12 12 12', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M20 4 8.12 15.88', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M14.8 14.8 20 20', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M6 3a3 3 0 1 1 0 6 3 3 0 0 1 0-6z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M6 15a3 3 0 1 1 0 6 3 3 0 0 1 0-6z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Serviços',
                ],
                [
                    'href' => '/admin/employees',
                    'iconPaths' => [
                        ['d' => 'M12 12h.01', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M22 13a18.15 18.15 0 0 1-20 0', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M2 6h20v14H2z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Colaboradores',
                ],
                [
                    'href' => '/admin/pets',
                    'iconPaths' => [
                        ['d' => 'M9 10a5 5 0 0 1 5 5v3.5a3.5 3.5 0 0 1-6.84 1.045Q6.52 17.48 4.46 16.84A3.5 3.5 0 0 1 5.5 10Z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M11 4a2 2 0 1 1 0 4 2 2 0 0 1 0-4z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M18 8a2 2 0 1 1 0 4 2 2 0 0 1 0-4z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M20 16a2 2 0 1 1 0 4 2 2 0 0 1 0-4z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Animais',
                ],
                [
                    'href' => '/admin/clients',
                    'iconPaths' => [
                        ['d' => 'M12 8a5 5 0 1 1 0-10 5 5 0 0 1 0 10z', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M20 21a8 8 0 0 0-16 0', 'stroke' => 'currentColor','stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Clientes',
                ],
                [
                    'href' => '/admin/financial-reports',
                    'iconPaths' => [
                        ['d' => 'M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2V5z', 'stroke' => 'currentColor', 'stroke-width' => '2', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M2 9v1c0 1.1.9 2 2 2h1', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round'],
                        ['d' => 'M16 11h.01', 'stroke' => 'currentColor', 'stroke-width' => '1.5', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']
                    ],
                    'label' => 'Finanças',
                ]








//                ['href' => '/admin/appointments', 'icon' => 'M148.644...', 'label' => 'Marcações'],
//                ['href' => '/admin/services', 'icon' => 'M148.644...', 'label' => 'Serviços'],
//                ['href' => '/admin/employees', 'icon' => 'M185.5...', 'label' => 'Colaboradores'],
//                ['href' => '/admin/pets', 'icon' => 'M148.644...', 'label' => 'Animais'],
//                ['href' => '/admin/clients', 'icon' => 'M148.644...', 'label' => 'Clientes'],
//                ['href' => '/admin/financial-reports', 'icon' => 'M148.644...', 'label' => 'Finanças'],
            ];
        } elseif ($user && $user->hasRole('employee')) {
            $menuItems = [
//                ['href' => '/employee/dashboard', 'icon' => 'M148.644...', 'label' => 'Home'],
//                ['href' => '/employee/appointments', 'icon' => 'M148.644...', 'label' => 'Marcações'],
//                ['href' => '/employee/clients', 'icon' => '#', 'label' => 'Clientes'],
//                ['href' => '/employee/pets', 'icon' => '#', 'label' => 'Animais'],
            ];
        } elseif ($user && $user->hasRole('client')) {
            $menuItems = [
//                ['href' => '/client/dashboard', 'icon' => '#', 'label' => 'Client Dashboard'],
            ];
        }

        $view->with('menuItems', $menuItems);
    }
}

<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View {
        $menuItems = [
            [
                'href' => '/employee/dashboard',
                'icon' => 'M148.644 390.928V329.593C148.644 313.993 161.362 301.317 177.12 301.212H234.842C250.675 301.212 263.51 313.919 263.51 329.593V391.119C263.506 404.364 274.185 415.19 287.561 415.5H326.042C364.402 415.5 395.5 384.714 395.5 346.737V172.257C395.295 157.317 388.21 143.287 376.26 134.161L244.654 29.206C221.599 10.9313 188.824 10.9313 165.768 29.206L34.7405 134.351C22.7452 143.44 15.6477 157.493 15.5 172.447V346.737C15.5 384.714 46.5975 415.5 84.9582 415.5H123.439C137.147 415.5 148.259 404.499 148.259 390.928',
                'label' => 'Home'
            ],
            [
                'href' => '#',
                'icon' => 'M185.5 332.453C298.285 332.453 350.461 317.984 355.5 259.91C355.5 201.876 319.123 205.608 319.123 134.402C319.123 78.7828 266.405 15.5 185.5 15.5C104.595 15.5 51.8769 78.7828 51.8769 134.402C51.8769 205.608 15.5 201.876 15.5 259.91C20.559 318.204 72.7355 332.453 185.5 332.453Z',
                'label' => 'Marcações',
//            'notification' => '8'
            ],
            [
                'href' => '/employee/clients',
                'icon' => '#',
                'label' => 'Clientes'
            ],
            [
                'href' => '/employee/pets',
                'icon' => '',
                'label' => 'Animais'
            ],
        ];
        return view('pages.employee.dashboard', compact('menuItems'));
    }
}

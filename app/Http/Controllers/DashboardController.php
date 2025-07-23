<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        // Aquí puedes agregar datos para el dashboard
        $stats = [
            'total_users' => 1248,
            'total_orders' => 542,
            'total_revenue' => 89240,
            'total_products' => 156,
        ];

        $recent_orders = [
            [
                'id' => 'ORD-001248',
                'customer' => 'Juan Pérez',
                'amount' => 329.99,
                'time' => '2 min'
            ],
            [
                'id' => 'ORD-001247',
                'customer' => 'María García',
                'amount' => 1299.99,
                'time' => '15 min'
            ],
            [
                'id' => 'ORD-001246',
                'customer' => 'Carlos López',
                'amount' => 899.99,
                'time' => '32 min'
            ]
        ];

        $low_stock_products = [
            [
                'name' => 'AMD Ryzen 7 7700X',
                'category' => 'Procesadores',
                'stock' => 3,
                'min_stock' => 10
            ],
            [
                'name' => 'NVIDIA RTX 4070 Ti',
                'category' => 'Tarjetas Gráficas',
                'stock' => 1,
                'min_stock' => 5
            ],
            [
                'name' => 'Corsair Vengeance 32GB',
                'category' => 'Memoria RAM',
                'stock' => 2,
                'min_stock' => 8
            ]
        ];

        return view('components.dashboard.main', compact('stats', 'recent_orders', 'low_stock_products'));
    }

    /**
     * Show users management.
     */
    public function users(): View
    {
        return view('components.dashboard.users.index');
    }

    /**
     * Show products management.
     */
    public function products(): View
    {
        return view('components.dashboard.products.index');
    }

    /**
     * Show orders management.
     */
    public function orders(): View
    {
        return view('components.dashboard.orders.index');
    }

    /**
     * Show analytics.
     */
    public function analytics(): View
    {
        return view('components.dashboard.analytics');
    }

    /**
     * Show reports.
     */
    public function reports(): View
    {
        return view('components.dashboard.reports');
    }

    /**
     * Show settings.
     */
    public function settings(): View
    {
        return view('components.dashboard.settings');
    }
}

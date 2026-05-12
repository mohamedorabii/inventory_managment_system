<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->description('Active products in inventory')
                ->icon('heroicon-o-cube')
                ->color('success'),
            Stat::make('Total Categories', Category::count())
                ->description('Product categories')
                ->icon('heroicon-o-tag')
                ->color('info'),
            Stat::make('Total Suppliers', Supplier::count())
                ->description('Active suppliers')
                ->icon('heroicon-o-truck')
                ->color('warning'),
            Stat::make('Total Orders', Order::count())
                ->description('Customer orders')
                ->icon('heroicon-o-shopping-cart')
                ->color('danger'),
            Stat::make('Total Customers', Customer::count())
                ->description('Active customers')
                ->icon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Total Purchases', Purchase::count())
                ->description('Supplier purchases')
                ->icon('heroicon-o-archive-box')
                ->color('secondary'),
        ];
    }
}

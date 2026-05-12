<?php

namespace App\Filament\Resources\PurchaseDetails\Pages;

use App\Filament\Resources\PurchaseDetails\PurchaseDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePurchaseDetails extends ManageRecords
{
    protected static string $resource = PurchaseDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

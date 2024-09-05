<?php

namespace App\Filament\Resources\UserReferralResource\Pages;

use App\Filament\Resources\UserReferralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserReferral extends EditRecord
{
    protected static string $resource = UserReferralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

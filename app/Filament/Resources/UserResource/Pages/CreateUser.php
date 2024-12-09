<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\CreateAction;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->button()
                ->url(fn(): string => route('filament.admin.resources.users.index', ['tenant' => Filament::getTenant()]))
        ];
    }
}

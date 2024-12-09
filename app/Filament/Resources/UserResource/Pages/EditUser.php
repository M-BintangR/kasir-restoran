<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }

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

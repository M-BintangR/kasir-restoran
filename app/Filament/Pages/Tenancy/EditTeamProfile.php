<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Support\Str;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team Tenant Profil';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Tenant')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug Tenant')
                    ->required()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $name = $get('name');

                        if ($name) {
                            $set('slug', Str::slug($name));
                        }
                    }),
            ]);
    }
}

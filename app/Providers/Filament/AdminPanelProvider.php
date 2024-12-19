<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            // REQUIRED
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()

            // PERMISSION
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())

            // NAVIGATION
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Beranda')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn(): string => Dashboard::getUrl()),
                        ]),
                    NavigationGroup::make('Pengaturan')
                        ->items([
                            ...UserResource::getNavigationItems(),
                            ...PermissionResource::getNavigationItems(),
                            ...RoleResource::getNavigationItems(),
                        ]),
                ]);
            })

            // CUSTOM
            ->userMenuItems([
                // MenuItem::make()
                //     ->label('App Panel')
                //     ->icon('heroicon-o-cog-6-tooth')
                //     ->url('/app')
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Lime,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->brandLogo(asset('ryoogen/logo-ryoogen-light.svg'))
            ->darkModeBrandLogo(asset('ryoogen/logo-ryoogen-dark.svg'))
            ->favicon(asset('ryoogen/favicon.ico'))
            ->brandLogoHeight(1)

            // NOT CUSTOM
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

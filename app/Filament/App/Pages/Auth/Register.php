<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'filament.app.pages.auth.register';

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getFirstNameFormComponent(),
                        $this->getLastNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getFullNameComponent()
                    ])
                    ->statePath('data'),
            ),
        ];
    }
 
    protected function getFirstNameFormComponent(): Component
    {
        return TextInput::make('first_name')
            ->label(__('First Name'))
            ->required()
            ->maxLength(255)
            ->autofocus()
            ->live();
    }

    protected function getLastNameFormComponent(): Component
    {
        return TextInput::make('last_name')
            ->label(__('Last Name'))
            ->required()
            ->maxLength(255)
            ->live();
    }

    protected function getFullNameComponent(): Component
    {
        return TextInput::make('name')
            ->hidden()
            ->label(__('Name'))
            ->default('full name')
            ->maxLength(255);
    }
}

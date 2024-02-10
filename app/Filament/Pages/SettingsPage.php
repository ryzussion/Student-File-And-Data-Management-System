<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Exceptions\Halt;

class SettingsPage extends Page implements HasForms
{
    use InteractsWithForms; 

    public ?array $data = []; 

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string $view = 'filament.pages.settings-page';
    protected static ?string $navigationLabel = "General Settings";
    protected static ?string $navigationGroup = "Settings";
    protected static ?string $title = 'Settings';
    protected static ?int $navigationSort = 4;

    public function mount(): void 
    {
        $setting = Setting::first();
        $this->form->fill($setting->attributesToArray() ?? []);
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Settings')
                    ->description('Settings for the entire application')
                    ->schema([
                        TextInput::make('app_name')
                            ->required(),
                        // Select::make('student_can_register')
                        //     ->native(false)
                        //     ->options([
                        //         1 => 'True',
                        //         0 => 'False'
                        //     ])
                        //     ->required()
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
 
            // auth()->user()->company->update($data);
            Setting::first()->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make() 
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
        
        redirect('')->route('filament.admin.pages.settings-page');
    }
}

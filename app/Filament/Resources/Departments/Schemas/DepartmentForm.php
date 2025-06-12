<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Department Details')
                ->icon('heroicon-o-building-office')
                ->description('Enter department information')
                ->schema([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(100)
                                ->placeholder('e.g., Human Resources')
                                ->label('Department Name')
                                ->hint('Full official name')
                                ->hintIcon('heroicon-o-information-circle', tooltip: 'The official department name')
                                ->columnSpan(['md' => 2]),

                            TextInput::make('slug')
                                ->required()
                                ->maxLength(120)
                                ->unique(ignoreRecord: true)
                                ->placeholder('e.g., hr-department')
                                ->label('URL Identifier')
                                ->hint('Unique URL slug')
                                ->hintIcon('heroicon-o-link', tooltip: 'Used in URLs and APIs')
                                ->columnSpan(['md' => 2]),
                        ])
                        ->columns(['md' => 2])
                        ->columnSpan(1),

                    Textarea::make('description')
                        ->rows(3)
                        ->maxLength(500)
                        ->placeholder('Brief department description...')
                        ->label('Description')
                        ->hint('Max 500 characters')
                        ->hintIcon('heroicon-o-document-text', tooltip: 'Optional description')
                        ->autosize()
                        ->columnSpan(1),
                ])
                ->columns(1)
            ]);
    }
}

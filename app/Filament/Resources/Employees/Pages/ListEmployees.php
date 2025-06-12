<?php

namespace App\Filament\Resources\Employees\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Imports\EmployeeImporter;
use App\Filament\Resources\Employees\EmployeeResource;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->label('Import Employees')
                ->icon('heroicon-o-cloud-arrow-up')
                ->modalHeading('Import Employees from CSV')
                // ->modalDescription('Upload a CSV file to import employee data.')
                ->importer(EmployeeImporter::class),
            CreateAction::make(),
        ];
    }
}

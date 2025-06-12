<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('department.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('employee_code')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('home_phone')
                    ->searchable(),
                TextColumn::make('mobile_phone')
                    ->searchable(),
                TextColumn::make('alt_mobile_phone')
                    ->searchable(),
                TextColumn::make('current_address')
                    ->searchable(),
                TextColumn::make('permanent_address')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                TextColumn::make('date_of_birth_bs')
                    ->searchable(),
                TextColumn::make('date_of_joining')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('position')
                    ->searchable(),
                TextColumn::make('salary')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('work_location')
                    ->searchable(),
                TextColumn::make('id_type')
                    ->searchable(),
                TextColumn::make('id_number')
                    ->searchable(),
                TextColumn::make('ssid_number')
                    ->searchable(),
                TextColumn::make('pan_number')
                    ->searchable(),
                TextColumn::make('bank_account_number')
                    ->searchable(),
                TextColumn::make('employee_location')
                    ->searchable(),
                TextColumn::make('employee_visa_number')
                    ->searchable(),
                TextColumn::make('employee_visa_expiry_date')
                    ->searchable(),
                TextColumn::make('blood_group')
                    ->searchable(),
                TextColumn::make('driving_license_number')
                    ->searchable(),
                TextColumn::make('marital_status')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('first_emergency_contact_name')
                    ->searchable(),
                TextColumn::make('first_emergency_contact_phone')
                    ->searchable(),
                TextColumn::make('first_emergency_contact_relationship')
                    ->searchable(),
                TextColumn::make('second_emergency_contact_name')
                    ->searchable(),
                TextColumn::make('second_emergency_contact_phone')
                    ->searchable(),
                TextColumn::make('second_emergency_contact_relationship')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

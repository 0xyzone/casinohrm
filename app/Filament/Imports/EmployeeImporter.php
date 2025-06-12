<?php

namespace App\Filament\Imports;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Number;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Models\Import;

class EmployeeImporter extends Importer
{
    protected static ?string $model = Employee::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('department')
                ->requiredMapping()
                ->relationship(resolveUsing: function ($state) {
                    $department = Department::where('name', $state)->first();
                    if (!$department) {
                        // If the department does not exist, create it
                        $department = Department::create([
                            'name' => trim($state),
                            'slug' => Str::slug($state),
                        ]);
                    }
                    return $department;
                })
                ->rules(['required']),
            ImportColumn::make('employee_code')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),
            ImportColumn::make('home_phone')
                ->rules(['max:255']),
            ImportColumn::make('mobile_phone')
                ->rules(['max:255']),
            ImportColumn::make('alt_mobile_phone')
                ->rules(['max:255']),
            ImportColumn::make('current_address')
                ->rules(['max:255']),
            ImportColumn::make('permanent_address')
                ->rules(['max:255']),
            ImportColumn::make('date_of_birth')
                ->rules(['date']),
            ImportColumn::make('date_of_birth_bs')
                ->rules(['max:255']),
            ImportColumn::make('date_of_joining')
                ->rules(['date']),
            ImportColumn::make('gender')
                ->rules(['max:255']),
            ImportColumn::make('position')
                ->rules(['max:255']),
            ImportColumn::make('salary')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('work_location')
                ->rules(['max:255']),
            ImportColumn::make('id_type')
                ->rules(['max:255']),
            ImportColumn::make('id_number')
                ->rules(['max:255']),
            ImportColumn::make('ssid_number')
                ->rules(['max:255']),
            ImportColumn::make('pan_number')
                ->rules(['max:255']),
            ImportColumn::make('bank_account_number')
                ->rules(['max:255']),
            ImportColumn::make('employee_location')
                ->rules(['max:255']),
            ImportColumn::make('employee_visa_number')
                ->rules(['max:255']),
            ImportColumn::make('employee_visa_expiry_date')
                ->rules(['max:255']),
            ImportColumn::make('blood_group')
                ->rules(['max:255']),
            ImportColumn::make('driving_license_number')
                ->rules(['max:255']),
            ImportColumn::make('marital_status')
                ->rules(['max:255']),
            ImportColumn::make('father_name')
                ->rules(['max:255']),
            ImportColumn::make('first_emergency_contact_name')
                ->rules(['max:255']),
            ImportColumn::make('first_emergency_contact_phone')
                ->rules(['max:255']),
            ImportColumn::make('first_emergency_contact_relationship')
                ->rules(['max:255']),
            ImportColumn::make('second_emergency_contact_name')
                ->rules(['max:255']),
            ImportColumn::make('second_emergency_contact_phone')
                ->rules(['max:255']),
            ImportColumn::make('second_emergency_contact_relationship')
                ->rules(['max:255']),
            ImportColumn::make('remarks'),
        ];
    }

    public function resolveRecord(): Employee
    {
        return Employee::firstOrNew([
            'email' => $this->data['email'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your employee import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        // Add department creation stats
        $newDepartments = Department::where('created_at', '>=', $import->created_at)->count();
        if ($newDepartments) {
            $body .= ' ' . Number::format($newDepartments) . ' new ' . str('department')->plural($newDepartments) . ' were created.';
        }

        return $body;
    }

    protected function beforeValidate(): void
    {
        // Trim all string input
        foreach ($this->data as $key => $value) {
            if (is_string($value)) {
                $this->data[$key] = trim($value);
            }
        }
    }
}

<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                ->icon('heroicon-o-user-circle')
                ->columnSpanFull()
                ->columns(['md' => 3])
                ->schema([
                    Select::make('department_id')
                        ->relationship('department', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpan(['md' => 2])
                        ->label('Department')
                        ->hintIcon('heroicon-o-building-office', tooltip: 'Select employee department'),
                        
                    TextInput::make('employee_code')
                        ->required()
                        ->maxLength(20)
                        ->unique(ignoreRecord: true)
                        ->label('Employee ID')
                        ->hint('Unique employee identifier')
                        ->placeholder('CWD001'),
                        
                    TextInput::make('name')
                        ->required()
                        ->maxLength(100)
                        ->label('Full Name')
                        ->placeholder('John Doe'),
                        
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(100)
                        ->unique(ignoreRecord: true)
                        ->label('Email Address')
                        ->placeholder('john.doe@example.com')
                        ->columnSpan(['md' => 2]),
                ]),
                
            // Personal Details Section
            Section::make('Personal Details')
                ->icon('heroicon-o-identification')
                ->columns(['md' => 3])
                ->schema([
                    DatePicker::make('date_of_birth')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->maxDate(now())
                        ->label('Date of Birth (AD)')
                        ->columnSpan(['md' => 1]),
                        
                    TextInput::make('date_of_birth_bs')
                        ->label('DoB (BS)')
                        ->placeholder('YYYY-MM-DD')
                        ->columnSpan(['md' => 2])
                        ->hint('Bikram Sambat format'),
                        
                    TextInput::make('father_name')
                        ->maxLength(100)
                        ->label("Father's Name")
                        ->placeholder("Father's full name")
                        ->columnSpan(['md' => 3]),
                        
                    Select::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                            'other' => 'Other',
                        ])
                        ->label('Gender')
                        ->columnSpan(['md' => 1]),
                        
                    Select::make('marital_status')
                        ->options([
                            'single' => 'Single',
                            'married' => 'Married',
                            'divorced' => 'Divorced',
                            'widowed' => 'Widowed',
                        ])
                        ->label('Marital Status')
                        ->columnSpan(['md' => 1]),
                        
                    TextInput::make('blood_group')
                        ->label('Blood Group')
                        ->placeholder('e.g., O+')
                        ->columnSpan(['md' => 1]),
                ]),
                
            // Contact Information Section
            Section::make('Contact Information')
                ->icon('heroicon-o-phone')
                ->columns(['md' => 3])
                ->schema([
                    TextInput::make('home_phone')
                        ->tel()
                        ->maxLength(20)
                        ->label('Home Phone')
                        ->placeholder('+977-1-1234567'),
                        
                    TextInput::make('mobile_phone')
                        ->tel()
                        ->required()
                        ->maxLength(20)
                        ->label('Mobile Phone')
                        ->placeholder('9801234567'),
                        
                    TextInput::make('alt_mobile_phone')
                        ->tel()
                        ->maxLength(20)
                        ->label('Alternate Mobile')
                        ->placeholder('Optional alternative number'),
                        
                    TextInput::make('current_address')
                        ->maxLength(255)
                        ->label('Current Address')
                        ->columnSpanFull()
                        ->placeholder('Current residential address'),
                        
                    TextInput::make('permanent_address')
                        ->maxLength(255)
                        ->label('Permanent Address')
                        ->columnSpanFull()
                        ->placeholder('Permanent residence address'),
                ]),
                
            // Employment Details Section
            Section::make('Employment Details')
                ->icon('heroicon-o-briefcase')
                ->columns(['md' => 3])
                ->schema([
                    DatePicker::make('date_of_joining')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->required()
                        ->label('Joining Date')
                        ->columnSpan(['md' => 1]),
                        
                    TextInput::make('position')
                        ->required()
                        ->maxLength(100)
                        ->label('Position/Title')
                        ->placeholder('e.g., Software Developer')
                        ->columnSpan(['md' => 2]),
                        
                    TextInput::make('salary')
                        ->numeric()
                        ->prefix('$')
                        ->label('Monthly Salary')
                        ->placeholder('0.00')
                        ->columnSpan(['md' => 1]),
                        
                    Select::make('status')
                        ->required()
                        ->default('active')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                            'on_leave' => 'On Leave',
                            'terminated' => 'Terminated',
                        ])
                        ->label('Employment Status')
                        ->columnSpan(['md' => 1]),
                        
                    TextInput::make('work_location')
                        ->maxLength(100)
                        ->label('Work Location')
                        ->placeholder('e.g., Head Office')
                        ->columnSpan(['md' => 1]),
                ]),
                
            // Identification & Documents Section
            Section::make('Identification & Documents')
                ->icon('heroicon-o-document-text')
                ->columns(['md' => 3])
                ->collapsible()
                ->schema([
                    TextInput::make('id_type')
                        ->maxLength(50)
                        ->label('ID Type')
                        ->placeholder('e.g., Citizenship, Passport'),
                        
                    TextInput::make('id_number')
                        ->maxLength(50)
                        ->label('ID Number')
                        ->placeholder('Identification number'),
                        
                    TextInput::make('ssid_number')
                        ->maxLength(50)
                        ->label('SSID Number')
                        ->placeholder('Social Security ID'),
                        
                    TextInput::make('pan_number')
                        ->maxLength(50)
                        ->label('PAN Number')
                        ->placeholder('Permanent Account Number'),
                        
                    TextInput::make('bank_account_number')
                        ->maxLength(50)
                        ->label('Bank Account')
                        ->placeholder('Account number'),
                        
                    TextInput::make('driving_license_number')
                        ->maxLength(50)
                        ->label('Driving License')
                        ->placeholder('License number'),
                ]),
                
            // Emergency Contacts Section
            Section::make('Emergency Contacts')
                ->icon('heroicon-o-shield-exclamation')
                ->columns(['md' => 2])
                ->schema([
                    TextInput::make('first_emergency_contact_name')
                        ->maxLength(100)
                        ->label('Primary Contact Name')
                        ->placeholder('Full name'),
                        
                    TextInput::make('first_emergency_contact_phone')
                        ->tel()
                        ->maxLength(20)
                        ->label('Primary Contact Phone')
                        ->placeholder('Mobile number'),
                        
                    TextInput::make('first_emergency_contact_relationship')
                        ->maxLength(50)
                        ->label('Relationship')
                        ->placeholder('e.g., Spouse, Parent'),
                        
                    Grid::make()
                        ->schema([
                            TextInput::make('second_emergency_contact_name')
                                ->maxLength(100)
                                ->label('Secondary Contact Name')
                                ->placeholder('Full name'),
                                
                            TextInput::make('second_emergency_contact_phone')
                                ->tel()
                                ->maxLength(20)
                                ->label('Secondary Contact Phone')
                                ->placeholder('Mobile number'),
                                
                            TextInput::make('second_emergency_contact_relationship')
                                ->maxLength(50)
                                ->label('Relationship')
                                ->placeholder('e.g., Sibling, Friend'),
                        ])
                        ->columnSpanFull(),
                ]),
                
            // Additional Information Section
            Section::make('Additional Information')
                ->icon('heroicon-o-information-circle')
                ->collapsible()
                ->schema([
                    TextInput::make('employee_location')
                        ->maxLength(100)
                        ->label('Employee Location')
                        ->placeholder('e.g., Casino - KTM'),
                        
                    TextInput::make('employee_visa_number')
                        ->maxLength(50)
                        ->label('Visa Number')
                        ->placeholder('If applicable'),
                        
                    DatePicker::make('employee_visa_expiry_date')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->label('Visa Expiry Date'),
                        
                    Textarea::make('remarks')
                        ->rows(3)
                        ->maxLength(500)
                        ->label('Additional Remarks')
                        ->placeholder('Any additional notes or comments')
                        ->columnSpanFull(),
                ])
            ]);
    }
}

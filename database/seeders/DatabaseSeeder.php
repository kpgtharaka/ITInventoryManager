<?php

namespace Database\Seeders;

use App\Models\Computer;
use App\Models\Employee;
use App\Models\Monitor;
use App\Models\Peripheral;
use App\Models\PeripheralType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id'=> 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=> bcrypt('pass123.')
        ]);
        PeripheralType::factory()->create([
            'id'=>1,
            'type'=> 'Keyboard',
            'description'=>'Standard 101 Keyboard'
        ]);
        PeripheralType::factory()->create([
            'id'=>2,
            'type'=> 'Mouse',
            'description'=>'3 button Mouse'
        ]);
        PeripheralType::factory()->create([
            'id'=>3,
            'type'=> 'Printer',
            'description'=>'Standard Laser Printer'
        ]);
        PeripheralType::factory()->create([
            'id'=>4,
            'type'=> 'Scanner',
            'description'=>'A4 Scanner'
        ]);
        Peripheral::factory(50)->create();
        Employee::factory(50)->create();        
        Computer::factory(50)->create();      
        Monitor::factory(50)->create();
    }
}

<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dipendenti = [
            [
                'name' => 'Mario',
                'last_name' => 'Rossi'
            ],
            [
                'name' => 'Marco',
                'last_name' => 'Gialli'
            ],
            [
                'name' => 'Luca',
                'last_name' => 'Verdi'
            ]

        ];
           
        foreach ($dipendenti as $item) {
            
            $newDipendente = new Employee();

            $newDipendente->name = $item['name'];
            $newDipendente->last_name = $item['last_name'];


            $newDipendente->save();
        }
        
    }
}

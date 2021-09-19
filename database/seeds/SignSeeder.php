<?php

use App\Sign;
use Illuminate\Database\Seeder;

class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timbrate = [
            [
                'dipendente_id' => '2',
                'dataora' => '2020-12-03 22:00:00',
                'verso' => 'E'
            ],
            [
                'dipendente_id' => '3',
                'dataora' => '2020-12-03 22:05:00',
                'verso' => 'E'
            ],
            [
                'dipendente_id' => '3',
                'dataora' => '2020-12-04 06:00:00',
                'verso' => 'U'
            ],
            [
                'dipendente_id' => '2',
                'dataora' => '2020-12-04 06:05:00',
                'verso' => 'U'
            ],
            [
                'dipendente_id' => '1',
                'dataora' => '2020-12-04 09:00:00',
                'verso' => 'E'
            ],
            [
                'dipendente_id' => '1',
                'dataora' => '2020-12-04 13:00:00',
                'verso' => 'U'
            ],
            [
                'dipendente_id' => '1',
                'dataora' => '2020-12-04 14:00:00',
                'verso' => 'E'
            ],
            [
                'dipendente_id' => '1',
                'dataora' => '2020-12-04 18:00:00',
                'verso' => 'U'
            ],
        ];

        foreach ($timbrate as $item) {
            
            $newTimbrata = new Sign();

            $newTimbrata->employee_id = $item['dipendente_id'];
            $newTimbrata->dataora = $item['dataora'];
            $newTimbrata->verso = $item['verso'];

            $newTimbrata->save();
        }
    }
}

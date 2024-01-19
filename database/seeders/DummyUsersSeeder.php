<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Bos Surya',
                'email'=>'surezput12@gmail.com',
                'role'=>'GH',
                'password'=>bcrypt('apawe'),
            ],
            [
                'name'=>'Bang Azka',
                'email'=>'anaufal962@gmail.com',
                'role'=>'MGR',
                'password'=>bcrypt('iniwe'),
            ],
            [
                'name'=>'Omega',
                'email'=>'omegz02@gmail.com',
                'role'=>'SPV',
                'password'=>bcrypt('1234'),
            ],
            [
                'name'=>'Zaenal',
                'email'=>'zaenal23@gmail.com',
                'role'=>'Staff',
                'password'=>bcrypt('4321'),
            ],
            [
                'name'=>'Aliya',
                'email'=>'athena02@gmail.com',
                'role'=>'QA',
                'password'=>bcrypt('2502'),
            ],
        ];
        
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}

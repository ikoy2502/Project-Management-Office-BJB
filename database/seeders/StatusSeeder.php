<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusData = [
            ['id' => 1, 'nama' => 'Todo'],
            ['id' => 2, 'nama' => 'On-Progress'],
            ['id' => 3, 'nama' => 'Testing'],
            ['id' => 4, 'nama' => 'Waiting-Deploy'],
            ['id' => 5, 'nama' => 'Done'],
            ['id' => 6, 'nama' => 'Cancel'],
            ['id' => 7, 'nama' => 'Pending'],
            ['id' => 8, 'nama' => 'Inisiasi'],
        ];
        Status::insert($statusData);
    }
}

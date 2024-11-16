<?php

namespace Database\Seeders;

use App\Models\adoptionForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ShelterInformationSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            AnimalSeeder::class,
            AdoptionQuestionsSeeder::class,
            handoverQuestionsSeeder::class,
            AdoptionFormSeeder::class,
            HandoverFormSeeder::class,
            AdoptionAnswersSeeder::class,
            HandoverAnswersSeeder::class,
            ReportFormSeeder::class,
        ]);
    }
}

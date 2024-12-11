<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allergies = [
            "Glutine",
            "Crostacei",
            "Uova",
            "Pesce",
            "Arachidi",
            "Soia",
            "Latticini",
            "Frutta a Guscio",
            "Sedano",
            "Senape",
            "Semi di Sesamo",
            "Andride solforosa e solfiti",
            "Lupini",
            "Molluschi"
        ];


        foreach ($allergies as $allergy) {
            $newAllergy = new Allergy();
            $newAllergy->name = $allergy;
            $newAllergy->slug = Str::slug($allergy, '-');
            $newAllergy->save();
        }
    }
}

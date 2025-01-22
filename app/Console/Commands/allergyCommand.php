<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Allergy;
use Illuminate\Support\Str;

class allergyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'allergy-default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
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

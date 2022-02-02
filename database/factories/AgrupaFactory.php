<?php

namespace Database\Factories;

use App\Models\Agrupa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AgrupaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $IdPlanificacion = DB::table('Planificacion')->pluck('IdPlanificacion');
        $documentNames = DB::table('Planes')->pluck('documentName');
        $aleatorio1=random_int(0,count($IdPlanificacion)-1);
        $aleatorio2=random_int(0,count($documentNames)-1);

        return [
            'IdPlanificacion' => $IdPlanificacion[$aleatorio1],
            'DocumentName' => $documentNames[$aleatorio2],
        ];
    }

}
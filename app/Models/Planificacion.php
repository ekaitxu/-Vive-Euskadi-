<?php

namespace App\Models;

use Database\Factories\PlanificacionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'planificacion';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'IdPlanificacion',
        'id',
        'NombrePlanificacion',
        'Descripcion',
    ];
}

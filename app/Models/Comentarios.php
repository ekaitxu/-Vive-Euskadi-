<?php

namespace App\Models;

use Database\Factories\ComentariosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'comentarios';

    protected $primaryKey = 'IdComentario';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'IdComentario',
        'id',
        'DocumentName',
        'Texto',
        'Fecha',
    ];
}

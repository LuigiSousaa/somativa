<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = [
        'titulo',
        'descricao',
        'projeto_id',
        'isDone',
    ];

    /**
     * The users that belong to the projeto.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class); // muitos p muitos
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}

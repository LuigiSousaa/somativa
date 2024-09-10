<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';

    protected $fillable = [
        'titulo',
        'descricao',
        'isDone',
        'user_id'
    ];

    /**
     * The users that belong to the projeto.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'projeto_id'); // muitos p muitos
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public function updateStatus()
    {
        $this->isDone = $this->tarefas->every(fn($tarefa) => $tarefa->isDone);
        $this->save();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ro749\SharedUtils\Models\ModelTrait;
use Ro749\SharedUtils\Models\Attribute;
use Ro749\SharedUtils\Models\Editable;
use Ro749\SharedUtils\Enums\Icon;

class User extends Authenticatable
{
    use ModelTrait;
    public string $owner;
    public function __construct()
    {
        $this->attributes = [
            'name'=>new Attribute(
                label:"Nombre",
                placeholder:"Escriba el nombre",
                editable: Editable::ALLWAYS,
                rules: ["required"],
                icon: Icon::USER->value,
            ),
            'email'=>new Attribute(
                label:"Email",
                placeholder:"Escriba el email",
                editable: Editable::ALLWAYS,
                rules: ["required", "unique"],
                icon: Icon::EMAIL->value,
            ),
            'password'=>new Attribute(
                label:"Contraseña",
                placeholder:"",
                editable: Editable::CREATE,
                rules: ["required"],
                icon: Icon::PASSWORD->value,
                encrypt: true
            ),
        ];
    }

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
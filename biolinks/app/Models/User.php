<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // = Não precisa do fillable pois ja colocou no provider que todo Model deve ser guard, sendo assim nao bloqueia nenhum campo de ser registrado no banco 

    /* protected $fillable = [
        'name',
        'email',
        'password',
    ]; */

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

    // ! IMPORTANTE

    // = Laravel tenta procurar por uma propriedade link mas nao existe, entao ele tenta procurar por um metodo
    // = ele é do tipo de relacionamento, entao o laravel ve que é de um relacionamento, ele executa a query no banco
    // = e retorna os relacionamentos daquele metodo
    public function links()
    {
        // desse modo o laravel sabe que esse model pode ter 1 ou muitos links associados
        return $this->hasMany(Link::class);
    }
}

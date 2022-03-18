<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Importantísimo importar Illuminate\Contracts\Auth\Authenticatable para poder logearse
class Users extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'email', 'password'];

    /**
     * Encuentra todos los usuarios de la base de datos
     * @return \Illuminate\Support\Collection
     */
    public function findAll()
    {
        return DB::table($this->table)->get();
    }

    /**
     * Encuenta el usuario según la condición pasada por parámetro
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|object|static|null
     */
    public function find($column, $value)
    {
        return DB::table($this->table)->where($column, $value)->first();
    }

    /**
     * Inserta un usuario con los datos pasados por parámetro
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        if (Hash::needsRehash($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }

        $user = new Users($data);

        if (isset($user)) {
            $bd_users = $this->findAll();
            foreach ($bd_users as $bd_user) {
                if ($user->email == $bd_user->email) {
                    return back()->withErrors([
                        'email' => 'Ese correo ya está siendo usado'
                    ]);
                }
            }
        }

        return $user->save();
    }

    /**
     * Actualiza un usuario con los datos pasados por parámetro
     * @param object $data
     * @return int
     */
    public function update2($data)
    {
        if (Hash::needsRehash($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }

        return DB::table($this->table)->update([
            'nombre' => $data["nombre"],
            'email' => $data["email"],
            'password' => $data["password"]
        ]);
    }

    /**
     * Borra un usuario según la condición pasada por parámetro
     * @param int $id
     * @return int
     */
    public function delete2($column, $value)
    {
        return DB::table($this->table)->where($column, $value)->delete();
    }
}

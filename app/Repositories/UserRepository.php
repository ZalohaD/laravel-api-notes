<?php

namespace App\Repositories;


use App\Models\User;

class UserRepository {
    public function findByPhone (string $phone){
        return User::where('phone', $phone)->first();
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser (array $data){
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        $user = User::find($id);

        if (!$user):
            return null;
        endif;

        $user->update($data);

        return $user;
    }

    public function delete (int $id){
        $user = User::find($id);

        if (!$user):
            return null;
        endif;

        return $user->delete();
    }

    public function find(int $id){
        return User::find($id);
    }

    public function getAll(){
        return User::paginate();
    }


    public function deactivate(int $id){
        $user = User::find($id);
        return $user->update(['is_active' => '0']);
    }
}

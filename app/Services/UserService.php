<?php

namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;

class UserService {

    public function __construct(
        protected UserRepository $userRepository
    ) {}


    public function getProfile(User $user){
        return $this->userRepository->find($user->id);
    }

    public function updateProfile (User $user, array $data){
        return $this->userRepository->update($user->id, $data);
    }

    public function deleteProfile (User $user){
        return $this->userRepository->delete($user->id);
    }

    public function getAllUsers(){
        return $this->userRepository->getAll();
    }

    public function getUserDetails(int $id){
        return $this->userRepository->find($id);
    }
}

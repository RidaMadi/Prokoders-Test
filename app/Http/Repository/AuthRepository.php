<?php


namespace App\Http\Repository;


use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    private $user,$group_user;
    public function __construct(User $user,UserGroup $group)
    {
        $this->user =  $user;
        $this->group_user =  $group;
    }

    public function register(array $data)
    {
        return $this->user->create($data);
    }

    public function addToPublic($user_id)
    {
        return $this->group_user->create([
            'user_id' => $user_id ,
            'group_id' => 1 ,
        ]);
    }

    public function login(array $data)
    {
        return $this->user->where('email', $data['email'])->first();
    }

}

<?php

namespace Hitocean\LaravelAuth\User\User\Tasks;

use Hitocean\LaravelAuth\User\User\Models\User;

class StoreVerifiedUserTask
{
    public static function run(string $name, string $email, string $password, array $roles): User
    {
        $user = User::create([
                                 'name' => $name,
                                 'email' => $email,
                                 'password' => \Hash::make($password),
                             ]);
        $user->assignRole($roles);
        $user->email_verified_at = now();
        $user->save();

        return $user;
    }
}

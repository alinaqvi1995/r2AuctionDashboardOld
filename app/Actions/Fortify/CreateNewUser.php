<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'middle_name'  => ['required'],
            'last_name'  => ['required'],
            'phone'  => ['required'],
            'state'  => ['required'],
            'city'  => ['required'],
            'address'  => ['required'],
            'business_name'  => ['required'],
            'business_email'  => ['required'],
            'designation'  => ['required'],
            'business_website'  => ['required'],
            'business_desc'  => ['required'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone'],
            'state' => $input['state'],
            'city' => $input['city'],
            'address' => $input['address'],
            'business_name' => $input['business_name'],
            'business_email' => $input['business_email'],
            'designation' => $input['designation'],
            'business_website' => $input['business_website'],
            'business_desc' => $input['business_desc'],
            'role'  => $input['role'],
        ]);
    }
}

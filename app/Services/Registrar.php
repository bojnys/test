<?php namespace App\Services;

use App\User;
use DB;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
    {
        $data['slug'] = str_random(16);
        $rules = array('slug' => 'unique:users,slug');
        $validator = Validator::make($data, $rules);

        while ($validator->fails()) {
            $data['slug'] = str_random(16);
            $rules = array('slug' => 'unique:users,slug');
            $validator = Validator::make($data, $rules);

        }

		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
            'slug' => $data['slug'],
            'role' => 1,
            'street' => $data['street'],
            'number' => $data['number'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city']
		]);
	}

}

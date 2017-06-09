<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Hash;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'provider_id', 'provider',
        'avatar', 'gender', 'location', 'website', 'oauth_token', 'oauth_token_secret'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarUrl()
    {
        if(is_null($this->avatar)) {
            return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mm&s=40";
        }

        return $this->avatar;
    }

    public function getAccessToken()
    {
        return $this->oauth_token;
    }

    public function getAccessTokenSecret()
    {
        return $this->oauth_token_secret;
    }

    public function isExists($email){
        return self::query()->where("email", "=", $email)->get()->count();
    }

    public function getUser($email){
        $user = new User();
        //dd(Auth::attempt(array('email' => $email, 'password' => $password)));
        //$db_pw = $user->
        //$db_pw = DB::select("select password from users where email = ?", array($email));
        //dd($db_pw);
        //dd(password_verify($db_pw->password,Hash::make($password)));
        return $user = $user->query()->where("email","=",$email)->first();
    }

    public function keys(){
        return $this->hasMany('App\Key');
    }

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }
}

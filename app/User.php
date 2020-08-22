<?php

namespace App;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Auth\MustVerifyEmail;


//アカウント作成時にメールを送信する
class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new CustomResetPassword($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 現在のユーザー、または引数で渡されたIDが管理者かどうかを返すメゾッド
     */
    public function isAdmin($id = null) {
        //条件式 ? 式1 : 式2  (条件式を評価し、TRUEであれば式1、FALSEであれば式2を返す)
        //$idの中身がある場合は$idの値を返す。中身がnullの場合は引数の初期値であるnullを返す。
        $id = ($id) ? $id : $this->id;
        return $id == config('admin_id');
    }

    public function messages()
    {
        $this->hasMany('App\Message');
    }

    public function boards()
    {
        $this->hasMany('App\Board');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Image;
use App\Models\Comment;
use Laravel\Cashier\Billable;
use App\Models\Tag;


class User extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;
    use HasApiTokens;
   
    

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'CNIC',
        'license_number',
        'device_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
     public function roles(){
        return $this->belongsToMany('App\Models\Role');
     }
     public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
     }
     public function image(){
        return $this->morphOne(Image::class,'imageable');
     }
     public function posts(){
        return $this->hasMany('App\Models\Post');
     }

     public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
     }
     /**
      * check user has any post or not
      * 
      * @params int $user_id
      * @return bool
      * */
     public function hasPost($user_id = null)
     {
        $post = $this->posts()->where('user_id',$user_id);
        if($post->count() > 0)
        {
            return true;
        }
        return false;
    }
    /**
     * add post to user
     * @params array|mix $user_id
     * @return boolean
     */
    public function addPost($user_id)
    {
        $user_ids = is_array($user_id) ? $user_id : (array) func_get_args();

        return collect($user_ids)->each(function($user_id){

            User::posts()->create(['user_id'=>$user_id,'title'=>'add','peragraph'=>'af']);
        });
    }

}

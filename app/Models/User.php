<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'user_type',
    ];

    // protected $hidden = [
    //     'password'
    // ];

    public $timestamps = false;


    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at !== null;
    }

    public function markEmailAsVerified()
    {
        $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendEmailVerificationNotification()
    {
        // Code pour envoyer la notification d'email de vérification
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public function sendPasswordResetNotification($token)
    {
        // Code pour envoyer la notification de réinitialisation du mot de passe
    }

    // Ajoutez d'autres méthodes spécifiques à votre modèle User si nécessaire
}


    // Vous pouvez définir des relations ici, par exemple :
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }


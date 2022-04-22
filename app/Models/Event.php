<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Service;

class Event extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function upsertInstance($request)
    {
        $event = self::updateOrCreate(
            ['id' => $this->id],
            [$request->all()]
        );

        return $this->result($event,'success');
    }

    public function deleteInstance()
    {
        $this->delete();
        return $this->result($this,'success');
    }

    public function scopeFilter($query,$request)
    {
        return $query;
    }


}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static public function getRecord()
    {
        $records = self::select('users.*');

        if (!empty(Request::get('id'))) {
            $records = $records->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('name'))) {
            $records = $records->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $records = $records->where('last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        $records = $records
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $records;
    }

    public function get_job_single()
    {
        return $this->belongsTo(Job::class, "job_id");
    }

    public function get_department_single()
    {
        return $this->belongsTo(Department::class, "department_id");
    }

    public function get_manager_single()
    {
        return $this->belongsTo(Manager::class, "manager_id");
    }
}

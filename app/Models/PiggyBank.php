<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiggyBank extends Model
{
    use HasFactory;

    protected $table = 'piggies_bank';
    protected $primaryKey = 'id_piggy_bank';
    protected $fillable = ['title', 'milestone', 'amount', 'color', 'icon', 'id_user', 'deleted', 'deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}

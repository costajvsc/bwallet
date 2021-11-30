<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';
    protected $fillable = ['transaction', 'amount', 'accounting_entry', 'occurrence_at', 'id_category', 'id_piggy_bank', 'id_payment', 'id_user', 'deleted', 'deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function PiggyBank()
    {
        return $this->belongsTo(PiggyBank::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }
}

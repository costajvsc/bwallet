<?php 

namespace App\Services;

use App\Models\PiggyBank;
use App\Models\Category;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class LoadDataService 
{
    public static function getPiggiesBank()
    {
        return PiggyBank::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }
    
    public static function getCategories()
    {
        return Category::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }

    public static function getPayments()
    {
        return Payment::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }
}
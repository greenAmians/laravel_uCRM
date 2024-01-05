<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Subtotal;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    protected static function booted()
    {
        static::addGlobalScope(new Subtotal);
    }

    public function scopeBetweenDate($query, $startDate = '0000-00-00', $endDate = '9999-99-99')
    {
        return $query->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate . ' 23:59:59');
    }
}

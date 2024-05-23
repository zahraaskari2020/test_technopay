<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Components\Filters\FilterBuilder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'status'
    ];
    protected $dates = ['created_at', 'updated_at'];

    const IN_PROGRESS = 'in_progress';
    const FINISHED = 'finished';
    const CANCELED = 'canceled';
    const RETURNED = 'returned';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilterBy($query, $filters): Builder
    {
        $namespace = 'App\Components\Filters\OrderFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);
        return $filter->apply();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteQuote extends Model
{
    use HasFactory;

    protected $table = 'favorite_quotes';

    protected $fillable = [
        'user_id',
        'quote_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}

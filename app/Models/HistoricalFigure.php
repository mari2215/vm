<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalFigure extends Model
{
    use HasFactory;
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    protected $table = 'historical_figures';
    protected $fillable = [
        'name',
        'image',
        'description',
        'article_url'
    ];
}

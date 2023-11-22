<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    public function figures()
    {
        return $this->belongsToMany(HistoricalFigure::class);
    }
    protected $fillable = [
        'name',
        'event_date',
        'description',
        'image',
        'photo_description',
        'marker_id',
        'article_url',
        'video_url'
    ];
}

<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends BaseModel
{
    use HasFactory,Sluggable;
    
    public $fillable = [
        'title',
        'slug',
        'content',
    ];
    protected $casts = [
        'content' => 'array',
    ];
    public function sluggable(): array
    {
            return [
                'slug' => [
                    'source' => 'title'
                ]
            ];
    }
}

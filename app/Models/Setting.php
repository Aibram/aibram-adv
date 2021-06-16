<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'choices' => 'array',
    ];
    protected $appends = [
        'value_default'
    ];
    public $fillable = [
        'key',
        'value',
        'type',
        'choices',
        'key_explained',
        'default'
    ];

    public function getValueDefaultAttribute(){
        return !empty($this->value) ? $this->value : $this->default;
    }
}

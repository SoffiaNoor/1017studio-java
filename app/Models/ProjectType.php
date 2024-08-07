<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;
    protected $table = 'project_type';

    protected $fillable = [
        'id_project',
        'name',
        'small_description',
        'image',
        'image_360',
        'luas_bangunan',
        'luas_tanah',
        'fondasi',
        'dinding',
        'plafon',
        'kamar_tidur',
        'kamar_mandi',
        'carport',
        'air',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function projectTypeImages()
    {
        return $this->hasMany(ProjectTypeImage::class, 'id_project_type');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table='classroom';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'info_title', 'info_image', 'info_description', 'info_link', 'info_remark','video_title', 'video_link', 'file1', 'file2', 'file3','file4', 'file5', 'remark'
    ];
}

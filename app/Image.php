<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Image extends Model {
    protected $table = 'files';
    protected $fillable = [
        'title',
        'description',
        'image',
        'name',
        'size'
    ];
}
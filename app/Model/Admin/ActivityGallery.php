<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;

class ActivityGallery extends Model
{
    protected $table = 'activity_galleries';
    protected $fillable = ['activity_id', 'image_id'];

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }

    public function activity() {
        return $this->belongsTo(Activiy::class, 'activity_id');
    }

    public function removeFromDB() {
        if ($this->image) $this->image->removeFromDB();
        $this->delete();
    }
}

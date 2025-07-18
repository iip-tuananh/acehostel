<?php

namespace App\Model\Admin;
use App\Helpers\FileHelper;
use Auth;
use App\Model\BaseModel;
use App\Model\Common\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use DB;
use App\Model\Common\Notification;

class Activiy extends BaseModel
{
    protected $table = 'activites';
    public function canEdit()
    {
        return Auth::user()->id = $this->create_by;
    }

    public function canDelete()
    {
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function galleries()
    {
        return $this->hasMany(ActivityGallery::class, 'activity_id', 'id');
    }

    public static function searchByFilter($request) {
        $result = self::with([
            'user',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%'.$request->name.'%');
        }

        $result = $result->orderBy('created_at','desc')->get();
        return $result;
    }

    public static function getForSelect() {
        return self::where('status', 1)
            ->select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id) {
        return self::where('id', $id)
            ->with(['image', 'galleries' => function ($q) {
                $q->select(['id', 'activity_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            }])
            ->firstOrFail();
    }

    public static function getDataForShow($id) {
        return self::where('id', $id)
            ->with(['image', 'galleries' => function ($q) {
                $q->select(['id', 'activity_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            }])
            ->firstOrFail();
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }
            $deleted = ActivityGallery::where('activity_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, ActivityGallery::class);
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = ActivityGallery::find($g['id']);
                else $gallery = new ActivityGallery();

                $gallery->activity_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ActivityGallery::class);
                        $gallery->image->removeFromDB();
                    }
                    $file = $g['image'];
                    // FileHelper::uploadFile($file, 'product_gallery', $gallery->id, ProductGallery::class, null, 99);
                    FileHelper::uploadFileToCloudflare($file, $gallery->id, ActivityGallery::class, null);
                }
            }
        } else {
            $deleted = ActivityGallery::where('activity_id', $this->id)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, ActivityGallery::class);
                }
                $item->removeFromDB();
            }
        }
    }

}

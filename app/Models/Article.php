<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;
    protected $fillable = ['title','description','image','user_id','slug','status'];
    private static $article,$articleImage, $imageName, $imageDirectory, $imageUrl;

    public static function saveImage($request, $existImage = null){
        self::$articleImage = $request->file('image');
        if (self::$articleImage){
            if ($existImage){
                if (file_exists($existImage)){
                    unlink($existImage);
                }
            }
            self::$imageName = 'biztrox_'.time().'.'.self::$articleImage->getClientOriginalExtension();
            self::$imageDirectory = 'admin/assets/images/upload-images/articles/';
            self::$articleImage->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;

        }else{
            self::$imageUrl = $existImage;
        }
        return self::$imageUrl;
    }
    public static function createOrUpdateArticle($request,$id = null){
        Article::updateOrCreate(['id'=>$id], [
            'title' => $request->title,
            'description' => $request->description,
            'image' =>self::saveImage($request,isset($id)? Article::find($id)->image : ''),
            'user_id' => auth()->id(),
            'slug'=> str_replace(' ', '-',$request->title),
            'status' => $request->status,
        ]);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}

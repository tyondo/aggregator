<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];
   // protected $filePath = '/vendor/tyondo/aggregator/images/'; //setting the file path here to avoid hard coding it
    protected $filePath = ''; //setting the file path here to avoid hard coding it

    public function getFileAttribute($photo) //creating the file accessor
    {
      return $this->filePath . $photo;
    }
    public function team()
    {
        return $this->belongsTo('\Tyondo\MusoniWebsite\Models\Team');
    }
    public function testimonial()
    {
        return $this->belongsTo('\Tyondo\MusoniWebsite\Models\Testimonial');
    }

}

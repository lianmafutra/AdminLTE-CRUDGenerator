<?php
        namespace App;
        use Illuminate\Database\Eloquent\Model;
        class Student extends Model
        {
            protected $table = 'student';

            protected $fillable = ['id','name','photo',];
           
            protected function getCreatedAtAttribute()
            {
                return \Carbon\Carbon::parse($this->attributes["created_at"])->format("d-m-Y H:i:s");
            }
        }
<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;
    protected $guarded = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

//    public function getStatusClasses()
//    {
//        $allStatuses = [
//            'Open' => 'bg-gray-200',
//            'Considering' => 'bg-purple text-white',
//            'In Progress' => 'bg-yellow text-white',
//            'Implemented' => 'bg-green text-white',
//            'Closed' => 'bg-red text-white',
//        ];

//        return $allStatuses[$this->status->name];

//        -----------------  if else cases  -----------------------
//        if($this->status->name === 'Open'){
//            return 'bg-gray-200';
//        } elseif ($this->status->name === 'Considering') {
//            return 'bg-purple text-white';
//        }elseif ($this->status->name === 'In Progress') {
//            return 'bg-yellow text-white';
//        }elseif ($this->status->name === 'Implemented') {
//            return 'bg-green text-white';
//        }elseif ($this->status->name === 'Closed') {
//            return 'bg-red text-white';
//        }
//
//        return 'bg-gray-200';
//        ---------------   switch  cases-------------------------

//        switch ($this->status->name)
//        {
//            case 'Open':
//                return 'bg-gray-200';
//                break;
//            case 'Considering':
//                return 'bg-purple text-white';
//                break;
//            case 'In Progress':
//                return 'bg-yellow text-white';
//                break;
//            case 'Implemented':
//                return 'bg-green text-white';
//                break;
//            case 'Closed':
//                return 'bg-red text-white';
//                break;
//            default:
//                return 'bg-gray-200';
//        }
//    }
}

<?php

namespace App\Models;

use App\Exceptions\DublicateVoteException;
use App\Exceptions\VoteNotFoundException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;


    const CATEGORY_TUTORIAL_REQUEST = 'Tutorial Request';
    const CATEGORY_LARACASTS_FEATURE = 'Laracasts Feature';

    protected $guarded = [];
    public $votes_count;

    protected $perPage = 10;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


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

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return Vote::where('user_id', $user->id)->where('idea_id', $this->id)
            ->exists();
    }

    public function removeVote(User $user)
    {
        $voteToDelete = Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->first();

        if ($voteToDelete) {
            $voteToDelete->delete();
            $this->votes_count--;
        } else {
            throw new VoteNotFoundException;
        }
    }

    public function vote(User $user)
    {
        if ($this->isVotedByUser($user)) {
            throw new DublicateVoteException;
        }
        $this->votes_count++;
        Vote::create([
            'user_id' => $user->id,
            'idea_id' => $this->id,
        ]);
    }
}

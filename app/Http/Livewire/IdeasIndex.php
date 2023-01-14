<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Category;
use Livewire\Component;
use App\Models\Status;
use App\Models\Vote;
use App\Models\Idea;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status;
    public $category;
    public $filter;
    public $search;


    protected $queryString = [
        'status',
        'category',
        'filter',
        'search',
    ];

    protected $listeners = ['queryStringUpdatedStatus'];


    public function mount()
    {
        $this->status = request()->status ?? 'All';
        // $this->category = request()->category ?? 'All Category';
        // $this->filter = request()->filter ?? 'No Filter';
    }


    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if($this->filter === 'My Ideas'){
            if(! auth()->check()){
                return redirect()->route('login');
            }
        }
    }


    public function queryStringUpdatedStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        $statuses = Status::pluck('id', 'name');

        $categories = Category::all();


        return view('livewire.ideas-index', [
            'ideas' => Idea::with('user', 'category', 'status')->when($this->status && $this->status !== 'All', function($query) use ($statuses) {
                return $query->where('status_id', $statuses->get($this->status));
            })
            ->when($this->category && $this->category !== 'All Category', function($query) use ($categories) {
                return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
            })
            ->when($this->filter && $this->filter === 'Spam Ideas', function($query) {
                return $query->where('spam_reports', '>', 0)->orderByDesc('spam_reports');
            })
            ->when($this->filter && $this->filter === 'Top Voted', function($query) {
                return $query->orderByDesc('votes_count');
            })
            ->when($this->filter && $this->filter === 'Spam Comments', function($query) {
                return $query->whereHas('comments', function ($query) {
                    $query->where('spam_reports', '>', 0)->orderByDesc('spam_reports');
                });
            })
            ->when($this->filter && $this->filter === 'My Ideas', function($query) {
                return $query->where('user_id', auth()->id());
            })
            ->when( strlen($this->search)  >= 3, function($query) {
                return $query->where('title', 'like', '%'.$this->search.'%');
            })
            ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->withCount('comments')
                ->orderBy('id', 'desc')
                ->simplePaginate(),
            'categories' => $categories,
            // 'filters' => $filters,
        ]);
    }


}

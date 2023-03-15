<?php

namespace App\Http\Livewire;

use App\Models\Home;
use App\Models\Pref;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use MatanYadaev\EloquentSpatial\Objects\Point;

class HomeIndex extends Component
{
    use WithPagination;

    public ?Pref $pref = null;
    public ?string $area = null;

    public ?string $q = null;
    /** @var string|null 並べ替え */
    public ?string $sort = null;
    public ?int $level = null;
    public ?int $type = null;
    public ?int $vacancy = null;

    protected $queryString = [
        'q', //キーワード
        'sort', //並べ替え
        'level', //対象区分
        'type', //類型
        'vacancy', //空室
    ];

    public function mount(Request $request)
    {
        foreach ($this->queryString as $query) {
            $this->$query = $request->input($query);
        }
    }

    public function updatedPage($page)
    {
        //ページが変わった時に一番上にスクロール。
        $this->dispatchBrowserEvent('page-updated', ['page' => $page]);
    }

    public function render()
    {
        $query = is_null($this->pref) ? Home::query() : $this->pref->homes();

        return view('livewire.home-index')->with([
            'homes' => $query->when(filled($this->area), fn (Builder $query) => $query->where('area', $this->area))
                             ->with(['cost'])
                             ->keywordSearch($this->q)
                             ->sortBy($this->sort)
                             ->levelSearch($this->level)
                             ->typeSearch($this->type)
                             ->vacancySearch($this->vacancy)
                             ->addTotalCost()
                             ->paginate()
                             ->withQueryString()
                             ->onEachSide(1),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * 詳細検索.
 */
class DetailSearch extends Component
{
    use WithPagination;

    public ?string $pref_id = null;
    public string $area = '';
    public ?array $areas = null;

    /** @var string|null キーワード */
    public ?string $q = null;
    /** @var string|null 並べ替え */
    public ?string $sort = 'updated';
    /** @var int|string|null 空室 */
    public int|string|null $vacancy = null;

    /** @var array<int, bool> 対象区分 */
    public array $levels = [];
    /** @var array<int, bool> サービス類型 */
    public array $types = [];
    /** @var array<string, bool> 共有設備 */
    public array $facilities = [];
    /** @var array<string, bool> 居室設備 */
    public array $equipments = [];

    protected $queryString = [
        'q',
        'sort' => ['except' => 'updated'],
    ];

    public function mount()
    {
        $this->levels = collect(range(start: 0, end: 6))
            ->mapWithKeys(fn ($level) => [$level => true])
            ->toArray();

        $this->types = collect(range(start: 0, end: 4))
            ->mapWithKeys(fn ($type) => [$type => true])
            ->toArray();

        $this->facilities = collect(config('facility'))
            ->mapWithKeys(fn ($item, $key) => [$key => false])
            ->toArray();

        $this->equipments = collect(config('equipment'))
            ->mapWithKeys(fn ($item, $key) => [$key => false])
            ->toArray();
    }

    public function updatedPrefId($pref_id)
    {
        $this->reset('area');

        $this->areas = Home::where('pref_id', $pref_id)
                           ->whereNotNull('area')
                           ->orderBy('area')
                           ->distinct()
                           ->get('area')
                           ->pluck('area')
                           ->toArray();
    }

    public function updatedPage($page)
    {
        $this->dispatchBrowserEvent('page-updated', ['page' => $page]);
    }

    public function render()
    {
        return view('livewire.detail-search')->with([
            'homes' => Home::query()
                           ->with(['pref', 'type', 'photo', 'cost'])
                           ->when(
                               filled($this->pref_id),
                               fn (Builder $query) => $query->where('pref_id', $this->pref_id)
                           )
                           ->when(
                               filled($this->area),
                               fn (Builder $query) => $query->where('area', $this->area)
                           )
                           ->where($this->levels(...))
                           ->where($this->types(...))
                           ->where($this->facility(...))
                           ->where($this->equipment(...))
                           ->keywordSearch($this->q)
                           ->vacancySearch($this->vacancy)
                           ->addTotalCost()
                           ->sortBy($this->sort)
                           ->paginate()
                           ->withQueryString()
                           ->onEachSide(1),
        ]);
    }

    /**
     * 対象区分.
     *
     * @param  Builder  $query
     * @return void
     */
    public function levels(Builder $query)
    {
        foreach ($this->levels as $level => $enable) {
            if ($enable) {
                $query->orWhere('level', $level);
            }
        }
    }

    /**
     * サービス類型.
     *
     * @param  Builder  $query
     * @return void
     */
    public function types(Builder $query)
    {
        foreach ($this->types as $type => $enable) {
            if (! $enable) {
                continue;
            }

            if ($type === 0) {
                $query->orWhereNull('type_id');
            } else {
                $query->orWhere('type_id', $type);
            }
        }
    }

    /**
     * 共有設備.
     *
     * @param  Builder  $query
     * @return void
     */
    public function facility(Builder $query)
    {
        foreach ($this->facilities as $facility => $enable) {
            if ($enable && Arr::exists(config('facility'), $facility)) {
                $query->whereHas('facility', fn (Builder $query) => $query->where($facility, true));
            }
        }
    }

    /**
     * 居室設備.
     *
     * @param  Builder  $query
     * @return void
     */
    public function equipment(Builder $query)
    {
        foreach ($this->equipments as $equipment => $enable) {
            if ($enable && Arr::exists(config('equipment'), $equipment)) {
                $query->whereHas('equipment', fn (Builder $query) => $query->where($equipment, true));
            }
        }
    }
}

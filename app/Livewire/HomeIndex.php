<?php

namespace App\Livewire;

use App\Models\Home;
use App\Models\Pref;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithPagination;

    public ?Pref $pref = null;

    public ?string $area = null;

    /** @var string|null キーワード */
    #[Url]
    public ?string $q = null;

    /** @var string|null 並べ替え */
    #[Url]
    public ?string $sort = null;

    /** @var int|null 対象区分 */
    #[Url]
    public ?int $level = null;

    /** @var int|null 類型 */
    #[Url]
    public ?int $type = null;

    /** @var int|null 空室 */
    #[Url]
    public ?int $vacancy = null;

    public function updatedPage($page): void
    {
        //ページが変わった時に一番上にスクロール。
        $this->dispatch('page-updated', page: $page);
    }

    public function render(): View
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
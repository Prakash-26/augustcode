<?php

namespace App\Http\Livewire\Backend;

use App\Models\MovieListing;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class MovieTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return MovieListing::when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    // public function filters(): array
    // {
    //     return [
    //         'type' => Filter::make('User Type')
    //             ->select([
    //                 '' => 'Any',
    //                 User::TYPE_ADMIN => 'Administrators',
    //                 User::TYPE_USER => 'Users',
    //             ]),
    //         'active' => Filter::make('Active')
    //             ->select([
    //                 '' => 'Any',
    //                 'yes' => 'Yes',
    //                 'no' => 'No',
    //             ]),
    //         'verified' => Filter::make('E-mail Verified')
    //             ->select([
    //                 '' => 'Any',
    //                 'yes' => 'Yes',
    //                 'no' => 'No',
    //             ]),
    //     ];
    // }

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->sortable(),
            Column::make(__('Description'))
                ->sortable(),
            Column::make(__('Youtube URL'),'youtube_url'),
            Column::make(__('Release Date'), 'release_date')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.movie.includes.row';
    }
}

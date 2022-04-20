<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class UsersTable extends Component implements HasTable
{
    use InteractsWithTable;

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', User::search($searchQuery)->keys());
        }

        return $query;
    }

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('gender'),
            TextColumn::make('age')->default('-'),
            TextColumn::make('created_at')->label('Registered At')->dateTime()->sortable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ]),
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }

    public function render()
    {
        return view('livewire.users-table');
    }
}

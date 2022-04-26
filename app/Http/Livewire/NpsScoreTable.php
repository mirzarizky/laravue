<?php

namespace App\Http\Livewire;

use App\Models\NpsScore;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class NpsScoreTable extends Component implements HasTable
{
    use InteractsWithTable;

    public function isTableSearchable(): bool
    {
        return false;
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', NpsScore::search($searchQuery)->keys());
        }

        return $query;
    }

    protected function getTableQuery(): Builder
    {
        return NpsScore::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('score')->sortable()->searchable(),
            TextColumn::make('verbatim')->limit('255'),
            TextColumn::make('created_at')->label('Submitted At')->dateTime()->sortable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')->label('Submitted from'),
                    DatePicker::make('created_until')->label('Submitted until'),
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
}

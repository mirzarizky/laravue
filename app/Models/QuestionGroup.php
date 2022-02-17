<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestionGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Database\Factories\QuestionGroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $max_value
 * @property string|null $min_value
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionGroup whereMinValue($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuestionOption[] $options
 * @property-read int|null $options_count
 */
class QuestionGroup extends Model
{
    use HasFactory;

    protected $table = 'question_groups';

    protected $fillable = [
        'name',
        'max_value',
        'min_value',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'group_id');
    }

    public function options()
    {
        return $this->hasManyThrough(
            QuestionOption::class,
            Question::class,
            'group_id',
            'question_id',
            'id',
            'id',
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AnswerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $survey_id
 * @property int $user_id
 * @property int $option_id
 * @property mixed $score
 * @property-read \App\Models\QuestionOption $option
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUserId($value)
 */
class Answer extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'answers';

    protected $fillable = [
        'user_id',
        'option_id',
        'survey_id',

        'score',
    ];

    protected $casts = [
        'user_id'   => 'integer',
        'option_id' => 'integer',
        'survey_id' => 'string',
        'score'     => 'decimal:1',
    ];

    public function user()
    {
        return $this
            ->belongsTo(User::class, 'user_id')
            ->withDefault();
    }

    public function option()
    {
        return $this->belongsTo(QuestionOption::class, 'option_id');
    }

    public function question()
    {
        return $this->belongsToThrough(
            Question::class,
            QuestionOption::class,
            null,
            '',
            [QuestionOption::class => 'option_id'],
        );
    }
}

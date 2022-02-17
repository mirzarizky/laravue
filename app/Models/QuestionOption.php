<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestionOption
 *
 * @property int $id
 * @property int $question_id
 * @property string $option_text
 * @property string $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Question $question
 * @method static \Database\Factories\QuestionOptionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereOptionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuestionOption extends Model
{
    use HasFactory;

    protected $table = 'question_options';

    protected $fillable = [
        'question_id',
        'option_text',
        'score',
    ];

    protected $casts = [
        'question_id' => 'integer',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NpsScore
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $survey_id
 * @property int $score
 * @property string|null $verbatim
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Survey|null $survey
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\NpsScoreFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore query()
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NpsScore whereVerbatim($value)
 * @mixin \Eloquent
 */
class NpsScore extends Model
{
    use HasFactory;

    protected $table = 'nps_scores';

    protected $fillable = [
        'user_id',
        'survey_id',

        'score',
        'verbatim',
    ];

    protected $casts = [
        'score' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}

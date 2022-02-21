<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property int $group_id
 * @property string $question_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\QuestionGroup $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuestionOption[] $options
 * @property-read int|null $options_count
 * @method static \Database\Factories\QuestionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 */
class Question extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public const CACHE_KEY_QUIZ = 'skinsight-quiz';
    public const QUESTION_IMAGE_COLLECTION_KEY = 'question_image';

    protected $table = 'questions';

    protected $fillable = [
        'group_id',
        'question_text',
    ];

    protected $casts = [
        'group_id' => 'integer',
    ];

    public function questionImage()
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', self::QUESTION_IMAGE_COLLECTION_KEY)->latest('id');
    }

    public function group()
    {
        return $this->belongsTo(QuestionGroup::class, 'group_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }
}

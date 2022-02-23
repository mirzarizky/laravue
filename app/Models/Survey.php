<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * App\Models\Survey
 *
 * @property string $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $phone_number
 * @property string|null $photo
 * @property string|null $email
 * @property string|null $result
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\SurveyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey query()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUserId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereBirthDate($value)
 * @property string|null $gender
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereGender($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUuid($value)
 * @property-read \App\Models\NpsScore|null $npsScore
 * @property-read \App\Models\SkinType|null $skinType
 * @property-read mixed $photo_url
 * @property-read mixed $formula_url
 */
class Survey extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'surveys';

    protected $fillable = [
        // 'uuid',
        'user_id',

        'name',
        'phone_number',
        'birth_date',
        'photo',
        'email',
        'result',
        'gender',
    ];

    protected $casts = [
        'uuid'       => 'string',
        'user_id'    => 'integer',
        'birth_date' => 'date',
    ];

    public static function getUUidColumn(): string
    {
        return 'uuid';
    }

    // Attributes
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) {
            return null;
        }

        return Storage::disk('public')->url($this->photo);
    }

    public function getFormulaUrlAttribute()
    {
        if (!$this->result) {
            return null;
        }

        return config('app.frontend_url') . '/formula' . '/' . $this->uuid;
    }

    // Relationships
    public function user()
    {
        return $this
            ->belongsTo(User::class, 'user_id')
            ->withDefault();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'survey_id');
    }

    public function npsScore()
    {
        return $this->hasOne(NpsScore::class, 'survey_id');
    }

    public function skinType()
    {
        return $this->belongsTo(SkinType::class, 'result', 'name');
    }
}

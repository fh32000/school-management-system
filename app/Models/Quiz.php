<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Quiz
 *
 * @property string $id
 * @property array $name
 * @property string $subject_id
 * @property string $grade_id
 * @property string $classroom_id
 * @property string $section_id
 * @property string $teacher_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Classroom $classroom
 * @property-read array $translations
 * @property-read \App\Models\Grade $grade
 * @property-read \App\Models\Section $section
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\Teacher $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereClassroomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereGradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Quiz extends Model
{
    use HasTranslations , Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    public $translatable = ['name'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
    ];
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }


    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

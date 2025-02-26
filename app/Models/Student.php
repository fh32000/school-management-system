<?php

namespace App\Models;

use App\Traits\Uuids;
use Database\Factories\StudentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Translatable\HasTranslations;


/**
 * App\Models\Student
 *
 * @property string $id
 * @property array $name
 * @property string $email
 * @property string $password
 * @property string|null $school_id
 * @property string $gender_id
 * @property string $nationality_id
 * @property string $blood_type_id
 * @property string $grade_id
 * @property string $classroom_id
 * @property string $section_id
 * @property string $guardian_id
 * @property string $birthday
 * @property string $academic_year
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Models\Attendance[] $attendance
 * @property-read int|null $attendance_count
 * @property-read \App\Models\Classroom $classroom
 * @property-read \App\Models\Gender $gender
 * @property-read array $translations
 * @property-read \App\Models\Grade $grade
 * @property-read \App\Models\Guardian $guardian
 * @property-read MediaCollection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Nationality $nationality
 * @property-read \App\Models\Section $section
 * @property-read Collection|\App\Models\StudentAccount[] $student_account
 * @property-read int|null $student_account_count
 * @method static \Database\Factories\StudentFactory factory(...$parameters)
 * @method static Builder|Student graduated()
 * @method static Builder|Student newModelQuery()
 * @method static Builder|Student newQuery()
 * @method static \Illuminate\Database\Query\Builder|Student onlyTrashed()
 * @method static Builder|Student query()
 * @method static Builder|Student whereAcademicYear($value)
 * @method static Builder|Student whereBirthday($value)
 * @method static Builder|Student whereBloodTypeId($value)
 * @method static Builder|Student whereClassroomId($value)
 * @method static Builder|Student whereCreatedAt($value)
 * @method static Builder|Student whereDeletedAt($value)
 * @method static Builder|Student whereEmail($value)
 * @method static Builder|Student whereGenderId($value)
 * @method static Builder|Student whereGradeId($value)
 * @method static Builder|Student whereGuardianId($value)
 * @method static Builder|Student whereId($value)
 * @method static Builder|Student whereName($value)
 * @method static Builder|Student whereNationalityId($value)
 * @method static Builder|Student wherePassword($value)
 * @method static Builder|Student whereSchoolId($value)
 * @method static Builder|Student whereSectionId($value)
 * @method static Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Student withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Student withoutTrashed()
 * @mixin Eloquent
 */
class Student extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations, Uuids, InteractsWithMedia;

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
    protected $table = 'students';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender_id',
        'nationality_id',
        'blood_type_id',
        'birthday',
        'grade_id',
        'classroom_id',
        'section_id',
        'guardian_id',
        'academic_year',
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

    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo(Section::class);
    }




    // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }


    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }

    // علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeGraduated($query)
    {
        return $query->onlyTrashed();
    }
}

<?php

namespace App\Models;

use App\Traits\Uuids;
use Database\Factories\GuardianFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


/**
 * App\Models\Guardian
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property array $father_name
 * @property string $father_national_id
 * @property string $father_passport_id
 * @property string $father_phone
 * @property array $father_job
 * @property string $father_nationality_id
 * @property string $father_blood_type_id
 * @property string $father_religion_id
 * @property string $father_address
 * @property array $mother_name
 * @property string $mother_national_id
 * @property string $mother_passport_id
 * @property string $mother_phone
 * @property array $mother_job
 * @property string $mother_nationality_id
 * @property string $mother_blood_type_id
 * @property string $mother_religion_id
 * @property string $mother_address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\GuardianFactory factory(...$parameters)
 * @method static Builder|Guardian newModelQuery()
 * @method static Builder|Guardian newQuery()
 * @method static Builder|Guardian query()
 * @method static Builder|Guardian whereCreatedAt($value)
 * @method static Builder|Guardian whereEmail($value)
 * @method static Builder|Guardian whereFatherAddress($value)
 * @method static Builder|Guardian whereFatherBloodTypeId($value)
 * @method static Builder|Guardian whereFatherJob($value)
 * @method static Builder|Guardian whereFatherName($value)
 * @method static Builder|Guardian whereFatherNationalId($value)
 * @method static Builder|Guardian whereFatherNationalityId($value)
 * @method static Builder|Guardian whereFatherPassportId($value)
 * @method static Builder|Guardian whereFatherPhone($value)
 * @method static Builder|Guardian whereFatherReligionId($value)
 * @method static Builder|Guardian whereId($value)
 * @method static Builder|Guardian whereMotherAddress($value)
 * @method static Builder|Guardian whereMotherBloodTypeId($value)
 * @method static Builder|Guardian whereMotherJob($value)
 * @method static Builder|Guardian whereMotherName($value)
 * @method static Builder|Guardian whereMotherNationalId($value)
 * @method static Builder|Guardian whereMotherNationalityId($value)
 * @method static Builder|Guardian whereMotherPassportId($value)
 * @method static Builder|Guardian whereMotherPhone($value)
 * @method static Builder|Guardian whereMotherReligionId($value)
 * @method static Builder|Guardian wherePassword($value)
 * @method static Builder|Guardian whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Guardian extends Model implements HasMedia
{
    use HasFactory, HasTranslations, Uuids, InteractsWithMedia;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    public $translatable = [
        'father_name',
        'father_job',
        'mother_name',
        'mother_job'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guardians';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'father_name',
        'father_national_id',
        'father_passport_id',
        'father_phone',
        'father_job',
        'father_nationality_id',
        'father_blood_type_id',
        'father_religion_id',
        'father_address',
        'mother_name',
        'mother_national_id',
        'mother_passport_id',
        'mother_phone',
        'mother_job',
        'mother_nationality_id',
        'mother_blood_type_id',
        'mother_religion_id',
        'mother_address',
        'school_id'
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

}

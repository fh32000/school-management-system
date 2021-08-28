<?php

namespace App\Models;

use App\Traits\Uuids;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Receipt
 *
 * @property string $id
 * @property string $date
 * @property string $student_id
 * @property string|null $debit
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\ReceiptFactory factory(...$parameters)
 * @method static Builder|Receipt newModelQuery()
 * @method static Builder|Receipt newQuery()
 * @method static Builder|Receipt query()
 * @method static Builder|Receipt whereCreatedAt($value)
 * @method static Builder|Receipt whereDate($value)
 * @method static Builder|Receipt whereDebit($value)
 * @method static Builder|Receipt whereDescription($value)
 * @method static Builder|Receipt whereId($value)
 * @method static Builder|Receipt whereStudentId($value)
 * @method static Builder|Receipt whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Receipt extends Model
{
    use HasFactory, Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'receipts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'student_id',
        'debit',
        'description',
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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

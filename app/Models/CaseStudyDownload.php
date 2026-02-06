<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudyDownload extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'case_study_id',
        'name',
        'email',
        'phone_number',
        'location',
        'ip_address',
        'user_agent',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship with CaseStudy
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class);
    }
}

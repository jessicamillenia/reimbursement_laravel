<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'tanggal',
        'nama_reimbursement',
        'deskripsi',
        'file_path',
        'status',
    ];

    /**
     * The user that this reimbursement belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

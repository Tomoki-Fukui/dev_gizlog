<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\SearchingScope;
use App\Models\User;

class DailyReport extends Model
{
    use SoftDeletes,SearchingScope;

    protected $fillable = [
        'user_id',
        'title',
        'contents',
        'reporting_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'reporting_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fetchPersonalReports($user_id)
    {
        return $this->filterEqual('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    public function fetchSearchingPersonalReports($user_id, $conditions)
    {
        return $this->filterEqual('user_id', $user_id)
                    ->filterLike('reporting_time', $conditions['search_month'])
                    ->orderby('created_at', 'desc')
                    ->get();
    }
}

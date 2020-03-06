<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = [
                            'track_engage',
                            'track_contract',
                            'n_modifiy',
                            'modification_type',
                            'justification',
                            'current_price',
                            'contract_current_scope',
                            'adendum',
                            'current_prog',
                            'other',
                            'date',
                            'contract_date',
                            'engages_id',
                            'statuses_id',
                            'user_creation',
                            'user_publication',
                            'published_at',
                            ];
}

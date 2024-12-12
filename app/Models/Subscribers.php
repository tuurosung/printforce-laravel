<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;

    protected $activeSubscriber;

    protected $table = 'subscriptions';
    protected $primaryKey = 'subscriber_id';
    protected $fillable = ['user_id', 'plan_id', 'status', 'start_date', 'end_date'];
    public $incrementing = false;


    static function activeSubscriber()
    {
        $thiss = new Subscribers();
        $thiss->activeSubscriber = '187635294';
        return $thiss->activeSubscriber;
    }


}

<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected function cast()
    {
        return [
            'type' => TransactionTypeEnum::class,
        ];
    }


}

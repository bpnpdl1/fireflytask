<?php

namespace App\Enums;

enum TransactionTypeEnum: string
{
    case INCOME = 'Income';
    case EXPENSE = 'Expense';

    public function getBgColor(): string
    {
        return match ($this) {
            self::INCOME => 'bg-green-500',
            self::EXPENSE => 'bg-red-500',
        };
    }
  

}
<?php

namespace App\Enums;

enum TransactionTypeEnum: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';

    public function label(): string
    {
        return match ($this) {
            self::INCOME => 'Income',
            self::EXPENSE => 'Expense',
        };
    }

}
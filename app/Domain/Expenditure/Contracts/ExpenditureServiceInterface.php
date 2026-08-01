<?php

declare (strict_types = 1);

namespace App\Domain\Expenditure\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\Expenditure\Models\Expenditure;
use App\DTOs\Expenditure\NewExpenditureData;
use Illuminate\Database\Eloquent\Collection;

interface ExpenditureServiceInterface extends BaseInterface
{
    public function createExpenditure(NewExpenditureData $expenditureData): Expenditure;
    public function getExpenses(int $limit = 50): Collection;
}

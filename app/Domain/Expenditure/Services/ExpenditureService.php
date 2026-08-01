<?php

declare(strict_types=1);

namespace App\Domain\Expenditure\Services;

use App\Domain\Expenditure\Contracts\ExpenditureServiceInterface;
use App\Domain\Expenditure\Models\Expenditure;
use App\DTOs\Expenditure\NewExpenditureData;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Override;

final class ExpenditureService extends BaseService implements ExpenditureServiceInterface
{

    #[Override]
    public function modelClass(): string
    {
        return Expenditure::class;
    }


    public function createExpenditure(NewExpenditureData $expenditureData): Expenditure
    {
        try {
            $existing = Expenditure::where('idempotency_key', $expenditureData->idempotencyKey)->first();

            if ($existing !== null) {
                $expenditure = $existing;
            } else {
                $expenditure = Expenditure::create($expenditureData->toArray());
            }
        } catch (\Exception $e) {
            throw new \DomainException("Unable to create new expenditure" . $e->getMessage());
        }

        return $expenditure;
    }


    public function updateExpenditure(Expenditure $expenditure, NewExpenditureData $expenditureData)
    {
        try {

            $expenditure = $expenditure->update($expenditureData->toArray());

        } catch (\Exception $e) {
            throw new \DomainException("Unable to update expenditure" . $e->getMessage());
        }

        return $expenditure;
    }


    public function deleteExpenditure(Expenditure $expenditure)
    {
        try {
            $expenditure->delete();
            return true;
        } catch (\Exception $e) {
            throw new \DomainException("Unable to delete expenditure" . $e->getMessage());
        }
    }


    public function getExpenses(int $limit = 50): Collection
    {
        return self::baseQuery()
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }


    private static function baseQuery()
    {
        return Expenditure::with(['source', 'destination']);
    }
}

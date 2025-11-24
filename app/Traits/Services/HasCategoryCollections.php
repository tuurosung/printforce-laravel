<?php

namespace App\Traits\Services;

use Illuminate\Database\Eloquent\Collection;

trait HasCategoryCollections
{

    const LARGE_FORMAT = "001";
    const DESIGN = "002";
    const EMBROIDERY = "003";
    const PRESS = "004";
    const PHOTOGRAPHY = "005";


    public function getServicesByCategory(string $categoryId): Collection
    {
        return $this->filterServicesByCategory($categoryId);
    }

    public function getLargeFormatServices(): Collection
    {
        return $this->getServicesByCategory(self::LARGE_FORMAT);
    }

    public function getEmbroideryServices(): Collection
    {
        return $this->getServicesByCategory(self::EMBROIDERY);
    }


    public function getDesignServices(): Collection
    {
        return $this->getServicesByCategory(self::DESIGN);
    }


    public function getPressServices(): Collection
    {
        return $this->getServicesByCategory(self::PRESS);
    }

    public function getPhotographyServices(): Collection
    {
        return $this->getServicesByCategory(self::PHOTOGRAPHY);
    }

}

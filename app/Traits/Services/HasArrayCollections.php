<?php

namespace App\Traits\Services;

trait HasArrayCollections
{

    const LARGE_FORMAT = '001';
    const DESIGN = '002';
    const EMBROIDERY = '003';
    const PRESS = '004';
    const PHOTOGRAPHY = '005';


    protected function getServicesArray($categoryId = null): array
    {
        return $this->filterServicesByCategory($categoryId)
            ->mapWithKeys(function ($service) {
                return [$service->service_id => $service->service_name];
            })
            ->toArray();
    }

    public function getFilteredServicesArray($categoryId): array
    {
        return $this->getServicesArray($categoryId);
    }


    /**
     * Returns all Large Format Services As An Array
     *
     * @return array
     */
    public function getLargeFormatServicesArray()
    {
        return $this->getServicesArray(self::LARGE_FORMAT);
    }


    /**
     * Returns all Design Services As An Array
     *
     * @return array
     */
    public function getDesignServicesArray()
    {
        return $this->getServicesArray(self::DESIGN);
    }


    /**
     * Returns all Embroidery Services As An Array
     *
     * @return array
     */
    public function getEmbroideryServicesArray()
    {
        return $this->getServicesArray(self::EMBROIDERY);
    }


    /**
     * Returns all Press Services As An Array
     *
     * @return array
     */
    public function getPressServicesArray()
    {
        return $this->getServicesArray(self::PRESS);
    }


    /**
     * Returns all Photography Services As An Array
     *
     * @return array
     */
    public function getPhotographyServicesArray()
    {
        return $this->getServicesArray(self::PHOTOGRAPHY);
    }

}

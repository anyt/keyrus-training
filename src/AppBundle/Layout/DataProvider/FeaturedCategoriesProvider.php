<?php

namespace AppBundle\Layout\DataProvider;

use Oro\Bundle\CatalogBundle\Layout\DataProvider\FeaturedCategoriesProvider as BaseFeaturedCategoriesProvider;

class FeaturedCategoriesProvider
{
    private $baseProvider;

    /**
     * FeaturedCategoriesProvider constructor.
     * @param BaseFeaturedCategoriesProvider $baseProvider
     */
    public function __construct(BaseFeaturedCategoriesProvider $baseProvider)
    {
        $this->baseProvider = $baseProvider;
    }

    public function getAll(array $categoryIds = [])
    {
        return $this->baseProvider->getAll(\array_slice($categoryIds, 0, 4, true));
    }
}

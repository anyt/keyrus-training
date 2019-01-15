<?php

namespace AppBundle\Layout\DataProvider;

use Oro\Bundle\CatalogBundle\Layout\DataProvider\FeaturedCategoriesProvider as BaseFeaturedCategoriesProvider;

class FeaturedCategoriesProvider extends BaseFeaturedCategoriesProvider
{
    public function getAll(array $categoryIds = [])
    {
        $categoryIds = \array_slice($categoryIds, 0, 4, true);

        return parent::getAll($categoryIds);
    }
}

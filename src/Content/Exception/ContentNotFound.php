<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\GraphQL\Storefront\Content\Exception;

use OxidEsales\GraphQL\Base\Exception\NotFound;

final class ContentNotFound extends NotFound
{
    public function __construct(string $id)
    {
        parent::__construct(sprintf('Content was not found by id: %s', $id));
    }
}

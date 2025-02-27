<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\ApiBundle\SectionResolver;

use Sylius\Bundle\CoreBundle\SectionResolver\SectionCannotBeResolvedException;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\UriBasedSectionResolverInterface;

final class ShopApiUriBasedSectionResolver implements UriBasedSectionResolverInterface
{
    /** @var string */
    private $shopApiUriBeginning;

    public function __construct(string $shopApiUriBeginning)
    {
        $this->shopApiUriBeginning = $shopApiUriBeginning;
    }

    public function getSection(string $uri): SectionInterface
    {
        if (0 === strpos($uri, $this->shopApiUriBeginning)) {
            return new ShopApiSection();
        }

        throw new SectionCannotBeResolvedException();
    }
}

<?php
/**
 * Copyright © Pronko Consulting (https://www.pronkoconsulting.com)
 * See LICENSE for the license details.
 */
declare(strict_types=1);

namespace Pronko\LiqPayAdmin\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class ConnectionType
 */
class Currencies implements OptionSourceInterface
{
    const USD = 'USD';
    const EUR = 'EUR';
    const RUB = 'RUB';
    const UAH = 'UAH';

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::USD, 'label' => __(self::USD)],
            ['value' => self::EUR, 'label' => __(self::EUR)],
            ['value' => self::RUB, 'label' => __(self::RUB)],
            ['value' => self::UAH, 'label' => __(self::UAH)]
        ];
    }
}

<?php
/**
 * Valitor Module for Magento 2.x.
 *
 * Copyright © 2018 Valitor. All rights reserved.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SDM\Valitor\Model;

class Token extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init(\SDM\Valitor\Model\ResourceModel\Token::class);
    }
}
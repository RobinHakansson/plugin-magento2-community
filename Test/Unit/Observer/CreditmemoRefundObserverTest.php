<?php
/**
 * Valitor Module for Magento 2.x.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2018 Valitor
 * @category  payment
 * @package   valitor
 */
namespace SDM\Valitor\Test\Unit\Observer;

use SDM\Valitor\Observer\CreditmemoRefundObserver as ClassToTest;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\Event\Observer;
use SDM\Valitor\Test\Unit\MainTestCase;

/**
 * Class CreditmemoRefundObserverTest
 * @package SDM\Valitor\Test\Unit\Observer
 */
class CreditmemoRefundObserverTest extends MainTestCase
{
    /**
     * @var ClassToTest
     */
    private $classToTest;

    /**
     * @var ObjectManager
     */
    private $objectManager;
}

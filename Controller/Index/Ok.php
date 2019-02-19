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
namespace SDM\Valitor\Controller\Index;

use Magento\Framework\App\ResponseInterface;
use SDM\Valitor\Controller\Index;

/**
 * Class Ok
 * @package SDM\Valitor\Controller\Index
 */
class Ok extends Index
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $this->writeLog();

        if ($this->checkPost()) {
            $this->generator->handleOkAction($this->getRequest());
            return $this->_redirect('checkout/onepage/success');
        } else {
            $this->generator->restoreOrderFromRequest($this->getRequest());
            return $this->_redirect('checkout');
        }
    }
}

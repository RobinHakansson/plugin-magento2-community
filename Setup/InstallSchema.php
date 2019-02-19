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
namespace SDM\Valitor\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use SDM\Valitor\Api\Data\TransactionInterface;

/**
 * Class InstallSchema
 * @package SDM\Valitor\Setup
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        // Create transaction data schema
        $table = $installer->getConnection()->newTable($installer->getTable(TransactionInterface::TABLE_NAME));

        $table->addColumn(
            TransactionInterface::ENTITY_ID,
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
            'id'
        );

        $table->addColumn(
            TransactionInterface::ORDER_ID,
            Table::TYPE_TEXT,
            255,
            [],
            'Order ID'
        );

        $table->addColumn(
            TransactionInterface::TRANSACTION_ID,
            Table::TYPE_TEXT,
            255,
            [],
            'Transaction ID'
        );

        $table->addColumn(
            TransactionInterface::PAYMENT_ID,
            Table::TYPE_TEXT,
            255,
            [],
            'Payment ID'
        );

        $table->addColumn(
            TransactionInterface::TRANSACTION_DATA,
            Table::TYPE_TEXT,
            1024,
            [],
            'Transaction data'
        );

        $table->addColumn(
            TransactionInterface::PARAMETERS_DATA,
            Table::TYPE_TEXT,
            1024,
            [],
            'Parameters data'
        );

        $table->addColumn(
            TransactionInterface::CREATED_AT,
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false,'default'  => Table::TIMESTAMP_INIT],
            'Created date'
        );

        $table->addIndex(
            $setup->getIdxName(
                TransactionInterface::TABLE_NAME,
                [TransactionInterface::ORDER_ID]
            ),
            [TransactionInterface::ORDER_ID]
        );

        $table->addIndex(
            $setup->getIdxName(
                TransactionInterface::TABLE_NAME,
                [TransactionInterface::TRANSACTION_ID]
            ),
            [TransactionInterface::TRANSACTION_ID]
        );

        $table->setComment('Valitor transaction data');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}

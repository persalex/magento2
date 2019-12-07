<?php


namespace Potoky\WhiteLabelTask\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('potoky_whitelabeltask_info')
        )->addColumn(
            'info_id',
            Table::TYPE_INTEGER,
            null,
            array (
                'identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,
            ),
            'Entity ID'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            63,
            array (
                'nullable' => false,
            ),
            'Email'

        )->addColumn(
            'first_name',
            Table::TYPE_TEXT,
            63,
            array (
                'nullable' => false,
            ),
            'First Name'
        )->addColumn(
            'last_name',
            Table::TYPE_TEXT,
            63,
            array (
                'nullable' => false,
            ),
            'Last Name'
        )->addColumn(
            'hobby',
            Table::TYPE_TEXT,
            63,
            array (
                'nullable' => true,
            ),
            'Hobby'
        )->addColumn(
            'telephone',
            Table::TYPE_TEXT,
            63,
            array (
                'nullable' => true,
            ),
            'Telephone'
        )->addColumn(
            'last_save',
            Table::TYPE_TIMESTAMP,
            null,
            array (
                'default' => Table::TIMESTAMP_INIT_UPDATE,
            ),
            'Creation or Modification Time'
        )->addIndex(
            $installer->getIdxName(
                'pulsestorm_todocrud_todoitem',
                ['email'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            ['email'],
            ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
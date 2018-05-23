<?php
namespace My\Mod\Model\ResourceModel;
 
use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
/**
 * Task post mysql resource
 */
class Task extends AbstractDb
{
 
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('task', 'entity_id');
    }
 
}
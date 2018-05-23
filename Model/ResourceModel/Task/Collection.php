<?php
namespace My\Mod\Model\ResourceModel\Task;
 
use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
{
 
    protected $_idFieldName = \My\Mod\Model\Task::TASK_ID;
     
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('My\Mod\Model\Task', 'My\Mod\Model\ResourceModel\Task');
    }
 
}
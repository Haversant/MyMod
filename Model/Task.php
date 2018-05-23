<?php
namespace My\Mod\Model;
 
use \Magento\Framework\Model\AbstractModel;
 
class Task extends AbstractModel
{
    const TASK_ID = 'entity_id'; // We define the id fieldname
 
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mod'; // parent value is 'core_abstract'
 
    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'task'; // parent value is 'object'
 
    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::TASK_ID; // parent value is 'id'
 
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('My\Mod\Model\ResourceModel\Task');
    }
 
}
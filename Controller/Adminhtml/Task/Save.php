<?php
namespace My\Mod\Controller\Adminhtml\Task;
 
use Magento\Backend\App\Action;
 
class Save extends Action
{
    /**
     * @var \My\Mod\Model\Task
     */
    protected $_model;
 
    /**
     * @param Action\Context $context
     * @param \My\Mod\Model\Task $model
     */
    public function __construct(
        Action\Context $context,
        \My\Mod\Model\Task $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
    }
 
    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('My_Mod::task_save');
    }
 
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var \My\Mod\Model\Task $model */
            $model = $this->_model;
 
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
 
            $model->setData($data);
 
            $this->_eventManager->dispatch(
                'mod_task_prepare_save',
                ['deparment' => $model, 'request' => $this->getRequest()]
            );
 
            try {
                $model->save();
                $this->messageManager->addSuccess(__('Task saved'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the task'));
            }
 
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
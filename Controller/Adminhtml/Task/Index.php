<?php
namespace My\Mod\Controller\Adminhtml\Task;
 
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
 
class Index extends Action
{
    const ADMIN_RESOURCE = 'My_Mod::task';
 
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
 
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
 
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('My_Mod::task');
        $resultPage->addBreadcrumb(__('Mod'), __('Mod'));
        $resultPage->addBreadcrumb(__('Manage Tasks'), __('Manage Tasks'));
        $resultPage->getConfig()->getTitle()->prepend(__('Task'));
 
        return $resultPage;
    }
}
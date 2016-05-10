<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Block_Adminhtml_Imaclean_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('imacleanGrid');
        $this->setDefaultSort('imaclean_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    // **** // trae las imagenes que no estan en base de datos...
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('defcon2imaclean/imaclean')->getCollection();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('filename', array(
            'header' => Mage::helper('defcon2imaclean')->__('Filename'),
            'renderer' => 'Defcon2_Imaclean_Block_Adminhtml_Renderer_Image',
            'align' => 'left',
            'index' => 'filename'
        ));

        $this->addColumn(
            'action',
            array(
                'header' => Mage::helper('defcon2imaclean')->__('Action'),
                'width' => '100',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('defcon2imaclean')->__('delete'),
                        'url' => array('base' => '*/*/delete'),
                        'field' => 'id'
                    )
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'is_system' => true,
            )
        );

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('imaclean_id');
        $this->getMassactionBlock()->setFormFieldName('imaclean');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('defcon2imaclean')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('defcon2imaclean')->__('Are you sure?')
        ));
        return $this;
    }
}

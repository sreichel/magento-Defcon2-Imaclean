<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 */
class Defcon2_Imaclean_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

}

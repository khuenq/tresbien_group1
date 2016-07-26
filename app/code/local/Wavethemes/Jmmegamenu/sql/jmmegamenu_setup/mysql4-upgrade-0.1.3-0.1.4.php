<?php

/* ------------------------------------------------------------------------
  # $JA#PRODUCT_NAME$ - Version $JA#VERSION$ - Licence Owner $JA#OWNER$
  # ------------------------------------------------------------------------
  # Copyright (C) 2004-2009 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
  # @license - Copyrighted Commercial Software
  # Author: J.O.O.M Solutions Co., Ltd
  # Websites: http://www.joomlart.com - http://www.joomlancers.com
  # This file may not be redistributed in whole or significant part.
  ------------------------------------------------------------------------- */
if (version_compare(Mage::getVersion(), '1.9.2.2', '>=')) {

    $installer = $this;
    $installer->startSetup();

    $installer->getConnection()->insertMultiple(
        $installer->getTable('admin/permission_block'), array(
            array('block_name' => 'jmmegamenu/jmmegamenu', 'is_allowed' => 1)
        )
    );

    $installer->endSetup();
}
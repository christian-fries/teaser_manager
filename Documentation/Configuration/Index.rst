.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

Target group: **Developers**


.. _configuration-tsconfig:

TSconfig Reference
------------------

You can configure the following TSconfig properties:


.. _configuration-tsconfig-icons:

tx_teasermanager.icons
^^^^^^^^^^^^^^^^^^^^^^

To provide icons for the icon selector, define them in the Page TS of your site package:

.. code-block:: typoscript

   tx_teasermanager.icons {
       icon-mail = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang.xlf:teasermanager.icon.mail
       icon-phone = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang.xlf:teasermanager.icon.phone
   }


.. _configuration-tsconfig-sizes:

tx_teasermanager.sizes
^^^^^^^^^^^^^^^^^^^^^^

To provide icons for the icon selector, define them in the Page TS of your site package:

.. code-block:: typoscript

   tx_teasermanager.sizes {
       teaser-big = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang.xlf:teasermanager.size.big
       teaser-medium = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang.xlf:teasermanager.size.medium
       teaser-small = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang.xlf:teasermanager.size.small
   }

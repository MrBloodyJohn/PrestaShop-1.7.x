<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to tech@dotpay.pl so we can send you a copy immediately.
 *
 * @author    Dotpay Team <tech@dotpay.pl>
 * @copyright Dotpay sp. z o.o.
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

use Dotpay\Loader\Loader;

require_once('dotpay.php');

/**
 * Controller for removind card saved by One Click
 */
class dotpayocremoveModuleFrontController extends DotpayController {
    /**
     * Remove saved credit card
     */
    public function initContent()
    {
        $this->display_column_left = false;
        parent::initContent();
        $loader = Loader::load();
        $cc = $loader->get('CreditCard', [Tools::getValue('card_id')]);
        if ($cc->getId() != null) {
            $cc->delete();
            die('OK');
        } else {
            die('Card not found');
        }
    }
}
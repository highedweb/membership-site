<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category  Zend
 * @package   IfwPsn_Vendor_Zend_Validate
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 * @version   $Id: ExcludeExtension.php 1312332 2015-12-19 13:29:57Z worschtebrot $
 */

/**
 * @see IfwPsn_Vendor_Zend_Validate_Abstract
 */
require_once IFW_PSN_LIB_ROOT . 'IfwPsn/Vendor/Zend/Validate/File/Extension.php';

/**
 * Validator for the excluding file extensions
 *
 * @category  Zend
 * @package   IfwPsn_Vendor_Zend_Validate
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 */
class IfwPsn_Vendor_Zend_Validate_File_ExcludeExtension extends IfwPsn_Vendor_Zend_Validate_File_Extension
{
    /**
     * @const string Error constants
     */
    const FALSE_EXTENSION = 'fileExcludeExtensionFalse';
    const NOT_FOUND       = 'fileExcludeExtensionNotFound';

    /**
     * @var array Error message templates
     */
    protected $_messageTemplates = array(
        self::FALSE_EXTENSION => "File '%value%' has a false extension",
        self::NOT_FOUND       => "File '%value%' is not readable or does not exist",
    );

    /**
     * Defined by IfwPsn_Vendor_Zend_Validate_Interface
     *
     * Returns true if and only if the fileextension of $value is not included in the
     * set extension list
     *
     * @param  string  $value Real file to check for extension
     * @param  array   $file  File data from IfwPsn_Vendor_Zend_File_Transfer
     * @return boolean
     */
    public function isValid($value, $file = null)
    {
        // Is file readable ?
        require_once IFW_PSN_LIB_ROOT . 'IfwPsn/Zend/Loader.php';
        if (!IfwPsn_Zend_Loader::isReadable($value)) {
            return $this->_throw($file, self::NOT_FOUND);
        }

        if ($file !== null) {
            $info['extension'] = substr($file['name'], strrpos($file['name'], '.') + 1);
        } else {
            $info = pathinfo($value);
        }

        $extensions = $this->getExtension();

        if ($this->_case and (!in_array($info['extension'], $extensions))) {
            return true;
        } else if (!$this->_case) {
            $found = false;
            foreach ($extensions as $extension) {
                if (strtolower($extension) == strtolower($info['extension'])) {
                    $found = true;
                }
            }

            if (!$found) {
                return true;
            }
        }

        return $this->_throw($file, self::FALSE_EXTENSION);
    }
}

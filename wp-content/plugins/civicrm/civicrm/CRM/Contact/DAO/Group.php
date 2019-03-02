<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Contact/Group.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:6db3c227371b68fadd9eb82c6e96ebfe)
 */

/**
 * Database access object for the Group entity.
 */
class CRM_Contact_DAO_Group extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_group';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  static $_log = TRUE;

  /**
   * Group ID
   *
   * @var int unsigned
   */
  public $id;

  /**
   * Internal name of Group.
   *
   * @var string
   */
  public $name;

  /**
   * Name of Group.
   *
   * @var string
   */
  public $title;

  /**
   * Optional verbose description of the group.
   *
   * @var text
   */
  public $description;

  /**
   * Module or process which created this group.
   *
   * @var string
   */
  public $source;

  /**
   * FK to saved search table.
   *
   * @var int unsigned
   */
  public $saved_search_id;

  /**
   * Is this entry active?
   *
   * @var boolean
   */
  public $is_active;

  /**
   * In what context(s) is this field visible.
   *
   * @var string
   */
  public $visibility;

  /**
   * the sql where clause if a saved search acl
   *
   * @var text
   */
  public $where_clause;

  /**
   * the tables to be included in a select data
   *
   * @var text
   */
  public $select_tables;

  /**
   * the tables to be included in the count statement
   *
   * @var text
   */
  public $where_tables;

  /**
   * FK to group type
   *
   * @var string
   */
  public $group_type;

  /**
   * Date when we created the cache for a smart group
   *
   * @var timestamp
   */
  public $cache_date;

  /**
   * Date and time when we need to refresh the cache next.
   *
   * @var timestamp
   */
  public $refresh_date;

  /**
   * IDs of the parent(s)
   *
   * @var text
   */
  public $parents;

  /**
   * IDs of the child(ren)
   *
   * @var text
   */
  public $children;

  /**
   * Is this group hidden?
   *
   * @var boolean
   */
  public $is_hidden;

  /**
   * @var boolean
   */
  public $is_reserved;

  /**
   * FK to contact table.
   *
   * @var int unsigned
   */
  public $created_id;

  /**
   * FK to contact table.
   *
   * @var int unsigned
   */
  public $modified_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_group';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'saved_search_id', 'civicrm_saved_search', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'modified_id', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group ID'),
          'description' => 'Group ID',
          'required' => TRUE,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Name'),
          'description' => 'Internal name of Group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Title'),
          'description' => 'Name of Group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 1,
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Description'),
          'description' => 'Optional verbose description of the group.',
          'rows' => 2,
          'cols' => 60,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'html' => [
            'type' => 'TextArea',
          ],
        ],
        'source' => [
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Source'),
          'description' => 'Module or process which created this group.',
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'saved_search_id' => [
          'name' => 'saved_search_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Saved Search ID'),
          'description' => 'FK to saved search table.',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_SavedSearch',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group Enabled'),
          'description' => 'Is this entry active?',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'visibility' => [
          'name' => 'visibility',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Visibility Setting'),
          'description' => 'In what context(s) is this field visible.',
          'maxlength' => 24,
          'size' => CRM_Utils_Type::MEDIUM,
          'default' => 'User and User Admin Only',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::groupVisibility',
          ]
        ],
        'where_clause' => [
          'name' => 'where_clause',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Where Clause'),
          'description' => 'the sql where clause if a saved search acl',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'select_tables' => [
          'name' => 'select_tables',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Tables For Select Clause'),
          'description' => 'the tables to be included in a select data',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_PHP,
        ],
        'where_tables' => [
          'name' => 'where_tables',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Tables For Where Clause'),
          'description' => 'the tables to be included in the count statement',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_PHP,
        ],
        'group_type' => [
          'name' => 'group_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Group Type'),
          'description' => 'FK to group type',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_BOOKEND,
          'pseudoconstant' => [
            'optionGroupName' => 'group_type',
            'optionEditPath' => 'civicrm/admin/options/group_type',
          ]
        ],
        'cache_date' => [
          'name' => 'cache_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Group Cache Date'),
          'description' => 'Date when we created the cache for a smart group',
          'required' => FALSE,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'refresh_date' => [
          'name' => 'refresh_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Next Group Refresh Time'),
          'description' => 'Date and time when we need to refresh the cache next.',
          'required' => FALSE,
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'parents' => [
          'name' => 'parents',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Parents'),
          'description' => 'IDs of the parent(s)',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_COMMA,
          'pseudoconstant' => [
            'callback' => 'CRM_Core_PseudoConstant::allGroup',
          ]
        ],
        'children' => [
          'name' => 'children',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Group Children'),
          'description' => 'IDs of the child(ren)',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'is_hidden' => [
          'name' => 'is_hidden',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group is Hidden'),
          'description' => 'Is this group hidden?',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'is_reserved' => [
          'name' => 'is_reserved',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Group is Reserved'),
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
        ],
        'created_id' => [
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group Created By'),
          'description' => 'FK to contact table.',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'modified_id' => [
          'name' => 'modified_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Group Modified By'),
          'description' => 'FK to contact table.',
          'table_name' => 'civicrm_group',
          'entity' => 'Group',
          'bao' => 'CRM_Contact_BAO_Group',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'group', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'group', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [
      'index_group_type' => [
        'name' => 'index_group_type',
        'field' => [
          0 => 'group_type',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_group::0::group_type',
      ],
      'UI_title' => [
        'name' => 'UI_title',
        'field' => [
          0 => 'title',
        ],
        'localizable' => TRUE,
        'unique' => TRUE,
        'sig' => 'civicrm_group::1::title',
      ],
      'UI_name' => [
        'name' => 'UI_name',
        'field' => [
          0 => 'name',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_group::1::name',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}

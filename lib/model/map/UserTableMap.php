<?php


/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class UserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UserTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('user');
		$this->setPhpName('User');
		$this->setClassname('User');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('DOMAINNAME_ID', 'DomainnameId', 'INTEGER', 'domainname', 'ID', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('FATHERS_NAME', 'FathersName', 'VARCHAR', true, 255, null);
		$this->addColumn('GRAND_FATHERS_NAME', 'GrandFathersName', 'VARCHAR', true, 255, null);
		$this->addColumn('LOGIN', 'Login', 'VARCHAR', true, 50, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('NT_PASSWORD', 'NtPassword', 'VARCHAR', false, 255, null);
		$this->addColumn('LM_PASSWORD', 'LmPassword', 'VARCHAR', false, 255, null);
		$this->addColumn('CRYPT_PASSWORD', 'CryptPassword', 'VARCHAR', false, 255, null);
		$this->addColumn('UNIX_PASSWORD', 'UnixPassword', 'VARCHAR', false, 255, null);
		$this->addColumn('GID', 'Gid', 'INTEGER', true, null, null);
		$this->addColumn('UID', 'Uid', 'INTEGER', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 20, 'disactivated');
		$this->addColumn('ALTERNATE_EMAIL', 'AlternateEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL_LOCAL_PART', 'EmailLocalPart', 'VARCHAR', true, 255, null);
		$this->addColumn('EMAIL_QUOTA', 'EmailQuota', 'VARCHAR', true, 32, '500000S');
		$this->addColumn('EXPIRES_AT', 'ExpiresAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Domainname', 'Domainname', RelationMap::MANY_TO_ONE, array('domainname_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('UserIdentification', 'UserIdentification', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('UnixAccount', 'UnixAccount', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('FtpAccount', 'FtpAccount', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('SambaAccount', 'SambaAccount', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Comment', 'Comment', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // UserTableMap

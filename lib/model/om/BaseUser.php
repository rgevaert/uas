<?php

/**
 * Base class that represents a row from the 'user' table.
 *
 * 
 *
 * @package    lib.model.om
 */
abstract class BaseUser extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the domainname_id field.
	 * @var        int
	 */
	protected $domainname_id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the fathers_name field.
	 * @var        string
	 */
	protected $fathers_name;

	/**
	 * The value for the grand_fathers_name field.
	 * @var        string
	 */
	protected $grand_fathers_name;

	/**
	 * The value for the login field.
	 * @var        string
	 */
	protected $login;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the nt_password field.
	 * @var        string
	 */
	protected $nt_password;

	/**
	 * The value for the lm_password field.
	 * @var        string
	 */
	protected $lm_password;

	/**
	 * The value for the crypt_password field.
	 * @var        string
	 */
	protected $crypt_password;

	/**
	 * The value for the unix_password field.
	 * @var        string
	 */
	protected $unix_password;

	/**
	 * The value for the gid field.
	 * @var        int
	 */
	protected $gid;

	/**
	 * The value for the uid field.
	 * @var        int
	 */
	protected $uid;

	/**
	 * The value for the status field.
	 * Note: this column has a database default value of: 'disactivated'
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the alternate_email field.
	 * @var        string
	 */
	protected $alternate_email;

	/**
	 * The value for the email_local_part field.
	 * @var        string
	 */
	protected $email_local_part;

	/**
	 * The value for the email_quota field.
	 * Note: this column has a database default value of: '500000S'
	 * @var        string
	 */
	protected $email_quota;

	/**
	 * The value for the expires_at field.
	 * @var        string
	 */
	protected $expires_at;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        Domainname
	 */
	protected $aDomainname;

	/**
	 * @var        array UserIdentification[] Collection to store aggregation of UserIdentification objects.
	 */
	protected $collUserIdentifications;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUserIdentifications.
	 */
	private $lastUserIdentificationCriteria = null;

	/**
	 * @var        array UnixAccount[] Collection to store aggregation of UnixAccount objects.
	 */
	protected $collUnixAccounts;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUnixAccounts.
	 */
	private $lastUnixAccountCriteria = null;

	/**
	 * @var        array FtpAccount[] Collection to store aggregation of FtpAccount objects.
	 */
	protected $collFtpAccounts;

	/**
	 * @var        Criteria The criteria used to select the current contents of collFtpAccounts.
	 */
	private $lastFtpAccountCriteria = null;

	/**
	 * @var        array SambaAccount[] Collection to store aggregation of SambaAccount objects.
	 */
	protected $collSambaAccounts;

	/**
	 * @var        Criteria The criteria used to select the current contents of collSambaAccounts.
	 */
	private $lastSambaAccountCriteria = null;

	/**
	 * @var        array Comment[] Collection to store aggregation of Comment objects.
	 */
	protected $collComments;

	/**
	 * @var        Criteria The criteria used to select the current contents of collComments.
	 */
	private $lastCommentCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'UserPeer';

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->status = 'disactivated';
		$this->email_quota = '500000S';
	}

	/**
	 * Initializes internal state of BaseUser object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [domainname_id] column value.
	 * 
	 * @return     int
	 */
	public function getDomainnameId()
	{
		return $this->domainname_id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [fathers_name] column value.
	 * 
	 * @return     string
	 */
	public function getFathersName()
	{
		return $this->fathers_name;
	}

	/**
	 * Get the [grand_fathers_name] column value.
	 * 
	 * @return     string
	 */
	public function getGrandFathersName()
	{
		return $this->grand_fathers_name;
	}

	/**
	 * Get the [login] column value.
	 * 
	 * @return     string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [nt_password] column value.
	 * 
	 * @return     string
	 */
	public function getNtPassword()
	{
		return $this->nt_password;
	}

	/**
	 * Get the [lm_password] column value.
	 * 
	 * @return     string
	 */
	public function getLmPassword()
	{
		return $this->lm_password;
	}

	/**
	 * Get the [crypt_password] column value.
	 * 
	 * @return     string
	 */
	public function getCryptPassword()
	{
		return $this->crypt_password;
	}

	/**
	 * Get the [unix_password] column value.
	 * 
	 * @return     string
	 */
	public function getUnixPassword()
	{
		return $this->unix_password;
	}

	/**
	 * Get the [gid] column value.
	 * 
	 * @return     int
	 */
	public function getGid()
	{
		return $this->gid;
	}

	/**
	 * Get the [uid] column value.
	 * 
	 * @return     int
	 */
	public function getUid()
	{
		return $this->uid;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [alternate_email] column value.
	 * 
	 * @return     string
	 */
	public function getAlternateEmail()
	{
		return $this->alternate_email;
	}

	/**
	 * Get the [email_local_part] column value.
	 * 
	 * @return     string
	 */
	public function getEmailLocalPart()
	{
		return $this->email_local_part;
	}

	/**
	 * Get the [email_quota] column value.
	 * 
	 * @return     string
	 */
	public function getEmailQuota()
	{
		return $this->email_quota;
	}

	/**
	 * Get the [optionally formatted] temporal [expires_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getExpiresAt($format = 'Y-m-d H:i:s')
	{
		if ($this->expires_at === null) {
			return null;
		}


		if ($this->expires_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->expires_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expires_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [domainname_id] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setDomainnameId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->domainname_id !== $v) {
			$this->domainname_id = $v;
			$this->modifiedColumns[] = UserPeer::DOMAINNAME_ID;
		}

		if ($this->aDomainname !== null && $this->aDomainname->getId() !== $v) {
			$this->aDomainname = null;
		}

		return $this;
	} // setDomainnameId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UserPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [fathers_name] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setFathersName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fathers_name !== $v) {
			$this->fathers_name = $v;
			$this->modifiedColumns[] = UserPeer::FATHERS_NAME;
		}

		return $this;
	} // setFathersName()

	/**
	 * Set the value of [grand_fathers_name] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setGrandFathersName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->grand_fathers_name !== $v) {
			$this->grand_fathers_name = $v;
			$this->modifiedColumns[] = UserPeer::GRAND_FATHERS_NAME;
		}

		return $this;
	} // setGrandFathersName()

	/**
	 * Set the value of [login] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLogin($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->login !== $v) {
			$this->login = $v;
			$this->modifiedColumns[] = UserPeer::LOGIN;
		}

		return $this;
	} // setLogin()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = UserPeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [nt_password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setNtPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nt_password !== $v) {
			$this->nt_password = $v;
			$this->modifiedColumns[] = UserPeer::NT_PASSWORD;
		}

		return $this;
	} // setNtPassword()

	/**
	 * Set the value of [lm_password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLmPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lm_password !== $v) {
			$this->lm_password = $v;
			$this->modifiedColumns[] = UserPeer::LM_PASSWORD;
		}

		return $this;
	} // setLmPassword()

	/**
	 * Set the value of [crypt_password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setCryptPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->crypt_password !== $v) {
			$this->crypt_password = $v;
			$this->modifiedColumns[] = UserPeer::CRYPT_PASSWORD;
		}

		return $this;
	} // setCryptPassword()

	/**
	 * Set the value of [unix_password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUnixPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->unix_password !== $v) {
			$this->unix_password = $v;
			$this->modifiedColumns[] = UserPeer::UNIX_PASSWORD;
		}

		return $this;
	} // setUnixPassword()

	/**
	 * Set the value of [gid] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setGid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gid !== $v) {
			$this->gid = $v;
			$this->modifiedColumns[] = UserPeer::GID;
		}

		return $this;
	} // setGid()

	/**
	 * Set the value of [uid] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->uid !== $v) {
			$this->uid = $v;
			$this->modifiedColumns[] = UserPeer::UID;
		}

		return $this;
	} // setUid()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v || $this->isNew()) {
			$this->status = $v;
			$this->modifiedColumns[] = UserPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [alternate_email] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setAlternateEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alternate_email !== $v) {
			$this->alternate_email = $v;
			$this->modifiedColumns[] = UserPeer::ALTERNATE_EMAIL;
		}

		return $this;
	} // setAlternateEmail()

	/**
	 * Set the value of [email_local_part] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setEmailLocalPart($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_local_part !== $v) {
			$this->email_local_part = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL_LOCAL_PART;
		}

		return $this;
	} // setEmailLocalPart()

	/**
	 * Set the value of [email_quota] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setEmailQuota($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_quota !== $v || $this->isNew()) {
			$this->email_quota = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL_QUOTA;
		}

		return $this;
	} // setEmailQuota()

	/**
	 * Sets the value of [expires_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
	 */
	public function setExpiresAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->expires_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->expires_at !== null && $tmpDt = new DateTime($this->expires_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->expires_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = UserPeer::EXPIRES_AT;
			}
		} // if either are not null

		return $this;
	} // setExpiresAt()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = UserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     User The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = UserPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->status !== 'disactivated') {
				return false;
			}

			if ($this->email_quota !== '500000S') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->domainname_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fathers_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->grand_fathers_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->login = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->nt_password = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->lm_password = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->crypt_password = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->unix_password = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->gid = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->uid = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->status = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->alternate_email = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->email_local_part = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->email_quota = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->expires_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->created_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->updated_at = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 20; // 20 = UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aDomainname !== null && $this->domainname_id !== $this->aDomainname->getId()) {
			$this->aDomainname = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aDomainname = null;
			$this->collUserIdentifications = null;
			$this->lastUserIdentificationCriteria = null;

			$this->collUnixAccounts = null;
			$this->lastUnixAccountCriteria = null;

			$this->collFtpAccounts = null;
			$this->lastFtpAccountCriteria = null;

			$this->collSambaAccounts = null;
			$this->lastSambaAccountCriteria = null;

			$this->collComments = null;
			$this->lastCommentCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseUser:delete:pre') as $callable)
			{
			  if ($ret = call_user_func($callable, $this, $con))
			  {
			    return;
			  }
			}

			if ($ret) {
				UserPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseUser:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseUser:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT))
			{
			  $this->setUpdatedAt(time());
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(UserPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseUser:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				UserPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aDomainname !== null) {
				if ($this->aDomainname->isModified() || $this->aDomainname->isNew()) {
					$affectedRows += $this->aDomainname->save($con);
				}
				$this->setDomainname($this->aDomainname);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserIdentifications !== null) {
				foreach ($this->collUserIdentifications as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUnixAccounts !== null) {
				foreach ($this->collUnixAccounts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFtpAccounts !== null) {
				foreach ($this->collFtpAccounts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSambaAccounts !== null) {
				foreach ($this->collSambaAccounts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collComments !== null) {
				foreach ($this->collComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aDomainname !== null) {
				if (!$this->aDomainname->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDomainname->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserIdentifications !== null) {
					foreach ($this->collUserIdentifications as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUnixAccounts !== null) {
					foreach ($this->collUnixAccounts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFtpAccounts !== null) {
					foreach ($this->collFtpAccounts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSambaAccounts !== null) {
					foreach ($this->collSambaAccounts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collComments !== null) {
					foreach ($this->collComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDomainnameId();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getFathersName();
				break;
			case 4:
				return $this->getGrandFathersName();
				break;
			case 5:
				return $this->getLogin();
				break;
			case 6:
				return $this->getPhone();
				break;
			case 7:
				return $this->getNtPassword();
				break;
			case 8:
				return $this->getLmPassword();
				break;
			case 9:
				return $this->getCryptPassword();
				break;
			case 10:
				return $this->getUnixPassword();
				break;
			case 11:
				return $this->getGid();
				break;
			case 12:
				return $this->getUid();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getAlternateEmail();
				break;
			case 15:
				return $this->getEmailLocalPart();
				break;
			case 16:
				return $this->getEmailQuota();
				break;
			case 17:
				return $this->getExpiresAt();
				break;
			case 18:
				return $this->getCreatedAt();
				break;
			case 19:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDomainnameId(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getFathersName(),
			$keys[4] => $this->getGrandFathersName(),
			$keys[5] => $this->getLogin(),
			$keys[6] => $this->getPhone(),
			$keys[7] => $this->getNtPassword(),
			$keys[8] => $this->getLmPassword(),
			$keys[9] => $this->getCryptPassword(),
			$keys[10] => $this->getUnixPassword(),
			$keys[11] => $this->getGid(),
			$keys[12] => $this->getUid(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getAlternateEmail(),
			$keys[15] => $this->getEmailLocalPart(),
			$keys[16] => $this->getEmailQuota(),
			$keys[17] => $this->getExpiresAt(),
			$keys[18] => $this->getCreatedAt(),
			$keys[19] => $this->getUpdatedAt(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDomainnameId($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setFathersName($value);
				break;
			case 4:
				$this->setGrandFathersName($value);
				break;
			case 5:
				$this->setLogin($value);
				break;
			case 6:
				$this->setPhone($value);
				break;
			case 7:
				$this->setNtPassword($value);
				break;
			case 8:
				$this->setLmPassword($value);
				break;
			case 9:
				$this->setCryptPassword($value);
				break;
			case 10:
				$this->setUnixPassword($value);
				break;
			case 11:
				$this->setGid($value);
				break;
			case 12:
				$this->setUid($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setAlternateEmail($value);
				break;
			case 15:
				$this->setEmailLocalPart($value);
				break;
			case 16:
				$this->setEmailQuota($value);
				break;
			case 17:
				$this->setExpiresAt($value);
				break;
			case 18:
				$this->setCreatedAt($value);
				break;
			case 19:
				$this->setUpdatedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDomainnameId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFathersName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGrandFathersName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLogin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPhone($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNtPassword($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLmPassword($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCryptPassword($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUnixPassword($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setGid($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUid($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAlternateEmail($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEmailLocalPart($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEmailQuota($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setExpiresAt($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedAt($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedAt($arr[$keys[19]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::DOMAINNAME_ID)) $criteria->add(UserPeer::DOMAINNAME_ID, $this->domainname_id);
		if ($this->isColumnModified(UserPeer::NAME)) $criteria->add(UserPeer::NAME, $this->name);
		if ($this->isColumnModified(UserPeer::FATHERS_NAME)) $criteria->add(UserPeer::FATHERS_NAME, $this->fathers_name);
		if ($this->isColumnModified(UserPeer::GRAND_FATHERS_NAME)) $criteria->add(UserPeer::GRAND_FATHERS_NAME, $this->grand_fathers_name);
		if ($this->isColumnModified(UserPeer::LOGIN)) $criteria->add(UserPeer::LOGIN, $this->login);
		if ($this->isColumnModified(UserPeer::PHONE)) $criteria->add(UserPeer::PHONE, $this->phone);
		if ($this->isColumnModified(UserPeer::NT_PASSWORD)) $criteria->add(UserPeer::NT_PASSWORD, $this->nt_password);
		if ($this->isColumnModified(UserPeer::LM_PASSWORD)) $criteria->add(UserPeer::LM_PASSWORD, $this->lm_password);
		if ($this->isColumnModified(UserPeer::CRYPT_PASSWORD)) $criteria->add(UserPeer::CRYPT_PASSWORD, $this->crypt_password);
		if ($this->isColumnModified(UserPeer::UNIX_PASSWORD)) $criteria->add(UserPeer::UNIX_PASSWORD, $this->unix_password);
		if ($this->isColumnModified(UserPeer::GID)) $criteria->add(UserPeer::GID, $this->gid);
		if ($this->isColumnModified(UserPeer::UID)) $criteria->add(UserPeer::UID, $this->uid);
		if ($this->isColumnModified(UserPeer::STATUS)) $criteria->add(UserPeer::STATUS, $this->status);
		if ($this->isColumnModified(UserPeer::ALTERNATE_EMAIL)) $criteria->add(UserPeer::ALTERNATE_EMAIL, $this->alternate_email);
		if ($this->isColumnModified(UserPeer::EMAIL_LOCAL_PART)) $criteria->add(UserPeer::EMAIL_LOCAL_PART, $this->email_local_part);
		if ($this->isColumnModified(UserPeer::EMAIL_QUOTA)) $criteria->add(UserPeer::EMAIL_QUOTA, $this->email_quota);
		if ($this->isColumnModified(UserPeer::EXPIRES_AT)) $criteria->add(UserPeer::EXPIRES_AT, $this->expires_at);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of User (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDomainnameId($this->domainname_id);

		$copyObj->setName($this->name);

		$copyObj->setFathersName($this->fathers_name);

		$copyObj->setGrandFathersName($this->grand_fathers_name);

		$copyObj->setLogin($this->login);

		$copyObj->setPhone($this->phone);

		$copyObj->setNtPassword($this->nt_password);

		$copyObj->setLmPassword($this->lm_password);

		$copyObj->setCryptPassword($this->crypt_password);

		$copyObj->setUnixPassword($this->unix_password);

		$copyObj->setGid($this->gid);

		$copyObj->setUid($this->uid);

		$copyObj->setStatus($this->status);

		$copyObj->setAlternateEmail($this->alternate_email);

		$copyObj->setEmailLocalPart($this->email_local_part);

		$copyObj->setEmailQuota($this->email_quota);

		$copyObj->setExpiresAt($this->expires_at);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserIdentifications() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserIdentification($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUnixAccounts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUnixAccount($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getFtpAccounts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFtpAccount($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSambaAccounts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSambaAccount($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComment($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     User Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     UserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Domainname object.
	 *
	 * @param      Domainname $v
	 * @return     User The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDomainname(Domainname $v = null)
	{
		if ($v === null) {
			$this->setDomainnameId(NULL);
		} else {
			$this->setDomainnameId($v->getId());
		}

		$this->aDomainname = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Domainname object, it will not be re-added.
		if ($v !== null) {
			$v->addUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated Domainname object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Domainname The associated Domainname object.
	 * @throws     PropelException
	 */
	public function getDomainname(PropelPDO $con = null)
	{
		if ($this->aDomainname === null && ($this->domainname_id !== null)) {
			$this->aDomainname = DomainnamePeer::retrieveByPk($this->domainname_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aDomainname->addUsers($this);
			 */
		}
		return $this->aDomainname;
	}

	/**
	 * Clears out the collUserIdentifications collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserIdentifications()
	 */
	public function clearUserIdentifications()
	{
		$this->collUserIdentifications = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserIdentifications collection (array).
	 *
	 * By default this just sets the collUserIdentifications collection to an empty array (like clearcollUserIdentifications());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUserIdentifications()
	{
		$this->collUserIdentifications = array();
	}

	/**
	 * Gets an array of UserIdentification objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related UserIdentifications from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UserIdentification[]
	 * @throws     PropelException
	 */
	public function getUserIdentifications($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUserIdentifications === null) {
			if ($this->isNew()) {
			   $this->collUserIdentifications = array();
			} else {

				$criteria->add(UserIdentificationPeer::USER_ID, $this->id);

				UserIdentificationPeer::addSelectColumns($criteria);
				$this->collUserIdentifications = UserIdentificationPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UserIdentificationPeer::USER_ID, $this->id);

				UserIdentificationPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserIdentificationCriteria) || !$this->lastUserIdentificationCriteria->equals($criteria)) {
					$this->collUserIdentifications = UserIdentificationPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserIdentificationCriteria = $criteria;
		return $this->collUserIdentifications;
	}

	/**
	 * Returns the number of related UserIdentification objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserIdentification objects.
	 * @throws     PropelException
	 */
	public function countUserIdentifications(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUserIdentifications === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UserIdentificationPeer::USER_ID, $this->id);

				$count = UserIdentificationPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UserIdentificationPeer::USER_ID, $this->id);

				if (!isset($this->lastUserIdentificationCriteria) || !$this->lastUserIdentificationCriteria->equals($criteria)) {
					$count = UserIdentificationPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collUserIdentifications);
				}
			} else {
				$count = count($this->collUserIdentifications);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a UserIdentification object to this object
	 * through the UserIdentification foreign key attribute.
	 *
	 * @param      UserIdentification $l UserIdentification
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserIdentification(UserIdentification $l)
	{
		if ($this->collUserIdentifications === null) {
			$this->initUserIdentifications();
		}
		if (!in_array($l, $this->collUserIdentifications, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUserIdentifications, $l);
			$l->setUser($this);
		}
	}

	/**
	 * Clears out the collUnixAccounts collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUnixAccounts()
	 */
	public function clearUnixAccounts()
	{
		$this->collUnixAccounts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUnixAccounts collection (array).
	 *
	 * By default this just sets the collUnixAccounts collection to an empty array (like clearcollUnixAccounts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUnixAccounts()
	{
		$this->collUnixAccounts = array();
	}

	/**
	 * Gets an array of UnixAccount objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related UnixAccounts from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UnixAccount[]
	 * @throws     PropelException
	 */
	public function getUnixAccounts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUnixAccounts === null) {
			if ($this->isNew()) {
			   $this->collUnixAccounts = array();
			} else {

				$criteria->add(UnixAccountPeer::USER_ID, $this->id);

				UnixAccountPeer::addSelectColumns($criteria);
				$this->collUnixAccounts = UnixAccountPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UnixAccountPeer::USER_ID, $this->id);

				UnixAccountPeer::addSelectColumns($criteria);
				if (!isset($this->lastUnixAccountCriteria) || !$this->lastUnixAccountCriteria->equals($criteria)) {
					$this->collUnixAccounts = UnixAccountPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUnixAccountCriteria = $criteria;
		return $this->collUnixAccounts;
	}

	/**
	 * Returns the number of related UnixAccount objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UnixAccount objects.
	 * @throws     PropelException
	 */
	public function countUnixAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUnixAccounts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UnixAccountPeer::USER_ID, $this->id);

				$count = UnixAccountPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UnixAccountPeer::USER_ID, $this->id);

				if (!isset($this->lastUnixAccountCriteria) || !$this->lastUnixAccountCriteria->equals($criteria)) {
					$count = UnixAccountPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collUnixAccounts);
				}
			} else {
				$count = count($this->collUnixAccounts);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a UnixAccount object to this object
	 * through the UnixAccount foreign key attribute.
	 *
	 * @param      UnixAccount $l UnixAccount
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUnixAccount(UnixAccount $l)
	{
		if ($this->collUnixAccounts === null) {
			$this->initUnixAccounts();
		}
		if (!in_array($l, $this->collUnixAccounts, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUnixAccounts, $l);
			$l->setUser($this);
		}
	}

	/**
	 * Clears out the collFtpAccounts collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFtpAccounts()
	 */
	public function clearFtpAccounts()
	{
		$this->collFtpAccounts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFtpAccounts collection (array).
	 *
	 * By default this just sets the collFtpAccounts collection to an empty array (like clearcollFtpAccounts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initFtpAccounts()
	{
		$this->collFtpAccounts = array();
	}

	/**
	 * Gets an array of FtpAccount objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related FtpAccounts from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array FtpAccount[]
	 * @throws     PropelException
	 */
	public function getFtpAccounts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFtpAccounts === null) {
			if ($this->isNew()) {
			   $this->collFtpAccounts = array();
			} else {

				$criteria->add(FtpAccountPeer::USER_ID, $this->id);

				FtpAccountPeer::addSelectColumns($criteria);
				$this->collFtpAccounts = FtpAccountPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(FtpAccountPeer::USER_ID, $this->id);

				FtpAccountPeer::addSelectColumns($criteria);
				if (!isset($this->lastFtpAccountCriteria) || !$this->lastFtpAccountCriteria->equals($criteria)) {
					$this->collFtpAccounts = FtpAccountPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFtpAccountCriteria = $criteria;
		return $this->collFtpAccounts;
	}

	/**
	 * Returns the number of related FtpAccount objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related FtpAccount objects.
	 * @throws     PropelException
	 */
	public function countFtpAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collFtpAccounts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(FtpAccountPeer::USER_ID, $this->id);

				$count = FtpAccountPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(FtpAccountPeer::USER_ID, $this->id);

				if (!isset($this->lastFtpAccountCriteria) || !$this->lastFtpAccountCriteria->equals($criteria)) {
					$count = FtpAccountPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collFtpAccounts);
				}
			} else {
				$count = count($this->collFtpAccounts);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a FtpAccount object to this object
	 * through the FtpAccount foreign key attribute.
	 *
	 * @param      FtpAccount $l FtpAccount
	 * @return     void
	 * @throws     PropelException
	 */
	public function addFtpAccount(FtpAccount $l)
	{
		if ($this->collFtpAccounts === null) {
			$this->initFtpAccounts();
		}
		if (!in_array($l, $this->collFtpAccounts, true)) { // only add it if the **same** object is not already associated
			array_push($this->collFtpAccounts, $l);
			$l->setUser($this);
		}
	}

	/**
	 * Clears out the collSambaAccounts collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSambaAccounts()
	 */
	public function clearSambaAccounts()
	{
		$this->collSambaAccounts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSambaAccounts collection (array).
	 *
	 * By default this just sets the collSambaAccounts collection to an empty array (like clearcollSambaAccounts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSambaAccounts()
	{
		$this->collSambaAccounts = array();
	}

	/**
	 * Gets an array of SambaAccount objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related SambaAccounts from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array SambaAccount[]
	 * @throws     PropelException
	 */
	public function getSambaAccounts($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSambaAccounts === null) {
			if ($this->isNew()) {
			   $this->collSambaAccounts = array();
			} else {

				$criteria->add(SambaAccountPeer::USER_ID, $this->id);

				SambaAccountPeer::addSelectColumns($criteria);
				$this->collSambaAccounts = SambaAccountPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(SambaAccountPeer::USER_ID, $this->id);

				SambaAccountPeer::addSelectColumns($criteria);
				if (!isset($this->lastSambaAccountCriteria) || !$this->lastSambaAccountCriteria->equals($criteria)) {
					$this->collSambaAccounts = SambaAccountPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSambaAccountCriteria = $criteria;
		return $this->collSambaAccounts;
	}

	/**
	 * Returns the number of related SambaAccount objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SambaAccount objects.
	 * @throws     PropelException
	 */
	public function countSambaAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collSambaAccounts === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(SambaAccountPeer::USER_ID, $this->id);

				$count = SambaAccountPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(SambaAccountPeer::USER_ID, $this->id);

				if (!isset($this->lastSambaAccountCriteria) || !$this->lastSambaAccountCriteria->equals($criteria)) {
					$count = SambaAccountPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collSambaAccounts);
				}
			} else {
				$count = count($this->collSambaAccounts);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a SambaAccount object to this object
	 * through the SambaAccount foreign key attribute.
	 *
	 * @param      SambaAccount $l SambaAccount
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSambaAccount(SambaAccount $l)
	{
		if ($this->collSambaAccounts === null) {
			$this->initSambaAccounts();
		}
		if (!in_array($l, $this->collSambaAccounts, true)) { // only add it if the **same** object is not already associated
			array_push($this->collSambaAccounts, $l);
			$l->setUser($this);
		}
	}

	/**
	 * Clears out the collComments collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComments()
	 */
	public function clearComments()
	{
		$this->collComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComments collection (array).
	 *
	 * By default this just sets the collComments collection to an empty array (like clearcollComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initComments()
	{
		$this->collComments = array();
	}

	/**
	 * Gets an array of Comment objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this User has previously been saved, it will retrieve
	 * related Comments from storage. If this User is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Comment[]
	 * @throws     PropelException
	 */
	public function getComments($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collComments === null) {
			if ($this->isNew()) {
			   $this->collComments = array();
			} else {

				$criteria->add(CommentPeer::USER_ID, $this->id);

				CommentPeer::addSelectColumns($criteria);
				$this->collComments = CommentPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CommentPeer::USER_ID, $this->id);

				CommentPeer::addSelectColumns($criteria);
				if (!isset($this->lastCommentCriteria) || !$this->lastCommentCriteria->equals($criteria)) {
					$this->collComments = CommentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCommentCriteria = $criteria;
		return $this->collComments;
	}

	/**
	 * Returns the number of related Comment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Comment objects.
	 * @throws     PropelException
	 */
	public function countComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collComments === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CommentPeer::USER_ID, $this->id);

				$count = CommentPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CommentPeer::USER_ID, $this->id);

				if (!isset($this->lastCommentCriteria) || !$this->lastCommentCriteria->equals($criteria)) {
					$count = CommentPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collComments);
				}
			} else {
				$count = count($this->collComments);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Comment object to this object
	 * through the Comment foreign key attribute.
	 *
	 * @param      Comment $l Comment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addComment(Comment $l)
	{
		if ($this->collComments === null) {
			$this->initComments();
		}
		if (!in_array($l, $this->collComments, true)) { // only add it if the **same** object is not already associated
			array_push($this->collComments, $l);
			$l->setUser($this);
		}
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collUserIdentifications) {
				foreach ((array) $this->collUserIdentifications as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUnixAccounts) {
				foreach ((array) $this->collUnixAccounts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collFtpAccounts) {
				foreach ((array) $this->collFtpAccounts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSambaAccounts) {
				foreach ((array) $this->collSambaAccounts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComments) {
				foreach ((array) $this->collComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collUserIdentifications = null;
		$this->collUnixAccounts = null;
		$this->collFtpAccounts = null;
		$this->collSambaAccounts = null;
		$this->collComments = null;
			$this->aDomainname = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseUser:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseUser::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseUser

<?php
/* Mysql database class - only one connection alowed */
class Database{
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "cl41-whereis";
	private $_password = "qMC.R/wdC";
	private $_database = "cl41-whereis";
	// private $_host = "82.148.66.32";
	// private $_username = "katrin";
	// private $_password = "whereIs2016";
	// private $_database = "h6";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username,
			$this->_password, $this->_database);

		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}
	}
  // Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

  // Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}
?>

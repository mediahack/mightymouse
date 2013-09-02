<?php
/**
 * Database
 *
 * Provide basic connection management for Databases
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Database{
	
	public $dbh;
	private $config;

	/**
	* Constructor
	**/
	public function __construct(){
		$this->config = include 'app/config/database.php';
	}

	/**
	* Connect to a database
	*
	* @param 	String 	$dbname 	Name of the database to connect to
	**/
	public function connect($dbname){
		$t = $this->config[$dbname]['type'];

		if( $t == 'mysql' ) $this->mysqlConnect($dbname);
		elseif( $t == 'mongodb' ) $this->mongoDbConnect($dbname);
	}	

	/**
	* Connect to a MySQL database
	*
	* @param 	String 	$dbname 	Name of the database to connect to
	**/
	private function mysqlConnect($dbname){
		try {  
	    	$this->dbh = new \PDO(
	    		'mysql:host=' . $this->config[$dbname]['host'] . ';dbname=' . $this->config[$dbname]['db'],
	    		 $this->config[$dbname]['user'], 
	    		 $this->config[$dbname]['pass']
	    	);  
	    }  
	    catch(\PDOException $e) {  
	        echo $e->getMessage();  
	    }
	}

	/**
	* Connect to a MongoDB database. This requires that you have the MongoDB PHP DB
	* driver installed. It is a PECL extension NOT bundled with PHP. Here is a link to
	* the installation instructions on PHP.net: 
	* 
	* http://www.php.net/manual/en/mongo.installation.php
	*
	* @param 	String 	$dbname 	Name of the database to connect to
	**/
	private function mongoDbConnect($dbname){
		try{

			$creds = (!empty($this->config[$dbname]['user']) && !empty($this->config[$dbname]['pass'])) ? $this->config[$dbname]['user'] . ':' . $this->config[$dbname]['pass'] . '@' : '';

			$host = 'mongodb://' . $creds . $this->config[$dbname]['host'] . ':' . $this->config[$dbname]['port'];
				
			$this->dbh = new \Mongo($host);	
		}
		catch(\MongoConnectionException $e){
			echo $e->getMessage();
		}
	}
}
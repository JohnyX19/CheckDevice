<?php

namespace App\Models\DB;

use PDO;
use App\Models\DB\Db;

class Database
{
        private static $connection;

	private static $options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	//public static function connect($host, $database, $user, $password)
        public static function connect()
	{
            $ini = parse_ini_file('DbConfig.ini');

            $servername = $ini['servername'];
            $dbname = $ini['dbname'];
            $username = $ini['username'];
            $password = $ini['password'];

            if (!isset(self::$connection)) 
            {
                $dsn = "mysql:host=$servername;dbname=$dbname";
                self::$connection = new PDO($dsn, $username, $password, self::$options);
            }
	}

	private static function executeStatement($params)
	{
            self::connect();
            $query = array_shift($params);
            $statement = self::$connection->prepare($query);
            $statement->execute($params);
            return $statement;
	}

	/**
	 * Spustí dotaz a vráti počet ovplyvnených riadkov.
	 * @param string $query Dotaz
	 * @return int Počet ovplyvnenych riadkov
	 */
	public static function query($query) 
	{
            $statement = self::executeStatement(func_get_args());
            return $statement->rowCount();
	}

	/**
	 * Spustí dotaz a vrátí všetky jeho riadky ako pole asociativnych polí.
	 * @param string $query Dotaz
	 * @return mixed Pole riadkov alebo false v prípade neúspechu
	 */
	public static function queryAll($query) 
	{
            $statement = self::executeStatement(func_get_args());
            return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Spustí dotaz a vrátí prvý stĺpec prvého riadku.
	 * @param string $query Dotaz
	 * @return mixed Hodnota prvého stlpca z prvného riadku
	 */
	public static function querySingle($query) 
	{
            $statement = self::executeStatement(func_get_args());
            $data = $statement->fetch();
            return $data[0];
	}

	/**
	 * Spustí dotaz a vrátí z neho prvy riadok.
	 * @param string $query Dotaz
	 * @return mixed Pole výsledkov alebo false pri neúspechu
	 */
	public static function queryOne($query) 
	{
            $statement = self::executeStatement(func_get_args());
            return $statement->fetch(PDO::FETCH_ASSOC);
	}    
}

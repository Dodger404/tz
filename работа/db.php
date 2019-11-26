<?

Class db{

	public $isConn;
	protected $datab;

	// connect db
	public function __construct($host = 'localhost', $db_name = 'tz', $username = 'root', $password = '', $charset = 'utf8'){

		$this->isConn = true;

		try{

			$this->datab = new PDO("mysql:host={$host};dbname={$db_name};charset={$charset};", $username, $password);

			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		} catch (PDOException $e){

			throw new Exception($e->getMessage());

		}

	}

	// disconnect
	public function disconnect(){

		$this->datab = null;

		$this->isConn = false;

	}

	// get
	public function getDb($query, $params = []){

		try{

			$stmt = $this->datab->prepare($query);

			$stmt->execute($params);

			return $stmt->fetchAll();

		} catch(PDOException $e){

			throw new Exception($e->getMessage());

		}

	}

	// insert
	public function insertDb($query, $params = []){

		try{

			$stmt = $this->datab->prepare($query);

			$stmt->execute($params);

			return true;

		} catch(PDOException $e){

			throw new Exception($e->getMessage());

		}

	}

	// delite
	public function deliteDb($query, $params = []){

		try{

			$stmt = $this->datab->prepare($query);

			$stmt->execute($params);

			return true;

		} catch(PDOException $e){

			throw new Exception($e->getMessage());

		}

	}

}




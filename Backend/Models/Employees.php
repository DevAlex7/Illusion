<?php 
class Employee extends Validator{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $username;
    private $password;
    private $role;
    private $google_secret_key;
    private $block = 0;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function getId()
	{
		return $this->id;
    }
    
    public function name($value){
        if($this->validateAlphabetic($value, 4, 150)){
            $this->name = $value;
            return true;
        }
        else{
            return false;
        }
    }

    public function getName()
	{
		return $this->name;
    }
    
    public function lastname($value){
        if($this->validateAlphabetic($value, 3,150)){
            $this->lastname = $value;
            return true;
        }
        else{
            return false;
        }
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function email($value){
        if($this->validateEmail($value)){
            $this->email=$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function username($value){
        if($this->validateAlphanumeric($value,7,150)){
            $this->username =$value;
            return true;
        }
        else{
            return false;
        }
    }

    public function getUsername(){
        return $this->username;
    }

    public function password($value){
        if($this->validateAlphanumeric($value,8,150)){
            $this->password = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function role($value){
        if($this->validateId($value)){
            $this->role=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getRole(){
        return $this->role;
    }
    public function token($token){
        if($token != ''){
            $this->google_secret_key = $token;
            return true;
        }else{
            return false;
        }
    }
    public function getKey(){
        return $this->google_secret_key;
    }

    public function setBlock($value)
	{
		if ($this->validateId($value)) {
			$this->block = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getBlock()
	{
		return $this->block;
	}

    public function checkUsername()
	{
		$sql = 'SELECT id, name, lastname, username, role, google_secret_key, block FROM employees WHERE username = ?';
		$params = array($this->username);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id'];
			$this->name = $data['name'];
            $this->lastname = $data['lastname'];
            $this->username=$data['username'];
            $this->role = $data['role'];
            $this->google_secret_key = $data['google_secret_key'];
            $this->block = $data['block'];
			return true;
		} else {
			return false;
		}
    }
    public function openSession(){
            $_SESSION['idUser']=$this->getId();
            $_SESSION['NameUser']=$this->getName();
            $_SESSION['LastnameUser']=$this->getLastname();
            $_SESSION['UsernameActive']=$this->getUsername();
            $_SESSION['Role']=$this->getRole();
            $_SESSION['tiempo'] = time();
    }
    public function userHasGoogleKey(){
        $sql='SELECT google_secret_key FROM employees WHERE username=?';
        $params = array($this->username);
        return Database::getRow($sql, $params);
        
    }
	public function checkPassword()
	{
		$sql = 'SELECT password FROM employees WHERE id = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->password, $data['password'])) {
			return true;
		} else {
			return false;
		}
	}
    
    public function save(){
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql='INSERT INTO employees (name, lastname, email, username, password, role) VALUES (?,?,?,?,?,?)';
        $params = array($this->name, $this->lastname, $this->email, $this->username, $hash, $this->role);
        return Database::executeRow($sql,$params);
    }
    
    public function findbyId(){
        $sql ='SELECT * FROM employees WHERE id=?';   
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    public function editProfile(){
        $sql='UPDATE employees SET name=?, lastname=?, email=?, username=? WHERE id=?';
        $params=array($this->name, $this->lastname, $this->email, $this->username, $this->id);
        return Database::executeRow($sql,$params);
    }
    public function verifyRole(){
        $sql='
            SELECT roles.id, employees.id AS User, roles.role, employees.name, employees.lastname 
            FROM (employees INNER JOIN roles 
            ON employees.role=roles.id AND employees.id=?)
        ';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    public function all(){
        $sql='SELECT * FROM employees WHERE employees.id NOT IN (?)';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function ListPersons(){
        $sql='SELECT employees.*, roles.role AS nameRole FROM ((employees INNER JOIN roles ON employees.role=roles.id)) WHERE employees.id NOT IN (?)';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function updatePassword(){
        $sql='UPDATE employees SET password =? WHERE id=?';
        $params=array($this->password,$this->id);
        return Database::getRows($sql,$params);
    }
    public function eventsActivity(){
        $sql='SELECT events.date_created AS eventCreated, COUNT(events.id) AS countActivity FROM (events INNER JOIN employees ON employees.id=events.id_employee AND employees.id=?) GROUP BY events.date_created';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function productsEventActivity(){
        $sql='SELECT events.id, events.name_event, SUM(list_products_event.count) AS numberCount FROM ((list_products_event INNER JOIN products ON products.id=list_products_event.id_product) INNER JOIN events ON events.id=list_products_event.id_event INNER JOIN employees ON employees.id=events.id_employee AND employees.id=?) GROUP BY events.name_event';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function getTypeEventUser(){
        $sql='SELECT COUNT(events.id) AS countType, event_types.type FROM ((event_types INNER JOIN events ON event_types.id=events.type_event) INNER JOIN employees ON events.id_employee=employees.id AND employees.id=?) GROUP BY event_types.type';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function LogOff(){
		if(isset($_SESSION['idUser'])){
			unset($_SESSION['idUser']);
			unset($_SESSION['NameUser']);
			unset($_SESSION['LastnameUser']);
            unset($_SESSION['UsernameActive']);
            unset($_SESSION['Role']);
			return true;
		}	
		else
		{
			return false;
		}	
	}
    
    public function LogOffPublic(){
		if(isset($_SESSION['idPublicUser'])){
			unset($_SESSION['idPublicUser']);
			unset($_SESSION['publicNameUser']);
			unset($_SESSION['publicLastnameUser']);
            unset($_SESSION['publicUsernameActive']);
            unset($_SESSION['publicRole']);
			return true;
		}	
		else
		{
			return false;
		}	
    }
    public function search($value){
        $sql='
        SELECT employees.id, employees.name, employees.lastname, employees.username , roles.id AS role_id , roles.role 
        FROM (employees INNER JOIN roles ON roles.id=employees.role) 
        WHERE 
        employees.name LIKE ? OR 
        employees.lastname LIKE ? OR 
        employees.username LIKE ?';
        $params=array("%$value%","%$value%","%$value%");
        return Database::getRows($sql,$params);
    }
    public function eventsPerUser(){
        $sql='SELECT events.date_created AS eventCreated, events.name_event FROM (events INNER JOIN employees ON employees.id=events.id_employee AND employees.id=?)';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }
    public function updateGoogleSecret(){
        $sql='UPDATE employees SET google_secret_key=? WHERE id=?';
        $params=array($this->google_secret_key, $this->id);
        return Database::executeRow($sql,$params);
    }
    
    public function summonBlock()
	{
		$sql = 'UPDATE employees SET block = block+1 WHERE id = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
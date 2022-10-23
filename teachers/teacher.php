<?php
namespace Teacher;
use \PDO;

class Teacher
{
	protected $id;
	protected $first_name;
	protected $last_name;
	protected $email;
    protected $employee_number;
    protected $class_code;

	// Database Connection Object
	    protected $connection;

		public function __construct(
			$first_name = null, 
			$last_name = null, 
			$email = null, 
			$class_code = null, 
			$employee_number = null)
		{
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->email = $email;
			$this->class_code = $class_code;
			$this->employee_number = $employee_number;
		}

	public function getId()
	{
		return $this->id;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

    public function getLastName()
	{
		return $this->last_name;
	}

	public function getEmail()
	{
		return $this->email;
	}
    
    public function getNumber()
	{
		return $this->description;
	}

    public function getEmployeeNumber()
	{
		return $this->employee_number;
	}

	public function getClassCode()
	{
		return $this->class_code;
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM pdc10_classes WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);
			$row = $statement->fetch();
			$this->id = $row['id'];
			$this->first_name= $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->class_code = $row['class_code'];
			$this->email = $row['email'];
			$this->employee_number = $row['employee_number'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function addTeacher()
	{
		try {
			$sql = "INSERT INTO teachers SET first_name=:first_name, last_name=:last_name, email=:email, class_code=:class_code, employee_number=:employee_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':first_name' => $this->getFirstName(),
				':last_name' => $this->getLastName(),
                ':email'=> $this->getEmail(),
                ':contact_number'=> $this->getClassCode(),
                ':employee_number' => $this->getEmployeeNumber()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}


	public function update($first_name, $last_name, $email, $class_code, $employee_number)
	{
		try {
			$sql = 'UPDATE teachers SET first_name=?, last_name=?, email=?, class_code=?, employee_number=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$first_name,
				$last_name,
                $email,
				$class_code,
				$employee_number,
                $this->getID()

			]);
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->email = $email;
			$this->class_code = $class_code;
			$this->employee_number = $employee_number;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM pdc10_classes WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM pdc10_classes';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}
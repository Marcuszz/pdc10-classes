<?php
namespace Student;
use \PDO;

class Student
{
	protected $id;
	protected $first_name;
	protected $last_name;
	protected $email;
    protected $contact_number;
    protected $program;

	//Database Connection Object
	    protected $connection;

  	public function __construct(
		$first_name = null, 
		$last_name = null,
		$email = null, 
		$contact_number = null, 
		$program = null
	)
	{
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->program = $program;
        $this->email = $email;
        $this->contact_number = $contact_number;

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

	public function getContactNumber()
	{
		return $this->contact_number;
	}
    
    public function getProgram()
	{
		return $this->program;
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
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->email = $row['email'];
			$this->program = $row['program'];
			$this->contact_number = $row['contact_number'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function addStudent()
	{
		try {
			$sql = "INSERT INTO students SET first_name=:first_name, last_name=:last_name, email=:email, contact_number=:contact_number, class_code=:class_code";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':first_name' => $this->getFirstName(),
				':last_name' => $this->getLastName(),
                ':email'=> $this->getEmail(),
                ':contact_number'=> $this->getContactNumber(),
                ':program'=> $this->getProgram(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}


	public function update($first_name, $last_name, $program, $email, $contact_number)
	{
		try {
			$sql = 'UPDATE students SET first_name=?, last_name=?, program=?, email=?, contact_number=?WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$first_name,
                $last_name,
				$email,
				$contact_number,
				$program,
                $this->getId()

			]);
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->email = $email;
			$this->contact_number = $contact_number;
			$this->program = $program;
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
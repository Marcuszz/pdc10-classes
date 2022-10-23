<?php
namespace Class;
use \PDO;


class classes
{
	protected $id;
	protected $name;
	protected $code;
	protected $description;
    protected $assigned_teacher;

	// Database Connection Object
	protected $connection;
	
	public function __construct(
		$first_name = null, 
		$last_name = null, 
		$code = null, 
		$description = null, 
		$teacher_id = null)
	{
		$this->first_name = $name;
		$this->last_name = $name;
		$this->code = $code;
		$this->description = $description;
		$this->teacher_id = $teacher_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->first_name;
	}


	public function getCode()
	{
		return $this->code;
	}
    
    public function getDescription()
	{
		return $this->description;
	}

    public function getAssignedTeacher($teacher_id)
	{
		return $this->teacher_id;
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
			$this->name = $row['name'];
			$this->code = $row['code'];
			$this->description = $row['description'];
			$this->assigned_teacher = $row['assigned_teacher'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function add_class()
	{
		try {
			$sql = "INSERT INTO pdc10_classes SET name=:name, description=:description, code=:code";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':description' => $this->getDescription(),
				':code' => $this->getCode(),
				':assigned_teacher' => $this->getAssignedTeacher(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($name, $description, $code)
	{
		try {
			$sql = 'UPDATE pdc10_classes SET name=?, description=?, code=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
				$description,
				$code,
				$assigned_teacher,
				$this->getId()
			]);
			$this->name = $name;
			$this->description = $description;
			$this->code = $code;
			$this->assigned_teacher = $assigned_teacher;
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
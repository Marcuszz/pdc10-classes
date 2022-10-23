<?php
namespace ClassRoster;
use \PDO;



class ClassRoster
{
	protected $id;
	protected $class_code;
	protected $student_number;
	protected $enrolled_at;

	// Database Connection Object
	protected $connection;
	
	public function __construct(
		$class_code = null, 
		$student_number = null, 
		$enrolled_at = null, )
	{
		$this->student_number = $student_number;
		$this->class_code = $class_code;
		$this->enrolled_at = $enrolled_at;
	}

	public function getId()
	{
		return $this->id;
	}

	public function classCode()
	{
		return $this->class_code;
	}

	public function getStudentNumber()
	{
		return $this->studentNumber;
	}

	public function getEnrolledAt()
	{
		return $this->enrolled_at;
	}


	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function add_class()
	{
		try {
			$sql = "INSERT INTO classes SET student_number=:student_number, enrolled_at=:enrolled_at, class_code=:class_code";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':student_number' => $this->getStudentNumber(),
				':enrolled_at' => $this->getEnrolledAt(),
				':class_code' => $this->getClassCode(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function update($student_number, $enrolled_at, $class_code)
	{
		try {
			$sql = 'UPDATE classes SET class_code? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                $code,
                $this->getId()

			]);
			$this->code = $code;
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
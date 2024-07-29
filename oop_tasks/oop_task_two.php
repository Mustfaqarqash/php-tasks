<?php
class Student {
    private $student_id;
    private $student_name;
    private $student_age;

    // Constructor
    public function __construct($student_id, $student_name, $student_age) {
        $this->student_id = $student_id;
        $this->student_name = $student_name;
        $this->student_age = $student_age;
    }

    // Destructor
    public function __destruct() {
        echo "Student object with ID {$this->student_id} is being destroyed.<br>";
    }

    // Get student details
    public function getDetails() {
        return "ID: {$this->student_id}, Name: {$this->student_name}, Age: {$this->student_age}<br>";
    }

    // Getter and setter for student ID
    public function setStudentId($student_id) {
        $this->student_id = $student_id;
    }
    public function getStudentId() {
        return $this->student_id;
    }

    // Getter and setter for student name
    public function setStudentName($student_name) {
        $this->student_name = $student_name;
    }
    public function getStudentName() {
        return $this->student_name;
    }

    // Getter and setter for student age
    public function setStudentAge($student_age) {
        $this->student_age = $student_age;
    }
    public function getStudentAge() {
        return $this->student_age;
    }
}

class Classroom {
    private $students = [];

    //? Method to add a student
    public function addStudent(Student $student) {
        $this->students[$student->getStudentId()] = $student;
    }

    //? Method to remove a student by ID
    public function removeStudent($studentID) {
        if (isset($this->students[$studentID])) {
            unset($this->students[$studentID]);
            echo "Student with ID $studentID has been removed.<br>";
        } else {
            echo "Student with ID $studentID not found.<br>";
        }
    }

    //? Method to list all students
    public function listStudents() {
        foreach ($this->students as $student) {
            echo $student->getDetails();
        }
    }
}

$student1 = new Student(1, "mustafa qarqash", 20);
$student2 = new Student(2, "Abdallah Awaysheh", 24);

$classroom = new Classroom();
$classroom->addStudent($student1);
$classroom->addStudent($student2);

echo "Student List:<br>";
$classroom->listStudents();

$classroom->removeStudent(1);
echo "Updated Student List:<br>";
$classroom->listStudents();

?>

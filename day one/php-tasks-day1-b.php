<?php
$fruits = ["apple", "banana", "kewi", "Strawberry", "orange"];
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . " ";
}
echo "<br>";

// Add a new fruit to the array
array_push($fruits, "watermelon");

for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . " ";
}
echo "<br>";

// Remove the last fruit from the array
array_pop($fruits);

for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . " ";
}
echo "<br>";

// Check if a specific fruit exists in the array
$specific_fruit = "banana";
$exist_fruit = "is not exist";
if (in_array($specific_fruit, $fruits)) {
    $exist_fruit = "exist";
}
echo $exist_fruit;

// ---------------------------------------------------------------------
echo "<br>";
echo "----------------------------------------";
echo "<br>";
$names = ["mustafa" => 20, "hesham" => 25, "abdullah" => 24, "zaid" => 22, "rashed" => 20];
foreach ($names as $name => $age) {
    echo "$name is $age years old<br>";
}
echo "----------------------------------------";
echo "<br>";

// Add a new name to the array
$names["ahmad"] = 19;
foreach ($names as $name => $age) {
    echo "$name is $age years old<br>";
}

// Remove a name from the array
unset($names["rashed"]);
echo "----------------------------------------";
echo "<br>";
foreach ($names as $name => $age) {
    echo "$name is $age years old<br>";
}
echo "----------------------------------------";
echo "<br>";

$specific_name = "mustafa";
if (array_key_exists($specific_name, $names)) {
    echo "$specific_name exists in the array";
} else {
    echo "$specific_name is not exists in the array";
}
echo "<br>";
echo "----------------------------------------";
echo "<br>";


$students = [
    [
        "name" => "mustafa",
        "age" => 20,
        "grade" => "A"
    ],
    [
        "name" => "rashed",
        "age" => 22,
        "grade" => "B"
    ],
    [
        "name" => "hesham",
        "age" => 21,
        "grade" => "C"
    ]
];


function print_students($students)
{
    foreach ($students as $student) {
        echo "Name: " . $student['name'] . ", Age: " . $student['age'] . ", Grade: " . $student['grade'] . "<br>";
    }
}

echo "Initial student details:<br>";
print_students($students);
echo "<br>";


$new_student = [
    "name" => "rasha",
    "age" => 23,
    "grade" => "B"
];
$students[] = $new_student;

echo "After adding a new student:<br>";
print_students($students);
echo "<br>";

foreach ($students as &$student) {
    if ($student['name'] == "Bob") {
        $student['grade'] = "A+";
        break;
    }
}

echo "After attempting to update Bob's grade:<br>";
print_students($students);
echo "<br>";
foreach ($students as $key => $student) {
    if ($student['name'] == "Charlie") {
        unset($students[$key]);
        break;
    }
}

// Re-index the array
$students = array_values($students);

echo "After attempting to remove Charlie:<br>";
print_students($students);
echo "<br>";
echo "----------------------------------------";

// Additional useful array functions
echo "<br>";


$array1 = ["a" => "apple", "b" => "banana"];
$array2 = ["c" => "cherry", "d" => "date"];
$combined_array = array_merge($array1, $array2);
print_r($combined_array);
echo "<br>";

sort($fruits);
print_r($fruits);
echo "<br>";


ksort($names);
print_r($names);
echo "<br>";


asort($names);
print_r($names);
echo "<br>";


$key = array_search("banana", $fruits);
if ($key !== false) {
    echo "Found banana at index $key";
} else {
    echo "Banana not found";
}
echo "<br>";

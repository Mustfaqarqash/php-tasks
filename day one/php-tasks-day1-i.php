<?php

$cities = ["amman", "aqaba", "balqa", "madaba", "irbed", "jarash", "salt", "zarqa", "mafraq", "karak"];


for ($i = count($cities) - 1; $i >= 0; $i--) {
    echo $cities[$i] . "\t\t";
}
echo "<br>";


$specific_city = "amman";
$city_index = array_search($specific_city, $cities);

if ($city_index !== false) {
    echo "$specific_city is at index $city_index<br>";
} else {
    echo "$specific_city is not in the array<br>";
}


$city_to_remove = "aqaba";
$cities = array_values(array_filter($cities, function($city) use ($city_to_remove) {
    return $city !== $city_to_remove;
}));

for ($i = 0; $i < count($cities); $i++) {
    echo $cities[$i] . "\t\t";
}
echo "<br>";


$sub_array = array_slice($cities, 0, 3);


foreach ($sub_array as $city) {
    echo $city . "\t\t";
}
echo "<br>";


echo "<br>All cities in reverse order:<br>";
for ($i = count($cities) - 1; $i >= 0; $i--) {
    echo $cities[$i] . "\t\t";
}
echo "<br>";
// ----------------------------------------------------------------------------------------


$cities = ["amman", "aqaba", "balqa", "madaba", "irbed", "jarash", "salt", "zarqa", "mafraq", "karak"];
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];


$cities_upper = array_map('strtoupper', $cities);
echo "Cities in uppercase: ";
print_r($cities_upper);
echo "<br>";


$cities_filtered = array_filter($cities, function($city) {
    return $city[0] !== 'a';
});
echo "Cities not starting with 'a': ";
print_r($cities_filtered);
echo "<br>";


$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Sum of numbers: $sum<br>";


array_walk($cities, function(&$city) {
    $city .= " City";
});
echo "Cities with 'City' added: ";
print_r($cities);
echo "<br>";


$cities_1 = ["amman", "aqaba", "balqa", "madaba"];
$cities_2 = ["balqa", "madaba", "irbed", "jarash"];
$diff = array_diff($cities_1, $cities_2);
echo "Difference between cities_1 and cities_2: ";
print_r($diff);
echo "<br>";

$intersect = array_intersect($cities_1, $cities_2);
echo "Common elements between cities_1 and cities_2: ";
print_r($intersect);
echo "<br>";


$keys = ["name", "age", "city"];
$values = ["Yasmeen", 23, "Amman"];
$assoc_array = array_combine($keys, $values);
echo "Associative array from two indexed arrays: ";
print_r($assoc_array);
echo "<br>";


$students = [
    ["name" => "mustafa", "age" => 20, "grade" => "A"],
    ["name" => "rashed", "age" => 22, "grade" => "B"],
    ["name" => "hesham", "age" => 21, "grade" => "C"]
];
$names = array_column($students, 'name');
echo "Names of students: ";
print_r($names);
echo "<br>";


$first_three_cities = array_slice($cities, 0, 3);
echo "First three cities: ";
print_r($first_three_cities);
echo "<br>";


$specific_city = "amman";
if (in_array($specific_city, $cities)) {
    echo "$specific_city is in the array.<br>";
} else {
    echo "$specific_city is not in the array.<br>";
}



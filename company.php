<?php
$conn = new mysqli("localhost", "root", "", "Company");
if($conn === false){
    die("Error : " .mysqli_connect_error());
}else{
    echo "Success";
} 

//1.Создал тейбл
// $sql = "CREATE TABLE Employee(id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), salary INTEGER, position VARCHAR(30));";
// if($conn->query($sql)){
//     echo "Table Employee is Created";
// }else{
//     echo "Error : " . $conn->error;
// }

// $sql = "INSERT INTO Employee(name, salary, position) VALUES
//                         ('Yunus',5000,'Dev'),
//                         ('John',2000,'Hr'),
//                         ('Bob',4000,'Manager')";
// if ($conn->query($sql)) {
//     echo "Data have inserted";
// }else{
//     echo "Error : " . $conn->error;
// }
// mysqli_close($conn);
// $conn->close();

//2 Getting avg salary
$sql= "SELECT AVG(salary) AS avg_salary FROM Employee";
$result =$conn->query($sql);
if ($result) {
    $row=$result->fetch_assoc();
    $avgSalary=$row['avg_salary'];
    echo "Average salary : $avgSalary";

    //3 Getting employes salary>avgsalary
$sql= "SELECT * FROM EMPLOYEE WHERE salary>$avgSalary";
$result=$conn->query(($sql));
if ($result->num_rows > 0) {
    echo "Employees with salary more than AVG:<br>";
    while ($row = $result->fetch_assoc()) {
        echo "Имя: " . $row['name'] . "|  Зарплата: " . $row['salary'] . "<br>";
    }
} else {
    echo "Not found employees <br>";
}

}



?>
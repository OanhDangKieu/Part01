<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Kết nối tới MySQL server
$dbh = mysqli_connect('localhost', 'root', '', 'melody'); 
// Nếu kết nối thất bại thì đưa ra thông báo lỗi
if (!$dbh)     
die("Unable to connect to MySQL: " . mysqli_connect_error($dbh));

// Thông báo lỗi nếu chọn CSDL thất bại
if (!mysqli_select_db($dbh,'melody'))     
die("Unable to select database: " . mysqli_error($dbh));

// Bài tập 1
echo '<h1 style="text-align:center;font-size:20px">INSERT</h1>';
$sql_insert = "INSERT INTO my_contacts (id, full_names,gender,contact_no , email, city, country) VALUES ('5','Phạm Thị Hằng','nu','122','phamhang12@gmail.com','Hà Nam','Việt nam')";
if (mysqli_query($dbh, $sql_insert)) {
    echo "Thêm dữ liệu thành công!" . "<br>" ;
} else {
    echo "Lỗi: " . $sql_insert . "<br>" . mysqli_error($dbh);
}

echo '<h1 style="text-align:center;font-size:20px">UPDATE</h1>';
$sql_update = "UPDATE my_contacts SET email='updated@gmail.com' WHERE id=1";
if (mysqli_query($dbh, $sql_update)) {
    echo "Cập nhật dữ liệu thành công!" . "<br>";
} else {
    echo "Lỗi: " . $sql_update . "<br>" . mysqli_error($dbh);
}

echo '<h1 style="text-align:center;font-size:20px">DELETE</h1>';
$sql_delete = "DELETE FROM my_contacts WHERE id > 4";
if (mysqli_query($dbh, $sql_delete)) {
    echo "Xoá dữ liệu thành công!" . "<br>";
} else {
    echo "Lỗi: " . $sql_delete . "<br>" . mysqli_error($dbh);
}

echo '<h1 style="text-align:center;font-size:20px">SELECT</h1>';
$sql_stmt = "SELECT * FROM my_contacts"; 
// Thực thi câu lệnh SQL
$result = mysqli_query($dbh,$sql_stmt);

if (!$result)     
    die("Database access failed: " . mysqli_error($dbh)); 
    // Thông báo lỗi nếu thực thi thất bại
    
    $rows = mysqli_num_rows($result); 
    // Lấy số hàng trả về
// Nếu có dữ liệu thì hiển thị, không thì thông báo không có dữ liệu
if ($rows) {
    while ($row = mysqli_fetch_array($result)) {         
        echo 'ID: ' . $row['id'] . '<br>';         
        echo 'Full Names: ' . $row['full_names'] . '<br>';        
        echo 'Gender: ' . $row['gender'] . '<br>';         
        echo 'Contact No: ' . $row['contact_no'] . '<br>';         
        echo 'Email: ' . $row['email'] . '<br>';         
        echo 'City: ' . $row['city'] . '<br>';         
        echo 'Country: ' . $row['country'] . '<br><br>';     
    } 
}else{
    echo "Không có kết quả." . '<br>';
}
echo'<br>';
mysqli_close($dbh); // Đóng kết nối CSDL

// ------------------PDO--------------------------
echo '<h1 style="text-align:left;font-size:24px">PDO</h1>';
//  Kết nối tới cơ sở dữ liệu
    $pdo = new PDO("mysql:
                    host=localhost;
                    dbname=melody", 
                    "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 1. Câu lệnh SQL để thêm dữ liệu
    echo '<h1 style="text-align:center;font-size:18px">INSERT</h1>';
    $sql_pdo_insert = "INSERT INTO my_contacts (full_names, gender, contact_no, email, city, country) 
        VALUES (:full_names, :gender, :contact_no, :email, :city, :country)";

    //  Chuẩn bị câu lệnh và gán giá trị
    $stmt = $pdo->prepare($sql_pdo_insert);
    $stmt->bindParam(':full_names', $full_names);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':contact_no', $contact_no);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':country', $country);

    // Gán giá trị
    $full_names = 'Phạm Thị Hằng';
    $gender = 'nu';
    $contact_no = '122';
    $email = 'phamhang12@gmail.com';
    $city = 'Hà Nam';
    $country = 'Việt Nam';

    // Thực thi câu lệnh
    $stmt->execute();
    echo "Thêm dữ liệu thành công!". '<br><br>';

//  2. Câu lệnh SQL để cập nhật dữ liệu
    echo '<h1 style="text-align:center;font-size:18px">UPDATE</h1>';
    $sql_update = "UPDATE my_contacts SET email = :email WHERE id = :id";

    //  Chuẩn bị câu lệnh và gán giá trị
    $stmt = $pdo->prepare($sql_update);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);

    // Gán giá trị
    $email = 'pdoupdated@gmail.com';
    $id = 2;

    //  Thực thi câu lệnh
    $stmt->execute();
    echo "Cập nhật dữ liệu thành công!". '<br><br>';

//  3. Câu lệnh SQL để xoá dữ liệu
    echo '<h1 style="text-align:center;font-size:18px">DELETE</h1>';
    $sql_delete = "DELETE FROM my_contacts WHERE id > :id";

    // Chuẩn bị câu lệnh và gán giá trị
    $stmt = $pdo->prepare($sql_delete);
    $stmt->bindParam(':id', $id);

    // Gán giá trị
    $id = 4 ;
    //  Thực thi câu lệnh
    $stmt->execute();
    echo "Xóa dữ liệu thành công!". '<br><br>';

// 4.Hiển thị dữ liệu lên
    echo '<h1 style="text-align:center;font-size:18px">SELECT</h1>';
    $sql_stmt = "SELECT * FROM my_contacts"; 
    $stmt = $pdo->prepare($sql_stmt);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row["id"] . " - Tên: " . $row["full_names"] . " - Email: " . $row["email"] . "<br>";
    }

?>
</body>
</html>
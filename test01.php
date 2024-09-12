<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 01</title>
</head>
<body>
    <?php
    //8.  Viết function giải phương trình bậc 2
        function giaipt($a, $b, $c) {
            if ($a == 0) {
                if ($b == 0) {
                    if ($c == 0) {
                        return "8. Phương trình có vô số nghiệm".'</br>';
                    } else {
                        return "8. Phương trình vô nghiệm".'</br>';
                    }
                } else {
                    return "8. Phương trình có một nghiệm: x = " . (-$c / $b).'</br>';
                }
            }
            $delta = $b * $b - 4 * $a * $c;
            if ($delta > 0) {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                return "8. Phương trình có hai nghiệm phân biệt: x1 = $x1, x2 = $x2".'</br>';
            } elseif ($delta == 0) {
                $x = -$b / (2 * $a);
                return "8. Phương trình có nghiệm kép: x = $x".'</br>';
            } else {
                return "8. Phương trình vô nghiệm".'</br>';
            }
        }
        // ví dụ
        echo giaipt(2, 3, -2);
    
    //9.  Viết function in ra màn hình chữ nhật rỗng có kích thước 5x7 sử dụng dấu sao (dùng vòng lặp).
        echo "9.";
        function ChuNhatRong($height, $width) {
            echo "<pre>";
            for ($i = 1; $i <= $height; $i++) {
                if ($i == 1 || $i == $height) {
                    for ($j = 1; $j <= $width; $j++) {
                        echo "*";
                    }
                } else {
                    echo "*";
                    for ($j = 2; $j < $width; $j++) {
                        echo " ";
                    }
                    echo "*";
                }
                echo '<br>';
            }
            echo "</pre>";
        }

        ChuNhatRong(5, 7);

    //10. Viết function tính trung bình cộng của mảng.
        function trungbinh($arr) {
            if (empty($arr)) {
                return 0;
            }
        $sum = array_sum($arr);
        $soptu = count($arr);
        $trungbinh = $sum / $soptu;
        return $trungbinh;
        }
        // Ví dụ 
        $arr = [2, 5, 8, 12, 13];
        echo "10. Trung bình cộng của mảng là: " . trungbinh($arr).'</br>';  
        
        
        function namChanle($year) {
            if ($year % 2 == 0) {
                return "Năm $year là năm chẵn";
            } else {
                return "Năm $year là năm lẻ";
            }
        }
        
        $year = date("Y"); // Lấy năm hiện tại
        echo namChanle($year); // Gọi hàm kiểm tra
    ?>

    
</body>
</html>
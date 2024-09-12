<!DOCTYPE html>
<html lang="VN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 3</title>
</head>
<body>
<?php
//  viết hàm giải phương trình bậc 2
    function ptb2($a, $b, $c) {
        if ($a == 0) {
            if ($b == 0) {
                if ($c == 0) {
                    return "Phương trình có vô số nghiệm";
                } else {
                    return "Phương trình vô nghiệm";
                }
            } else {
                return "Phương trình có một nghiệm: x = " . (-$c / $b);
            }
        }

        $delta = $b * $b - 4 * $a * $c;
        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            return "Phương trình có hai nghiệm phân biệt: x1 = $x1, x2 = $x2";
        } elseif ($delta == 0) {
            $x = -$b / (2 * $a);
            return "Phương trình có nghiệm kép: x = $x";
        } else {
            return "Phương trình vô nghiệm";
        }
    }

    echo ptb2(2, 3, -2);
    // viết hàm giải phương trình bậc 1
    function ptb1($a, $b) {
        if ($a == 0) {
            if ($b == 0) {
                return "Phương trình có vô số nghiệm";
            } else {
                return "Phương trình vô nghiệm";
            }
        } else {
            $x = -$b / $a;
            return "Phương trình có nghiệm: x = $x";
        }
    }
    
    // Ví dụ sử dụng hàm:
    echo ptb1(2, -4);
    $ds = array(
        "Nhung"=>1,
"Oanh" => "2",
"Phong"=>"3",
"Phụng"=>"4",
"Phương"=>"5",
"Phượng"=>"6",
"Quang"=>"7",
"Quyên"=>"8",
"Quỳnh"=>"9",
"Tâm"=>"10",
"Thanh"=>"11",
"Thanh"=>"12",
"Thắng"=>"13",
"Thắng"=>"14",
"Thuận"=>"15",
"Thùy"=>"16",
"Thủy"=>"17",
"Thủy"=>"18",
"Thư"=>"19",
"Thương"=>"20",
"Thức"=>"21",
"Trang"=>"22",
"Tuấn"=>"23",
"Vân"=>"24",
"Việt"=>"25",
"Vy"=>"26",
"Xuân"=>"27",
    );
    function getRandomStudent($students) {
        $name = array_rand($students);
        $stt = $students[$name];
        echo "Mời bạn có stt " . $stt . " tên " . $name;
    }
    
    getRandomStudent($ds);
    ?>
</body>
</html>
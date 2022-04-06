<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>


<body>
    <h3>99乘法</h3>
    <?php
    $nine = [];
    // 先定義為空陣列
    // 再將迴圈產成的結果存入陣列
    // 以下$nine陣列的索引值為自動編號
    for ($j = 1; $j <= 9; $j++) {
        for ($i = 1; $i <= 9; $i++) {
            $nine[] = "$j X $i =" . ($j * $i);
        }
    }
    for ($i = 0; $i < count($nine); $i++) {
        // count()這個函式可以數出矩陣的個數，此時為81
        // 所以i會從0一直跑到80，共81個，也符合nine矩陣的0~80共81個索引值
        echo $nine[$i];
        // 如果$i除以9餘數為8(也就是第九個，索引值8、17、26…)就印一個br
        if ($i % 9 == 8) {
            echo "<br>";
        }
    }
    echo "<hr>";
    // 或者乾脆改成i+1除以9餘數為零的時候印一個br
    for ($i = 0; $i < count($nine); $i++) {
        echo $nine[$i];
        if (($i + 1) % 9 == 0) {
            echo "<br>";
        }
    }
    ?>

    <h3>不重複的威力彩號碼-for迴圈</h3>
    <?php
    $nums = [];

    for ($i = 0; $i < 6; $i++) {
        $t = rand(1, 38);
        if (!in_array($t, $nums)) {
            $nums[] = $t;
        }
    }

    echo "<pre>";
    print_r($nums);
    echo "<pre>";
    echo "迴圈次數:" . $i;

    // 用for的話，重覆它就不存入迴圈，但i只有6次機會，所以如有重覆陣列就會少一個數值
    // 故改用while比較好
    ?>
    <hr>
    <h3>不重複的威力彩號碼-while迴圈</h3>

    <?php
    $nums = [];
    $i = 0;
    // 和for迴圈的差別，要先在外面設變數i從哪開始
    while (count($nums) < 6) {
        // whle條件式()裡放讓迴圈繼續跑的條件
        $t = rand(1, 38);
        if (!in_array($t, $nums)) {
            $nums[] = $t;
        }
        $i++;
        // 繼續跑，直到$nums矩陣個數存到大於等於6
    }

    echo "<pre>";
    print_r($nums);
    echo "<pre>";

    echo "迴圈次數:" . $i;

    echo "<hr>";
    ?>

    <h3>不重複的威力彩號碼-foreach</h3>

    <?php

    // 用foreach來拿出一個一個陣列裡的值
    // 放入後面的變數digital裡
    // 去網頁按F12，編輯成為class="ball"後，
    // 再按加號新增css樣式
    // 將有效果的css樣式放入此檔案連結的css樣式表就可以惹

    foreach ($nums as $digital) {
        echo "<div class='ball'>" . $digital . "</div>";
    }
    echo "<br>";
    echo "<div class='ball1'>" . rand(1, 8) . "</div>";

    ?>
    <hr>
    <h3>找出五百年內的閏年</h3>

    <?php
    $year = 2022;
    $leap = [];

    // ↓將2022年(含)之後500年內是閏年的年存到陣列中
    for ($i = $year; $i <= ($year + 500); $i++) {
        if ($i % 400 == 0 || ($i % 4 == 0 && $i % 100 != 0)) {
            $leap[] = $i;
        }
    }

    // 印出來所存結果
    echo "<pre>";
    print_r($leap);
    echo "<pre>";

    // 檢查

    $check = 2024;

    if (in_array($check, $leap)) {
        echo $check . "是閏年";
    } else {
        echo $check . "不是閏年";
    }

    ?>
    <hr>
    <h3>1984(含1984)後的60年判斷是什麼天干地支</h3>
    <?php
    $sky = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸',];
    $land = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥',];
    $zodiac = [];
    // 已知60年為一天干地支循環，所以i從0跑到59，共60次
    // 1984是甲子年
    for ($i = 0; $i < 60; $i++) {
        $zodiac[1984 + $i] = $sky[$i % 10] . $land[$i % 12];
        // 指定zodiac的鍵值從1984開始，含1984，i從0開始所以沒問題
        // 除以10的餘數會是1~9，所以$sky的鍵值從0~9，剛好會是甲~癸的值的循環
        // 除以12的餘數會是1~11，所以$land的鍵值從0~11分配給子~亥的值的循環
        // $zodiac["年份"=>"干支"];
    }

    // 接下來印出存好廻圈結果的陣列就好囉
    echo "<pre>";
    print_r($zodiac);
    echo "</pre>";
    // 印出2021年是什麼年，順便驗證
    echo $zodiac['2022'] . '年';
    ?>

    <hr>

    <h3>反轉陣列</h3>

    <?php
    $a = [2, 4, 6, 1, 8];
    echo "<pre>";
    print_r($a);
    echo "<pre>";

    // 執行到$a個數的一半的次數時，序列就會反轉ok，如果執行到$a個數會一切回原點
    // 所以以下用if判斷式的高級寫法去限定反轉的次數在$a個數的一半
    $count = (count($a) / 2 == 0) ? count($a) / 2 : (count($a) - 1) / 2;
    // ↑↑↑用三元運算子去判斷陣列個數是奇數還是偶數
    for ($i = 0; $i < $count; $i++) {
        // 先將頭給一個盒子裝著
        $t = $a[$i];
        // 開始頭尾兩兩交換
        // 尾指派給頭
        $a[$i] = $a[count($a) - 1 - $i];
        // 將盒子裡的頭給尾
        $a[count($a) - 1 - $i] = $t;
    }

    echo "<pre>";
    print_r($a);
    echo "<pre>";
    ?>

</body>

</html>
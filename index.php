<?php
function highlightNegativeNumbers($numbers) {
    if (!is_array($numbers)) 
    {
        return false; 
    }

    echo "<p>Массив чисел:</p>";
    echo "<ul>";

    foreach ($numbers as $number) 
    {
        if ($number < 0) 
        {
            echo "<li style='color: red;'>$number</li>";
        } 
        else 
        {
            echo "<li>$number</li>";
        }
    }
    echo "</ul>";

    return true;
}

$numbers = [3, -5, 8, -2, 10, -7];

if (highlightNegativeNumbers($numbers)) 
{
    echo "<p>Функция выполнена успешно.</p>";
} 
else 
{
    echo "<p>Ошибка: передан некорректный аргумент.</p>";
}

echo "<hr>"
?>

<?php
function numberToWords($number) {
    if (!is_int($number) || $number < 0) {
        return "Некоректне число";
    }

    $units = ["", "один", "два", "три", "чотири", "п’ять", "шість", "сім", "вісім", "дев’ять"];
    $teens = ["десять", "одинадцять", "дванадцять", "тринадцять", "чотирнадцять", "п’ятнадцять", "шістнадцять", "сімнадцять", "вісімнадцять", "дев’ятнадцять"];
    $tens = ["", "", "двадцять", "тридцять", "сорок", "п’ятдесят", "шістдесят", "сімдесят", "вісімдесят", "дев’яносто"];
    $hundreds = ["", "сто", "двісті", "триста", "чотириста", "п’ятсот", "шістсот", "сімсот", "вісімсот", "дев’ятсот"];
    $thousands = ["", "тисяча", "тисячі", "тисяч"];

    $result = "";

    if ($number >= 1000) {
        $thousandPart = (int)($number / 1000);
        $number %= 1000;

        if ($thousandPart == 1) {
            $result .= "одна тисяча ";
        } elseif ($thousandPart == 2) {
            $result .= "дві тисячі ";
        } elseif ($thousandPart > 2 && $thousandPart < 5) {
            $result .= $units[$thousandPart] . " тисячі ";
        } else {
            $result .= $units[$thousandPart] . " тисяч ";
        }
    }

    if ($number >= 100) {
        $hundredPart = (int)($number / 100);
        $number %= 100;
        $result .= $hundreds[$hundredPart] . " ";
    }

    if ($number >= 10 && $number <= 19) {
        $result .= $teens[$number - 10] . " ";
    } else {
        if ($number >= 20) {
            $tensPart = (int)($number / 10);
            $number %= 10;
            $result .= $tens[$tensPart] . " ";
        }
        if ($number > 0) {
            $result .= $units[$number] . " ";
        }
    }

    return trim($result);
}

echo numberToWords(1111);
echo "<hr>"
?>

<?php
function displayProduct($name, $image, $price) {
    echo "
    <div class='product'>
        <h3>" . htmlspecialchars($name) . "</h3>
        <img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($name) . "'>
        <p>Ціна: " . htmlspecialchars($price) . " грн</p>
        <button>Купити</button>
    </div>
    ";
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .products-container {
            display: flex;
            gap: 15px; 
            flex-wrap: wrap; 
            justify-content: center; 
        }
        
        /* Стили для каждого продукта */
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            width: 200px;
            text-align: center;
            box-sizing: border-box;
        }

        .product img {
            width: 100%;
            height: auto;
        }

        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="products-container">
    <?php
    for ($i = 0; $i < 5; $i++) {
        displayProduct("Смартфон", "https://pngimg.com/d/iphone_12_PNG36.png", 7999);
    }
    ?>
</div>

</body>
</html>
<?php
header('Location: product.php');
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Картинка</th>
                <th>Наименование</th>
                <th>Бренд</th>
                <th>Стоимость</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Пример данных для таблицы
            $products = [
                [
                    'image' => 'картинка1.jpg',
                    'name' => 'Товар 1',
                    'brand' => 'Бренд 1',
                    'price' => '$100',
                ],
                [
                    'image' => 'картинка2.jpg',
                    'name' => 'Товар 2',
                    'brand' => 'Бренд 2',
                    'price' => '$150',
                ],
                // Добавьте другие товары по аналогии
            ];

            foreach ($products as $product) {
                echo '<tr>';
                echo '<td><img src="' . $product['image'] . '" width="200px" alt="' . $product['name'] . '"></td>';
                echo '<td>' . $product['name'] . '</td>';
                echo '<td>' . $product['brand'] . '</td>';
                echo '<td>' . $product['price'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
include("db.php"); // подключение к нашей бд
echo "<a href=\"index.php\">На главную страницу</a>"; //переход в меню; //
echo "<center><h2>Туры c текущей даты</h2>"; //  вывод заголовка  
$query = mysqli_query($db, "SELECT * FROM `tour` WHERE  `tour start date`> CURDATE() ORDER BY `tour start date` ");// Выполняет запрос к базе данных, выбираем все из таблицы туры после текущей даты и сортируем
?>
<style>
   body {
    background: #00BFFF ; /* Цвет фона  */
    color: #4B0082; /* Цвет текста */
    
   }
  </style>
<center><table border=\"1\">
    <thead>  
        <th>Код тура </th>
        <th>Дата начала тура </th>
        <th>Дата окончания тура </th>
        <th>Страна </th>
        <th>Отель </th>
        <th>Код туроператора </th>
        <th>Цена тура</th>
        
        
    </thead>
    <body>
    
        <?php  /* fetch_assoc-извлечение  массива,foreach-перебор массива,на каждой итерации значение текущего элемента присваивается переменной $col_value **/
         while ($row = $query->fetch_assoc()){ 
         ?>
            <tr> 
                <?php foreach ($row as $col_value){ 
                 ?>
                    <td><?php echo $col_value ?></td>
                <?php }
                 ?>
            </tr>
        <?php } ?>
    </body>
</table>`

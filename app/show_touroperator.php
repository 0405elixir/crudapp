<?php
include("db.php"); // подключение к нашей бд
echo "<a href=\"index.php\">На главную страницу</a>"; //переход в меню; //
echo "<center><h2>Туроператоры</h2>"; //  вывод заголовка  
$query = mysqli_query($db, "SELECT * FROM `tour operators`");// Выполняет запрос к базе данных, выбираем все из таблицы туроператоры
?>
<style>
   body {
    background: #00BFFF ; /* Цвет фона  */
    color: #4B0082; /* Цвет текста */
    
   }
  </style>
<center><table border=\"1\">
    <thead>  
        <th>Код туроператора </th>
        <th>Имя туроператора</th>
        <th>Номер телефона </th>
        <th>Комиссионное вознаграждение </th>
        <th>Вебсайт </th>
        <th>Юридическое название </th>
        
        
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

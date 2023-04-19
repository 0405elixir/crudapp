<?php
include("db.php"); // подключение к нашей бд
echo "<center><h2>Договоры с клиентами</h2>"; //  вывод заголовка  
$query = mysqli_query($db, "SELECT * FROM `contract`");// Выполняет запрос к базе данных, выбираем все из таблицы договоры
?>
<style>
   body {
    background: #00BFFF ; /* Цвет фона  */
    color: #4B0082; /* Цвет текста */
    
   }
  </style>
<center><table border=\"1\">
    <thead>  
        <th>Код договора </th>
        <th>Код тура </th>
        <th>Дата договора </th>
        <th>Код клиента </th>

        
        
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

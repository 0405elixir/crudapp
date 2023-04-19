<?php
include("db.php"); // подключение к нашей бд
echo "<a href=\"index.php\">На главную страницу</a>"; //переход в меню; //
echo "<h2>Клиенты</h2>"; //  вывод заголовка  
$query = mysqli_query($db, "SELECT * FROM `clients`");// Выполняет запрос к базе данных, выбираем все из таблицы клиенты
?>
<style>
   body {
    margin-left:10%;
    background: #00BFFF ; /* Цвет фона  */
    color: #4B0082; /* Цвет текста */
    background: #00BFFF url(client.png) no-repeat center center fixed; /* Цвет фона и путь к файлу */
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover; /* Фон занимает всю доступную площадь */
   }
  </style>
<table   border="1" align="left" >
    <thead>  
        <th>Код клиента</th>
        <th>ФИО</th>
        <th>Дата рождения</th>
        <th>Номер телефона </th>
        <th>Номер паспорта</th>
        
        
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

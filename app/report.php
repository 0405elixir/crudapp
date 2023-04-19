<html>
 <head>
    <meta charset="UTF-8">

<style>
   body {
    margin: 0;
     height: 100%; /* Высота страницы */
    
    
    background: #00BFFF url(1.jpg) no-repeat center center fixed; /* Цвет фона и путь к файлу с фото  */
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover; /* Фон занимает всю доступную площадь */
        
        color: #fff; /* Цвет текста */
           }
  </style>

</head>
</html>
<?php
include("db.php");
echo "<a style='color:red;' href=\"index.php\">На главную страницу</a>"; //переход в меню
echo "<center><h2>Отчет по продажам </h2>"; 
	
$query = mysqli_query($db, "SELECT * FROM `contract`");
$myrow = mysqli_fetch_array($query);
$goods = array();
do {
$id = $myrow['contract code'];
$goods[$id] = 0;
} while ($myrow = $query->fetch_assoc()); 
echo "<table border=\"1\">"; //вывод обработанных данных в виде таблицы
echo "<tr><td>Номер договора</td><td>Клиент</td><td>Дата договора</td><td>Дата начала тура</td><td>Дата окончания тура</td><td>Страна</td><td>Отель</td><td>Туроператор</td><td>Стоимость тура</td><td>Вознаграждение</td></tr>";
for($i = 0; $i < count($goods); $i++) {
	$id = $i+1;
	
	$query = mysqli_query($db, "SELECT * FROM `contract` WHERE `contract code` = $id");
	$myrow = mysqli_fetch_array($query);
	$data = $myrow['date of contract'];
	$code_tour = $myrow['tour code'];
    $code_client = $myrow['client code'];
    

	$query = mysqli_query($db, "SELECT * FROM `clients` WHERE `client code` = $code_client");
	$myrow = mysqli_fetch_array($query);
	$name_client = $myrow['fio'];
    	    
	$query = mysqli_query($db, "SELECT * FROM `tour` WHERE `tour code` = $code_tour");
	$myrow = mysqli_fetch_array($query);
    $tour_start_date = $myrow['tour start date'];
    $tour_end_date = $myrow['tour end date'];
    $country = $myrow['country'];
    $hotel = $myrow['hotel'];
    $code_turop = $myrow['tour operator code'];
    $tour_price = $myrow['tour price'];
      	    
    $query = mysqli_query($db, "SELECT * FROM `tour operators` WHERE `tour operator code` = $code_turop");
	$myrow = mysqli_fetch_array($query);
    $name_turop = $myrow['tour operator'];
    $percentage = $myrow['commission percentage'];
	$itog = (((int)$percentage * (int) $tour_price))/100;
        	

		echo "<tr><td>$id</td><td>$name_client</td><td>$data</td><td>$tour_start_date</td><td>$tour_end_date</td><td>$country</td><td>$hotel</td><td>$name_turop</td><td>$tour_price</td><td>$itog</td></tr>";
	}

echo "</table>";

?>
<html>
 <head>
    <meta charset="UTF-8">

<style>
html { height: 100%; }/* чтобы фон занял весь экран */
   body {
     height: 100%; /* Высота страницы */
    background: #00BFFF url(763.jpg); /* Цвет фона и путь к файлу с фото */
    color: #fff; /* Цвет текста */
    background-size: cover; /* Фон занимает всю доступную площадь */
   }
   </style>

</head>
</html>
<?php
include("db.php");
echo "<a style='color:red;' href=\"index.php\">На главную страницу</a>"; //переход в меню; //
echo "<h2>Полная информация о туре </h2> 
		<form action=\"show_order.php\" method=\"POST\">"; //вывод формы
echo "Введите номер договора: <select size=\"1\" name=\"ps\">";
$query = mysqli_query($db, "SELECT * FROM `contract`");
$myrow = mysqli_fetch_array($query);
do {
	$id = $myrow['contract code'];
	echo "<option value=\"$id\">$id</option>";
} while ($myrow = $query->fetch_assoc());
echo "</select>";
echo"<input type=\"submit\" value = \"Выбрать\" name=\"see\"><br /><br /><br /></form>";



if(isset($_POST['see'])) { //вывод таблицы выбранного товара
	$number_order = $_POST['ps'];
	$query = mysqli_query($db, "SELECT * FROM `contract` WHERE `contract code` = $number_order");
	$myrow = mysqli_fetch_array($query);
	$data = $myrow['date of contract'];
	$code_tour = $myrow['tour code'];
    $code_client = $myrow['client code'];

	$query = mysqli_query($db, "SELECT * FROM `clients` WHERE `client code` = $code_client");
	$myrow = mysqli_fetch_array($query);
	$name_client = $myrow['fio'];
    
    echo "номер договора - $number_order <br /> ";
   	echo "дата договора - $data <br /> клиент - $name_client <br /> ";
    
	$query = mysqli_query($db, "SELECT * FROM `tour` WHERE `tour code` = $code_tour");
	$myrow = mysqli_fetch_array($query);
    $tour_start_date = $myrow['tour start date'];
    $tour_end_date = $myrow['tour end date'];
    $country = $myrow['country'];
    $hotel = $myrow['hotel'];
    $code_turop = $myrow['tour operator code'];
    $tour_price = $myrow['tour price'];
      	echo "дата начала тура- $tour_start_date <br /> дата окончания тура - $tour_end_date <br />страна - $country <br />отель - $hotel <br /> стоимость тура- $tour_price <br /> ";
    
    $query = mysqli_query($db, "SELECT * FROM `tour operators` WHERE `tour operator code` = $code_turop");
	$myrow = mysqli_fetch_array($query);
    $name_turop = $myrow['tour operator'];
    $percentage = $myrow['commission percentage'];
	$itog = (((int)$percentage * (int) $tour_price))/100;
         echo "название туроператора - $name_turop <br />	процент комиссионного вознаграждения - 	$percentage <br />доход агентства с тура - $itog <br /> ";
	
}
?>
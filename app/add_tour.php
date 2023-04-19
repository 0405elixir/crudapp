<html>
 <head>
    <meta charset="UTF-8">

<style>
html { height: 100%; }/* чтобы фон занял весь экран */
   body {
     height: 100%; /* Высота страницы */
    background: #00BFFF url(more.jpg); /* Цвет фона и путь к файлу с фото */
    color: #fff; /* Цвет текста */
    background-size: cover; /* Фон занимает всю доступную площадь */
   }
   </style>

</head>
</html>
<?php	
include("db.php");
    
echo "<a style='color:red;' href=\"index.php\">На главную страницу</a>"; //переход в меню; //

//вывод формы с данными о туре
echo "<h2>Введите данные о новом туре</h2> 
		<form action=\"add_tour.php\" method=\"POST\">
		Дата начала тура: <input type=\"date\" name=\"ds\"/>
        Дата окончания тура: <input type=\"date\" name=\"de\"/>
        <br /><br />
        Страна: <input type=\"text\" name=\"cy\"/>
        Отель: <input type=\"text\" name=\"ht\"/>
        Цена тура: <input type=\"decimal\" name=\"tp\"/>
        <br /><br />
 Туроператор: <select size=\"1\" name=\"ps\">";
		$query = mysqli_query($db, "SELECT * FROM `tour operators`"); //выборка клиента
		$myrow = mysqli_fetch_array($query);
		do {
			$id = $myrow['tour operator code'];
			$tro = $myrow['tour operator'];
			echo "<option value=\"$id\">$tro</option>";
		} while ($myrow = $query->fetch_assoc());
echo "</select>";
  
 echo "<br></br>
        <br></br>";

echo		"<input type=\"submit\" value = \"Записать\" name=\"send\"> 
		</form>";
if(isset($_POST['send'])) { //запись в бд данные о новом туре
	
		$ds = $_POST['ds'];
		$de = $_POST['de'];
		$cy = $_POST['cy'];
        $ht = $_POST['ht'];
        $tp = $_POST['tp'];
        $turop = $_POST['ps'];
                                     
//запрос к бд, внести информацию в нужные поля введенные переменные                             
		mysqli_query($db, "INSERT INTO `tour`(`tour start date`, `tour end date`, `country`, `hotel`,`tour operator code`, `tour price`) VALUES ('$ds','$de','$cy','$ht',$turop,'$tp')");
		$query = mysqli_query($db, "SELECT `tour code` FROM `tour` ORDER BY `tour code` DESC LIMIT 1");
		$myrow = mysqli_fetch_array($query);
		$last_id = $myrow['tour code'];
		echo "<b><i>Ok!Данные записаны. Код тура - $last_id</i></b>";
	}


?>

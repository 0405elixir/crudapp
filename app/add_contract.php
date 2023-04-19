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

//вывод формы с данными о договоре


echo "<h2><a title='до заполнение формы должны быть внесены данные: «Клиент», «Туроператор», «Тур»'>Введите данные о новом договоре</a></h2> 
		 <br></br>
         
		<form action=\"add_contract.php\" method=\"POST\">
        Дата договора: <input type=\"date\" name=\"doc\"/>
        <br /><br />
 Клиент: <select size=\"1\" name=\"cl\">";
		$query = mysqli_query($db, "SELECT * FROM `clients`"); //выборка клиента
		$myrow = mysqli_fetch_array($query);
		do {
			$id = $myrow['client code'];
			$clt = $myrow['fio'];
			echo "<option value=\"$id\">$clt</option>";
		} while ($myrow = $query->fetch_assoc());
echo "</select>";

echo "Код тура: <select size=\"1\" name=\"tc\">";
		$query = mysqli_query($db, "SELECT * FROM `tour`"); //выборка клиента
		$myrow = mysqli_fetch_array($query);
		do {
			$idt = $myrow['tour code'];
			$tcd = $myrow['tour code'];
			echo "<option value=\"$idt\">$tcd</option>";
		} while ($myrow = $query->fetch_assoc());
echo "</select>";
  
 echo "<br></br>
        <br></br>";

echo		"<input type=\"submit\" value = \"Записать\" name=\"send\"> 
		</form>";
if(isset($_POST['send'])) { //запись в бд данные о новом договоре
	
		$doc = $_POST['doc'];
        $clt = $_POST['cl'];
        $tcd = $_POST['tc'];
                                     
//запрос к бд, внести информацию в нужные поля введенные переменные                             
		mysqli_query($db, "INSERT INTO `contract`(`tour code`,`date of contract`, `client code`) VALUES ('$tcd', '$doc','$clt')");
		$query = mysqli_query($db, "SELECT `contract code` FROM `contract` ORDER BY `contract code` DESC LIMIT 1");
		$myrow = mysqli_fetch_array($query);
		$last_id = $myrow['contract code'];
		echo "<b><i>Ok!Данные записаны. Код договора - $last_id</i></b>";
	}


?>

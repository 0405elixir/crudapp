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

//вывод формы с данными о клиенте
echo "<h2><a title='необходимо заполнить все данные и нажать кнопку «Записать»'>Введите данные о новом клиенте</a></h2> 
		 <br></br>
          <br></br>
        <form action=\"add_client.php\" method=\"POST\">
		Имя клиента: <input type=\"text\" name=\"fio\" />
		Дата рождения: <input type=\"date\" name=\"dr\"/>
        Номер телефона: <input type=\"bigint\" name=\"ph\"/>
        Номер паспорта: <input type=\"bigint\" name=\"pn\"/>
 <br></br>
  <br></br>
<center>

		<input type=\"submit\" value = \"Записать\" name=\"send\"> 
                
		</form>";
if(isset($_POST['send'])) { //запись в бд данные о новом клиенте
	if(empty($_POST['fio'])){
		echo "Введите ФИО <br />";
	} elseif(empty($_POST['dr'])) {
		echo "Введите Дату рождения <br />";
	}elseif(empty($_POST['ph'])){
		echo "Введите телефон <br />";
    }elseif(empty($_POST['pn'])){
		echo "Введите номер паспорта <br />";} else {
		$fio = $_POST['fio'];
		$dr = $_POST['dr'];
		$ph = $_POST['ph'];
		$pn = $_POST['pn'];
                                     
//запрос к бд, внести информацию в нужные поля введенные переменные                             
		mysqli_query($db, "INSERT INTO `clients`(`fio`, `date of birth`, `phone number`,`passport number`) VALUES ('$fio','$dr','$ph','$pn')");
		$query = mysqli_query($db, "SELECT `client code` FROM `clients` ORDER BY `client code` DESC LIMIT 1");
		$myrow = mysqli_fetch_array($query);
		$last_id = $myrow['client code'];
		echo "<b><i>Ok!Данные записаны. Код клиента - $last_id</i></b>";
	}

}
?>

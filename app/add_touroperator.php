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


//вывод формы с данными о туроператоре
echo "<h2>Введите данные о новом туроператоре</h2> 
		<form action=\"add_touroperator.php\" method=\"POST\">
		Имя туроператора: <input type=\"text\" name=\"to\" />
        Номер телефона: <input type=\"bigint\" name=\"pn\"/>
        <br /><br />
        Комиссионное вознаграждение: <input type=\"int\" name=\"cp\"/>
        Вебсайт: <input type=\"text\" name=\"web\"/>
        Юридическое название: <input type=\"text\" name=\"le\"/>
                      
 <br></br>
<center>

		<input type=\"submit\" value = \"Записать\" name=\"send\"> 
		</form>";
if(isset($_POST['send'])) { //запись в бд данные о новом туроператоре
	
		$to = $_POST['to'];
		$pn = $_POST['pn'];
		$cp = $_POST['cp'];
		$web = $_POST['web'];
        $le = $_POST['le'];
                                     
//запрос к бд, внести информацию в нужные поля введенные переменные                             
		mysqli_query($db, "INSERT INTO `tour operators`(`tour operator`, `phone number`, `commission percentage`,`website`, `legal entity`) VALUES ('$to','$pn','$cp','$web','$le')");
		$query = mysqli_query($db, "SELECT `tour operator code` FROM `tour operators` ORDER BY `tour operator code` DESC LIMIT 1");
		$myrow = mysqli_fetch_array($query);
		$last_id = $myrow['tour operator code'];
		echo "<b><i>Ok!Данные записаны. Код туроператора - $last_id</i></b>";
	}


?>



<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">

<style>
html { height: 100%; }/* чтобы фон занял весь экран */
   body {
    margin: 0;
     height: 100%; /* Высота страницы */
    
    
    background: #00BFFF url(turUHD.jpg) no-repeat center center fixed; /* Цвет фона и путь к файлу с фото  */
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover; /* Фон занимает всю доступную площадь */
        
        color: #fff; /* Цвет текста */
    
   }
    button {/* параметры кнопок */
    background: #008EB0; /* Синий цвет фона */
    color: #fff; /* Белый цвет текста */
    border: none; /* Убираем рамку */
    padding: 1rem 1rem; /* Поля вокруг текста */
    margin-bottom: 1rem; /* Отступ снизу */ 
    margin-left: 30px; /* Отступ слева */ 
    border-radius: 20px; /* Уголки сгладить */
   }
   .green { background: #73A353; }
   .red { background: #C1172C; }
   .orange { background: #F7941E; }
          </style>
<style type="text/css">
      #footer {
    position: fixed; /* Фиксированное положение */
    left: 0; bottom: 0; /* Левый нижний угол */
    padding: 10px; /* Поля вокруг текста */
    background: #00008B; /* Цвет фона */
    color: #FFFFFF; /* Цвет текста */
    width: 100%; /* Ширина слоя */
   }
  </style>
</head>

<body> 
     <h1 align="center">Туристическое агентство Artem</h1>


 <form action="add_client.php" >
   <button class="green">Добавить клиента</button>
   </form>
   
 <form action="add_tour.php" >
   <button class="green">Добавить тур</button>
  </form>

 <form action="add_contract.php" >
   <button class="green">Добавить договор</button>
   </form>

<form action="add_touroperator.php" >
   <button class="green">Добавить туроператора</button>
    </form>


<form action="show_client.php" >
   <button class="red">Клиенты</button>
    </form>

<form action="show_tour.php" >
   <button class="red">Туры c текущей даты</button>
    </form>

<form action="show_touroperator.php" >
   <button class="red">Туроператоры</button>
 </form>    

<form action="show_order.php" target="_blank">
   <button class="orange"><a title="отчет выдаст полную информацию по договору с клиентом">Отчет по заказу </a> </button>
   
  
  </form>
  <form action="report.php" target="_blank">
   <button class="orange">Отчет по всем продажам </button>
  </form>
  
  <div id="footer">
   &copy; Артем Калинин 2022
  </div>
</body>
</html>

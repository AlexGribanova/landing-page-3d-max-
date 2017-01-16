<? 
// ----------------------------конфигурация-------------------------- // 
 
$adminemail=" ";  // e-mail админа 
 
 
$date=date("d.m.y"); // число.месяц.год 
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="http://3d_max.ru/";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 
$name=$_POST['name']; 
 
$mail=$_POST['mail']; 
 
$phone=$_POST['phone']; 
 
$msg=$_POST['message'];
  
 
// Проверяем валидность e-mail 
 
if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", 
strtolower($mail))) 
 
 { 
 
  echo 
"<center>Что-то пошло не так...Возможно,вы указали неверные данные.<br>Пожалуйста, вернитесь <a 
href='javascript:history.back(1)'><B>назад</B></a> и 
попытайтесь ещё."; 
 
  } 
 
 else 
 
 { 
 
 
$msg=" 
 
<p>Заявка на курс 3D max</p>

<p>Имя: $name</p> 
 
 
<p>E-mail: $mail</p> 
 
 
<p>Номер телефона: $phone</p> 
 
 
"; 
 
  
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time  $name", "phone"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Сообщение от $name"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю 
 
print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000); 
//--></script> 
 
$msg 
 
<p>Сообщение отправлено! Наш администратор свяжется с вами.<br> Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";  
exit; 
 
 } 
 
?>
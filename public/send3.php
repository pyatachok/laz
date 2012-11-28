<?
if (isset($_POST['data'])) {$data = $_POST['data'];}
if (isset($_POST['fio'])) {$fio = $_POST['fio'];}
if (isset($_POST['kolvo'])) {$kolvo = $_POST['kolvo'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['dostavka'])) {$dostavka = $_POST['dostavka'];}

$address = 'sherkov@antipod-group.ru';

$sub = "Заказ билетов с сайта Live Animation Три истории";
$mes = "Человек по имени: $fio \n 
Желает заказать билет(ы) на Три истории\n 
Дата/сеанс: $data \n
Количество билетов: $kolvo \n 
Телефон: $tel \n 
Электронная почта: $email \n 
Адрес доставки: $dostavka";

$verify = mail ($address, $sub, $mes,"Content-type:text/plain; charset = utf8");
if ($verify =='true')
{
echo "<p>Ваше сообщение отправлено";
}
else
{
echo "<p>Сообшение не отправлено";
}


$address2 = "$email";
$sub2 = "Live Animation: заказ билетов ";
$mes2 = "Добрый день! \n
Вы заказали билеты на Три истории. В ближайшее время наши специалисты свяжутся с вами. \n
Спасибо за интерес к нашему проекту!
________________________________________ \n
Театр Живой Анимации | Отдел продаж
+7 (495) 785-61-95 | +7 (926) 616-19-18
www.liveanimation.ru";

$verify2 = mail ($address2, $sub2, $mes2,"Content-type:text/plain; charset = utf8");

?>









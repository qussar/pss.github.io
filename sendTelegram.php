/*получаем значения полей из формы*/
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

/*собираем сообщение*/
$message .= "Новое сообщение из формы";
$message .= "Имя: ".$name;
$message .= "Телефон:".$phone;
$message .= "Сообщение:".$message;

/*токен который выдаётся при регистрации бота */
$token = "5425562984:AAGbS7MwPLKrMXD0XCn0rEiIByQC5Jmyt48";
/*идентификатор группы*/
$chat_id = "-709384983";
/*делаем запрос и отправляем сообщение*/
parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");



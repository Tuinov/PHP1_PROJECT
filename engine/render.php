<?php
//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = []) {
    $content = renderTemplate(LAYOUTS_DIR . 'main', [
        'content' => renderTemplate($page, $params),
        'quantityAll' => quantityCart()
        // 'title' =>
        // 'user' =>
        // 'allow' =>
        ]);
    return $content;
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = []) {
    
    
    ob_start();
    if(!is_null($params)) {
      extract($params);
  }
  
     $fileName = TEMPLATES_DIR . $page . ".php";
     if(file_exists($fileName)) {
      include $fileName;
     } else {
         exit("страница {$fileName} не существует!!");
     }
     
    return ob_get_clean();
  }
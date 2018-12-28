<?php

use Phalcon\Mvc\Controller;
include APP_PATH.'\config\config.php';

class SearchpageController extends Controller
{
    public function indexAction()
    {
        //echo $this->tag->form("searchPage/page");

    }

    public function findAction()
    {


        $url = new Url();

        $success = $url->save(  //организовать передачу данных из другого контроллера
            $this->request->getPost(),
            [
                "url"
            ]
        );


        if ($success) {  //поиск

            $string = WIKI_NAME;
            $string = $string .'/api.php?action=query&list=search&srwhat=title&srsearch=';//запрос по совпадению в тексте

            $string = $string . urlencode($url->url);
            $string = $string . '&format=json';

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $string);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//куки файл авторизация

            $ctri = curl_exec($curl);
            $ctri = json_decode($ctri);

            //var_dump($ctri);
            $pages = $ctri->query->search;

            $string = "";

            $this->view->pages = $pages;

            $arr = array();
            $i = 0;
            foreach ($pages as $page):
                $arr[$i] = array();
                $arr[$i]['title'] = $page->title;
                $arr[$i]["id"] = $page->pageid;

                $i = $i + 1;

            endforeach;
            var_dump($arr);
            curl_close($curl);
            /*if ($is_ajax) {
                // отменить вью
                echo json_encode($arr);
                exit;
            } else*/
            $this->view->arr=$arr;
            return $arr;//Возврат


        } else {
            echo "К сожалению, возникли следующие проблемы: ";

            $messages = $url->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

}
?>
<!--
<div class="col-lg-12 col-md-12 col-sm-12 search-result">
    <div class="col-lg-1 col-md-1 col-sm-1 img-search-res text-center" style="padding: 0">
        <img src="img/document.svg" width="45px" alt="Fire">
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 text-search-res">
        <?php// echo $page->title; ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="row date-time-go text-left">
            <div>Время выполнения:</div>
        </div>
        <div class="row date-time-go-bold text-center">
            <div><span class="percent pr-green">20 : 00 мин.</span></div>
            <!-- реализовать функцию по вытаскиванию времени
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 text-right go-incident">
        <a href="/incidient/<?php //echo $page->pageid; ?>">Открыть</a>
        <a href="http://site.ru/w/index.php/<?php //echo $page->title; ?>">Начать</a>
    </div>
</div>
</body>
</html> -->

<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use PHPHtmlParser\Dom;

class FeedController extends AppController {

    public function latest() {

        $pagin = [];

        if(isset($this->request->params['page'])){
            $pagin['page'] = (int)$this->request->params['page'];
        } else {
            $pagin['page'] = 1;
        }

        $pagin['limit'] = 30;

        $this->loadModel('Feed');

        $pagin['all'] = $this->Feed->find('all')->count();
        $pagin['amount'] = ceil($pagin['all'] / $pagin['limit']);

        if($pagin['page']<=5){
            $start = 1;
            $stop = 11;
        } elseif($pagin['page']>$pagin['amount']-10){
            $start = $pagin['amount']-10;
            $stop = $pagin['amount'];
        } else {
            $start = $pagin['page']-5;
            $stop = $start+10;
        }

        for($i=$start; $i<=$stop; $i++) $pagin['pages'][] = $i; 

        $pagin['prev'] = $pagin['page']-1 > 0 ? $pagin['page']-1 : 1;
        $pagin['next'] = $pagin['page']+1 < $pagin['amount'] ? $pagin['page']+1 : $pagin['amount'];

        $feed = $this->Feed->find('all', [
            'limit' => $pagin['limit'],
            'page' => $pagin['page'],
            'order' => 'Feed.ds_date DESC'
        ])->execute();

        $this->set([
            'feed' => $feed
            ,'req' => $this->request->params
            ,'pagin' => $pagin
        ]);

    }

    public function link() {

        $hash = $this->request->params['pass'][0];

        $this->loadModel('Feed');

        $feed = $this->Feed->find('all', [
            'conditions' => ['ds_hash LIKE' => $hash]
        ])->first();

        //$this->set(['req' => $feed->ds_base_url]);
        return $this->redirect($feed->ds_base_url);
    }

    public function article() {

        $hash = $this->request->params['pass'][0];

        $this->loadModel('Feed');

        $feed = $this->Feed->find('all', [
            'conditions' => ['ds_hash LIKE' => $hash]
        ])->first();

        $dom = new Dom;

        /* $dom->load($feed->ds_content);

        $div = $dom->find('article');

        $html = strip_tags($div->innerHtml, '<header><div><h1><p><a><span><strong><img>'); */

        $this->set([
            'html' => $html,
            'content' => $feed->ds_content
        ]);
        //return $this->redirect($feed->ds_base_url);
    }
}
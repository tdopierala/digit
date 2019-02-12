<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class FeedTable extends Table
{

    public function initialize(array $config)
    {
        //$this->setTable('my_table');

        // Prior to 3.4.0
        $this->table('dashboard_sites');
    }

}
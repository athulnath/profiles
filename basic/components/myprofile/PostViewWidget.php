<?php

/**
 * Description of PostViewWidget
 *
 * @author athulnath
 */

namespace app\components\myprofile;

use yii\base\Widget;
use yii\helpers\Html;

class PostViewWidget extends Widget {

    public $message;
    public $header;
    

    public function init() {
        parent::init();

        if ($this->message === null) {
            
        } else {
            
        }
    }

    public function run() {

        $data = '<div class="panel panel-default">
                            <div class="panel-heading">'. $this->header.'</div>
                            <div class="panel-body">'.
                                    $this->message
                              .'<br>
                              <div class="post-footer">
                                  <ul>
                                      <li><a>Comment</a></li>
                                      <li><a>Add</a></li>
                                  </ul>
                              </div>
                            </div>
                </div>';
        return ($data);
    }

}

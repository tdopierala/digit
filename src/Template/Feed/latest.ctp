<div class="row">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-12">
                <div class="btn-toolbar pagination d-none d-md-block" role="toolbar" aria-label="Pagination toolbar">
                    <div class="btn-group mr-2" role="group" aria-label="beginning">
                        <?= $this->Html->link(html_entity_decode('&lt;&lt;'),'/feed/latest/', ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="previous">
                        <?= $this->Html->link(html_entity_decode('&lt;'),'/feed/latest/'.$pagin['prev'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="pages">
                        <?php 
                            foreach($pagin['pages'] as $page){
                                if($page==$pagin['page']) $class=' btn-selected';
                                else $class=' btn-pagin';
                                echo $this->Html->link($page,'/feed/latest/'.$page, ['class' => 'btn'.$class, 'role' => 'button']);
                            }
                        ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="next">
                        <?= $this->Html->link(html_entity_decode('&gt;'),'/feed/latest/'.$pagin['next'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="lastone">
                        <?= $this->Html->link(html_entity_decode('&gt;&gt;'),'/feed/latest/'.$pagin['amount'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach($feed as $f){ ?>
            <!-- <div class="row feedbox">
                <div class="col-sm-4 col-md-8 col-lg-12">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et consequat diam. Ut posuere tellus arcu, id faucibus lorem tempus pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse neque justo, gravida non sodales sit amet, egestas eget arcu. Cras id vehicula erat, ut sagittis lorem. Aliquam efficitur sodales nisl, nec congue est porta ac. Integer non metus quis enim pulvinar facilisis et sed nisl. Mauris justo nisi, aliquam vel justo vitae, molestie lacinia ipsum. Proin auctor fermentum accumsan. Aliquam aliquam tellus sit amet hendrerit facilisis. In auctor laoreet magna, sed elementum nisl. Sed ornare at felis ut suscipit. In id ipsum pellentesque, ornare urna eu, faucibus lorem. Nunc ac erat hendrerit, aliquam ante vel, viverra leo. </span>
                </div>
            </div> -->
            <div class="row feedbox">
                <div class="col-lg-3 ">
                    <div class="feedimg d-none d-lg-block">
                        <?= $this->Html->link(
                            $this->Html->image(
                                'http://' . $_SERVER['HTTP_HOST'] . '/php-feed-scanner/images/thumb/' . $f['Feed__ds_image_local'], 
                                [
                                    //'alt' => $f['Feed__ds_title'], 
                                    'class' => 'img-fluid',
                                    //'style' => 'background-image: url(\''. '/php-feed-scanner/images/thumb/' . $f['Feed__ds_image_local'] .'\');'
                                ]),
                            
                            "/link/" . $f['Feed__ds_hash'] . "/" . $this->Link->urlEncode($f['Feed__ds_title']),
                            [
                                'class' => 'ext_link', 
                                'target' => '_blank', 
                                'escape' => false]
                            )
                        ?>
                    </div>
                    <div class="feedimg d-lg-none">
                        <?= $this->Html->link(
                            $this->Html->image(
                                'http://' . $_SERVER['HTTP_HOST'] . '/php-feed-scanner/images/normal/' . $f['Feed__ds_image_local'], 
                                [
                                    //'alt' => $f['Feed__ds_title'], 
                                    'class' => 'img-fluid',
                                    //'style' => 'background-image: url(\''. '/php-feed-scanner/images/normal/' . $f['Feed__ds_image_local'] .'\');'
                                ]),
                            
                            "/link/" . $f['Feed__ds_hash'] . "/" . $this->Link->urlEncode($f['Feed__ds_title']),
                            [
                                'class' => 'ext_link', 
                                'target' => '_blank', 
                                'escape' => false]
                            )
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h3 class="feedtitle">
                    <?= $this->Html->link($f['Feed__ds_title'],"/link/" . $f['Feed__ds_hash'] . "/" . $this->Link->urlEncode($f['Feed__ds_title']), ['class' => '', 'target' => '_blank']) ?>
                    </h3>
                    <p>
                        <small><?php echo explode('/',$f['Feed__ds_base_url'])[2]; ?></small>
                        <small>&nbsp;&nbsp;&nbsp;&nbsp;</small>
                        <small><?= $f['Feed__ds_date'] ?></small>
                        <small>&nbsp;&nbsp;&nbsp;&nbsp;</small>
                        <small><?= $this->Html->link('podgląd',"/feed/article/" . $f['Feed__ds_hash'] . "/" . $this->Link->urlEncode($f['Feed__ds_title']), ['class' => '', 'target' => '_blank']) ?></small>
                    </p>
                    <p><?= $f['Feed__ds_description'] ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="btn-toolbar pagination" role="toolbar" aria-label="Pagination toolbar">
                    <div class="btn-group mr-2" role="group" aria-label="beginning">
                        <?= $this->Html->link(html_entity_decode('&lt;&lt;'),'/feed/latest/', ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="previous">
                        <?= $this->Html->link(html_entity_decode('&lt;'),'/feed/latest/'.$pagin['prev'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="pages">
                        <?php 
                            foreach($pagin['pages'] as $page){
                                if($page==$pagin['page']) $class=' btn-selected';
                                else $class=' btn-pagin';
                                echo $this->Html->link($page,'/feed/latest/'.$page, ['class' => 'btn'.$class, 'role' => 'button']);
                            }
                        ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="next">
                        <?= $this->Html->link(html_entity_decode('&gt;'),'/feed/latest/'.$pagin['next'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="lastone">
                        <?= $this->Html->link(html_entity_decode('&gt;&gt;'),'/feed/latest/'.$pagin['amount'], ['class' => 'btn btn-pagin', 'role' => 'button']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-lg-12">
        <pre><?php print_r($pagin); ?></pre>
    </div>
</div> -->
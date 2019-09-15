
  <div class="row ml-2">
      <div class="col-2-md-8">
      
     <div id="jssor_3" style="position:relative;margin:0;top:0px;left:0px;width:840px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo BASE_URL_LINK."image/img/"?>img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:840px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/045.jpg" />
                <div u="thumb">Slide Description 001</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/043.jpg" />
                <div u="thumb">Slide Description 002</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/046.jpg" />
                <div u="thumb">Slide Description 003</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/047.jpg" />
                <div u="thumb">Slide Description 004</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                <div u="thumb">Slide Description 005</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/044.jpg" />
                <div u="thumb">Slide Description 006</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/050.jpg" />
                <div u="thumb">Slide Description 007</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/049.jpg" />
                <div u="thumb">Slide Description 008</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/052.jpg" />
                <div u="thumb">Slide Description 009</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo BASE_URL_LINK."image/img/"?>img/051.jpg" />
                <div u="thumb">Slide Description 010</div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:840px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div u="slides">
                <div u="prototype" style="position:absolute;top:0;left:0;width:840px;height:50px;">
                    <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_3_slider_init();</script>

            <div class="row mt-3">
                <div class="col-md-6">
                     <ul class="timeline timeline-inverse">
                         <?php echo $news->NewsList(); ?>
                        <li>
                            <i class="fa fa-clock-o bg-info text-light"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>

      </div><!-- col -->
      <div class="col-md-4">
      
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="card-title"><i> Rwanda hope to win in AFCON 2021</i></h5>
            </div>
            <div class="col-md-12 ">
               
                <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-2 ">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                 
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="1 "> rwanda hope to win</a>
                    </h5>
                    <div class="text-muted">Created on 22 may </div>
                    <p class="card-text mb-1">
                         <?php 
                         $row=" 
                         Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester, occupy Thundercats banjo cliche ennui farm-to-table mlkshk Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester pour-over. Quinoa tote bag fashion axe, Godard disrupt migas Thundercats cronut polaroid Neutra tousled, meh food truck selfies";
                        if (strlen($row) > 195) {
                            echo $row = substr($row,0,195).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="1" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                        }else{
                            echo $row;
                        } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
                
             </div><!-- col -->

            <div class="col-md-12 text-center">
                <h2 class="card-title"><i> Rwanda hope to win in AFCON 2021</i></h5>
            </div>
            <div class="col-md-12">
               
                <div class="card flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                 
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="1 "> rwanda hope to win</a>
                    </h5>
                    <div class="text-muted">Created on 22 may </div>
                    <p class="card-text mb-1">
                         <?php 
                         $row=" 
                         Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester, occupy Thundercats banjo cliche ennui farm-to-table mlkshk Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester pour-over. Quinoa tote bag fashion axe, Godard disrupt migas Thundercats cronut polaroid Neutra tousled, meh food truck selfies";
                        if (strlen($row) > 195) {
                            echo $row = substr($row,0,195).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="1" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                        }else{
                            echo $row;
                        } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
            
             </div>
        </div>
        
          <div class="card mt-3">
              <div class="card-header">
                  <h5 class="card-title">Recent Articles </h5>
              </div>
              <div class="card-body">

        <ul class="timeline timeline-inverse">

            <li class="time-label">
            <span class="bg-success text-light" style="position: absolute;font-size: 11px; padding: 2px; margin-left: 9px;">22 may </span>

                <div class="timeline-item card  flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                 
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="1 "> rwanda hope to win</a>
                    </h5>
                    <div class="text-muted">Created on 22 may </div>
                    <p class="card-text mb-1">
                         <?php 
                         $row=" 
                         Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave
                                 put a
                                 bird
                                 on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester
                                 mlkshk.
                                 Ethical
                                 master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk
                                 fanny pack
                                 gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester
                                 chillwave 3 wolf
                                 moon
                                 asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas
                                 church-key
                                 tofu
                                 blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies
                                 narwhal
                                 American
                                 Apparel
                         ";
                             if (strlen($row) > 100) {
                              echo $row = substr($row,0,100).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="1" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row;
                            } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
                </li>

            <li class="time-label">
            <span class="bg-success text-light" style="position: absolute;font-size: 11px; padding: 2px; margin-left: 9px;">22 may </span>

                <div class="timeline-item card  flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                 
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="1 "> rwanda hope to win</a>
                    </h5>
                    <div class="text-muted">Created on 22 may </div>
                    <p class="card-text mb-1">
                         <?php 
                         $row=" 
                         Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave
                                 put a
                                 bird
                                 on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester
                                 mlkshk.
                                 Ethical
                                 master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk
                                 fanny pack
                                 gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester
                                 chillwave 3 wolf
                                 moon
                                 asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas
                                 church-key
                                 tofu
                                 blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies
                                 narwhal
                                 American
                                 Apparel
                         ";
                             if (strlen($row) > 100) {
                              echo $row = substr($row,0,100).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="1" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row;
                            } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
                </li>

            <li class="time-label">
            <span class="bg-success text-light" style="position: absolute;font-size: 11px; padding: 2px; margin-left: 9px;">22 may </span>

                <div class="timeline-item card  flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_LINK."image/img/"?>img/048.jpg" />
                 
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="1 "> rwanda hope to win</a>
                    </h5>
                    <div class="text-muted">Created on 22 may </div>
                    <p class="card-text mb-1">
                         <?php 
                         $row=" 
                         Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave
                                 put a
                                 bird
                                 on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester
                                 mlkshk.
                                 Ethical
                                 master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk
                                 fanny pack
                                 gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester
                                 chillwave 3 wolf
                                 moon
                                 asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas
                                 church-key
                                 tofu
                                 blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies
                                 narwhal
                                 American
                                 Apparel
                         ";
                             if (strlen($row) > 100) {
                              echo $row = substr($row,0,100).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="1" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row;
                            } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
                </li>

                <li>
                    <i class="fa fa-clock-o bg-info text-light"></i>
                </li>
            </ul>
                 
              </div>
          </div>

      </div><!-- col -->
  </div> <!-- row -->

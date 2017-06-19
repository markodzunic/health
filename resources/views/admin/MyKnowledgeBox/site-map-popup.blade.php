<style type="text/css">
.site-map-btn {
    width: 190px;
    height: 64px;
    background: #00b0f0;
    border-radius: 50px;
    border: 2px solid #fff;
    box-shadow: 2px 2px 10px #002060;    
}
.site-map-btn-left {
    float: left;
    width: 50px;
    height: 50px;
    text-align: center;
    background: #fff;
    border: 4px solid #00ff00;
    box-shadow: 1px 1px 2px #002060;
    border-radius: 50px;
    margin: 5px;
    line-height: 44px;
    font-size: 18px;
    font-weight: bold;
}
.locked .site-map-btn-left {
    border: 4px solid red;
}
.site-map-btn-right{
    float: right;
    margin: 5px;
    width: 115px;
    text-align: left;
    padding-top: 10px;
}
.site-map-btn-left,
.site-map-btn-right,
.site-map-btn {    
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    transition: all 0.3s ease;
    -ms-transform: translate(0px, 0px); /* IE 9 */
    -webkit-transform: translate(0px, 0px); /* Safari */
    transform: translate(0px, 0px);
}
.site-map-btn-right strong {
    font-size: 13px;
    line-height: 15px;
    display: block;
}
.site-map-btn-right span {
    font-size: 11px;
    line-height: 13px;
    display: block;
}
.col-1-5 {
    width: 20%;
    float: left;
    padding:5px;
}
.col-1-5 ul {
    padding-left: 15px;
    position: relative;
}
.col-1-5 ul li {
    position: relative;
}
.col-1-5 ul li .site-map-btn {
    border:0;
    background: transparent;
    box-shadow: none;
}
.col-1-5 ul:before {
    content: '';
    width: 4px;
    position: absolute;
    top: 0;
    bottom: 30px;
    left: 9px;
    background: #00b0f0
}
.col-1-5  ul li:before {
    content: '';
    width: 10px;
    height: 4px;
    position: absolute;
    left: -2px;
    top: 30px;
    background: #00b0f0;
}
a:hover .site-map-btn {
    background: #ff66ff;
}
a:hover .site-map-btn-right {
    -ms-transform: translate(-55px, 0px); /* IE 9 */
    -webkit-transform: translate(-55px, 0px); /* Safari */
    transform: translate(-55px, 0px);
}
a:hover .site-map-btn-left {
    -ms-transform: translate(125px, 0px); /* IE 9 */
    -webkit-transform: translate(125px, 0px); /* Safari */
    transform: translate(125px, 0px);
}
@media screen and (max-width: 1024px) {
    .col-1-5 {
        width: 100%;
    }
}
@media screen and (min-width: 768px) {
    #siteMap .modal-dialog {
        width: 1024px;
        margin: 30px auto;
    }
}
</style>
<!-- Modal -->
<div id="siteMap" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="small-padding no-padding-top" align="center">
		<div class="row">
		    <div class="col-md-12">
		        <h4><strong>Site Map</strong></h4>
		    </div>
		</div>
        <div class="row">
            <div class="col-1-5" style="float: none;margin: auto;">
                <a href="{{ URL::to('/home') }}">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue"><i class="fa fa-home"></i></div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">HOME PAGE</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>
            </div>
        </div>
		<div class="row" style="margin: 0;">

			<div class="col-1-5">
				<a href="#">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue">1.0</div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">ABOUT US</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">1.1</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">1.3</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">1.4</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn locked">
                                <div class="site-map-btn-left im-blue">1.5</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
			</div>

            <div class="col-1-5">
                <a href="#">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue">2.0</div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">MEMBERSHIP</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>

                <ul>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">2.1</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">2.1.1</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">2.1.2</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">2.2</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-1-5">
                <a href="#">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue">3.0</div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">NEWS</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">3.1</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">3.3</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">3.4</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn locked">
                                <div class="site-map-btn-left im-blue">3.5</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="site-map-btn locked">
                                <div class="site-map-btn-left im-blue">3.6</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-1-5">
                <a href="#">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue">4.0</div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">SEARCH</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">4.1</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">4.1.1</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">4.1.2</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">4.1.3</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-1-5">
                <a href="#">
                    <div class="site-map-btn">
                        <div class="site-map-btn-left im-blue">5.0</div>
                        <div class="site-map-btn-right">
                            <strong class="white-text">CONTACT US</strong>
                            <span>Lorem Ipsum</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <div class="site-map-btn">
                                <div class="site-map-btn-left im-blue">5.1</div>
                                <div class="site-map-btn-right">
                                    <strong class="im-blue">LOREM IPSUM</strong>
                                    <span>Lorem Ipsum</span>
                                </div>  
                            </div>            
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">5.1.1</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="site-map-btn">
                                        <div class="site-map-btn-left im-blue">5.1.2</div>
                                        <div class="site-map-btn-right">
                                            <strong class="im-blue">LOREM IPSUM</strong>
                                            <span>Lorem Ipsum</span>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
		</div>
	  </div>
    </div>

  </div>
</div>
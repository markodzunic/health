<section class="small-padding" align="center">
      <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-1-5">
                <a href="{{ URL::to('/home') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey"><i class="fa fa-home"></i></div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">HOME PAGE</strong>
                        </div>  
                    </div>            
                </a>
            </div>
            <div class="col-1-5">
                <a href="{{ URL::to('/dashboard') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey"><i class="fa fa-dashboard"></i></div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">DASHBOARD</strong>
                        </div>  
                    </div>            
                </a>
            </div>
        </div>
		<div class="row" style="margin: 0;">

			<div class="col-1-5">
				<a href="{{ URL::to('/user_account') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey">1.0</div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">ACCOUNT</strong>
                            <span>User/Practice</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="{{ URL::to('/user_account') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">1.1</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">USER ACCOUNT</strong>
                                </div>  
                            </div>            
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('/user_account') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.1.1</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Profile</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/feedback') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.1.2</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Feedback</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/users') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.1.3</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Users</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ URL::to('/practice_account') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">1.2</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">PRACTICE ACCOUNT</strong>
                                </div>  
                            </div>            
                        </a>
                         <ul>
                            <li>
                                <a href="{{ URL::to('/practice_account') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.2.1</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Practice Profile</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/billing') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.2.2</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Billing & Payment</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/practices') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">1.2.3</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Practices</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>
                    </li>                    
                </ul>
			</div>

            <div class="col-1-5">
                <a href="{{ URL::to('/my_knowledge_box') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey">2.0</div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">MY KNOWLADGE BOX</strong>
                        </div>  
                    </div>            
                </a>

                <ul>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=1') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.1</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Clinical  Management</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=2') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.2</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Infection Prevention & Control</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=3') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.3</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Practice  Operations</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=4') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.4</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Patient Management</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=5') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.5</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Privacy & Data Protection </strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=6') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.6</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Human Resources</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=7') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.7</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Finances</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=8') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.8</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Health & Safety </strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/my_knowledge_box_features?page_id=9') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">2.9</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Emergency & Disaster Recovery</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/documentation') }}">
                            <div class="site-map-btn2 locked">
                                <div class="site-map-btn2-left im-grey">2.10</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">Documentation</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-1-5">
                <a href="{{ URL::to('/add_subscription') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey">3.0</div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">SUBSCRIPTION</strong>
                            <span>Choose Plan</span>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="{{ URL::to('/plan_basic') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">3.1</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">BASIC</strong>
                                    <span>Plan</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/plan_business') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">3.2</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">BUSINESS</strong>
                                    <span>Plan</span>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/plan_professional') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">3.3</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">PREMIUM</strong>
                                    <span>Plan</span>
                                </div>  
                            </div>            
                        </a>
                    </li>                    
                </ul>
            </div>

            <div class="col-1-5">
                <a href="{{ URL::to('/plan_professional') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey">4.0</div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">MANAGE CONTENT</strong>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="{{ URL::to('/images') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">4.1</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">MEDIA</strong>
                                </div>  
                            </div>            
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('/images') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">4.1.1</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Images</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/documents') }}">
                                    <div class="site-map-btn2">
                                        <div class="site-map-btn2-left im-grey">4.1.2</div>
                                        <div class="site-map-btn2-right">
                                            <strong class="im-grey">Documents</strong>
                                        </div>  
                                    </div>            
                                </a>
                            </li>
                        </ul>                        
                    </li>
                    <li>
                        <a href="{{ URL::to('/pages') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">4.2</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">CONTENT EDITOR</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/blogs') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">4.3</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">BLOG EDITOR</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-1-5">
                <a href="{{ URL::to('/contact') }}">
                    <div class="site-map-btn2">
                        <div class="site-map-btn2-left im-grey">5.0</div>
                        <div class="site-map-btn2-right">
                            <strong class="white-text">CONTACT US</strong>
                        </div>  
                    </div>            
                </a>
                <ul>
                    <li>
                        <a href="{{ URL::to('/report_problem') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">5.1</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">REPORT A PROBLEM</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/notification') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">5.2</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">NEWS & ANNOUNCMENTS</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/messages') }}">
                            <div class="site-map-btn2">
                                <div class="site-map-btn2-left im-grey">5.3</div>
                                <div class="site-map-btn2-right">
                                    <strong class="im-grey">INBOX</strong>
                                </div>  
                            </div>            
                        </a>
                    </li>
                </ul>
            </div>
		</div>
	  </div>
</section>
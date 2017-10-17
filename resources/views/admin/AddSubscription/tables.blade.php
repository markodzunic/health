<section class="im-center small-padding ">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="pricing-table im-blue">

          <div class="pricing-table-header im-center">
            <h3>STANDARD</h3>
            <div class="pricing-table-price">
              <div class="im-big">€750</div>
              <small>Ex VAT</small>
            </div>
          </div>

          <div class="pricing-table-body im-center">
            <div class="pricing-info">iMedical (1 Year)</div>
            <div class="pricing-info">Automatic Updates</div>
            <div class="pricing-info">7 Users</div>
            <div class="pricing-info">&nbsp;</div>
            <div class="pricing-info">&nbsp;</div>
          </div>
          @if (!$status['sub'])
            <div class="pricing-table-footer im-center">
              <a class="btn im-btn lblue-btn"  href="{{ URL::to('/plan_basic') }}">Sign Up</a>
            </div>
          @endif
        </div>


      </div><!--/col-->


       <div class="col-md-4">
        <div class="pricing-table im-blue">

          <div class="pricing-table-header im-center">
            <h3>BUSINESS</h3>
            <div class="pricing-table-price">
              <div class="im-big">€1450</div>
              <small>Ex VAT</small>
            </div>
          </div>

          <div class="pricing-table-body im-center">
            <div class="pricing-info">iMedical (1 Year)</div>
            <div class="pricing-info">Automatic Updates</div>
            <div class="pricing-info">7 Users</div>
            <div class="pricing-info">1-Day Onsite Consultancy</div>
            <div class="pricing-info">(€500 Ex VAT each additional day)</div>
          </div>
          @if (!$status['sub'])
            <div class="pricing-table-footer im-center">
              <a class="btn im-btn lblue-btn"  href="{{ URL::to('/plan_business') }}">Sign Up</a>
            </div>
          @endif
        </div>

      </div><!--/col-->


       <div class="col-md-4">
        <div class="pricing-table im-blue">

          <div class="pricing-table-header im-center">
            <h3>PREMIUM</h3>
            <div class="pricing-table-price">
              <div class="im-big">€2500</div>
              <small>Ex VAT</small>
            </div>
          </div>

          <div class="pricing-table-body im-center">
            <div class="pricing-info">iMedical (1 Year)</div>
            <div class="pricing-info">Automatic Updates</div>
            <div class="pricing-info">7 Users</div>
            <div class="pricing-info">Website Development</div>
            <div class="pricing-info">(€5,000 Ex VAT including tailored website content)</div>
          </div>
          @if (!$status['sub'])
            <div class="pricing-table-footer im-center">
              <a class="btn im-btn lblue-btn"  href="{{ URL::to('/plan_professional') }}">Sign Up</a>
            </div>
          @endif
        </div>

      </div><!--/col-->
    </div><!--/row-->

     <div class="row small-padding">
      <div class="col-md-12 im-center">
        <p class="im-blue">For Business & Premium customers, the annual subscription fee for access to iMedical in each subsequent year after the first year, will be the rate specified for the Standard package. </p>
        <br>
      </div>
    </div>
    
  </div>
</section><!--/container-->

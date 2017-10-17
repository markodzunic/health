<section class="im-center small-padding">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="pricing-table im-blue pricing-single min-550 bg-white">

        <div class="pricing-table-header im-center">
          <h2>STANDARD PLAN</h2>

          <div class="pricing-table-price"><strong>750 &euro;</strong>/<small>year</small></div>
        </div>

        <div class="pricing-table-body im-center">
            <div class="pricing-info">iMedical (1 Year)</div>
            <div class="pricing-info">Automatic Updates</div>
            <div class="pricing-info">7 Users</div>
          </div>

        <div class="pricing-table-footer im-center">

        </div>

      </div>

    </div><!--/col-->
    <div class="col-md-6">
      <div class="pricing-table im-blue pricing-single pricing-table-stripe min-550 bg-white small-padding">

        <form accept-charset="UTF-8" action="/payment" class="require-validation"
          data-cc-on-file="false"
          data-stripe-publishable-key="pk_test_050zhbZAKuAiGDweQVIPtfVB"
          id="payment-form" method="post">
          {{ csrf_field() }}
          <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                  <label class='control-label'>Name on Card</label> <input
                      class='form-control' size='4' type='text'>
              </div>
          </div>
          <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                  <label class='control-label'>Card Number</label> <input
                      autocomplete='off' class='form-control card-number' size='20'
                      type='text'>
              </div>
          </div>
          <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                  <label class='control-label'>CVC</label> <input autocomplete='off'
                      class='form-control card-cvc' placeholder='ex. 311' size='4'
                      type='text'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                  <label class='control-label'>Expiration</label> <input
                      class='form-control card-expiry-month' placeholder='MM' size='2'
                      type='text'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                  <label class='control-label'> </label> <input
                      class='form-control card-expiry-year' placeholder='YYYY' size='4'
                      type='text'>
              </div>
          </div>
          <div class='form-row'>
              <div class='col-md-12'>
                  <div class='form-control total btn btn-info'>
                      Total: <span class='amount'>&euro;580</span>
                  </div>
              </div>
          </div>
          <div class='form-row'>
              <div class='col-md-12 form-group'>
                  <button class='form-control btn btn-primary submit-button'
                      type='submit' style="margin-top: 10px;">Pay »</button>
              </div>
          </div>
          <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                  <div class='alert-danger alert'>Please correct the errors and try
                      again.</div>
              </div>
          </div>
        </form>

        <a href="{{ URL::to('/assignPractice?subscription='.'basic') }}" class="btn im-btn lblue-btn">Enter Practice</a>

      </div>
    </div>
  </div><!--/row-->
</div>
</section><!--/container-->

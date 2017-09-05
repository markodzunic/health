<div id="billing-address" class="box-content">
  <div class="row">
    <div class="col-md-12">
      <h4>Billing Address</h4>
      <div class="row billing-info">
        <div class="col-md-6">
          <p><strong>First Name: </strong>{{ $billing_address->first_name ? $billing_address->first_name : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Last Name: </strong>{{ $billing_address->last_name ? $billing_address->last_name : '' }}</p>
        </div>
        <div class="col-md-12">
          <p><strong>Company Name: </strong>{{ $billing_address->company ? $billing_address->company : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Country: </strong>{{ $billing_address->country ? $billing_address->country : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Street address: </strong>{{ $billing_address->address_1 ? $billing_address->address_1 : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Street address 2: </strong>{{ $billing_address->address_2 ? $billing_address->address_2 : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Town / City: </strong>{{ $billing_address->city ? $billing_address->city : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>County: </strong>{{ $billing_address->state ? $billing_address->state : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Eircode: </strong>{{ $billing_address->zip ? $billing_address->zip : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Phone: </strong>{{ $billing_address->phone ? $billing_address->phone : '' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Email address: </strong>{{ $billing_address->email ? $billing_address->email : '' }}</p>
        </div>

      </div>
    </div>
  </div>
</div>

@extends('admin.layouts.default-admin-template')
@section('AditionalHead')
<style>
#page-wrapper,
body {
	background-color: #f9f9f9;
}
/*PRICING TABLES*/
.pricing-table {
  width: 100%;
  position: relative;
  border-top: 10px solid;
  border-left: 1px solid;
  border-right: 1px solid;
  border-bottom: 10px solid;
  overflow: hidden;
}
.pricing-table h3,
.pricing-table p {
  margin-bottom: 0;
}
.pricing-table-header {
  padding:50px 10px;
  border-bottom: 1px solid;
  background: #fff;
}
.pricing-table-header h3 {
  font-size: 30px;
}
.pricing-table-body {
  padding:70px 10px;
  background: #fff;
}
.pricing-table-footer {
  padding:40px 10px;
  border-top: 1px solid;
  background: #fff;
}
.pricing-table.im-blue,
.badge-cont.bg-blue {
  box-shadow: 6px 6px 0 rgba(0,32,96,.8);
}
.pricing-table.im-lblue,
.badge-cont.bg-lblue {
  box-shadow: 6px 6px 0 rgba(0,176,240,.8);
}
.pricing-table.im-pink,
.badge-cont.bg-pink {
  box-shadow: 6px 6px 0 rgba(255,102,255,.8);
}
.pricing-table.im-blue .pricing-table-header {
  box-shadow: 2px 2px 6px rgba(0,32,96,.7);
}
.pricing-table.im-blue .pricing-table-footer {
  box-shadow: 2px -2px 6px rgba(0,32,96,.7);
}
.pricing-table.im-lblue .pricing-table-header {
  box-shadow: 2px 2px 6px rgba(0,176,240,.7);
}
.pricing-table.im-lblue .pricing-table-footer {
  box-shadow: 2px -2px 6px rgba(0,176,240,.7);
}
.pricing-table.im-pink .pricing-table-header {
  box-shadow: 2px 2px 6px rgba(255,102,255,.7);
}
.pricing-table.im-pink .pricing-table-footer {
  box-shadow: 2px -2px 6px rgba(255,102,255,.7);
}
.pricing-table-price{
  font-size: 50px;
  line-height: 70px;
  margin-bottom: 20px;
}
.pricing-table-price small {
  font-size: 25px;
}
.pricing-table .nav-tabs>li{
  min-width: 50%;
} 
.pricing-single .pricing-table-footer {
  padding: 0;
}
.pricing-single .nav-tabs>li>a {
  padding: 20px 10px;    
  font-weight: bold;
  color: inherit;
}
.pricing-single .nav-tabs>li:first-child>a {
  border-left: 0;
}
.pricing-single .nav-tabs>li:last-child>a {
  border-right: 0;
}
.pricing-single .nav-tabs>li.active>a,
.pricing-single .nav-tabs>li.active>a:focus,
.pricing-single .nav-tabs>li.active>a:hover {
  color: #fff;
  border-radius: 0;
}
.pricing-single.im-blue .nav-tabs>li.active>a,
.pricing-single.im-blue .nav-tabs>li.active>a:focus,
.pricing-single.im-blue .nav-tabs>li.active>a:hover {
  background: rgba(0,32,96,1);
  background-color: rgba(0,32,96,1);
  border-color: rgba(0,32,96,1);
  border-bottom-color: rgba(0,32,96,1);
}
.pricing-single.im-lblue .nav-tabs>li.active>a,
.pricing-single.im-lblue .nav-tabs>li.active>a:focus,
.pricing-single.im-lblue .nav-tabs>li.active>a:hover {
  background: rgba(0,176,240,1);
  background-color: rgba(0,176,240,1);
  border-color: rgba(0,176,240,1);
  border-bottom-color: rgba(0,176,240,1);
}
.pricing-single.im-pink .nav-tabs>li.active>a,
.pricing-single.im-pink .nav-tabs>li.active>a:focus,
.pricing-single.im-pink .nav-tabs>li.active>a:hover {
  background: rgba(255,102,255,1);
  background-color: rgba(255,102,255,1);
  border-color: rgba(255,102,255,1);
  border-bottom-color: rgba(255,102,255,1);
}
.pricing-single .tab-content {
  background: #fff;
  padding: 40px 15px;
}
.badge-cont {
  width: 150px;
  height: 150px;
  margin: auto;
  padding: 30px;
  margin-bottom: 20px;
}
.badge-cont img {
  max-width: 100%;
}
#plan-navigation,
.pricing-plan-1,
.pricing-plan-2,
.pricing-plan-3 {
  display: none;
}
</style>
@stop

@section('MainContent')
@include('admin.AddSubscription.title')
@include('admin.AddSubscription.tables')
@stop



	
@section('AditionalFoot')
	
@stop
@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info">
                    <h4 class="pull-left page-title text-white">POS(Point of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#" class="text-white">Echovel</a></li>
                        <li class="text-white">{{ date("d/m/y") }}</li>
                    </ol>
                </div>
            </div><br>
            <div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12 ">
            		<div class="portfolioFilter">
            			@foreach($allCategory as $item)
            			<a href="#" data-filter="*" class="current">{{ $item->category_name }}</a>
            			@endforeach
            		</div>
            	</div>
            </div>
            <br>
            @if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
            <div class="row">
            	<div class="col-md-6 col-sm-6 col-xs-6">
            		<div class="price_card text-center">
            			<ul class="price-features" style="border: 1px solid grey;">
            				<table class="table table-striped">
            					<thead class="bg-info">
            						<tr>
            							<th class="text-white">Name</th>
            							<th class="text-white">Quantity</th>
            							<th class="text-white">Single Price</th>
            							<th class="text-white">Sub Total</th>
            							<th class="text-white">Action</th>
            						</tr>
            					</thead>
            					@php
            					$cartContent = Cart::content();
            					@endphp
            					<tbody>
            						@foreach($cartContent as $cart)
            						<tr>
            							<td>{{ $cart->name }}</td>
            							<td>
            								<form action="{{ url('/update-cart/'.$cart->rowId) }}" method="post">
	            								@csrf
	            								<input type="Number"  name="qty" style="width: 45px;" value="{{ $cart->qty }}">
	            								<button type="submit" class="btn btn-sm btn-success" style="margin-top: 0px;"><i class="fas fa-check"></i></button>
            								</form>
            							</td>
            							<td>{{ $cart->price }}</td>
            							<td>{{ $cart->price*$cart->qty }}</td>
            							<td><a href="{{ URL::to('/cart-remove/'.$cart->rowId) }}"><i class="fas fa-trash-alt text-danger"></i></a></td>
            						</tr>
            						@endforeach
            					</tbody>
            				</table>
            			</ul>
            			<div class="pricing-footer bg-primary">
            				<br>
            				<p style="font-size: 20px;">Quantity: {{ Cart::count() }}</p>
            				<p style="font-size: 20px;">Sub Total: {{ Cart::subtotal() }}</p>
            				<p style="font-size: 20px;">Vat: {{ Cart::tax() }}</p>
            				<hr>
            				<span class="name" style="font-size: 20px;">Total:<p>{{ Cart::total() }}</p></span>
            			</div><br>
            			@if ($errors->any())
            			<div class="alert alert-danger">
            				<ul>
            					@foreach ($errors->all() as $error)
            					<li>{{ $error }}</li>
            					@endforeach
            				</ul>
            			</div>
            			@endif
            			<form method="post" action="{{ url('/create-invoice') }}">
	            			@csrf
	            			<div class="panel">
	            				<h4 class="text-info">Select Customer
	            					<a href="" class="btn btn-sm btn-primary pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New Customer</a>
	            				</h4>
	            				<select class="form-control" name="customer_id">
	            					<option disabled="" selected="">Select Customer</option>
	            					@foreach($allCustomer as $item)
	            					<option value="{{ $item->id }}">{{ $item->name }}</option>
	            					@endforeach
	            				</select>
	            			</div>
	            			<button type="submit" class="btn btn-success">Create Invoice</button>
            			</form>
            		</div> <!-- end Pricing_card -->
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-6">
            		<table id="datatable" class="table table-striped table-bordered">
            			<thead>
            				<tr>
            					<th>Image</th>
            					<th>Product Name</th>
            					<th>Category</th>
            					<th>Product Code</th>
            					<th>Add to Cart</th>
            				</tr>
            			</thead>


            			<tbody>
            				@foreach($allProduct as $item)
            				<tr>
            					<form action="{{ url('/add-to-cart') }}" method="post">
	            					@csrf
	            					<input type="hidden" name="id" value="{{ $item->id }}">
	            					<input type="hidden" name="name" value="{{ $item->product_name }}">
	            					<input type="hidden" name="qty" value="1">
	            					<input type="hidden" name="price" value="{{ $item->selling_price }}">
	            					<td>
	            					    {{-- <a href="#" style="font-size: 20px;"><i class="fas fa-plus-square"></i></a> --}}
	            						<img src="{{ URL::to($item->product_image) }}" style="height: 69px;width: 69px;">
	            					</td>
	            					<td>{{ $item->product_name }}</td>
	            					<td>{{ $item->category_name }}</td>
	            					<td>{{ $item->product_code }}</td>
	            					<td>
	            						<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i></button>
	            					</td>
            					</form>
            				</tr>
            				@endforeach
            			</tbody>
            		</table>
            	</div>
            </div>

        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>

<!-- ADD NEW CUSTOMER MODAL IS HERE -->
<form action="{{ url('/insert-customer') }}" method="post" enctype="multipart/form-data">
@csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
				<h4 class="modal-title">Add a New Customer</h4> 
			</div> 
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="modal-body"> 
				<div class="row"> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-4" class="control-label">Name</label> 
							<input type="text" class="form-control" id="field-4" name="name" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-5" class="control-label">Email</label> 
							<input type="email" class="form-control" id="field-5" name="email" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-6" class="control-label">Phone</label> 
							<input type="text" class="form-control" id="field-6" name="phone" required=""> 
						</div> 
					</div>
				</div>
				<div class="row"> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-4" class="control-label">Address</label> 
							<input type="text" class="form-control" id="field-4" name="address" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-5" class="control-label">Shopname</label> 
							<input type="text" class="form-control" id="field-5" name="shopname" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-6" class="control-label">City</label> 
							<input type="text" class="form-control" id="field-6" name="city" required=""> 
						</div> 
					</div>  
				</div>
				<div class="row"> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-4" class="control-label">Account Number</label> 
							<input type="text" class="form-control" id="field-4" name="account_number" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-5" class="control-label">Account Holder</label> 
							<input type="text" class="form-control" id="field-5" name="account_holder" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-6" class="control-label">Bank Name</label> 
							<input type="text" class="form-control" id="field-6" name="bank_name" required=""> 
						</div> 
					</div> 
				</div> 
				<div class="row"> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-4" class="control-label">Bank Branch</label> 
							<input type="text" class="form-control" id="field-4" name="bank_branch" required=""> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<img id="image" src="#">
                            <label for="exampleInputPassword1">Photo</label>
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-6" class="control-label">Photo</label> 
							<input type="file" id="exampleInputPassword1" name="photo" accept="image/*" class="upload" required="" onchange="readURL(this)"> 
						</div> 
					</div> 
				</div>
			</div> 
			<div class="modal-footer"> 
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
				<button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
			</div> 
		</div> 
	</div>
</div><!-- /.modal -->
</form>
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection

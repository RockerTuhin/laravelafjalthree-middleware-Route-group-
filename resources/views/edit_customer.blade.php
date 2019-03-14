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
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
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
                        <!-- Start Widget -->
                        <div class="row">
                            <!-- Basic example -->
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Customer</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-customer/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $edit->name }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="{{ $edit->email }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="{{ $edit->phone }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{ $edit->address }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="shopname" value="{{ $edit->shopname }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="account_holder" value="{{ $edit->account_holder }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="account_number" value="{{ $edit->account_number }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="bank_name" value="{{ $edit->bank_name }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Branch</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="bank_branch" value="{{ $edit->bank_branch }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="city" value="{{ $edit->city }}" required="">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label for="exampleInputPassword1">New Photo</label>
                                                <input type="file" id="exampleInputPassword1" name="photo" accept="image/*" class="upload"  onchange="readURL(this)">
                                            </div>
                                            <div class="form-group">
                                            	<img src="{{ URL::to($edit->photo) }}" style="height: 90px;width: 90px;">
                                            	<label for="exampleInputPassword1">Old Photo</label>
                                                <input type="hidden" name="old_photo" value="{{ $edit->photo }}">
                                            </div>
                                            
                                            <button type="Update" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div> 
                        <!-- End row-->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

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
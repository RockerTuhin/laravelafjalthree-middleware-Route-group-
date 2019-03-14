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
                                    <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-employee') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Full Name" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="email" placeholder="Email" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Phone" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Address" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Experience</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="experience" placeholder="Experience" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nid No.</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="nid_no" placeholder="Nid No." required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Salary</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="salary" placeholder="Salary" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Vacation</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="vacation" placeholder="Vacation" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="city" placeholder="City" required="">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" id="exampleInputPassword1" name="photo" accept="image/*" class="upload" required="" onchange="readURL(this)">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
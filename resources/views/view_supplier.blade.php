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
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title text-white">View Suppliers</h3></div>
                                    <div class="panel-body">
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Name</label>
                                                <p>{{ $single->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <p>{{ $single->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <p>{{ $single->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <p>{{ $single->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Type</label>
                                                <p>{{ $single->type }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop</label>
                                                <p>{{ $single->shop }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <p>{{ $single->account_holder }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                <p>{{ $single->account_number }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <p>{{ $single->bank_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch Name</label>
                                                <p>{{ $single->branch_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <p>{{ $single->city }}</p>
                                            </div>
                                            <div class="form-group">
                                            	<img style="height: 80px;width: 80px;" src="{{ URL::to($single->photo) }}">
                                                <label for="exampleInputPassword1">Photo</label>
                                            </div>
                                            
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


@endsection
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
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Advanced Salary Provide</h3></div>
                                    <br>
                                    <a href="{{ route('all.advanced.salary') }}" class="btn btn-sm btn-primary pull-right">All Advanced Salary</a>
                                    <br>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-advanced-salary') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Select Employee</label>
                                                <select name="employee_id" class="form-control">
                                                    <option disabled="" selected=""></option>
                                                    @php
                                                        $employee = DB::table('employees')->get();
                                                    @endphp
                                                    @foreach($employee as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Select Month</label>
                                                <select name="month" class="form-control">
                                                    <option disabled="" selected=""></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Select Year</label>
                                                <select name="year">
                                                    <script language="JavaScript">
                                                    for (var i=2019; i <=2030; i++)
                                                    {
                                                        document.write("<option value="+i+ ">" + i + "</option>");
                                                    }
                                                    </script>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Advanced Salary</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="advanced_salary" placeholder="Advanced Salary" required="">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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

@endsection
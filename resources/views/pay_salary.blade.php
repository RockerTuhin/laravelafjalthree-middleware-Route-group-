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
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Pay Salary <span class="pull-right text-danger">{{ date("F Y") }}</span></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Advanced Paid</th>
                                                            <th>Year</th>
                                                            <th>Month</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($allEmployee as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td><img src="{{ $item->photo }}" style="height: 60px;width: 60px;"></td>
                                                            <td>{{ $item->salary }}</td>
                                                            <td></td>
                                                            @php
                                                            	$month = date("F");
                                                            	if($month === "January")
                                                            		$year = date("Y",strtotime('-1 year'));
                                                            	else
                                                            		$year = date("Y");
                                                            @endphp
                                                            <td><span class="badge badge-success">{{ $year }}</span></td>
                                                            <td><span class="badge badge-success">{{ date("F",strtotime('-1 month')) }}</span></td>
                                                            <td>
                                                                <a  class="btn btn-sm btn-primary">Pay Now</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row-->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection
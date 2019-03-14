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
                                        <h3 class="panel-title">All Suppliers</h3>
                                        <a href="{{ route('add.supplier') }}" class="btn btn-sm btn-info pull-right">Add New</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Image</th>
                                                            <th>City</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($allSupplier as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td>{{ $item->address }}</td>
                                                            <td><img src="{{ $item->photo }}" style="height: 60px;width: 60px;"></td>
                                                            <td>{{ $item->city }}</td>
                                                            <td>
                                                                <a href="{{ URL::to('/edit-supplier/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ URL::to('/delete-supplier/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                                <a href="{{ URL::to('/view-supplier/'.$item->id) }}" class="btn btn-sm btn-primary">View</a>
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
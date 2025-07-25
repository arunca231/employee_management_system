@extends('layouts.admin_layout')
@section('content')
 <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Employees</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.employ_list')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Employ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="post" action="{{route('admin.employ_store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Name" class="form-control ps-0 form-control-line" value="{{old('name')}}">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" placeholder="Email" class="form-control ps-0 form-control-line" value="{{old('email')}}">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Department </label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none border-0 ps-0 form-control-line" name="department">
                                                <option value="">Select</option>
                                                <option value="HR" {{ old('department') == 'HR' ? 'selected' : '' }}>HR</option>
                                                <option value="Sales" {{ old('department') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                                <option value="Tech" {{ old('department') == 'Tech' ? 'selected' : '' }}>Tech</option>
                                                <option value="Marketing" {{ old('department') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            </select>
                                        </div>
                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Salary</label>
                                        <div class="col-md-12">
                                            <input type="text" name="salary" placeholder="20000.00" class="form-control ps-0 form-control-line" value="{{old('salary')}}">
                                        </div>
                                        @error('salary')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Joining Date</label>
                                        <div class="col-md-12">
                                            <input type="date" name="joining_date" class="form-control ps-0 form-control-line" value="{{old('joining_date')}}">
                                        </div>
                                        @error('joining_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>

@endsection
@section('js')
@endsection

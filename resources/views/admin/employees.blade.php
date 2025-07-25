@extends('layouts.admin_layout')
@section('content')
<div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12 align-self-center">
                        <h3 class="page-title mb-0 p-0">Employees</h3>
                        <div class="d-flex align-items-center justify-content-between">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.employ_list')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Employees</li>
                                </ol>
                            </nav>
                            <a href="{{route('admin.employ_create')}}" class="btn btn-primary">Add Employ</a>
                        </div>
                    </div>

                </div>
            </div>
              <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('status'))
                    <div class="alert alert-success">
                    {{ session()->get('status') }}
                    </div>
                @endif
                @if(session()->has('Fail'))
                    <div class="alert alert-danger">
                    {{ session()->get('Fail') }}
                    </div>
                @endif
                                <h4 class="card-title">All Employees</h4>
                                <hr>
                                <div class="row">

                                        <div class="col-sm-3">
                                            <label>Department </label>
                                            <select class="form-control" name="department" id="department">
                                                <option value="">Select</option>
                                                <option value="HR" {{ old('department') == 'HR' ? 'selected' : '' }}>HR</option>
                                                <option value="Sales" {{ old('department') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                                <option value="Tech" {{ old('department') == 'Tech' ? 'selected' : '' }}>Tech</option>
                                                <option value="Marketing" {{ old('department') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                            </select>
                                            <p class="text-danger" id="input_error"></p>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Joining Date From</label>
                                            <input type="date" name="joining_date_from" id="joiningDateFrom" class="form-control ps-0 form-control-line" value="{{old('joining_date')}}">
                                        </div>

                                        <div class="col-md-3">
                                            <label>Joining Date To</label>
                                            <input type="date" name="joining_date_to" id="joiningDateTo" class="form-control ps-0 form-control-line" value="{{old('joining_date')}}">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex p-4 justify-content-between">
                                                <button onclick="filterData()" class="btn btn-primary">Filter</button>
                                                <form id="exportForm" method="GET" action="{{ route('admin.employ_export') }}">
                                                    <input type="hidden" name="export_department" id="exportDepartment">
                                                    <input type="hidden" name="export_date_from" id="exportDateFrom">
                                                    <input type="hidden" name="export_date_to" id="exportDateTo">
                                                <button onclick="exportData()" id="exportBtn" class="btn btn-primary" style="display: none;">Export</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap" id="customTable">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Department</th>
                                                <th class="border-top-0">Salary</th>
                                                <th class="border-top-0">Joining Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showdata">
                                            @if (!empty($employees))
                                                @foreach ($employees as $employ)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $employ->name }}</td>
                                                    <td>{{ $employ->email }}</td>
                                                    <td>{{ $employ->department }}</td>
                                                    <td>{{ $employ->salary }}</td>
                                                    <td>{{ $employ->joining_date }}</td>
                                                </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

@endsection
@section('js')
<script>
    function filterData(){
    event.preventDefault();
    var department=document.getElementById('department').value.trim();
    var date_from=document.getElementById('joiningDateFrom').value.trim();
    var date_to=document.getElementById('joiningDateTo').value.trim();

        if(department == "" && date_from == "" && date_to == ""){

            document.getElementById("input_error").innerHTML  = 'Please fill at least one field.';
        }else{
            $.ajax({
                    url: "{{route('admin.employ_filter')}}",
                    type: "POST",
                    data: {
                            "_token": "{{ csrf_token() }}",
                            department: department,date_from: date_from,date_to: date_to,
                        },
                        dataType: 'json',
                        success: function(res)
                            {

                                document.getElementById("input_error").innerHTML  = '';
                                if(res.status==true){
                                    if(res.data.length > 0){
                                        document.getElementById('exportDepartment').value=department;
                                        document.getElementById('exportDateFrom').value=date_from;
                                        document.getElementById('exportDateTo').value=date_to;
                                    var html='';
                                    var i=1;
                                    var data = res.data;
                                    for(var r = 0; r < data.length; r++){


                                        html +='<tr><td>'+i+'</td><td>'+data[r]['name']+'</td><td>'+data[r]['email']+'</td><td >'+data[r]['department']+'</td><td>'+data[r]['salary']+'</td><td>'+data[r]['joining_date']+'</td></tr>';
                                        i++;
                                    }
                                    $("#showdata").html(html);
                                    document.getElementById("exportBtn").style.display = "block";
                                }else{
                                    document.getElementById("exportBtn").style.display = "none";
                                    $("#showdata").html('<tr><td colspan="6" class="text-center">No data found</td></tr>');
                                }

                                }else if(res['status']==false){
                                    document.getElementById("input_error").innerHTML  = 'Something went wrong';
                                }

                            },
                            error: function(e)
                            {
                            //    loader_off();
                            }
                    });
                }
}
</script>
@endsection

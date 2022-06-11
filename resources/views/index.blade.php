@extends('layouts.template')



@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Task -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($tasks)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Completed Task --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h2 text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($tasks->where('status','Completed'))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- in pogress --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class=" h2 text-xs font-weight-bold text-warning text-uppercase mb-1">
                            In Pogress</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($tasks->where('status','In Progress'))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-timer-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<!-- Content Row -->
<div class="row">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Progress</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)


            <tr>
                <td>{{$task->id}}</td>
                <td class="text-ucfirst">{{ ucfirst($task->title) }}</td>
                <td>{{ucfirst($task->description)}}</td>
                <td>
                   @if ($task->progress >=90)
                       <div class="progress">
                        <div class="progress-bar bg-success" style="width:{{$task->progress}}%"></div>
                    </div>
                   @else
                       <div class="progress">
                        <div class="progress-bar bg-warning" style="width:{{$task->progress}}%"></div>
                    </div>
                   @endif


            </td>
                <td>@if ($task->status === 'Completed')
                    <h5><span class="badge badge-success">Completed</span></h5>

                @else
                <h5><span class="badge badge-warning">In Progress</span></h5>

                @endif</td>

                <td class="d-flex ">
                    <a href="{{ route('task.edit',$task->id) }}" class="btn btn-primary"> <i class="fas fa-edit  text-primary-300"></i> </a>
                    <form action="{{ route('task.destroy',$task->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                    <button type="submit" class=" btn btn-danger mx-2"><i class="fas fa-trash "></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection

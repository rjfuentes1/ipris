@extends('admin.master', ['activePage' => 'masterlist'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Masterlist</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Masterlist</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--content-body -->
<div class="container-fluid">
    <div class="row justify-content-center">

    @include('people.filter')
    
        <div class="col-md-12">
            <div class="table table-lg responsive">
              <table id="iptbl" class="ui celled table table-bordered table-striped" style="width:100%">
                  <thead class="text-center bg-success text-light">
                  <tr>
                    <th></th>
                    <th>ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Ethnicity</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Age</th>
                    <th scope="col">Community</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($people as $person)
                    <tr>
                      @switch($person->relhh)
                        @case(1)
                          <td class="text-center bg-info" style="width:2px"></td>
                          @break
                        @default
                          <td class="text-center" style="width:2px"></td>
                      @endswitch
                        <td class="text-center"><a class="text-success" href="{{ route('people.show', $person->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="View">{{ $person->ipId }}</a></td>
                        <td class="text-left">{{ $person->lastname .', '. $person->firstname .' '. $person->middlename .' '. $person->extension}}</td>
                        <td class="text-center">{{ \App\Ethnicity::where('id', $person->ethnicity)->first()->desc }}</td>
                        <td class="text-center">{{ $person->sex }}</td>
                        <td class="text-center">{{ $age = \Carbon\Carbon::parse($person->birthdate)->diffInYears(\Carbon\Carbon::now()) }}</td>
                        <td class="text-center">{{ \App\Community::where('id', $person->community)->first()->name }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No records found!</td>
                        </tr>
                    @endforelse
                  </tbody>
              </table>   
            </div>     

        </div>
    </div>
</div>
@endsection
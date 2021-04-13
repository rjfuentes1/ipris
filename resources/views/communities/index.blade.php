@extends('admin.master', ['activePage' => 'communities'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Communities</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Communities</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--content-body -->
<div class="container-fluid">
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="table table-lg responsive">
              <table id="iptbl" class="ui celled table table-bordered table-striped" style="width:100%">
                  <thead class="text-center bg-success text-light">
                  <tr>
                    <th>ID</th>
                    <th scope="col">Community Name</th>
                    <th scope="col">Ethnicity</th>
                    <th scope="col">Province</th>
                    <th scope="col">Leader</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($communities as $community)
                    <tr>
                        <td class="text-center"><a class="text-success" href="{{ route('communities.show', $community->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="View">{{ $community->id }}</a></td>
                        <td class="text-left">{{ $community->name}}</td>
                        <td class="text-center">{{ \App\Ethnicity::where('id', $community->ethnicity)->first()->desc }}</td>
                        <td class="text-center">{{ \DB::table('municipality')->where('muncode', $community->municipality)->first()->munname . ', ' . \DB::table('province')->where('provcode', $community->province)->first()->provname    }}</td>
                        <td class="text-center">{{ !$community->leader ? '' : \App\Person::find($community->leader)->lastname . ', ' . \App\Person::find($community->leader)->firstname .' '. \App\Person::find($community->leader)->middlename .' '. \App\Person::find($community->leader)->extension}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No records found!</td>
                        </tr>
                    @endforelse
                  </tbody>
              </table>   
            </div>     

        </div>
    </div>
</div>
@endsection
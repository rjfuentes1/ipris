@extends('admin.master', ['activePage' => 'dashboard'])

@section('content')
<div class="content-header text-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container">
  <div class="row justify-content-left">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">POPULATION IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fas fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL MALE IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->where('sex', 'MALE')->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-danger"><i class="fas fa-female"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL FEMALE IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->where('sex', 'FEMALE')->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-home"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL HOUSEHOLD IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->where('relhh', 1)->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-blind"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">ABOVE 60 YRS OLD IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->where('birthdate', '<=', \Carbon\Carbon::now()->subYears(60))->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-child"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">BELOW 18 YRS OLD IN {{ auth()->user() == '' ? '' : \DB::table('province')->where('provcode', auth()->user()->province)->first()->provname }}</span>
          <span class="info-box-number">{{ auth()->user() == '' ? '' : number_format(\App\Person::where('province', auth()->user()->province)->where('birthdate', '<=', \Carbon\Carbon::now()->subYears(18))->count()) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <div class="info-box-content">
         <table class="table table-bordered table-striped">
          <thead class="text-center bg-success text-light">
            <tr>
              <th scope="col">Community</th>
              <th scope="col">Population</th>
            </tr>
          </thead>
          <tbody>
        @if(!empty(auth()->user()))
          @forelse($communities = \DB::table('communities')->where('province', auth()->user()->province)->get() as $community)
            <tr>
              <td>{{ $community->name }}</td>
              <td class="text-center">{{ number_format(\App\Person::where('community', $community->id )->count()) }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="text-center">No communities found!</td>
            </tr>
          @endforelse
        @else
            <tr>
              <td colspan="2" class="text-center">No communities found!</td>
            </tr>
        @endif
          </tbody>
         </table>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>
@endsection
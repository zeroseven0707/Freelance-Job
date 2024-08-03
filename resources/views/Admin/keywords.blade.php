@extends('layout.app')
@section('content')
           <!--start breadcrumb-->
           <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Riset Keywords</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="/admin/dashboard"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Kata Kunci</th>
										<th>Volume</th>
										<th>CPC</th>
										<th>ADS</th>
										<th>SEO</th>
										<th>Bahasa</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($keywords as $item)            
									<tr>
										<td>{{ $item['kata_kunci'] }}</td>
										<td>{{ $item['volume'] }}</td>
										<td>{{ $item['cpc'] }}</td>
										<td>{{ $item['ads'] }}</td>
										<td>{{ $item['seo'] }}</td>
										<td>{{ $item['bahasa'] }}</td>
									</tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
@endsection  
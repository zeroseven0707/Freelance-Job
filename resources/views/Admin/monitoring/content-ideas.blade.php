@extends('layout.app')
@section('content')
           <!--start breadcrumb-->
           <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Content Ideas</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="/admin/freelancers"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                </ol>
              </nav>
            </div>
          </div>
				<div class="card mt-2">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Url</th>
										<th>Est Visit</th>
										<th>Back Link</th>
										<th>Facebook</th>
										<th>Bahasa</th>
									</tr>
								</thead>
							  <tbody>
                  @foreach ($content as $item)
                    <tr>
                        <td>{{ $item['judul'] }}</td>
                        <td>{{ $item['url'] }}</td>
                        <td>{{ $item['est_visit'] }}</td>
                        <td>{{ $item['backlink'] }}</td>
                        <td>{{ $item['facebook'] }}</td>
                        <td>{{ $item['bahasa'] }}</td>
                    </tr>
                  @endforeach
                </tbody>
							</table>
						</div>
					</div>
				</div>
             

          
@endsection  
@extends('layout.app')
@section('content')
<style>
  .r:hover{
    background-color: #f0f0f0;
    cursor: pointer;
  }
  .c:hover{
    background-color: #f0f0f0;
    cursor: pointer;
  }
</style>
           <!--start breadcrumb-->
           <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Freelancers</div>
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
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Email</th>
										<th>Riset Keywords</th>
										<th>Content Ideas</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                  @foreach ($freelancers as $key => $item)            
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $item['name'] }}</td>
										<td>{{ $item['email'] }}</td>
										<td>{{ $item['keyword_count'] }}</td>
										<td>{{ $item['content_count'] }}</td>
										<td><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item['id'] }}">View</button></td>
									</tr>
                  {{-- Modal --}}
                  <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                              <a href="{{ url('/freelance-detail'.'/'.$item['id'].'/keywords') }}">
                                <div class="card r">
                                  <div class="card-body">
                                    <h5 class="card-title">Riset Keywords</h5>
                                    <p class="card-text">total : {{ $item['keyword_count'] }}</p>
                                  </div>
                                </div>
                              </a>
                              <a href="{{ url('/freelance-detail'.'/'.$item['id'].'/content-ideas') }}">
                                <div class="card c">
                                  <div class="card-body">
                                    <h5 class="card-title">Content Ideas</h5>
                                    <p class="card-text">total : {{ $item['content_count'] }}</p>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                      </div>
                    </div>
                  </div>
                  {{-- End Modal --}}
                  @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
@endsection  
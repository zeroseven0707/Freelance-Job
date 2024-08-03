@extends('layout.app')
@section('content')
           <!--start breadcrumb-->
           <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Riset Keywords</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="/freelance/dashboard"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
              </nav>
            </div>
          </div>
.          {{-- Modal --}}
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Import</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('freelance.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="file">File</label>
                          <input type="file" class="form-control-file" name="file" id="file" placeholder=".csv" aria-describedby="fileHelpId">
                        </div>
                        <div class="form-group mt-2">
                          <label for="my-select">Pilih Bahasa</label>
                          <select id="my-select" class="form-control" name="language">
                            <option value="Indonesia">Indonesia</option>
                            <option value="English">English</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          {{-- End Modal --}}
				<div class="card mt-2">
					<div class="card-body">
            <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered w-100">
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
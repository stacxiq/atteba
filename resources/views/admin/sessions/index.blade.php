@extends('admin.layouts.layout')

@section('main-content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحلقات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    الحلقات الجماعية</span>
            </div>
        </div>
    </div>
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">قائمه الحلقات الجماعية </h4>
                    </div>
                    <br>
                    <a style="font-family: 'IBM Plex Sans Arabic' " href="{{ route('admin.sessions.create') }}"
                        class="btn btn-dark text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon mb-1" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>
                            اضافة حلقه جماعية
                        </span>

                    </a>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>القارئ</th>
                                    <th>العنوان</th>
                                    <th>المحتوى</th>
                                    <th>الرابط</th>
									<th> عمليات </th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                ?>

                                @foreach ($sessionGroups as $session)
								<tr>
                                    <td>
                                        {{ $count++ }}
                                    </td>
									<td>
										{{ $session->teacher->name  }}
									</td>
                                    <td>
                                        {{ $session->title }}
                                    </td>
                                    <td>
                                        {{ $session->content }}
                                    </td>
                                    <td>
                                     <a href="{{ $session->url }}" target="_blank">   {{ $session->url }} </a>
                                    </td>

									<td>
										{{-- <ion-icon name="trash-outline"></ion-icon> --}}
										<div class="row">
										<a href="{{ route('admin.sessions.destroy', $session->id) }}"> 	<li class="icons-list-item"><i class="icon ion-md-trash"></i></li> </a>
										<a href="{{ route('admin.sessions.edit', $session->id) }}"> 	<li class="icons-list-item"><i class="icon ion-md-build"></i></li> </a>
										</div>
									

									</td>
								</tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->


        <!--/div-->
    </div>
@endsection

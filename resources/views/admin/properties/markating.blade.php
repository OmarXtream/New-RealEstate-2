@extends('backend.layouts.app')

@section('title', 'Property requests')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2 class="text-center">قائمة طلبات التسويق</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>النوع</th>

                                    <th>المدينة</th>
                                    <th>عدد الغرف</th>
                                    <th>عدد دورات المياه</th>
                                    <th>سعر العقار</th>

                                    <th width="100px">التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($markating as $rq)
                                <tr>
                                    <td>{{$rq->id}}</td>
                                    <td>{{$rq->name}}</td>
                                    <td>{{$rq->phone}}</td>
                                    <td>{{$rq->type}}</td>

                                    <td>{{$rq->city}}</td>
                                    <td>{{$rq->rooms}}</td>
                                    <td>{{$rq->baths}}</td>

                                    <td>{{$rq->price}}</td>

                                    <td col="2">{{$rq->details}}</td>

                                </tr>
                                @empty
                                <h2>لا يوجد اي طلبات حالياً</h2>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

@endpush
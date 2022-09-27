@extends('backend.layouts.app')

@section('title', 'Testimonials')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>قائمة معلومات الطلب</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>الإسم</th>
                                    <th>رقم الهاتف</th>
                                    <th>العمر</th>
                                    <th>القطاع</th>
                                    <th>الإلتزامات الشخصية</th>
                                    <th>البنك</th>
                                    <th>الراتب</th>
                                    <th>مدعوم من سكني</th>
                                    <th width="100px">الملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($infos as $info)
                                <tr>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->phone}}</td>
                                    <td>{{$info->Age}}</td>
                                    <td>{{$info->typeText()}}</td>

                                    <td>{{$info->commitments}}</td>
                                    <td>{{$info->bank}}</td>
                                    <td>{{$info->salary}}</td>
                                    <td>{{$info->SupportText()}}</td>
                                    <td col="2">{{$info->notes}}</td>

                                </tr>
                                @endforeach
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
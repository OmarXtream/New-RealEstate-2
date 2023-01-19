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
                    <h2 class="text-center">قائمة معلومات الطلبات</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <h4>الطلبات الجديدة</h4>
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
                                    <th>أقل سعر</th>
                                    <th>أعلى سعر</th>

                                    <th>الحي الاول</th>
                                    <th>الحي الثاني</th>
                                    <th>الحي الثالث</th>
                                    <th>الحي الرابع</th>

                                    <th width="100px">التفاصيل</th>
                                    <th width="150">ملاحظات وإنهاء</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($NewRequests as $rq)
                                <tr>
                                    <td>{{$rq->id}}</td>
                                    <td>{{$rq->name}}</td>
                                    <td>{{$rq->phone}}</td>
                                    <td>{{$rq->type}}</td>

                                    <td>{{$rq->city}}</td>
                                    <td>{{$rq->rooms}}</td>
                                    <td>{{$rq->baths}}</td>

                                    <td>{{$rq->min_price}}</td>
                                    <td>{{$rq->max_price}}</td>

                                    <td>{{$rq->first_district}}</td>
                                    <td>{{$rq->Second_district}}</td>
                                    <td>{{$rq->Third_district}}</td>
                                    <td>{{$rq->Fourth_district}}</td>

                                    <td col="2">{{$rq->details}}</td>
                                    <td class="text-center">
                                            <button type="button" class="btn btn-info btn-sm waves-effect" onclick="openModel('req-{{$rq->id}}')"><i class="material-icons">info</i></button>
                                            <br>
                                            <form action="{{route('admin.PropertieRequest.markRead')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="rid" value="{{$rq->id}}">

                                                <button type="submit" class="btn btn-danger btn-sm waves-effect mt-2"><i class="material-icons">delete</i></button>                                          
                                            </form>
                                    </td>

                                </tr>

                                <div class="modal fade" id="req-{{$rq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{$rq->name}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          
                                            <div class="auto-container">
                                                <div class="row align-items-center clearfix">
                    
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <h5 class="text-center">الملاحظات الادارية</h5>
                                                <form action="{{route('admin.PropertieRequest.notes')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="rid" value="{{$rq->id}}">
                                                <textarea placeholder="الملاحظات الادارية" id="notes" name="notes" class="form-control border border-primary">{{$rq->notes}}</textarea>
                                                @if ($errors->has('notes'))
                                                <span class="text-danger">{{ $errors->first('notes') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                          <button type="submit" class="btn btn-primary">حفظ</button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @empty
                                <h2>لا يوجد اي طلبات حالياً</h2>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                <br><br><br>


                    <div class="table-responsive">
                        <h4>الطلبات المنتهية</h4>
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
                                    <th>أقل سعر</th>
                                    <th>أعلى سعر</th>

                                    <th>الحي الاول</th>
                                    <th>الحي الثاني</th>
                                    <th>الحي الثالث</th>
                                    <th>الحي الرابع</th>

                                    <th width="100px">التفاصيل</th>
                                    <th width="100px">ملاحظات ادارية</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($OldRequests as $rq)
                                <tr>
                                    <td>{{$rq->id}}</td>
                                    <td>{{$rq->name}}</td>
                                    <td>{{$rq->phone}}</td>
                                    <td>{{$rq->type}}</td>

                                    <td>{{$rq->city}}</td>
                                    <td>{{$rq->rooms}}</td>
                                    <td>{{$rq->baths}}</td>

                                    <td>{{$rq->min_price}}</td>
                                    <td>{{$rq->max_price}}</td>

                                    <td>{{$rq->first_district}}</td>
                                    <td>{{$rq->Second_district}}</td>
                                    <td>{{$rq->Third_district}}</td>
                                    <td>{{$rq->Fourth_district}}</td>

                                    <td col="2">{{$rq->details}}</td>
                                    <td><button type="button" class="btn btn-info" onclick="openModel('req-{{$rq->id}}')"><i class="material-icons">info</i></button></td>

                                </tr>

                                <div class="modal fade" id="req-{{$rq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{$rq->name}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          
                                            <div class="auto-container">
                                                <div class="row align-items-center clearfix">
                    
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <h5 class="text-center">الملاحظات الادارية</h5>
                                                <form action="{{route('admin.PropertieRequest.notes')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="rid" value="{{$rq->id}}">
                                                <textarea placeholder="الملاحظات الادارية" id="notes" name="notes" class="form-control border border-primary">{{$rq->notes}}</textarea>
                                                @if ($errors->has('notes'))
                                                <span class="text-danger">{{ $errors->first('notes') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                          <button type="submit" class="btn btn-primary">حفظ</button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
    <script>
    function openModel(id){
        $("#"+id).modal('show');
        }

    </script>
@endpush
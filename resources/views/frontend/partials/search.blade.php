        <!-- search-field-section -->
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <div class="tabs-box">
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons centred clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1">بيع</li>
                                    <li class="tab-btn" data-tab="#tab-2">إيجار</li>
                                </ul>
                            </div>
                            <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="{{ route('search')}} " method="GET" class="search-form">
                                                <input name="purpose" type="hidden" value="sale">
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>الموقع</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="city" placeholder="مدينة-منطقة" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>نوع العقار</label>
                                                            <div class="select-box">
                                                                <i class="far fa-compass"></i>
                                                                <select name="type" class="wide">
                                                                   <option value="" data-display="اختر النوع" disabled selected>اختر النوع</option>
                                                                   <option value="شقة">شقة</option>
                                                                   <option value="بيت">بيت</option>
                                                                   <option value="ملحق">ملحق</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>اعلى سعر مطلوب</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-money"></i>
                                                                <input type="search" name="maxprice" placeholder="أعلى سعر" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>غرفة نوم</label>
                                                            <div class="select-box">
                                                                <select name="bedroom" class="wide">
                                                                   <option value="" disabled selected>عدد الغرف</option>
                                                                   @if(isset($bedroomdistinct))
                                                                        @foreach($bedroomdistinct as $bedroom)
                                                                            <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="search-btn">
                                                    <button type="submit"><i class="fas fa-search"></i>بحث</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-2">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="{{ route('search')}} " method="GET" class="search-form">
                                                <input name="purpose" type="hidden" value="rent">
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>الموقع</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="city" placeholder="مدينة-منطقة" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>نوع العقار</label>
                                                            <div class="select-box">
                                                                <i class="far fa-compass"></i>
                                                                <select name="type" class="wide">
                                                                   <option value="" data-display="اختر النوع" disabled selected>اختر النوع</option>
                                                                   <option value="apartment">شقة</option>
                                                                   <option value="house">بيت</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>اعلى سعر مطلوب</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-money"></i>
                                                                <input type="search" name="maxprice" placeholder="أعلى سعر" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>غرفة نوم</label>
                                                            <div class="select-box">
                                                                <select name="bedroom" class="wide">
                                                                   <option value="" disabled selected>عدد الغرف</option>
                                                                   @if(isset($bedroomdistinct))
                                                                        @foreach($bedroomdistinct as $bedroom)
                                                                            <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="search-btn">
                                                    <button type="submit"><i class="fas fa-search"></i>بحث</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- search-field-section end -->

    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="header">لوحة التحكم</li>
                
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="material-icons">person</i>
                        <span>المستخدمين</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/InfoForm') ? 'active' : '' }}">
                    <a href="{{ route('admin.InfoForm') }}">
                        <i class="material-icons">spa</i>
                        <span>طلبات التمويل</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">
                        <i class="material-icons">burst_mode</i>
                        <span>خلفية الموقع</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/properties*') ? 'active' : '' }}">
                    <a href="{{ route('admin.properties.index') }}">
                        <i class="material-icons">home</i>
                        <span>العقارات</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/PRequests*') ? 'active' : '' }}">
                    <a href="{{ route('admin.PropertieRequest') }}">
                        <i class="material-icons">business</i>
                        <span>طلبات العقار</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/PMarketing*') ? 'active' : '' }}">
                    <a href="{{ route('admin.PropertiesMarkating') }}">
                        <i class="material-icons">share</i>
                        <span>طلبات تسويق العقار</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/excel*') ? 'active' : '' }}">
                    <a href="{{ route('admin.import.excel') }}">
                        <i class="material-icons">upload</i>
                        <span>رفع بيانات العقار</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
                    <a href="{{ route('admin.features.index') }}">
                        <i class="material-icons">star</i>
                        <span>خصائص عقارية</span>
                    </a>
                </li>

                {{-- <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}">
                        <i class="material-icons">wb_sunny</i>
                        <span>الخدمات</span>
                    </a>
                </li> --}}

                <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i class="material-icons">view_carousel</i>
                        <span>الشهادات</span>
                    </a>
                </li>

                <li class="header">المدونة</li>
                <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="material-icons">category</i>
                        <span>الانواع</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index') }}">
                        <i class="material-icons">label</i>
                        <span>المواضيع</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>المنشورات</span>
                    </a>
                </li>

                <li class="header"> </li>
                {{-- <li class="{{ Request::is('admin/galleries*') ? 'active' : '' }}">
                    <a href="{{ route('admin.album') }}">
                        <i class="material-icons">view_list</i>
                        <span>المعرض</span>
                    </a>
                </li> --}}
 
                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>الاعدادات</span>
                    </a>
                    <ul class="ml-menu">
                        {{-- <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}">
                                <span>الاعدادات</span>
                            </a>
                        </li> --}}
                        <li class="{{ Request::is('admin/changepassword') ? 'active' : '' }}">
                            <a href="{{ route('admin.changepassword') }}">
                                <span>تغيير كلمة المرور</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}">
                                <span>الملف الشخصي</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                            <a href="{{ route('admin.message') }}">
                                <span>الرسائل</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

            </ul>
        </div>
        <!-- #Menu -->
        
    </aside>
<?php

// FRONT-END ROUTES
Route::get('/', 'FrontpageController@index')->name('home');

Route::get('policy', function(){
    return view('pages.policy');
})->name('policy');

Route::get('/slider', 'FrontpageController@slider')->name('slider.index');

Route::get('/InfoForm', 'InfoFormController@index')->name('InfoForm');
Route::post('/InfoForm', 'InfoFormController@Create')->name('InfoForm.create');

Route::get('/PRequests', 'PropertiesRequestsController@index')->name('PropertieRequest');
Route::post('/PRequests', 'PropertiesRequestsController@Create')->name('PropertieRequest.create');


Route::get('/PMarketing', 'PropertiesMarkatingController@index')->name('PropertiesMarkating');
Route::post('/PMarketing', 'PropertiesMarkatingController@Create')->name('PropertiesMarkating.create');


Route::get('/fav/{pid}', 'FavoriteController@Create')->name('favorite.create');
Route::get('/fav/del/{fid}', 'FavoriteController@Delete')->name('favorite.delete');

Route::get('/search', 'FrontpageController@search')->name('search');

Route::get('/property', 'PagesController@properties')->name('property');
Route::get('/property/{id}', 'PagesController@propertieshow')->name('property.show');
Route::post('/property/message', 'PagesController@messageAgent')->name('property.message');
Route::post('/property/comment/{id}', 'PagesController@propertyComments')->name('property.comment');
Route::post('/property/rating', 'PagesController@propertyRating')->name('property.rating');
Route::get('/property/city/{cityslug}', 'PagesController@propertyCities')->name('property.city');
Route::post('/property/comment', 'PagesController@RemoveComment')->name('property.RemoveComment');

Route::get('/agents', 'PagesController@agents')->name('agents');
Route::get('/agents/{id}', 'PagesController@agentshow')->name('agents.show');

Route::get('/gallery', 'PagesController@gallery')->name('gallery');

Route::get('/blog', 'PagesController@blog')->name('blog');
Route::get('/blog/{id}', 'PagesController@blogshow')->name('blog.show');
Route::post('/blog/comment/{id}', 'PagesController@blogComments')->name('blog.comment');

Route::get('/blog/categories/{slug}', 'PagesController@blogCategories')->name('blog.categories');
Route::get('/blog/tags/{slug}', 'PagesController@blogTags')->name('blog.tags');
Route::get('/blog/author/{username}', 'PagesController@blogAuthor')->name('blog.author');

Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact', 'PagesController@messageContact')->name('contact.message');


Route::get('/thanks', function(){
    return view('pages/thanks'); 
})->name('thanks');


Auth::routes();

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'], function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('tags','TagController');
    Route::resource('categories','CategoryController');
    Route::resource('posts','PostController');
    Route::post('postsIMG', 'PostController@upload')->name('posts.upload.image');
    
    Route::resource('features','FeatureController');
    Route::resource('properties','PropertyController');
    Route::post('properties/gallery/delete','PropertyController@galleryImageDelete')->name('gallery-delete');

    Route::resource('sliders','SliderController');
    Route::resource('services','ServiceController');
    Route::resource('testimonials','TestimonialController');

    Route::get('galleries/album','GalleryController@album')->name('album');
    Route::post('galleries/album/store','GalleryController@albumStore')->name('album.store');
    Route::get('galleries/{id}/gallery','GalleryController@albumGallery')->name('album.gallery');
    Route::post('galleries','GalleryController@Gallerystore')->name('galleries.store');

    Route::get('settings', 'DashboardController@settings')->name('settings');
    Route::post('settings', 'DashboardController@settingStore')->name('settings.store');

    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');

    Route::get('message','DashboardController@message')->name('message');
    Route::get('message/read/{id}','DashboardController@messageRead')->name('message.read');
    Route::get('message/replay/{id}','DashboardController@messageReplay')->name('message.replay');
    Route::post('message/replay','DashboardController@messageSend')->name('message.send');
    Route::post('message/readunread','DashboardController@messageReadUnread')->name('message.readunread');
    Route::delete('message/delete/{id}','DashboardController@messageDelete')->name('messages.destroy');
    Route::post('message/mail', 'DashboardController@contactMail')->name('message.mail');

    Route::get('changepassword','DashboardController@changePassword')->name('changepassword');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');


    Route::get('InfoForm','InfoFormController@index')->name('InfoForm');

    Route::get('favorites/{pid}','PropertyController@favorites')->name('favorites');

    Route::get('/PRequests', 'PropertyController@Requests')->name('PropertieRequest');
    Route::post('/PRequests', 'PropertyController@adminNotes')->name('PropertieRequest.notes');

    Route::get('/PMarketing', 'PropertyController@Marakating')->name('PropertiesMarkating');
    
    Route::get('userCreate','DashboardController@userCreate')->name('userCreate');
    Route::post('userCreate','DashboardController@createUser')->name('userCreate.send');

    Route::get('/excel','ExcelController@index')->name('import.excel');
    Route::post('/excel','ExcelController@uploadContent')->name('import.excel.upload');


});

Route::group(['prefix'=>'agent','namespace'=>'Agent','middleware'=>['auth','agent'],'as'=>'agent.'], function(){

    Route::resource('properties','PropertyController');
    Route::post('properties/gallery/delete','PropertyController@galleryImageDelete')->name('gallery-delete');

});


<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/api', [
    'as' => 'api', 'uses' => 'PageController@api'
    ]);

    Route::group(['prefix' => 'api'], function() {
        Route::get('github', [
            'uses' => 'GithubController@getPage',
            'as'   => 'api.github',
            'middleware' => ['auth']
        ]);

        Route::get('twitter', [
            'uses' => 'TwitterController@getPage',
            'as'   => 'api.twitter',
            'middleware' => ['auth']
        ]);

        Route::get('clockwork', [
            'uses' => 'ClockworkController@getPage',
            'as'   => 'api.clockwork'
        ]);

        Route::post('clockwork', [
            'uses' => 'ClockworkController@sendTextMessage'
        ]);

        Route::get('aviary', [
            'uses' => 'AviaryController@getPage',
            'as'   => 'api.aviary'
        ]);

        Route::get('facebook', [
            'uses' => 'FacebookController@getPage',
            'as'   => 'api.facebook',
            'middleware' => ['auth']
        ]);

        Route::get('linkedin', [
            'uses' => 'LinkedInController@getPage',
            'as'   => 'api.linkedin',
            'middleware' => ['auth']
        ]);


        Route::get('instagram', [
            'uses' => 'InstagramController@getPage',
            'as'   => 'api.instagram',
            'middleware' => ['auth']
        ]);

    });

    Route::post('/slack/message', [
        'uses' => 'SlackController@sendMessageToTeam',
        'as'   => 'slack.message'
    ]);

    Route::post('/tweet/new', [
        'uses' => 'TwitterController@sendTweet',
        'as'   => 'tweet.new',
        'middleware' => ['auth']
    ]);

    Route::get('/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as'   => 'auth.login',
        'middleware' => ['guest']
    ]);

    Route::post('/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'middleware' => ['guest']
    ]);

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    // Social Authentication
    Route::get('/auth/{provider}', 'OauthController@authenticate');

    Route::get('/account', [
        'uses' => 'AccountController@getAccountPage',
        'as'   => 'account.dashboard',
        'middleware' => ['auth']
    ]);

    Route::post('/account/profile', [
        'uses' => 'AccountController@updateProfile',
        'as'   => 'account.profile',
        'middleware' => ['auth']
    ]);

    Route::post('/account/photo', [
        'uses' => 'AccountController@updateAvatar',
        'as'   => 'account.avatar',
        'middleware' => ['auth']
    ]);

    Route::post('/account/password', [
        'uses' => 'AccountController@changePassword',
        'as'   => 'account.password',
        'middleware' => ['auth']
    ]);

    Route::post('/account/delete/now', [
        'uses' => 'AccountController@deleteAccount',
        'as'   => 'account.delete.now',
        'middleware' => ['auth']
    ]);


    Route::get('/account/confirm/delete', [
        'uses' => 'AccountController@redirectToConfirmDeletePage',
        'as'   => 'account.confirm.delete',
        'middleware' => ['auth']
    ]);

    Route::get('/account/delete/later', [
        'uses' => 'AccountController@dontDeleteAccount',
        'as'   => 'account.dont.delete',
        'middleware' => ['auth']
    ]);

    Route::get('/signup', [
        'uses' => 'Auth\AuthController@getRegister',
        'as'   => 'auth.register',
        'middleware' => ['guest']
    ]);

    Route::get('logout', [
        'uses' => 'Auth\AuthController@logout',
        'as' => 'logout',
    ]);

    Route::post('/signup', [
        'uses' => 'Auth\AuthController@postRegister',
        'middleware' => ['guest']
    ]);

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::post('/contact', [
        'uses' => 'ContactController@sendMessage',
        'as'   => 'contact'
    ]);

    //Touch&Lock application routes.
    Route::get('/home', [
        'as' => 'home.main',
        'uses' => 'Main\HomeController@getPage',
        'middleware' => ['auth']
    ]);

    //Android login.
    Route::post('/android/login',[
        'as' => 'android.login',
        'uses' => 'Android\AndroidLoginController@login'
    ]);

    //Android register.
    Route::post('/android/register',[
        'as' => 'android.register',
        'uses' => 'Android\AndroidRegisterController@register'
    ]);

    Route::get('/account/addproperty',[
        'as' => 'account.addproperty',
        'uses' => 'Property\PropertyController@addPage',
        'middleware' => ['auth']
    ]);

    //adding new property
    Route::post('/account/addproperty',[
        'as' => 'account.add',
        'uses' => 'Property\PropertyController@add',
        'middleware' => ['auth']
    ]);

    Route::post('/account/uploadproperty', [
        'as' => 'property.upload',
        'uses' => 'Property\PhotoUpload@post_upload',
        'middleware' => ['auth']
    ]);

    Route::post('/account/uploadproperty/delete/{publicId}', [
        'as' => 'property.upload.delete',
        'uses' => 'Property\PhotoUpload@delete',
        'middleware' => ['auth']
    ]);

    Route::get('/details/{propId}', [
        'as' => 'property.details',
        'uses' => 'Property\PropertyController@details',
        'middleware' => ['auth']
    ]);

    Route::get('/template', function (){
        return view('template');
    });

    //getting all properties.
    Route::get('/properties', [
        'as' => 'properties',
        'uses' => 'Property\PropertyController@all'
    ]);

    Route::get('/', function (){
        return redirect('/properties?page=1');
    });

    Route::get('/reserve/{propId}', [
        'as' => 'property.reserve_page',
        'uses' => 'Property\ReservationController@formPage',
        'middleware' => ['auth']
    ]);

    Route::post('/reserve/{propId}', [
        'as' => 'property.reserve',
        'uses' => 'Property\ReservationController@reserve',
        'middleware' => ['auth']
    ]);

    Route::post('/search', [
        'as' => 'property.autocomplete',
        'uses' => 'Property\PropertySearch@search'
        //'middleware' => ['auth']
    ]);

    Route::get('/search/specific', [
        'as' => 'property.search.specific',
        'uses' => 'Property\PropertyController@searchSpecific',
        //'middleware' => ['auth']
    ]);

    Route::get('/account/reservations', [
        'as' => 'account.reservations',
        'uses' => 'Property\ReservationController@reservations',
        'middleware' => ['auth']
    ]);

    Route::post('/android/reservations', [
        'as' => 'account.reservations.mobile',
        'uses' => 'Property\ReservationMobileController@reservationsMobile'
    ]);

    Route::get('/account/reservations/delete/', [
        'as' => 'account.reservations.delete',
        'uses' => 'Property\ReservationController@delete',
        'middleware' => ['auth']
    ]);

    //get all properties related to the account
    Route::get('/account/properties', [
        'as' => 'account.properties',
        'uses' => 'Property\PropertyController@account_property',
        'middleware' => ['auth']
    ]);

    //delete property
    Route::get('/account/properties/delete', [
        'as' => 'account.properties.delete',
        'uses' => 'Property\PropertyController@delete',
        'middleware' => ['auth']
    ]);

    //get guests
    Route::get('/account/guests', [
        'as' => 'account.guests',
        'uses' => 'Property\PropertyController@guests',
        'middleware' => ['auth']
    ]);

    //key control
    Route::post('/raspberry/keycontrol', [
        'as' => 'raspberry.keycontrol',
        'uses' => 'Raspberry\RaspberryKeyControl@keyControl',
        //'middleware' => ['auth']
    ]);

});

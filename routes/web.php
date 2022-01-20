<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParaController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\RequestResponseController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\RensouController;
use App\Http\Controllers\QueryController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoopController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CompornentController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RestappController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//{}でパラメータの設定ができる。これは必須パラメータのため必ず何かしらの値を渡さないといけない。
Route::get('para/{msg}', function ($msg) {

    // para.blade.phpのviewを返すようにし、値を渡している。
    return view('para', compact('msg'));
});

//こっちは任意パラメータ、何も渡されてない時用に、デフォルトで「"何も渡ってない"」をセット
Route::get('anyPara/{msg?}', function ($msg = "何も渡ってない") {

    //anyPara.blade.phpのviewを返すようにし、値を渡している。
    return view('anyPara', compact('msg'));
});

//こっちは任意パラメータを２つセットし、ParaControllerのindexメソッドに渡している。
//laravel8ではこの書き方だが、それ以前のバージョンコントローラの指定が「'ParaController@index'」で指定できる。
Route::get('paraCon/{msg?}/{num?}', [ParaController::class, 'index']);


//下記はシングルコントローラーのルートの記載。「__invoke()」メソッドしか持っていないコントローラーなのでメソッド名の記述は不要。
Route::get('single', SingleController::class);


//下記はリクエストとレスポンスを確認するルーティング
Route::get('requestResponse', [RequestResponseController::class, 'index']);


// 下記はハローコントローラを使用して、「hello」ディレクトリ配下の「index.blade」を表示するルーテイング
// middleware('auth')でログインしてるユーザーしか見れないようにしている
Route::get('hello', [HelloController::class, 'index'])->middleware('auth');

// 下記は連想配列でviewに値を渡している、「RensouController」のルーティング。任意パラメータを渡している。
Route::get('rensou/{name?}', [RensouController::class, 'rensou']);


// 下記はクエリー文字列を利用している、「QueryController」のルーティング。パラメータとは少し受け取り方が異なる。詳細はコントローラーを見て
Route::get('query/{name?}', [QueryController::class, 'index']);


// フォーム画面を表示するルーティング
Route::get('/form', [FormController::class, 'index']);

// フォームを行うルーティング。methodを「POST」で行うため、Route::postになっている。
Route::post('/form/post', [FormController::class, 'post']);

// ループ処理のページを表示するルーティング
Route::get('/loop', [LoopController::class, 'index']);

// セクションのページを表示するルーティング
Route::get('/section', [SectionController::class, 'index']);

// コンポーネントのページを表示するルーティング
Route::get('/component', [CompornentController::class, 'index']);
Route::get('/each', [CompornentController::class, 'each']);

Route::get('/validateForm', [FormController::class, 'indexValidate']);
Route::post('/validatePost', [FormController::class, 'validatePost']);

Route::get('/cookieIndex', [CookieController::class, 'index']);
Route::post('/cookiePost', [CookieController::class, 'post']);


Route::get('/student', [DbController::class, 'index']);
Route::get('/student/add', [DbController::class, 'add']);
Route::post('/student/create', [DbController::class, 'create']);
Route::get('/student/edit', [DbController::class, 'edit']);
Route::post('/student/update', [DbController::class, 'update']);
Route::get('/student/delete', [DbController::class, 'delete']);
Route::post('/student/remove', [DbController::class, 'remove']);
Route::get('/student/show', [DbController::class, 'show']);

Route::get('/persons', [PersonController::class, 'index']);
Route::get('/person/find', [PersonController::class, 'find']);
Route::post('/person/find', [PersonController::class, 'search']);

Route::get('/person/add', [PersonController::class, 'add']);
Route::post('/person/add', [PersonController::class, 'create']);
Route::get('/person/edit', [PersonController::class, 'edit']);
Route::post('/person/edit', [PersonController::class, 'update']);
Route::get('/person/delete', [PersonController::class, 'delete']);
Route::post('/person/delete', [PersonController::class, 'remove']);

Route::get('/board', [BoardController::class, 'index']);
Route::get('/board/add', [BoardController::class, 'add']);
Route::post('/board/add', [BoardController::class, 'create']);


Route::resource('rest', RestappController::class);

Route::get('/session', [HelloController::class, 'ses_get']);
Route::post('/session', [HelloController::class, 'ses_put']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

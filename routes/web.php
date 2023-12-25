<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    //return view('welcome');
    //fetching  all users
    //$users = DB::select('select * from users where email=?', ["samuelmanoah61@gmail.com"]);
  //  $users = DB::table('users') ->get();
   // $users = DB::table('users') ->first();
    //create new user
    /*$user = DB::insert('insert into users(name, email, password) values(?,?,?)', [
        "sanchez",
        "sanchez01@gmail.com",
        "password"


    ]);
    $user = User::create([
        'name' => 'manoah',
        'email' => 'manoahs02@gmail.com',
        'password' => 'manoah'
    ]);
$user= User::create([
    'name' => 'osengo',
    'email' => 'osengo129@gmail.com',
    'password'=> bcrypt('osengo'),
]);
    $user =DB::table('users') ->insert([
        'name' => 'sam',
        'email' => 'sammuel010@gmail.com',
        'password' => bcrypt('password')
    ]);*/

    //update user
    //$user = DB::update("update users set email=? where id=?", [
      //  'manoah61@gmail.com',
        //3,
    //]);

    /*$user= DB::table('users')->where('id', 10) -> update([
        'email' => 'samuel012@gmail.com'

    ]);*/

    //delete user
//    $user = DB::delete("delete from users where id=2");

/*$user =DB::table('users')-> where('id',10) ->delete();*/
   // dd($users);
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

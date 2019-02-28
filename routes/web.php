<?php

use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
// |
// */

 Route::get('/', function () {
          return view('welcome');
 });

//  Route::get('/about', function () {
//      return 'Hi about pages';
//  });

//  Route::get('/contact', function () {
//      return 'Hi Iam contact pages';
//  });

//  Route::get('/posts/{id}/{name}', function ($id, $name) {
//      return 'This is the posts number '.$id.' '.$name;
//  });

//  Route::get('admin/posts/example', array('as'=>'admin.home' , function(){

//    $url = route('admin.home');
//    return "This url is ". $url;

//  }));

// // Route::get('/post/{id}', 'PostsController@index');
// Route::resource('/posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');
 
// Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');


//////////////// --------------------DATABASE-----RAW SQL Queries----------------------------------------------------////////////////////////////


//  Route::get('/insert', function(){

//   DB::insert('insert into posts(title,content) values(?,?)', ['Laravel is owesome with Edwin', 'Laravel is the best thing that has happened to PHP,PERIOD']);

//  });

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id = ?', [1]);

//     return var_dump($results);
//     // foreach($results as $posts){

//     //     return $posts-> title;  
//     // }

// });

// Route::get('/update', function(){

// $updated = DB::update('update posts set title = "update title" where id = ?', [1]);

// return $updated;
// });

// Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id = ?', [1]);
//     return $deleted;
// });

/////////////////////--------------ELOQUENT ORM --------------------------------//////////////////////

//  Route::get('/read', function(){

//        $posts = Post::all();

//        foreach($posts as $post){

//         return $post->title;

//        }
// });

// Route::get('/find', function(){

//     $post = Post::find(2);

//     return $post->content;

// });
// Route::get('/findwhere', function(){


// $posts = Post::where('id',3)->orderBy('id','desc')->take(1)->get();

// return $posts;

// // });
// Route::get('/findmore', function(){

// // $posts = Post::findOrFail(2);

// // return $posts;

// $posts = Post::where('users_count', '<', 50)->firstOrFail();

// });

//  Route::get('/besicinsert', function(){

//      $post = new Post;

//      $post->title = 'New Eloquent title insert';
//      $post->content = 'Wow eloquent is really cool,look at this content';
//      $post->save();
    
//  });

// Route::get('/besicinsert2', function(){

//        $post = Post::find(2);
    
//        $post->title = 'New Eloquent title insert no. 2';
//          $post->content = 'Wow eloquent is really cool,look at this content no.2';
//          $post->save();
        
//      });

//  Route::get('/create', function (){

//  Post::create(['title'=>'the create method', 'content'=>'Wow I\'am learning alot with Edwin diaz']);


//  });

// Route::get('/update', function (){

// Post::where('id', 2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love my instructor Edwin']);

// });
// Route::get('/delete', function(){

// $post = Post::find(2);

//  $post->delete();

// });
// Route::get('/delete2', function(){

//     Post::destroy([4,5]);

//     // Post::where('is_admin',0)->delete();

// });

//  Route::get('/softdelete', function(){

//   Post::find(6)->delete();

//    });
// Route::get('/readsoftdelete', function(){

// $post = Post::find(6);
// return $post;

// $post = Post::withTrashed()->where('id',6)->get();
// return $post;
// $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//  return $post;

// });
// Route::get('/restore', function(){

// Post::withTrashed()->where('is_admin',0)->restore();

// });
// Route::get('/forcedelete', function(){

//     Post::withTrashed()->where('is_admin',0)->forceDelete();

// });
// -----------------------------------------------------------------------------------------------------------------------------------------------
///|//////////////////--------------ELOQUENT  RELATIONSHIP--------------------------------//////////////////////                                 |
// -----------------------------------------------------------------------------------------------------------------------------------------------
// // eloquent relationship one to one by using hasOne ////////


// Route::get('/user/{id}/post', function($id){

//    return User::find($id)->post;

// });

// // eloquent relationship----- INVERSE one to one by using belongsTo ////////

// Route::get('/post/{id}/user', function($id){

// return Post::find($id)->user;


// });

// / // eloquent relationship----- one to Many by using hasMany ////////

// Route::get('/posts', function(){

//     $user = User::find(1);
//     foreach($user->posts as $post){

//         return $post->title . "<br>";
//     }
// });
// / // eloquent relationship----- Many to Many by using belongTo("Pivot Table") ////////


// Route::get('/user/{id}/role', function($id){

//      $user = User::find($id)->roles()->orderBy('id','desc')->get();
//      return $user;

//     //  foreach($user->roles as $role){

//     //    return $role->name;
//     //  }
// });

///////////////Accessing the intermediate table/Pivot////////////////////////

Route::get('user/pivot', function(){
    
    $user = User::find(1);

    foreach($user->roles as $role){

        return $role->pivot->created_at;
    }

});
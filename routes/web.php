<?php
use App\Posts;
use App\User;
use App\Artical;
use App\Role;
use Illuminate\Support\Facades\Crypt;
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
    return view('welcome');//default
});

// Route::get('/', function () {
//     return view('home');//without controller
// });

//Route::get('/home/{id}',function($id){
//    return "RIG this is my home page ".$id;
//});
//Route::get('/home/{name}/{title}',function($name,$title){
//    return "<h1>My Class name is ".$name." and title is ".$title."</h1>";
//});
//Route::get('/home/class/example/test/content1',array('as'=>'home/content',function(){
//    $url=route('home/content');
//        return $url;
//}));

//without parameter into controller function
Route::get('/create','Homecontroller@create');

//with parameter parse into controller function
Route::get('/home/{name}/{age}','Homecontroller@myfunction');

Route::resource('/home','Homecontroller');

//with controller by return view
Route::get('/home1','Postcontroller@index');

//direct call to controller from <a> tag
Route::get('/contact','Postcontroller@contact');

//with multiple action request
//with {{route('contact')}} function to call controller from <a> tag
//use array('as'=>'','uses'=>'')
//Route::get('/home1/address/ygn/contact',array('as'=>'contact','uses'=>'Postcontroller@contact'));

//parse value by url to controller myfunction()
//Route::get('/home1/{title}','Postcontroller@myfunction');

//parse value by url to controller myfunction() with one or more value
Route::get('/home1/{title}/{country}','Postcontroller@myfunction');

//call controller show() for display array value to view
Route::get('/show','Postcontroller@show');

//to inert data in the table with raw sql
Route::get('/insert',function (){
//   DB::insert('insert into class(title,price,content) values (?,?,?)',['PHP',200000,'Dynamic']);
    DB::insert('insert into class(title,price,content) values (?,?,?)',['J2SE',200000,'Window Project']);
});

//select data in table with raw sql
Route::get('/select/{id}',function ($id){
    $output="";
    $sql=DB::select('select * from class where id=?',[$id]);
    foreach ($sql as $s){
       $output.= "Class Name is ".$s->title."<br/>Price is ".$s->price."<br/>Content is ".$s->content."<br/>";
    }
    return $output;
});

//update data in table with raw sql
Route::get('/update',function (){
    DB::update('update class set content=? where id=?',['Dynamic Web Application',1]);
});

//delete data in table with raw sql
Route::get('/delete',function (){
    DB::delete('delete from class where id=?',[2]);
});

//insert data using model
Route::get('/create',function (){
//    Posts::create(['title'=>'Post Test','content'=>'Content 1']);
    Posts::create(['title'=>'Post Test 2','content'=>'Content 2']);
});

//select data using model
Route::get('/getall',function (){
    $output="";
    $post=Posts::all();
    foreach ($post as $s){
        $output.= "Title is ".$s->title."<br/>Content is ".$s->content."<br/>";
    }
    return $output;
});

//update data using model
Route::get('/edit',function (){
    Posts::where('id',1)->where('title','PHP Laravel')->update(['title'=>'Laravel Framework','content'=>'Developed by RIG']);
    //Posts::where('id',1)->update(['title'=>'PHP Laravel','content'=>'Developed by RIG']);
});

//delete data using model
Route::get('/remove',function (){
//    $post=Posts::find(2);
//    $post->delete();

    Posts::destroy(2);
});

//insert data using one to one eloquent
Route::get('/insert/user',function (){
    //$user=new \App\User();
//    $user=new User();
//    $user['name']='Mg Mg';
//    $user['email']='mgmg@gmail.com';
//    $user['password']=Hash::make('123');
//    $user->save();
    //or
    $password=Hash::make('456');
    User::create(['name'=>'Ma Ma','email'=>'mama@gmail.com','password'=>$password]);
});

Route::get('/user/showall',function (){
    $user=User::all();
    foreach ($user as $u){
        echo $u->id."<br/>";
        echo $u->name."<br/>";
        echo $u->email."<br/>";
        //$decrypted = Crypt::decrypt($u->password);
        //$decrypted = Crypt::decryptString($u->password);
        echo $u->password."<br/><br/>";
    }
});

//insert data in artical table
Route::get('/artical/insert',function (){
    //Artical::create(['user_id'=>1,'title'=>'PHP','content'=>'Advanced PHP.']);
    //Artical::create(['user_id'=>1,'title'=>'PHP','content'=>'Basic PHP.']);
    //Artical::create(['user_id'=>2,'title'=>'J2SE','content'=>'Basic J2SE.']);
    Artical::create(['user_id'=>2,'title'=>'J2SE','content'=>'Advanced J2SE.']);
});

//one to one eloquent
Route::get('/artical/showall',function (){
    $artical=Artical::all();
    foreach ($artical as $a){
        echo $a->title."<br/>";
        echo $a->content." Created by ".$a->user->name."<br/><br/>";
    }
});

Route::get('/user/show',function (){
    $user=User::all();
    foreach($user as $u){
        echo "Writer by <b>".$u->name."</b><br/>";
        foreach($u->artical as $a){
            echo "Artical is ".$a->title." and Content is ".$a->content."<br/>";
        }
        echo "<hr/>";
    }
});

/*Route::get('/user/showdata/{id}',function ($id){
    $user=User::find($id);
    foreach ($user as $u){
        echo "Writer by ".$u->name."<br/>";
        foreach ($u->artical as $a){
            echo "Artical is ".$a->title;
        }
    }
});*/

Route::get('/role/insert/{rank}',function ($rank){
    $role=new Role();
    //$role['rank']='Manager';
    //$role['rank']='Junior Programmer';
    $role['rank']=$rank;
    $role->save();
    return "Success...";
});

Route::get('/roleuser/insert',function (){
    DB::insert('insert into role_user(user_id,role_id) values (?,?)',[2,2]);
    return "Success...";
});

Route::get('user/role',function(){
    $user=User::all();
    foreach ($user as $u){
        echo "Employee Name is ".$u->name."<br/>";
        foreach($u->role as $r){
            echo $r->rank;

        }
        echo '<hr/>';
    }
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



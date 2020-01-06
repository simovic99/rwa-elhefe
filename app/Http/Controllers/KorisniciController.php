<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KorisniciController extends Controller
{
   public function index(){
//$korisnici= DB::select('select  id, name,email,role from users');

       $korisnici = DB::table('users')->orderBy('name', 'asc')->get();
       return view('korisnici',['korisnici'=>$korisnici]);

}
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    //
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
    $users = DB::select('select * from users where id = ?',[$id]);
    return view('edit',['users'=>$users]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

    public function edit(Request $request,$id) {
    $name= $request->input('name');

    $email = $request->input('email');

    $role=$request->input('role');
//$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
//DB::table('student')->update($data);
// DB::table('student')->whereIn('id', $id)->update($request->all());
    DB::update('update users set name = ?,email=? ,role =? where id = ?',[$name,$email,$role,$id]);
    echo "Record updated successfully.
";
    echo '<a href="">Click Here </a> to go back.';
}




/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id){

}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{

    DB::delete('delete from users where id = ?',[$id]);
    echo "Record deleted successfully.";


}}


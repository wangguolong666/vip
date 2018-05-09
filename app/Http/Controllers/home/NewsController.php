<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $res = DB::table('news')->orderBy('id','asc')->paginate(5);

       return view('home.news.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home/news/add',['title'=>'新闻的添加页面']);
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
        $res = $request->except('_token');

        $data = DB::table('news')->insert($res);

        if ($data) {
            return redirect('/home/news');
        }else{
            return redirect('/home/news/create');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = DB::table('news')->where('id',$id)->first();

        return view('home.news.edit',['res'=>$res,'title'=>'新闻修改信息页面']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $res = $request->except('_token','_method');

        $info = DB::table('news')->where('id',$id)->update($res);

        if ($info) {
            # code...
            return redirect('/home/news');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = DB::table('news')->where('id',$id)->delete();

        if ($res) {
            # code...
            return redirect('/home/news');
        }
    }
}

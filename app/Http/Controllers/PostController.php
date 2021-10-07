<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function index()
    {
        $data['post'] = Post::all();
        return view('backend.post.index',$data);
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            Post::create([
                'judul_post' => $request->judul_post,
                'isi_post' => $request->isi_post,
                'thumbnail_post' => $request->thumbnail_post,
            ]);
            DB::commit();
            return Redirect::route('post.index')->with('success','Berhasil menyimpan data');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return Redirect::back()->with('error','Ada masalah saat menambah data');
        }
    }

    public function edit($post)
    {
        try{
            $data['post'] = Post::findOrFail($post);

            return view('backend.post.edit',$data);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return Redirect::back()->with('error','post tidak ditemukan');
        }
    }

    public function update(Request $request,Post $post)
    {
        DB::beginTransaction();
        try{
            $post->update([
                'judul_post' => $request->judul_post,
                'isi_post' => $request->isi_post,
                'thumbnail_post' => $request->thumbnail_post,
            ]);
            DB::commit();
            return Redirect::route('post.index')->with('success','Berhasil mengubah data');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return Redirect::back()->with('error','Ada masalah saat mengubah data');
        }
    }

    public function delete(Post $post)
    {
        DB::beginTransaction();
        try{
            $post->delete();
            DB::commit();
            return Redirect::back()->with('success','Berhasil menghapus data');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return Redirect::back()->with('error','Ada masalah saat menghapus data');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Libs\Services\ContentService;
use App\Libs\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostService $service)
    {
    	$filter = ['state' => ['draft', 'publish']];
        $data = $service->getPost($filter, 0);

        return view('post.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request, PostService $service)
    {
        $data = $request->except(['_token', 'thumbnail']);
        $data['user_id'] = $request->user()->id;

        if ($request->hasFile('thumbnail')) {
        	$data['thumbnail'] = $request->thumbnail->store('post');
        } else {
        	$data['thumbnail'] = 'default/empty.png';
        }

        $service->createPost($data);
        return redirect()->to('post')->withSuccess('Berita baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ContentService $service, PostService $pService)
    {
    	$data['alamat'] = $service->getContentByKey('alamat')->value;
    	$data['telepon'] = $service->getContentByKey('no-telepon')->value;
        $data['post'] = $pService->getPostById($id);
        $data['posts'] = $pService->getPost(['state' => ['publish']], 0);

        return view('post.show', $data);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, PostService $service)
    {
        $data = $request->except(['_token', '_method', 'thumbnail']);
        $data['user_id'] = $request->user()->id;

        if ($request->hasFile('thumbnail')) {
        	$data['thumbnail'] = $request->thumbnail->store('post');
        }

        $service->updatePost($id, $data);
        return redirect()->to('post')->withSuccess('Berita baru berhasil diperbaharui');
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
    }
}

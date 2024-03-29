<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\V1\AlbumResource;
use App\Models\Album;
use Illuminate\Http\UploadedFile;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return AlbumResource::collection(Album::all());
        return AlbumResource::collection(Album::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAlbumRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {


        $data = $request->all();

        $thumbnail = $request->file('image');


        if ($thumbnail instanceof UploadedFile) {
            // the file will be uploaded in storage/app/public,
            // To make these files accessible from the web, you should create a symbolic link from public/storage to storage/app/public
            // https://laravel.com/docs/9.x/filesystem#file-urls, use following command to create symbolic link
            // php artisan storage:link
            $data['thumbnail'] = $thumbnail->storePublicly('public/thumbnail');
        }

        $album = Album::create($data);

        return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAlbumRequest $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->updateOrFail($request->all());
        return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->deleteOrFail();
        return response('', 204);
    }
}

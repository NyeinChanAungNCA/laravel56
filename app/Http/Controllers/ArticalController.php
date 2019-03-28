<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticalRequest;
use App\Http\Requests\ArticalUpdate;
use App\Artical;
use App\Http\Resources\ArticalResource;

class ArticalController extends Controller
{

	public function index(){
		return ArticalResource::collection(Artical::paginate(2));
	}

    public function store(ArticalRequest $request){
    	$artical = new Artical;
    	$artical->user_id = $request->user()->id;
    	$artical->title = $request->title;
    	$artical->content = $request->content;
    	$artical->save();

    	return new ArticalResource($artical);
    }

    public function show(Artical $artical){
        // return new ArticalResource(Artical::find($artical->id));
        return new ArticalResource($artical->with('user')->first());
    }

    public function update(Artical $artical , ArticalUpdate $request){
        $this->authorize('update', $artical);
        $artical->update(['title'=>$request->title,'content'=>$request->content]);
        return new ArticalResource($artical);
    }

    public function destroy(Artical $artical){
        $this->authorize('destroy', $artical);
        $artical->delete();
        return response(null , 204);
    }
}

<?php

namespace App\Http\Controllers\Property;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Cloudder;
use App\Http\Controllers\Controller;

class PhotoUpload extends Controller
{
    protected $user;
    protected $id;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->id = $this->user->id;
    }

    public function post_upload(Request $request){

        $this->validate($request, [
            'file'     => 'required|mimes:jpeg,bmp,png|between:1,7000',
        ]);

        $filename  = $request->file('file')->getRealPath();


        Cloudder::upload($filename, null);
        list($width, $height) = getimagesize($filename);

        $fileUrl = Cloudder::show(Cloudder::getPublicId(), ["crop" => "scale", "width" => 512, "height" => 512,]);
        $publicId = Cloudder::getPublicId();


        return response()->json(["success"=>"200","fileUrl"=>$fileUrl, "publicId"=>$publicId]);

        /*$input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $tempfile = new File(Input::file('file'));
        //$file = Input::file('file');

        //$extension = File::extension($file['name']);
        $extension = $tempfile->extension();
        $directory = public_path('uploads/'.sha1(time()));
        //$filename = sha1(time().time()).".{$extension}";
        $filename = sha1(time().time()).".jpg";

        $lastFile = $request->file('file');
        Storage::put(
            'uploads/'.$filename,
            $tempfile
        );


        $upload_success = null;
        //$upload_success = Input::upload('file', $directory, $filename);
        //$upload_success = $tempfile->move($directory,$filename);

        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }*/
    }

    public function delete(Request $request, $publicId){
        Cloudder::delete($publicId,[]);
    }
}

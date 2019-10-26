<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Attachment;
use App\User;
use Auth;
use Exception;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;
use Storage;

class TangazoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function newTangazo(){


        return view('advertisement.new');
    }

    public function storeAd(Request $request){
        try{
            $advertisement = Advertisement::create(['subject' => $request->subject, 'category' => $request->category,
                'publish_date' => $request->publish_date, 'detail' => $request->detail,
                'user_id' => Auth::id(), 'status' => $request->status]);

            if ($advertisement){

                $files = $request->file('attachment');

                if (isset($files)){

                foreach ($files as $file) {
                    $name = uniqid($file->getClientOriginalName());

                    $path = Storage::disk('public')->putFileAs('uploads/attachments', $file, $name.'.'.$file->getClientOriginalExtension());

                    if ($path !== null) {

                        $advertisement->attachments()->create(['attachment' => $path]);

                    }
                }
                }

                flash('New Advertisement has been created successfully!')->success();

            }
            else{

                flash('Something went wrong while creating your advertisement!')->error();

            }

        }catch (Exception $e){
            abort(500, 'Oops something went wrong while creating your ad!');
        }

        return redirect(url('/home'));
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);
        $attachments = Attachment::where('advertisement_id', '=', $id)->get();

        if ($advertisement !== null)
        {

            try{

                if ($advertisement){
                    if ($attachments->count() > 0) {
                        foreach ($attachments as $attachment) {
                            unlink(public_path('storage/' . $attachment->attachment));
                        }
                    }

                    $advertisement->delete();

                    flash('Attachment successfully removed', 'success');

                }else

                {
                    flash('Your file has not been removed!');
                }

            }catch (Exception $exception){

                flash('Attachment has been removed successfully', 'danger');

            }
        }

        return back();
    }

    public function download( $filename = '' )
    {
        $file_path = storage_path() . "/app/public/uploads/attachments/" . $filename;

        $headers = array(
            'Content-Type: pdf',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            return \Response::download( $file_path, $filename, $headers );
        } else {
            exit( 'Requested file does not exist on our server!' );
        }
    }

}

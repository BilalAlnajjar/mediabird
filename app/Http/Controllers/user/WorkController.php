<?php

namespace App\Http\Controllers\User;

use App\Models\Work;
use App\Models\Video;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\newMessageNotification;

class WorkController extends Controller
{
    //


    public function indexMotion()
    {
            $works = work::where('serviceType', 'Motion Graphics')->get();
            return view('user.indexMotion',[
                    'works'=>$works,
                    ]);
    }

    public function indexLogo()
    {
            $img = [];
            $works = Work::where('serviceType', 'Logo')
                    ->orWhere('serviceType', 'Visual Identity')
                    ->get();
            foreach ($works as $work) {
                    $images = $work->images;
                    $img[] =  $images;
            }


            return view('user.indexLogo', [
                    'works' => $works,
                    'images' => $img
            ]);
    }

    public function indexVoice()
    {
            $voi =[];
            $vid = [];
            $works = work::where("serviceType", "Voice-over")->get();

            foreach ($works as $work) {
                    $voice = $work->voice;
                    $video = $work->video;
                    $voi[$work->id] =  $voice;
                    $vid[$work->id] =  $video;
            }


            return view('user.indexVoice', [

                    'works' => $works,
                    'voices' => $voi,
                    'videos' => $vid,
            ]);
    }

    public function indexWeb()
    {
            $works = Work::where('serviceType', 'Web Design')
                    ->orWhere('serviceType', 'Web Programming')
                    ->get();

            return view('user.indexWeb',[ 
                    'works' => $works,
            ]);
    }

    public function indexApp()
    {
            $works = Work::where('serviceType', 'App Programming')
                    ->orWhere('serviceType', 'App Design')
                    ->get();

                    return view('user.indexApp',[ 
                            'works' => $works,
                    ]);
            }


            public function storeMessage(Request $request)
        {

                $message = Message::create([
                        "name" => $request->name,
                        "subject" => $request->subject,
                        "message" => $request->message,
                        "email" => $request->email,
                ]);

                $message->notify(new newMessageNotification($message));



                return back();
        }

}

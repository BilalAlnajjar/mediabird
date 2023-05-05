<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use App\Models\Work;
use App\Models\Image;
use App\Models\Order;
use App\Models\Video;
use App\Models\Voice;
use App\Models\Message;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class WorksController extends Controller
{
        public function dashbord()
        {
                $user = Auth::user();

                Artisan::call('route:cache');
                return view('Admin.works.dashbord',[
                'online_visitor' => DB::table('sessions')->count(),
                'orders_count' => DB::table('orders')->count(),
                'works_count' => DB::table('works')->count(),
                'orders' => Order::all(),
                'users' => User::get(),
                'messages'=> Message::get(),
                ]);
        }

        public function indexOrders(){

                $order = Order::all();
                return view('Admin.works.orders',[
                        'orders' => Order::all(),
                        'users' => User::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexMotion()
        {
                $works = work::where('serviceType', 'Motion Graphics')->get();

                return view('Admin.works.indexMotion',[
                        'works'=>$works,
                        'users' => User::get(),
                        'messages'=> Message::get(),
                        
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


                return view('Admin.works.indexLogo', [
                        'works' => $works,
                        'images' => $img,
                        'users' => User::get(),
                        'messages'=> Message::get(),
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


                return view('Admin.works.indexVoice', [

                        'works' => $works,
                        'voices' => $voi,
                        'videos' => $vid,
                        'users' => User::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexWeb()
        {
                $works = Work::where('serviceType', 'Web Design')
                        ->orWhere('serviceType', 'Web Programming')
                        ->get();

                return view('Admin.works.indexWeb',[ 
                        'works' => $works,
                        'users' => User::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexApp()
        {
                $works = Work::where('serviceType', 'App Programming')
                        ->orWhere('serviceType', 'App Design')
                        ->get();
                        
                        return view('Admin.works.indexApp',[ 
                                'works' => $works,
                                'users' => User::get(),
                                'messages'=> Message::get(),
                        ]);
                }
                


        //show
        public function create()
        {
                return view('Admin.works.create',[

                        'users' => User::get(),
                        'messages'=> Message::get(),
                ]);
        }

        //create in DataBase
        public function store(Request $request)

        {
                $request->validate(
                        [
                                'serviceType' => 'required|int',
                                'name' => 'required|string|max:255|min:3',
                                'description' => 'nullable|string|max:2000',
                                'video' => 'required_if:serviceType,1|mimes:mp4,mov,ogg,qt',
                                'image.*' => 'required_if:serviceType,2|required_if:serviceType,3|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|mimes:jpeg,jpg,png,gif',
                                'link' => 'required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|url',
                                'voice' => 'required_without_all:video,image|mimes:application/octet-stream,audio,mpeg,mpga,mp3,wav,mp4',
                                'price' => 'regex:/^\d+(\.\d{1,2})?$/|nullable',
                                'lang' => 'required_if:serviceType,4|',
                                'poster' => 'required_if:serviceType,1',
                        ],
                        [
                                'required' => 'هذا الحقل مطلوب',
                                'min' => 'هذا الاسم اقل من :min احرف',
                                'max:2000' => 'هذا الوصف كبير جدا',
                                'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                                'int' => 'يجب ان تختار احدا الخيارات المتاحة',
                                'video.required_if' => 'حقل ملف الفيديو مطلوب',
                                'image.required_if' => 'حقل ملف الصور مطلوب',
                                'voice.required_if' => 'حقل ملف الصوت مطلوب',
                                'link.required_if' => 'رابط الموقع مطلوب لهذه الخدمة',
                                'voice.mimes' => 'يرجا ادخال ملف صوتي',
                                'video.mimes' => 'يرجا رفع ملف باحدا صيغة الفيديو',
                                'image.mimes' =>  'يرجا رفع ملف باحدا صيغة الصور',
                                'url' => 'يرجى ادخال رابط صحيح',
                                'required_without' => 'يجب ادخال ملف الفيديو او ملف صوت',
                                'regex' => 'يجب ان يكون المدخل أعداد',
                                'voice.required_without_all' => 'يجب ان ترفع (فيديو او صوت)'

                        ]
                );


                $work = Work::create($request->except('image', 'video', 'voice', 'link','poster','lang'));
                if ($request->hasFile('image')) {
                        //More image
                        $cover = '';
                        foreach ($request->file('image') as $image) {
                                $path = $image->store('image', 'public');

                                if (empty($cover)) {
                                        $cover = $path;
                                }
                                $img = Image::create([
                                        'path' => $path,
                                        'work_id' => $work->id,

                                ]);

                                $img->update([
                                        'serviceType' => $request->serviceType,

                                ]);
                        }

                        $work->update([
                                'path' => $cover,
                        ]);
                }

                if ($request->hasFile('video')) {
                        $path = $request->file('video')->store('video', 'public');
                        $poster = $request->file('poster')->store('poster', 'public');

                        Video::create([
                                'path' => $path,
                                'serviceType' => $request->serviceType,
                                'work_id' => $work->id,
                        ]);

                        $work->update([
                                'path' => $path,
                                'poster' => $poster,
                        ]);

                        if($request->lang){
                                $work->update([
                                        'lang' => $request->lang,
                                ]);   
                        }
                }


                if ($request->hasFile('voice')) {
                        $path = $request->file('voice')->store('voice', 'public');

                        Voice::create([
                                'path' => $path,
                                'serviceType' => $request->serviceType,
                                'work_id' => $work->id,
                        ]);

                        $work->update([
                                'path' => $path,
                                'lang' => $request->lang,
                        ]);
                }

                if ($request->link) {

                        $link = $request->link;

                        $work->update([
                                'link' => $link,
                        ]);
                }
                return back()->with('sccess', " تم انشاء العمل بنجاح");
        }



        //show
        public function edit($id)
        {
                $work = Work::findOrFail($id);

                return view('Admin.works.edit', [
                        'work' =>  $work,
                        'image' => $work->images,
                        'video' => $work->video,
                        'voice' => $work->voice,
                        'users' => User::get(),
                        'messages'=> Message::get(),

                ]);
        }

        //edit on DataBase
        public function update(Request $request, $id)
        {


                $request->validate(
                        [
                                'serviceType' => 'required|int',
                                'name' => 'required|string|max:255|min:3',
                                'description' => 'nullable|string|max:2000',
                                'video' => 'required_if:serviceType,1|mimes:mp4,mov,ogg,qt',
                                'image.*' => 'required_if:serviceType,2|required_if:serviceType,3|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|mimes:jpeg,jpg,png,gif',
                                'link' => 'required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|url',
                                'price' => 'regex:/^\d+(\.\d{1,2})?$/|nullable',
                                'lang' => 'required_if:serviceType,4|',
                                'poster' => 'required_if:serviceType,1',
                        ],
                        [
                                'required' => 'هذا الحقل مطلوب',
                                'min' => 'هذا الاسم اقل من :min احرف',
                                'max:2000' => 'هذا الوصف كبير جدا',
                                'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                                'int' => 'يجب ان تختار احدا الخيارات المتاحة',
                                'video.required_if' => 'حقل ملف الفيديو مطلوب',
                                'image.required_if' => 'حقل ملف الصور مطلوب',
                                'voice.required_if' => 'حقل ملف الصوت مطلوب',
                                'link.required_if' => 'رابط الموقع مطلوب لهذه الخدمة',
                                'voice.mimes' => 'يرجا ادخال ملف صوتي',
                                'video.mimes' => 'يرجا رفع ملف باحدا صيغة الفيديو',
                                'image.mimes' =>  'يرجا رفع ملف باحدا صيغة الصور',
                                'url' => 'يرجى ادخال رابط صحيح',
                                'regex' => 'يجب ان يكون المدخل أعداد',

                        ]
                );

                $work  = Work::findOrFail($id);
                $work->update($request->except('image', 'video', 'voice', 'link','path','poster'));

                if ($request->hasFile('image')) {
                        //More image
                        $cover = '';
                        foreach ($request->file('image') as $image) {
                                $path = $image->store('image', 'public');

                                if (empty($cover)) {
                                        $cover = $path;
                                }
                                $work->images()->update([
                                        'path' => $path,
                                        'work_id' => $work->id,

                                ]);


                                $work->images()->update([
                                        'serviceType' => $request->serviceType,

                                ]);
                        }

                        $work->update([
                                'path' => $cover,
                        ]);
                }

                if ($request->hasFile('video')) {

                        $path = $request->file('video')->store('video', 'public');
                        $work->video()->update([
                                'path' => $path,
                        ]);

                        $work->update([
                                'path' => $path,
                        ]);
                        $work->video()->update([
                                'serviceType' => $request->serviceType,
                                'work_id' => $work->id,
                        ]);

                }

                if($request->hasFile('poster')){
                        $path = $request->file('poster')->store('poster', 'public');


                        $work->update([
                                'poster' => $path,
                        ]);
                }


                if ($request->hasFile('voice')) {
                        //More image
                                $path = $request->file('voice')->store('voice', 'public');
                                $work->voice()->update([
                                        'path' => $path,
                                        'work_id' => $work->id,
                                        'serviceType' => $request->serviceType,
                                ]);
        
                                $work->update([
                                        'path' => $path,
                                ]);

                }

                if ($request->link) {

                        $link = $request->link;

                        $work->update([
                                'link' => $link,
                        ]);
                }

                return back()->with('sccess', "تم التعديل بنجاح");
        }


        public function delete($id)
        {

                $work = Work::findOrFail($id);
                $video = $work->videos;
                $image = $work->images;
                $voice = $work->voice;
                $link = $work->link;
                if ($video) {
                        foreach ($video as $v) {
                                Storage::disk('public')->delete($v->path);
                                $v->delete();
                        }
                } else if ($image) {
                        foreach ($image as $m) {
                                Storage::disk('public')->delete($m->path);
                                $m->delete();
                        }
                } else if ($voice) {
                        foreach ($voice as $v) {
                                Storage::disk('public')->delete($v->path);
                                $v->delete();
                        }
                } else if ($link) {
                        foreach ($link as $l) {
                                Storage::disk('public')->delete($l->path);
                                $l->delete();
                        }
                }


                $work->delete();


                return redirect()
                       ->back()
                        ->with('sccess', "Work {$work->name} delete!");
        }

        public function index()
        {

                $videos = Work::where('serviceType','Motion Graphics')->inRandomOrder()->limit(3)->get(['path','poster','name']);
                $voices = Work::where('serviceType','Voice-over')->inRandomOrder()->limit(3)->get(['path','poster','name']);
                $imageWeb = DB::table('images');
                $imageApp = DB::table('images');

                $image_link_web = $imageWeb->join('works','images.work_id','=','works.id')->select(['works.serviceType','works.path as link','images.path as image','name']);
                $image_link_app = $imageApp->join('works','images.work_id','=','works.id')->select(['works.serviceType','works.path as link','images.path as image','name']);

                $app = $image_link_app->where('works.serviceType','App Design')->orWhere('works.serviceType','App Programming')->inRandomOrder()->limit(3)->get();
                $web = $image_link_web->where('works.serviceType','Web Design')->orWhere('works.serviceType','web Programming')->inRandomOrder()->limit(3)->get();

                return view('index',[

                        'user' => Auth::user(),
                        'videos' => $videos,
                        'voices' => $voices,
                        'web' => $web,
                        'app' => $app,

                ]);
        }

        public function storeBall(Request $request,$id){

                $order =Order::findOrFail($id);

                if($order->status == 'مكتمل'){
                     return back()->with('stuteEr','جميع الدفعات مكتملة لهذا الطلب ');  
                }
        
                $order->update([
                        'bill' => $request->bill,
                ]);
        
                return back();
        
        }

        public function storePriceOrder(Request $request,$id){

                $order = Order::where('id',$id)->first();
        
                $order->update([
                        'priceOrder' => $request->priceOrder,
                ]);
        
                return back();
        
        }

        public function indexMessage(){
                $message = Message::get();

                return view('Admin.works.indexMessage',[
                        'messages' => $message,
                        'users' => User::get(),
                ]);
        }
        


}

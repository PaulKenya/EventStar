<?php

namespace App\Http\Controllers;

use App\cart;
use App\events;
use App\User;
use Codedge\Fpdf\Facades\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()->user_type==0) {
            return redirect('create');
        }else{
            $cart_results = DB::table('carts')->where('user_id', Auth::user()->id)->where('cart_status', '1')->get();
            $events_results = DB::table('events')->where([['event_status', '!=', '0'], ['event_status', '!=', '1'], ['event_status', '!=', '3']])->get();
            $grouped_event_date_results = DB::table('events')->select('event_date')->where([['event_status', '!=', '0'], ['event_status', '!=', '1'], ['event_status', '!=', '3']])->groupBy('event_date')->orderBy('event_date', 'asc')->get();
            return view('home', [
                'events_results' => $events_results, 'grouped_event_date_results' => $grouped_event_date_results, 'cart_results' => $cart_results
            ]);
        }
    }
    public function events()
    {
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->where('cart_status','1')->get();
        $events_details_results = DB::table('events')->where('event_type','Event')->where([['event_status','!=','0'],['event_status','!=','1'],['event_status','!=','3']])->get();
        return view('events',['cart_results'=>$cart_results,'events_details_results'=>$events_details_results]);
    }
    public function hackathon()
    {
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        $events_details_results = DB::table('events')->where('event_type','Hackathon')->where([['event_status','!=','1'],['event_status','!=','1'],['event_status','!=','3']])->get();
        return view('hackathon',['cart_results'=>$cart_results,'events_details_results'=>$events_details_results]);
    }
    public function training()
    {
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        $events_details_results = DB::table('events')->where('event_type','Training')->where([['event_status','!=','0'],['event_status','!=','1'],['event_status','!=','3']])->get();
        return view('training',['cart_results'=>$cart_results,'events_details_results'=>$events_details_results]);
    }
    public function create()
    {
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        if(Auth::user()->user_type==0) {
            return view('create_event',['cart_results'=>$cart_results]);
        }else{
            return redirect('home');
        }
    }
    public function created(Request $request)
    {
        if(Auth::user()->user_type==0) {
            if($request->hasfile('event_image')) {
                $file = $request->file('event_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save(public_path('/uploads/EventImages/' . $filename));
            };
            $create_event = new events(
                ['event_type' => request('event_type'),
                    'event_name' => request('event_name'),
                    'event_description' => request('event_description'),
                    'event_date' => request('event_date'),
                    'event_time' => request('event_time'),
                    'event_location' => request('event_location'),
                    'number_of_tickets_available' => request('number_of_tickets_available'),
                    'price_per_ticket' => request('price_per_ticket'),
                    'event_image' => $filename,
                    'event_host' => request('event_host'),
                ]);
            $create_event->save();
            /*$event_name=request('event_name');
            $event_description=request('event_description');
            $event_date=request('event_date');
            $event_time=request('event_time');
            $event_location=request('event_location');
            $number_of_tickets_available=request('number_of_tickets_available');
            $price_per_ticket=request('price_per_ticket');
            $event_host=request('event_host');
            $event_type=request('event_type');
            $subscriber_email='kinyanjuipaul34@gmail.com';
            $subscriber_name='Paul Kinyanjui';
            Mail::send('email.welcome', ['event_type'=>$event_type,'name'=>$subscriber_name,'event_name'=>$event_name,'event_description'=>$event_description,'event_date'=>$event_date,'event_time'=>$event_time,'event_location'=>$event_location,'number_of_tickets_available'=>$number_of_tickets_available,'price_per_ticket'=>$price_per_ticket,'event_host'=>$event_host], function ($message) use ($subscriber_email) {
                $message->from('gitaustorage@gmail.com', 'Event Star');
                $message->to($subscriber_email);
                $message->subject('A New Event has been Added');
            });*/
            return redirect(route('create'));
        } else {
            return redirect('home');
        }
    }
    public function viewEvents(){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        if(Auth::user()->user_type==0) {
            $events_results = DB::table('events')->get();
            $status_code_results = DB::table('event_statuses')->get();
            return view('view_event',[
                'events_results'=>$events_results,'status_code_results'=>$status_code_results,'cart_results'=>$cart_results
            ]);
        }else{
            return redirect('home');
        }
    }
    public function viewUsers(){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        if(Auth::user()->user_type==0) {
            $users_results = DB::table('users')->get();
            $user_type_results = DB::table('user_types')->get();
            return view('users',[
                'users_results'=>$users_results,'user_type_results'=>$user_type_results,'cart_results'=>$cart_results
            ]);
        }else{
            return redirect('home');
        }
    }
    public function eventDetails($event_id){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        $events_details_results = DB::table('events')->where('id',$event_id)->get();
        $events_status_results = DB::table('event_statuses')->get();
        return view('event_details',['events_details_results'=>$events_details_results,'cart_results'=>$cart_results,'events_status_results'=>$events_status_results]);
    }
    public function addToCart(){
        $add_to_cart = new cart(Input::all());
        $add_to_cart->save();
        return redirect(route('viewCart'));
    }
    public function viewCart(){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        return view('view_cart',['cart_results'=>$cart_results]);
    }
    public function cartCheckout(){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        foreach($cart_results as $cart_result){
            $update_cart = cart::find($cart_result->id);
            $event = events::find($cart_result->event_id);
            $current_ticket_number = $event->tickets_sold;
            $new_ticket_number = $current_ticket_number+$cart_result->cart_tickets;
            if ($new_ticket_number==$event->number_of_tickets_available){
                $event->event_status=0;
                $event->save();
            }
            $event->tickets_sold=$new_ticket_number;
            $update_cart->cart_status = 0;
            $event->save();
            $update_cart->save();
        }
        Fpdf::AddPage();
        Fpdf::SetLineWidth(1);
        $title='EVENT STAR';
        Fpdf::SetFont('Arial','B',15);
        Fpdf::SetX((210-Fpdf::GetStringWidth($title)+6)/2);
        Fpdf::SetDrawColor(250,235,215);
        Fpdf::SetFillColor(255,255,255);
        Fpdf::SetTextColor(0,0,0);
        Fpdf::SetLineWidth(1);
        Fpdf::Cell(Fpdf::GetStringWidth($title)+6,9,$title,1,1,'C',true);
        Fpdf::Ln(10);
        Fpdf::SetFont('Times','',12);
        Fpdf::Cell(0, 1, 'Thank you for shopping at Event Star. The event hub for UoN.');
        Fpdf::Ln(10);
        Fpdf::Cell(0, 1, 'Below are your concert tickets');
        Fpdf::Ln(1);
        $count=0;
        if(isset($cart_results)){
            foreach($cart_results as $cart_result) {
                $the_event_results = DB::table('events')->where('id',$cart_result->event_id)->get();
                Fpdf::SetFont('Courier', 'B', 9);
                if(isset($the_event_results)){
                    foreach($the_event_results as $the_event_result) {
                        Fpdf::Image(public_path('/uploads/EventImages/' .$the_event_result->event_image),10,10,-300);
                    }
                }
                $count=$count+1;
                Fpdf::Cell(50, 25, $count.'. '.$cart_result->event_name.': '.$cart_result->cart_tickets.' Tickets Bought. Sitting Location: Section: A Row: 12');
                Fpdf::Ln(10);
            }
            Fpdf::Ln(10);
        }
        Fpdf::Output();
        return redirect(route('home'));
    }
    public function changeUserPermissions(Request $request){
        $users_id = $request->user_id;
        $gift = User::find($users_id);
        $gift->user_type=$request->user_type;
        $gift->save();
        return redirect(route('viewUsers'));
    }
    public function changeEventInfo(Request $request){
        $event_id = $request->event_id;
        $gift = events::find($event_id);
        $gift->event_status=$request->event_status;
        $gift->save();
        return redirect(route('viewEvents'));
    }
    public function removeFromCart(Request $request){
        $table_cart_id = $request->cart_id;
        $gift = cart::find($table_cart_id);
        $gift->cart_status=$request->new_cart_status;
        $gift->save();
        return redirect(route('viewCart'));
    }
    public function report(){
        $cart_results = DB::table('carts')->where('user_id',Auth::user()->id)->where('cart_status','1')->get();
        if(Auth::user()->user_type==0) {
            $events_results = DB::table('events')->get();
            $status_code_results = DB::table('event_statuses')->get();
            return view('reports',[
                'events_results'=>$events_results,'status_code_results'=>$status_code_results,'cart_results'=>$cart_results
            ]);
        }else{
            return redirect('home');
        }
    }
}

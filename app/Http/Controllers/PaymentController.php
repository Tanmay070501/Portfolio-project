<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Payment;
use Razorpay\Api\Api;
use Session;
use Exception;
use DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment (Request $request){
        $input = $request->all();
  
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                // Session::put('error',$e->getMessage());
                // return redirect()->back();
                return view('layouts.failed');
            }
        }else{
            return redirect()->back();
        }
        
        // Session::put('success', 'Payment successful');
        // return redirect()->back();
        $data = User::find(Auth::user()->id);
        $data->premium = 1;
        $data->save();
        return view('layouts.success');
    }
}


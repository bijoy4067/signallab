<?php

namespace App\Http\Controllers;

use App\Lib\SignalLab;
use App\Models\Signal;
use Carbon\Carbon;

class CronController extends Controller{

    public function cron(){
        
        $general = gs();
        $general->last_cron = Carbon::now();
        $general->save();

        $signals = Signal::active()->notSent()->where('send_signal_at', '<=', Carbon::now())->limit(50)->get();
     
        foreach($signals as $signal){ 
            SignalLab::send($signal); 
            $signal->send = 1;
            $signal->save();
        }

        //For manual run from admin panel
        if(request()->has('manually') && url()->previous() == route('admin.dashboard')){
            $notify[] = ['success', 'Manually cron run successfully'];
            return back()->withNotify($notify);
        }

    }

}



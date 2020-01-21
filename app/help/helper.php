<?php

function target(){
    $array = ['admin', 'manager', '/', '/'];
    
    if(Auth::user()->permission == 0){
        return $array[0];
    }

    if(Auth::user()->permission == 1){
        return $array[1];
    }
    
    if(Auth::user()->permission == 2){
        return $array[2];
    }
    
    if(Auth::user()->permission == 3){
        return $array[3];
    }
        
}


function permissions(){
    $array = [
              'مدير الموقع',
              'مشرف',
              'صاحب مشروع',
              'شركه'
             ];
    // Admin => 0, User => 1
    return $array;
}


function ksaCities(){
    $array = [
                'الرياض',
                'جدة',
                'مكّة المكرمة',
                'الدمام',
                'المدينة المنوّرة',
                'الظهران',
                'الجبيل',
                'الخبر',
                'القصيم',
                'الطائف',
                'الاحساء',
                'عسير',
                'جازان',
                'نجران',
                'تبوك',
                'المنطقة الشمالية'
             ];
    return $array;
}


function messagesNotification(){
    
    $user_id = Auth::user()->id;
    $messages = collect(\App\Message::whereRaw("id IN (select max(`id`) from messages where to_user=$user_id or send_from=$user_id GROUP BY offer_status_id)")->orderBy('id', 'desc')->limit(4)->get());
        
    $dispute = collect(\App\DisputeMessage::orderBy('id', 'desc')->limit(4)->get());
    $all_messages = $dispute->merge($messages)->sortByDesc('created_at');
 
    return $all_messages;   
}

?>
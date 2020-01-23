<?php

function target(){
    $array = ['admin'];
    
    if(Auth::user()->permission == 0){
        return $array[0];
    }

        
}


function permissions(){
    $array = [
              'مدير الموقع',
              'عضو'
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


function companies(){
    $companies = \App\Company::all();
    return $companies;
}

function categories(){
    $categories = \App\Category::all();
    return $categories;
}

/* add one file */
function addFile($request, $folder){
    $attach = $request->attachment;
    $newname =  Auth::user()->id.'_'.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
    $attach->move(public_path('upload'.'/'.$folder), $newname); 
    $input = [];
    $input['name'] = $attach->getClientOriginalName();
    $input['path'] = $folder.'/'.$newname;
    $attach_res = \App\Attachment::create($input);
    $attachment_id = $attach_res->id;
    return $attachment_id;
}

/* edit file */
function editFile($request, $folder, $obj){
    $attach = $request->attachment;
    $attachment = $request->attachment;
    $newname =  Auth::user()->id.'_'.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
    $attachment->move(public_path('upload'.'/'.$folder), $newname);
    /* delete old file */
    $file_path = public_path('upload/'.$obj->attach->path);  
    if(File::exists($file_path)) {
            File::delete($file_path);
    }
    /* edit attachment database */
    $obj->attach->fill([
        'name' => $attachment->getClientOriginalName(),
        'path' => $folder.'/'.$newname
    ])->save();
}

?>
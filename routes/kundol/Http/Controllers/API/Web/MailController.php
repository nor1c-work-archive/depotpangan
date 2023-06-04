<?php

namespace App\Http\Controllers\API\Web;

use App\Mail\ContactUs;
use App\Traits\ApiResponser;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;
use App\Models\Admin\EmailTemplateSetting;
use App\Http\Controllers\Controller as Controller;

class MailController extends Controller
{
    use ApiResponser;
    public function contact_us(ContactUsRequest $request)
    {
        $data = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => strtolower($request->email), 'message' => $request->message, 'phone' => $request->phone];

        $setting = Setting::where('type', 'email_notify_setting')->pluck('value', 'key');
        $senderEmail = explode(',',$setting['notify_email']);

        $contact_us_template = Setting::where('key',['contact_us_email_template'])->pluck('value');
        $contact_us_template = $contact_us_template[0];

        $search = array('username','useremail','userphone','usermessage');
        $replace = array($data['first_name'], $data['email'], $data['phone'], $data['email']);
        $contact_us_template_with_data = str_replace($search, $replace, $contact_us_template);
        
        $message = "";
        $email = $senderEmail[0];

        Mail::send('emails.contact-email-template', ['contact_us_template_with_data' => $contact_us_template_with_data], function ($message) use ($email) {
                $message->to($email)
                        ->subject('Contact Us');
        });
        // foreach($senderEmail as $email){
        //     Mail::to($email)->send(new ContactUs($contact_us_template_with_data));
        // }
        return $this->successResponse('', 'Email sent successfully!');
    }
}

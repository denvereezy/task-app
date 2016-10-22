<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Task;

class MailController extends Controller
{
    //function sending mail
    public function send_mail(Request $request, Task $task)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $data = ['name' => 'Task App'];                                           //inject variable into the scope of the closure
      Mail::raw('This is your new task: '.$task->name, function ($message) use ($email, $subject) {
          $message->to($email)
                  ->subject($subject);
          $message->from('denverdaniels52@gmail.com', 'Task App');
      });
      // echo 'fyfhh '.$email;
      return redirect('/tasks?Email was sent');
    }
//    create new function to send html email
    // public function html_email()
    // {
    //   $data=['name'=>'Denver'];
    //   Mail::send(['text'=>'mail'], $data, function($message)
    //   {
    //     $message->to('denver@io.co.za','denver daniels')
    //             ->subject('Send mail from laravel with HTML email');
    //     $message->from('denverdaniels52@gmail.com','Denver');
    //   });
    //   echo 'Email was sent';
    // }
    public function select_receiver(Task $task)
    {
        return view('mail', compact('task'));
    }
}

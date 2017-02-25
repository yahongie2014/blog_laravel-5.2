<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Hash;
use Illuminate\Support\Facades\Input;
use App\User;
use Symfony\Component\Routing\Generator;
use Response;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class API extends Controller
{
    public function Register(){
        $name = ucwords(trim(Input::get('name')));
        $email = Input::get('email');
        $Phone = Input::get('Phone');
        $password = Input::get('password');
        $remember_token = 0;
        if (Input::has('remember_token')) {
            $remember_token = Input::get('remember_token');
        }
        $token = 0;
        if (Input::has('token')) {
            $token = Input::get('token');
        }
        if ($password != "" ) {
            $validator = Validator::make(
                array(
                    'password' => $password,
                    'email' => $email,
                    'name' => $name
                ), array(
                'password' => 'required',
                'email' => 'required|email',
                'name' => 'required',
            ), array(
                    'password.required' => 28,
                    'email.required' => 29,
                    'name.required' => 30,
                )
            );

            $validatorPhone = Validator::make(
                array(
                    'Phone' => $Phone,
                ), array(
                'Phone' => 'phone'
            ), array(
                    'phone.phone' => 25
                )
            );
            User::where('token', '=', $token)->update(array('token' => 0));
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->phone=  $Phone;
            $user->token = str_random(64);
            $user->remember_token = str_random(20);
            $user->verify = str_random(6);
            if ($password != "") {
                $user->password = Hash::make($password);
            }
            $user->save();
            //Send Message
           // $phone_user = $Zip.''.$Phone;
            //$message = "Hey $user->name ! That's your Ticket : $user->verify thats new service from Seri❤inc please Keep in Touch ";
            //Twilio::message($phone_user, $message);


            $response_array = array(
                'success' => true,
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'token' => $user->token,
                'remember_token' => $user->remember_token,
                'verify' => $user->verify,
            );

            $response_code = 200;
        }

        response:
        $response = Response::json($response_array, $response_code);
        return $response;

    }

    public function Login(){

        if (Input::has('email') && Input::has('password')) {
            $email = Input::get('email');
            $password = Input::get('password');
            $Phone = Input::get('Phone');
            $token = Input::get('token');
            $validator = Validator::make(
                array(
                    'password' => $password,
                    'email' => $email
                ), array(
                'password' => 'required',
                'email' => 'required'
            ), array(
                    'password.required' => 28,
                    'email.required' => 29
                )
            );

            if ($validator->fails()) {
                $error_messages = $validator->messages()->all();
                $response_array = array('success' => false, 'error' => 'Invalid Username or Password.', 'error_code' => 401, 'error_messages' => $error_messages);
                $response_code = 200;
            } else {


                $users = User::where('email', '=', $email)->first();
                if ($users) {

                } else {

                    $users = User::where('Phone', '=', $email)->first();
                }


                if ($users) {
                    if (Hash::check($password, $users->password)) {
                        User::where('id', '!=', $users->id)->where('token', '=', $token)->update(array('token' => 0));

                        $users->token = $token;
                        $users->token = str_random(64);
                        $users->save();

                        $response_array = array(
                            'success' => true,
                            'id' => $users->id,
                            'name' => $users->name,
                            'Phone' => $users->Phone,
                            'image' => $users->image,
                            'email' => $users->email,
                            'address' => $users->address,
                            'token' => $users->token,
                        );

                    } else {
                        $response_array = array('success' => false, 'error' => 36, 'error_messages' => array(36), 'error_code' => 403);
                        $response_code = 200;
                    }
                } else {
                    $response_array = array('success' => false, 'error' => 37, 'error_messages' => array(37), 'error_code' => 404);
                    $response_code = 200;
                }
            }
        }

        $response_array = array(
            'success' => true,
            'id' => $users->id,
            'name' => $users->name,
            'Phone' => $users->Phone,
            'email' => $users->email,
            'address' => $users->address,
            'token' => $users->token,
        );

        $response_code = 200;


        $response = Response::json($response_array, $response_code);
        return $response;

    }
}

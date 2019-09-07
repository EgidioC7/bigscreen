<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;

class FrontController extends Controller
{
    public function index(){
        $questions = Question::all();

        return view('front.index', ['questions' => $questions]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request);

        $this->validate($request, [
            'email' => 'required|email',
            'description' => 'required',
            'age' => 'required|numeric|between:0,99.99',
            'input3' => 'required',
            'optradio4' => 'required',
            'input5' => 'required',
            'input6' => 'required',
            'input7' => 'required',
            'input8' => 'required',
            'optradio9' => 'required',
            'input10' => 'required',
            'optradio11' => 'required',
            'optradio12' => 'required',
            'optradio13' => 'required',
            'optradio14' => 'required',
            'optradio15' => 'required',
            'input16' => 'required',
            'input17' => 'required',
            'input18' => 'required',
            'input19' => 'required',
        ]);
      
      $email = $request->email;
      dump($email);
    
      $user_id = User::select('id')->where('email', $email )->first();

      if( is_null($user_id) ){
        $user = new User();
        $user->password = Hash::make($email_user);
        $user->link = Hash::make($email_user);
        $user->email = $email_user;
        $user->name =  $email_user;
        $user->role = 'subscriber';
        $user->save();
      }

      dump($exist_user);

      die('okok');

     /*    $category_id = $request->category_id;
        $category_name = Category::find($category_id)->title;

        if ($request->status_product == 'sold') {

            $salePrice = $request->price - ($request->price * (20 / 100));
            $request->request->add(['salePrice' => $salePrice]);
        }
        $image = $request->file('picture');

        if (!empty($image)) {

            $link = $image->store(Str::plural($category_name));

            $request->request->add(['image_url' => $link]);
        }

        $requestData = $request->all();

        $requestData['size'] = serialize($request->size); */

        //Answer::create($request->all());

        //return redirect()->view('front.index')->with('message', 'success');
    }
}

<?php

namespace Tyondo\Aggregator\Http\Controllers\Admin;

use Tyondo\Aggregator\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tyondo\Aggregator\Http\Requests\UserRequest;
use Tyondo\Aggregator\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use Tyondo\Aggregator\Models\User;
use Tyondo\Aggregator\Models\Role;


class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('aggregator::portal.admin.blog.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::pluck('name', 'id')->all();
      //$offices = Office::pluck('name', 'id')->all();
      return view('aggregator::portal.admin.blog.users.create', compact('roles','offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $input = $request->all();
          $password = $this->randomPassword();
        $input['password'] = bcrypt($password );
        User::create($input);
        Session::flash('message', 'The user has been CREATED !!');
       return redirect(route('users.index'));

    }
    private function randomPassword( $length = 8 )
    {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
      $length = rand(10, 16);
      $password = substr( str_shuffle(sha1(rand() . time()) . $chars  ), 0, $length );
      return $password;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $user = User::findOrFail($id);
      return view('portal.users.changePassword', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      $roles = Role::pluck('name', 'id')->all();
      //$offices = Office::pluck('name', 'id')->all();
      return view('aggregator::portal.admin.blog.users.edit', compact('user', 'roles', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestUpdate $request, $id)
    {
    //  if(trim($request->password) == '')
    //    {
    //      $input = $request->except('password');
    //    }else {
          $input = $request->all();
      //    $input['password'] = bcrypt($request->password);
    //    }
      $user = User::findOrFail($id);
      if($request->email == $user->email)
        {
          $input = $request->except('email');
        }else{
            Validator::make($request->all(), [
                            'email' => 'required|email|max:255|unique:users',
                        ])->validate();
        }
      $user->update($input);
      Session::flash('message', 'The user has been updated :-)');
      return redirect(route('users.index'));
    }
    public function changePassword(Request $request, $id)
    {
    //  echo 'here';
    //  exit;
      Validator::make($request->all(), [
                      'password' => 'required|min:6|confirmed',
                  ])->validate();
    //  echo 'here agani';
    //  exit;
      $input = $request->only('password');
      $input['password'] = bcrypt($request->password);
      $user = User::findOrFail($id);
      $user->update($input);
      Session::flash('message', 'Password Updated :-)');
      return redirect('/home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  User::findOrFail($id)->delete();
      $user = User::findOrFail($id);
       unlink(public_path($user->photo->file));
      $user->delete();
      Session::flash('message', 'The user has been deleted :-(');
      return redirect('admin/users');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
}

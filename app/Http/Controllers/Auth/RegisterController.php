<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'username' => 'required|max:255unique:users',
            'birthday' => 'required',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'img'   =>  'required|image|max:5000'
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    
    protected function create(array $data)
    {     
       
         $birthday =  date('Y-m-d',strtotime( $data['birthday']));
        
         return User::create([
            'username' => $data['username'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'birthday' => $birthday,
            'img' => $data['username'].'.'.$data['avatar']->extension(),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

     public function register(Request $request)
    {
      
        $this->validator($request->all())->validate();
        $file=$request->file('avatar');
        $file->storeAs('avatar/',$request->input('username').'.'.$file->extension());
        $user = $this->create($request->all());
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
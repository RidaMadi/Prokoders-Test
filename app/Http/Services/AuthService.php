<?php


namespace App\Http\Services;


use App\Http\Repository\AuthRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    use GeneralTrait;

    private $repo;
    public function __construct(AuthRepository $authRepository)
    {
        $this->repo = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = $this->repo->register($validated);
        $this->repo->addToPublic($user->id);
        return $this->returnSuccessMessage('register successfully');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = $this->repo->login($validated);

        // Check Password
        if (!$user || !Hash::check($request->all()['password'],$user->password)) {
            return $this->returnError(403, __(".معلومات الدخول غير صالحة"));
        }

        $user->token = $this->generateToken($validated);
        return $this->returnData('Data', $user, 'login successfully');//return json response
    }

    public function generateToken(array $data){

        try {
            if (! $token = JWTAuth::attempt($data)) {
                return $this->returnError(403, 'معلومات الدخول غير صالحة');
            }
        } catch (JWTException $e) {
            return $this->returnError(403, 'خطأ ما.. حاول لاحقا');
        }

        return $token;
    }
}

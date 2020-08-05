<?php

namespace App\Http\Controllers;

use App\Models\UserEducationInformation;
use App\Models\UserPersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPersonalInformationController extends Controller
{
    protected $user;

    /**
     * Undocumented function
     */
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) return redirect()->route('login');
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function edit()
    {
        return view('edit', ['user' => $this->user->load('personal_information', 'education_information')]);
    }

    public function store(Request $request)
    {
        $this->user->update($request->all());

        if ($personal_information = $this->user->personal_information) {
            $personal_information->update($request->personal_information);
        } else {
            $this->user->personal_information()->save(new UserPersonalInformation($request->personal_information));
        }

        if ($education_information = $this->user->education_information) {
            $education_information->update($request->education_information);
        } else {
            $this->user->education_information()->save(new UserEducationInformation($request->education_information));
        }

        return response()->json([
            'saved' => true,
            'user' => $this->user->load('personal_information', 'education_information')
        ]);
    }
}

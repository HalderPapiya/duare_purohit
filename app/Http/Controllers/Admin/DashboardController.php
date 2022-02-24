<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Puja;
use App\Models\PujaService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        $data = (object)[];
        $data->categories = Category::latest()->get();
        $data->pujas = Puja::latest()->get();
        $data->pujaServices = PujaService::latest()->get();
        $data->customers = User::latest()->get();
        $data->bookings = Booking::latest()->get();

        return view('admin.dashboard', compact('data'));
    }
}
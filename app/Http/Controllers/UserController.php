<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        $status = $request->get('status');
    
        $query = User::query();
    
        if ($search && !$status) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('full_name', 'like', "%$search%");
            });
        } elseif ($status && !$search) {
            $query->where('status', $status);
        }
    
        $users = $query->paginate($perPage)->appends($request->all());
    
        return view('users.index', compact('users', 'perPage', 'search', 'status'));
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $search = $request->input('search');
                $query->whereAny([
                    'first_name',
                    'last_name',
                    'mobile',
                    'email'
                ], 'LIKE', "%$search%");
            })
            ->when($request->filled('sort'), function (Builder $query) use ($request) {
                $sort = $request->input('sort');
                switch ($sort) {
                    case 'name_asc':
                    {
                        $query
                            ->orderBy('first_name')
                            ->orderBy('last_name');
                        break;
                    }
                    case 'name_desc':
                    {
                        $query
                            ->orderByDesc('first_name')
                            ->orderByDesc('last_name');
                        break;
                    }
                    default:
                    {
                        $query->orderByDesc('created_at');
                    }
                }

            })
            ->paginate()->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('orders');

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}

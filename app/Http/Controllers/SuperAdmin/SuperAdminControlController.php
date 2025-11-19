<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->get('role', 'SUPERADMIN');

        if (!session()->has('roles')) {
            session([
                'roles' => [
                    'SUPERADMIN' => [
                        [
                            'id_user' => 1,
                            'nama_pengguna' => 'SuperAdmin A',
                            'email' => 'superadminA@example.com',
                            'status' => 'Active',
                            'created_at' => '2025-01-09',
                        ],
                    ],
                    'USER' => [
                        [
                            'id_user' => 1,
                            'nama_pengguna' => 'Alice',
                            'email' => 'alice@example.com',
                            'status' => 'Active',
                            'created_at' => '2025-01-01',
                        ],
                        [
                            'id_user' => 2,
                            'nama_pengguna' => 'Bob',
                            'email' => 'bob@example.com',
                            'status' => 'Inactive',
                            'created_at' => '2025-01-05',
                        ],
                    ],

                    'ADMIN' => [
                        [
                            'id_user' => 1,
                            'nama_pengguna' => 'Admin A',
                            'email' => 'adminA@example.com',
                            'status' => 'Active',
                            'created_at' => '2025-01-10',
                        ],
                    ],

                    'KURIR' => [
                        [
                            'id_user' => 1,
                            'nama_pengguna' => 'Kurir Joko',
                            'email' => 'kurirjoko@example.com',
                            'status' => 'Active',
                            'created_at' => '2025-01-08',
                        ],
                    ],

                    'SUPERVISOR' => [
                        [
                            'id_user' => 1,
                            'nama_pengguna' => 'Supervisor Budi',
                            'email' => 'superbudi@example.com',
                            'status' => 'Active',
                            'created_at' => '2025-01-12',
                        ],
                    ],
                ]
            ]);
        }

        $roles = session('roles');

        $users = $roles[$role];

        if ($request->search) {
            $search = strtolower($request->search);
            $users = array_filter($users, function ($u) use ($search) {
                return str_contains(strtolower($u['nama_pengguna']), $search)
                    || str_contains(strtolower($u['email']), $search);
            });
        }

        $counts = [
            'USER' => count($roles['USER']),
            'ADMIN' => count($roles['ADMIN']),
            'KURIR' => count($roles['KURIR']),
            'SUPERVISOR' => count($roles['SUPERVISOR']),
        ];

        return view('SuperAdmin.control', compact('users', 'role', 'counts'));
    }

    public function addUser(Request $request)
    {
        $role = $request->role;
        $roles = session('roles');
        $users = $roles[$role];

        $users[] = [
            'id_user' => count($users) + 1,
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'status' => 'Active',
            'created_at' => now()->toDateString(),
        ];

        $roles[$role] = $users;
        session(['roles' => $roles]);

        return redirect('/control?role=' . $role);
    }

    public function editUser($role, $id)
    {
        $users = session('roles')[$role];
        $user = collect($users)->firstWhere('id_user', $id);

        return view('control_edit', compact('user', 'role'));
    }

    public function updateUser(Request $request, $role, $id)
    {
        $roles = session('roles');
        $users = $roles[$role];

        foreach ($users as &$u) {
            if ($u['id_user'] == $id) {
                $u['nama_pengguna'] = $request->nama_pengguna;
                $u['email'] = $request->email;
            }
        }

        $roles[$role] = $users;
        session(['roles' => $roles]);

        return redirect('/control?role=' . $role);
    }

    public function deleteUser($role, $id)
    {
        $roles = session('roles');
        $users = array_filter($roles[$role], fn($u) => $u['id_user'] != $id);

        $roles[$role] = array_values($users);
        session(['roles' => $roles]);

        return redirect('/control?role=' . $role);
    }
}

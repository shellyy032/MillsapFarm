<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
            $flower = [
                [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144'
                ],
            ];

            $dairy = [
                [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144'
                ],
            ];

            $vegetable = [
                [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144'
                ],
            ];

            $pizza = [
                [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144'
                ],
            ];

            $fruit = [
                [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144'
                ],
            ];
        return view('User.product', compact('flower', 'dairy', 'vegetable', 'pizza', 'fruit'));

    }

    public function show($id)
    {
        $flower = [
            [
                    'id' => 1,
                    'name' => 'SNACK COMBO 1',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/487239900_1077795067721728_1071298183826501346_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=wP5r-_BiZh8Q7kNvwHVM_Uh&_nc_oc=AdnLjDbg__2Am8WThzi-rqTYqb0ENsRfJHqupsmqSijeyOA9T2gAyJC2t8Tt3IMgcys&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=EL65F5Dtw5RR8quMxpV4_A&oh=00_AfgH5iIdzSgJ3zLZkcxR7xHdEDzxPoIviZyIIXRWwX4qBg&oe=6928A3D1',
                    'desc' => 'Bright sunflowers grown with care.'
                ],
                [
                    'id' => 2,
                    'name' => 'SNACK COMBO 2',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/56219978_2577081465654003_3242133780818821120_n.jpg?stp=c300.0.1200.1200a_dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=938f96&_nc_ohc=vJL4ke_CAbQQ7kNvwEBJhER&_nc_oc=AdlEVM56A1ygAEjoMyssnCvUmoQu91YcPxabRaSjgBdsXs8qbTGRu3l6OHgmvBBvcss&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=VvtwIyYFES78RfbFVz_fYg&oh=00_AfgNoO0D3aLAlRA9NdZ9D8CAArfhnrGeixAATZ8VP3FXfg&oe=694A35EE',
                    'desc' => 'Bright sunflowers grown with care.'
                ],
                [
                    'id' => 3,
                    'name' => 'SNACK COMBO 3',
                    'price' => 85000,
                    'image' => 'https://scontent.fkno11-1.fna.fbcdn.net/v/t1.6435-9/132248899_4081981255164009_8780277605153596304_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=3a1ebe&_nc_ohc=d4rWQTDxHy4Q7kNvwFQWyWY&_nc_oc=AdmqBVRamsm3tUuIltXuPbpcn30OLSi-yrXDvxftgqTEkg0YbE6dZnq4X3VMrijhkZQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=HveMNV16qaL0kv_TJ0zq-w&oh=00_AfgMhqBf51aIpbdZ89wSvyY_3WQfe0XMMp-9f-4MNfboeQ&oe=694A4144',
                    'desc' => 'Bright sunflowers grown with care.'
                ],
        ];
        $flower = collect($flower)->firstWhere('id', $id);
        return view('User.product-detail', compact('flower'));
    }

    
}
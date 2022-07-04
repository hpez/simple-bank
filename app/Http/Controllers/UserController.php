<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->order_by == 'transaction_count') {
            // Group concat
            $users = User::fromQuery('select u.id,
       u.name,
       u.phone,
       count(*) as cnt
from users u
         inner join accounts a on u.id = a.user_id
         inner join cards c on a.id = c.account_id
         inner join transactions t on c.id = t.from_card
where t.created_at >= NOW() - INTERVAL 10 MINUTE
group by u.id
order by cnt desc
limit 3');
            foreach ($users as $user)
                $user->last_ten_transactions = DB::select('select t.*
from transactions t
         inner join cards c on t.from_card = c.id
         inner join accounts a on c.account_id = a.id
         inner join users u on a.user_id = u.id
where u.id = ?
order by t.id desc
limit 10', [$user->id]);

            return response()->json($users);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    /**
     * Remove the specified Message
     *
     * @param  Message's ID
     */
    public function destroy($id)
    {
                $msg = Message::where('id_msg', $id)->delete();
    		return back();
    }
}

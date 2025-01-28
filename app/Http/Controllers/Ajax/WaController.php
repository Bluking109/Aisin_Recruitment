<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WaNotification;
use Illuminate\Http\Response;

class WaController extends Controller
{
    /**
     * Get all data wa notification
     * @return Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $token = $request->wa_token;

        if ($token != env('WA_TOKEN'))
            return response()->json(['success' => false, 'message' => 'Permission denied'], Response::HTTP_FORBIDDEN);

        $notification = WaNotification::first();
        // delete notifications
        if ($notification)
            $notification->destroy($notification->id);

        return response()->json(['data' => $notification, 'success' => true], Response::HTTP_OK);
    }
}

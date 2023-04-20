<?php

namespace App\CentralLogic;

use App\Models\NotifSetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function error_processor($validator)
    {
        $err_keeper = [];
        foreach ($validator->errors()->getMessages() as $index => $error) {
            array_push($err_keeper, ['code' => $index, 'message' => $error[0]]);
        }
        return $err_keeper;
    }




    public static function send_maintenance_notification($saveData, $token)
    {
        $status = $saveData->maintenance_status;

        $value = self::maintenance_status_update_message($status);

        if ($value) {

            $dat = [
                'title' => trans('messages.maintenance_push_title'),
                'description' => $value,
                'maintenance_id' => $saveData->id,
                'type' => 'data_status'
            ];

            self::send_push_notif_to_device($token, $dat);

            try {
                DB::table('user_notifications')->insert([
                    'dat' => json_encode($dat),
                    'user_id' => $saveData->user_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } catch (\Exception $e) {
                return response()->json([$e], 403);
            }
        }

        return true;
    }

    public static function maintenance_status_update_message($status)
    {

        if ($status == 'pending') {

            $dat = NotifSetting::where('key', 'repair_pending_msg')->first();
        } elseif ($status == 'accepted') {
            $dat = NotifSetting::where('key', 'repair_accepted_msg')->first();
        } elseif ($status == 'declined') {
            $dat = NotifSetting::where('key', 'repair_declined_msg')->first();
        } else {
            $dat = '{"status":"0","message":""}';
        }
        return $dat['value']['message'];
    }
    public static function send_push_notif_to_device($token, $dat)
    {


        $key = NotifSetting::where(['key' => 'push_notification_key'])->first()->value;



        $url = "https://fcm.googleapis.com/fcm/send";
        $header = array(
            "authorization:key=" . $key["content"] . "",
            "content-type: application/json"
        );

        $postdata = '{
        "to" : " ' . $token . ' ",
        "mutable_content": true,
        "dat" :{
            "title": "  ' . $dat['title'] . ' ",
            "body": "  ' . $dat['description'] . ' ",
            "maintenance_id": "  ' . $dat['maintenance_id'] . ' ",
            "type": "  ' . $dat['type'] . ' ",
        },
        "notification" : {
            "title": "  ' . $dat['title'] . ' ",
            "body": "  ' . $dat['description'] . ' ",
            "maintenance_id": "  ' . $dat['maintenance_id'] . ' ",
            "type": "  ' . $dat['type'] . ' ",
            "android_channel_id": "emcor_db"
        }

    }';

        $ch = curl_init();
        $timeout = 120;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);


        $result = curl_exec($ch);
        if ($result == FALSE) {
            dd(curl_error($ch));
        }

        curl_close($ch);

        return $result;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PSBLaravel;

class PSBController extends Controller {
    
 public function DMcommit (Request $req){

     /*if ($req->input('ORDER') != NULL) {
         
         $DBPush = new PSBLaravel();
         
         $DBPush->AMOUNT = $req->input('AMOUNT');
         $DBPush->CURRENCY = $req->input('CURRENCY');
         $DBPush->ORDER = $req->input('ORDER');
         $DBPush->DESC = $req->input('DESC');
         $DBPush->MERCH_NAME = $req->input('MERCH_NAME');
         $DBPush->MERCHANT = $req->input('MERCHANT');
         $DBPush->TERMINAL = $req->input('TERMINAL');
         $DBPush->EMAIL = $req->input('EMAIL');
         $DBPush->TRTYPE = $req->input('TRTYPE');
         $DBPush->TIMESTAMP = $req->input('TIMESTAMP');
         $DBPush->NONCE = $req->input('NONCE');
         $DBPush->BACKREF = $req->input('BACKREF');
         $DBPush->RESULT = $req->input('RESULT');
         $DBPush->RC = $req->input('RC');
         $DBPush->RCTEXT = $req->input('RCTEXT');
         $DBPush->AUTHCODE = $req->input('AUTHCODE');
         $DBPush->RRN = $req->input('RRN');
         $DBPush->INT_REF = $req->input('INT_REF');
         $DBPush->P_SIGN = $req->input('P_SIGN');
         $DBPush->NAME = $req->input('NAME');
         $DBPush->CARD = $req->input('CARD');
         $DBPush->CHANNEL = $req->input('CHANNEL');
         $DBPush->ADDINFO = $req->input('ADDINFO');

         $DBPush->save();
         return redirect()->route('/');
      }  
      return ("Error If Else");*/
    



      if (isset($_POST['P_SIGN'])) {
         $comp1 = 'C50E41160302E0F5D6D59F1AA3925C45';
         $comp2 = '00000000000000000000000000000000';
         $params = array_change_key_case($_POST,CASE_LOWER);
         $vars = ["amount","currency","order","merch_name","merchant","terminal","email","trtype","timestamp","nonce","backref","result","rc","rctext","authcode","rrn","int_ref"];
         $string = '';
         foreach ($vars as $param){
            if(isset($params[$param]) && strlen($params[$param]) != 0){
            $string .= strlen($params[$param]) . $params[$param];
            } else {
            $string .= "-";
            }
            }
            $key = strtoupper(implode(unpack("H32",pack("H32",$comp1) ^ pack("H32",$comp2))));
            $sign = strtoupper(hash_hmac('sha1', $string, pack('H*', $key)));
            if (strcasecmp($params['p_sign'],$sign) == 0) {
            //Если подпись совпала, то выполняем необходимые действия. Для примера записываем результат в файл, если операция прошла успешно:
            if ((int)$params['result'] == 0 && strcasecmp($params['rc'],'00') == 0) {
            $file = 'notification_auth_' . bin2hex(random_bytes(5)). '.txt';
            $message = implode("\n",$params);
            file_put_contents($file,$message,FILE_APPEND);
            }
            }
            }

      /*Конец контроллера */
   }

   public function AllData (){
      $dt = new PSBLaravel;
      return view('databd', ['data' => $dt->orderBy('id', 'desc')->get()]);
   }

   public function OneData ($id){
      $dt = new PSBLaravel;
      return view('one', ['data' => $dt->find($id)]);
   }

}

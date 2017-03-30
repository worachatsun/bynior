<?php

namespace App\Http\Controllers;

use App\Account;

class AccountController extends Controller {

    protected $account;

    public function __construct(){
      $this->account = new Account();
    }


    public function checkIn($id){

      $report = '';

      $acc = $this->account::where('uid', $id)
           ->update(['status' => 1]);

      if ($acc === 0) {
        $result = 'no user';
      }else{
        $que = $this->account::where('uid', $id)->get();
        $result = array_get($que, '0');
      }

      return $result;
    }


    public function random() {
      $questions = $this->account::where('status', 1)
                        ->where('item','!=',1)
                        ->orderByRaw('RAND()')
                        ->take(1)
                        ->get();
      $this->account::where('uid', $questions[0]->uid)
           ->update(['item' => 1]);
      return array_get($questions, '0');
    }
}

<?php
use Illuminate\Support\Facades\Auth;




function paginationHeaderInfo($data)
  {
    return 'Showing '. $data->firstItem() .' - '.  $data->lastItem() .' of  '.  $data->total();
  }
  
  function PerPageForSelectOption($value=null)
	{
		if($value<1) $value = 20;
		$statuses = [
			10,15,20,30,50,100,200,300,500
		];

		$optiontext = '';
		foreach ($statuses as  $status) {
			$selected = ($value == $status)?'selected=selected':'';
			$optiontext .= '<option '.$selected.' value="'.$status.'"> '.$status.' </option>';
		}
		return $optiontext;
	}
  if (!function_exists('pageLimit')) {
    function pageLimit($value='',$nameByID=''){ 
      $datas = [
        10 => '10', 
        25 => '20', 
        50 => '50', 
        100 => '100', 
        500 => '500',  
        
      ];
      if (!empty($nameByID)) {
        return @$datas[$value];
      }
      $optiontext = '';
      foreach ($datas as $key => $val) {
        $selected = ($value == $key)?'selected=selected':'';
        $disabled = ($key<$value)?' disabled ':'';
        $optiontext .= '<option '.$selected.' value="'.$key.'" '.'> '.$val.' </option>';
      }
      return $optiontext;
    }
  }

if (!function_exists('RelationType')) {
    function RelationType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Customer', 
            2 => 'Supplier', 
            3 => 'Friends', 
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}

if (!function_exists('PayType')) {
    function PayType($value='',$nameByID=''){ 
         $datas = [
            1 => 'Loan Given (payable/paid)', 
            2 => 'loan payment received',
        ];
        if (!empty($nameByID)) {
            return @$datas[$value];
        }
        $optiontext = '';
        foreach ($datas as $key => $val) {
            $selected = ($value === $key)?'selected=selected':'';
            $optiontext .= '<option '.$selected.' value="'.$key.'"> '.$val.' </option>';
        }
        return $optiontext;
    }
}


?>
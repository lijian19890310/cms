<?
class crypt{
   function encrypt($txt, $key) {
       srand((double)microtime() * 1000000);
       $encrypt_key = md5(rand(0, 32000));
       $ctr = 0;
       $tmp = '';
       for($i = 0; $i < strlen($txt); $i++) {
           $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
           $tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
       }
       return base64_encode($this->passport_key($tmp, $key));
   }

   
   function decrypt($txt, $key) {
       $txt = $this->passport_key(base64_decode($txt), $key);
       $tmp = '';
       for ($i = 0; $i < strlen($txt); $i++) {
           $tmp .= $txt[$i] ^ $txt[++$i];
       }
       return $tmp;
    }
   private function passport_key($txt, $encrypt_key) {
       $encrypt_key = md5($encrypt_key);
       $ctr = 0;
       $tmp = '';
       for($i = 0; $i < strlen($txt); $i++) {
           $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
           $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
       }
       return $tmp;
    }
}

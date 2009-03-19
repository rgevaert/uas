<?php
class Password {

        private $password = "";        

        public function __construct($pass = "")
        {
                if ($pass !== "")
                {
                        $this->password = $pass;
                }else
                {
                        $this->password = self::generate();
                }
        }

		public function getPassword()
		{
			return $this->password;
		}

        public function getCryptHash()
        {
                return 'crypted'.$this->password;
        }

        public function getLmHash()
        {
                return 'LM'.$this->password;
        }
        public  function getNtHash()
        {
                return 'NT'.$this->password;
        }
        public function getUnixHash()
        {
                return 'UNIX'.$this->password;
        }
        
        private function generate()
        {
                $specialChars = array(
                   "&","$","@","#",")","(","[","]","?",">","<","!");
                $two_special = $specialChars[rand(0,11)].$specialChars[rand(0,11)];
                $two_number = chr(rand(48,57)).chr(rand(48,57));
                $two_capital = chr(rand(65,90)).chr(rand(65,90));
                $two_sletters = chr(rand(97,122)).chr(rand(97,122));
                $rnd_pass  =  $two_special . $two_number . $two_sletters . $two_capital;

                $this->password = str_shuffle($rnd_pass);
                return $this->password;
        }
}
?>

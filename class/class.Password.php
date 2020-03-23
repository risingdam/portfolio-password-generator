<?php

class Password
{
    
    private $pattern;
    private $characters;
    private $repeat;
    private $max;
    private $cycles;
    
    public function __construct()
    {
        
        $this->pattern = [
            [0,0,0,1,1,'@',0,0,0,1,1,'!'],
            [0,0,0,1,1,'a',0,0,0,1,1,'1']
        ];

        $alpha =   'abcdefghijklmnopqrstuvwxyz' .
                   'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeric = '1234567890';
        
        $this->characters = [
            str_repeat($alpha, 5),
            str_repeat($numeric, 26)
        ];

        $this->repeat = 3;
        $this->max = 260;
        $this->cycles = 40;
    }

    public function make(array $opts = []): string
    {
    
        if (isset($opts['pattern']) === false) {
            $pattern = $this->pattern[0];
        } else {
            $pattern = $this->pattern[intval($opts['pattern'])];
        }

        if (isset($opts['repeat']) === false) {
            $repeat = $this->repeat;
        } else {
            $repeat = intval($opts['repeat']);
        }
        
        for ($i = 0; $i <= $this->cycles; $i++) {
            $output = [];
            for ($j = 0; $j <= $repeat; $j++) {
                foreach ($pattern as $element) {
                    if ($element === 0) {
                        $output[] = substr($this->characters[0][mt_rand(0, $this->max)], 0, 1);
                    } elseif ($element === 1) {
                        $output[] = substr($this->characters[1][mt_rand(0, $this->max)], 0, 1);
                    } else {
                        $output[] = $element;
                    }
                }
            }
        }
        return implode('', $output);
    }
}

// EOF

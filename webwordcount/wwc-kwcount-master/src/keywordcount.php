<?php

  function check($paragraph, $word)
    {
        

        $answer = substr_count($paragraph, $word, 0);
      
      return $answer;
    }
	
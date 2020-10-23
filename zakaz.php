<?php
    //первое
    class Into
    {
        public function getClassName()
        {
            echo __CLASS__;
        }
    }
    //второе и третье

    class Math
    {
        public function summa($kol)
        {
            $number = 0;
            if ($kol >= 1)
            {
                for ($i = 1; $i === $kol; $i++)
                {
                    if ($i === 1) $x = (int)readline("Введите первое число:\n");
                    else $x = (int)readline("Введите следующее число:\n");
                    $number = $number + $x;
                }
            } else ('Невозможно суммировать данное к-во чисел'. "\n");
            echo "Сумма равна = $number";
            return $number;
        }
        public function otn($kol)
        {
            $number = 0;
            if ($kol >= 1)
            {
                for ($i = 1; $i === $kol; $i++)
                {
                    if ($i === 1) $x = - (int)readline("Введите первое число:\n");
                    else $x = (int)readline("Введите следующее число:\n");
                    $number = $number - $x;
                }
            } else ('Невозможно вычитать данное к-во чисел'. "\n");
            return $number;
        }
        public function del($kol)
        {
            $number = 1;
            if ($kol >= 1)
            {
                for ($i = 1; $i === $kol; $i++)
                {
                    if ($i === 1)
                    {
                        $x = (int)readline("Введите первое число:\n");
                        $number = $number * $x;
                    }
                    else
                    {
                        $x = (int)readline("Введите следующее число:\n");
                        $number = $number / $x;
                    }
                }
            } else ('Невозможно делить данное к-во чисел'. "\n");
            return $number;
        }
        public function mno($kol)
        {
            $number = 1;
            if ($kol >= 1)
            {
                for ($i = 1; $i === $kol; $i++)
                {
                    if ($i === 1) $x = (int)readline("Введите первое число:\n");
                    else $x = (int)readline("Введите следующее число:\n");
                    $number = $number * $x;
                }
            } else ('Невозможно умножать данное к-во чисел'. "\n");
            return $number;
        }
        public function calcFactorial($number)
        {
            if (gettype($number) === 'integer' && $number >= 1) {
                $j=1;
                for ($i=1; $i <= $number; $i++) {
                    $j = $j * $i;
                }
                return ($j);
            }
        }
    }
    $into= new Into();
    $into->getClassName();


    $dey=(int)readline(" Что будем делать с числами?\n
                                1-Суммировать  
                                2-Вычитать\n
                                3-Умножать  
                                4-Делить\n
                                5-Найдем факториал числа\n");
    if ($dey >= 1 && $dey<= 4)
    {
        $kol=(int)readline('Сколько чисел будет участвовать в выражении?');
        if ($dey === 1)
        {
            $math= new Math();
            $x=$math->summa($kol);
        }
        if ($dey === 2)
        {
            $math= new Math();
            $x=$math->otn($kol);
        }
        if ($dey === 3)
        {
            $math= new Math();
            $x=$math->mno($kol);
        }
        if ($dey === 4)
        {
            $math= new Math();
            $x=$math->mno($kol);
        }
    } elseif ($dey === 5)
    {
        $number=(int)readline('Введите число факториал с которогго желаете получить:');
        $math= new Math();
        $x=$math->calcFactorial($number);
        var_dump($x);
    } else echo 'Такого варианта нет';
<?php
     function index()
    {
        $questions = [
            [1],
            [1, 2, 3, 4, 5, 6],
            [2, 5, 6, 1, 3, 4],
            [1, 3, 2, 5, 4]
        ];

        array_map(function ($question) {
            echo 'answer:' . solution($question);
            echo '<br>';
        }, $questions);
    }

     function solution($question) {
        return checkLamp($question);
    }

     function checkLamp($question, $times = 0, $position = 1) {
        if (sizeof($question) < $position) {
            return $times;
        }
        $circuit = (1 + $position) * $position;
        for ($i = 0; $i < $position; $i++) {
            $circuit = $circuit - $question[$i] * 2;
        }
        $times = $circuit === 0 ? $times + 1 : $times;
        return checkLamp($question, $times, $position + 1);
    }

index();
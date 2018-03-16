
<?php
mb_internal_encoding('utf-8');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Calendar</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>

        <?php
        error_reporting(E_ALL);
        $start = strtotime('2010-01-01');
        $end = strtotime('2018-01-01');
        $random_date = date('n F Y l ', rand($start, $end));

        function random_date() {
            $start = strtotime('2010-01-01');
            $end = strtotime('2018-01-01');
            $random_date = date('n F Y l ', rand($start, $end));
            $days_en = array(
                'Sunday',
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday');
            $days_rus = array(
                'Воскресенье',
                'Понедельник',
                'Вторник',
                'Среда',
                'Четверг',
                'Пятница',
                'Суббота');
            $months_en = array(
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            );
            $months_rus = array(
                'Январь',
                'Февраль',
                'Март',
                'Апрель',
                'Май',
                'Июнь',
                'Июль',
                'Август',
                'Сентябрь',
                'Октябрь',
                'Ноябрь',
                'Декабрь'
            );
            $holidays_rus = array(
                '8 января',
                '7 января',
                '14 января',
                '23 февраля',
                '8 марта',
                '1 апреля',
                '12 апреля',
                '1 мая',
                '9 мая',
                '12 июня',
                '22 июня',
                '1 сентября',
                '27 сентября',
                '4 октября',
                '12 декабря',
                '31 декабря',
                '1 января'
            );
            $holidays_en = array(
                '8 January',
                '7 January',
                '14 January',
                '23 February',
                '8 March',
                '1 April',
                '12 April',
                '1 May',
                '9 May',
                '12 June',
                '22 June',
                '1 September',
                '27 September',
                '4 October',
                '12 December',
                '31 December',
                '1 January'
            );
            /////////
            $weekend_days = array(
                'Saturday',
                'Sunday'
            );
            $is_weekend = false;
            for ($i = 0; $i <= count($weekend_days) - 1; $i++) {
                if (strpos($random_date, $weekend_days[$i]) !== false) {
                    $is_weekend = true;
                }
            }
            ///////////////
            $is_holiday = false;
            for ($i = 0; $i <= count($holidays_en) - 1; $i++) {
                if (strpos($random_date, $holidays_en[$i]) !== false) {
                    $is_holiday = true;
                }
            }
            $array_result_en = explode(" ", $random_date);
            //echo '<pre>' . print_r($array_result_en, 1) . '</pre>';
            $string_result_en = $array_result_en[3] .
                    ', ' . $array_result_en[1] .
                    ' ' . $array_result_en[0] .
                    ', ' . $array_result_en[2];
            //////////////
            $string_result_rus = $string_result_en;
            $string_result_rus = str_replace($months_en, $months_rus, $string_result_rus);
            $string_result_rus = str_replace($days_en, $days_rus, $string_result_rus);
            if ($is_holiday && $is_weekend) {
                $string_result_rus = ' Праздник выходного дня!';
                $string_result_en .= ' Is a weekend holiday!';
                $string = $string_result_en . '<br><br>' . $string_result_rus;
                return $string;
            }
            if ($is_holiday) {
                $string_result_en .= ' Is a holiday!';
                $string_result_rus .= ' Это праздник!';
            }
            if ($is_weekend) {
                $string_result_en .= ' Is a weekend day.';
                $string_result_rus .= ' День выходного дня.';
            }
            $string = $string_result_en . '<br><br>' . $string_result_rus;
            return $string;
        }

        echo '<hr>';
        for ($i = 1; $i <= 20; $i++) {
            echo random_date() . "<hr>";
        }
        

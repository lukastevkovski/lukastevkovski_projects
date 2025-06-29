<?php
class Utility {
    public static function sanitize($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    public static function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public static function getRowClass($registration_to) {
        $regTo = new DateTime($registration_to);
        $today = new DateTime();
        $oneMonth = (clone $today)->modify('+1 month');
        if ($regTo < $today) {
            return 'table-danger';
        } elseif ($regTo <= $oneMonth) {
            return 'table-warning';
        }
        return '';
    }
}
?>
<?php

class Flasher
{
    public static function setFlash($message, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $typeClass = '';

            switch ($flash['type']) {
                case 'success':
                    $typeClass = 'bg-green-100 border-green-400 text-green-700';
                    break;
                case 'error':
                    $typeClass = 'bg-red-100 border-red-400 text-red-700';
                    break;
                case 'warning':
                    $typeClass = 'bg-yellow-100 border-yellow-400 text-yellow-700';
                    break;
                case 'info':
                    $typeClass = 'bg-blue-100 border-blue-400 text-blue-700';
                    break;
            }

            echo '
            <div class="alert ' . $typeClass . ' border px-4 py-3 rounded relative capitalize" role="alert">
                <strong class="font-bold">' . $flash['action'] . '</strong>
                <span class="block sm:inline">' . $flash['message'] . '</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-' . $flash['type'] . '-500" role="button" onclick="this.parentElement.parentElement.style.display=\'none\';" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.586 7.066 4.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 12.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/></svg>
                </span>
            </div>
            ';

            unset($_SESSION['flash']);
        }
    }
}

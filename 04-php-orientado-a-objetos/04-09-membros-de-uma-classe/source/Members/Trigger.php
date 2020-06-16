<?php

namespace Source\Members;

/**
 * Class Trigger
 * @package Source\Members
 */
class Trigger
{
    private const TRIGGER = "trigger";
    public const ACCEPT = "accept";
    public const WARNING = "warning";
    public const ERROR = "error";

    private static string $message;
    private static string $errorType;
    private static string $error;

    /**
     * @param string $message
     * @param string $errorType
     */
    public static function show(string $message, $errorType = "")
    {
        self::setError($message, $errorType);
        echo self::$error;
    }

    /**
     * @param string $message
     * @param string $errorType
     * @return string
     */
    public static function push(string $message, $errorType = "")
    {
        self::setError($message, $errorType);
        return self::$error;
    }

    /**
     * @param string $message
     * @param string $errorType
     */
    private static function setError(string $message, string $errorType)
    {
        $reflection = new \ReflectionClass(__CLASS__);
        $errorTypes = $reflection->getConstants();

        self::$message = $message;
        self::$errorType = (!empty($errorType) || in_array($errorType, $errorTypes) ? " {$errorType}" : "");

        self::$error = "<p class='" . self::TRIGGER . self::$errorType . "'>" . self::$message . "</p>";
    }

}
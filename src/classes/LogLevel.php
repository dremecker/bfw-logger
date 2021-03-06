<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BFWLog;


/**
 * Description of LogLevel
 *
 * @author Dremecker
 */
class LogLevel Extends \Psr\Log\LogLevel {
    
    /**
     * @var array $levelPos
     * Array containing level links from string to integer 
     * making level comparing much more easy
     */
    protected static $levelPos = array (
        self::EMERGENCY => 0,
        self::ALERT     => 10,
        self::CRITICAL  => 20,
        self::ERROR     => 30,
        self::WARNING   => 40,
        self::NOTICE    => 50,
        self::INFO      => 60,
        self::DEBUG     => 70
    );
    
    /**
     * @var array $levelTag 
     * Array containing all log level tags to include into log records
     */
    protected static $levelTag = array(
        self::EMERGENCY => 'EMERGENCY',
        self::ALERT     => 'ALERT',
        self::CRITICAL  => 'CRITICAL',
        self::ERROR     => 'ERROR',
        self::WARNING   => 'warning',
        self::NOTICE    => 'notice',
        self::INFO      => 'info',
        self::DEBUG     => 'debug'
    );
    
    /**
     * Returns integer priority for log level
     * 
     * @param \BFWLog\LogLevel $level : level
     * @return int : integer priority for the level
     */
    public static function getPos($level) {
        return self::$levelPos[$level];
    }
    
    /**
     * Returns string tag for log level
     * 
     * @param \BFWLog\LogLevel $level : level
     * @return string : string tag for the level
     */
    public static function getTag($level) {
        return self::$levelTag[$level];
    }
    
    /**
     * Compare two levels between them and return the level priority difference in integer
     * 
     * @param \BFWLog\LogLevel $level0 : first level to compare
     * @param \BFWLog\LogLevel $level1 : second level to compare to
     * @return int : level priority difference in integer between the two levels. 
     * <0 if ref level have higher priority than compared level, 
     * >0 if ref level have lower priority than compared level and 
     * =0 if they have the same priority
     */
    public static function comp($ref_level, $compared_level) {
        return (self::$levelPos[$ref_level] - self::$levelPos[$compared_level]) / 10;
    }
}
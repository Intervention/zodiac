<?php

namespace Intervention\Zodiac;

use DateTime;
use Illuminate\Translation\Translator;
use Carbon\Carbon;

class Calculator
{
    /**
     * Date
     *
     * @var Carbon\Carbon
     */
    public $date;

    /**
     * Translator
     *
     * @var Illuminate\Translation\Translator
     */
    public $translator;

    /**
     * Array of predefined zodiacs
     *
     * @var Array
     */
    protected $zodiacs = [

        [
            'name' => 'aries',
            'start' => ['month' => '3', 'day' => '21'],
            'end' => ['month' => '4', 'day' => '20']
        ],

        [
            'name' => 'taurus',
            'start' => ['month' => '4', 'day' => '21'],
            'end' => ['month' => '5', 'day' => '21']
        ],

        [
            'name' => 'gemini',
            'start' => ['month' => '5', 'day' => '22'],
            'end' => ['month' => '6', 'day' => '21']
        ],

        [
            'name' => 'cancer',
            'start' => ['month' => '6', 'day' => '22'],
            'end' => ['month' => '7', 'day' => '22']
        ],

        [
            'name' => 'leo',
            'start' => ['month' => '7', 'day' => '23'],
            'end' => ['month' => '8', 'day' => '23']
        ],

        [
            'name' => 'virgo',
            'start' => ['month' => '8', 'day' => '24'],
            'end' => ['month' => '9', 'day' => '23']
        ],

        [
            'name' => 'libra',
            'start' => ['month' => '9', 'day' => '24'],
            'end' => ['month' => '10', 'day' => '23']
        ],

        [
            'name' => 'scorpio',
            'start' => ['month' => '10', 'day' => '24'],
            'end' => ['month' => '11', 'day' => '22']
        ],

        [
            'name' => 'sagittarius',
            'start' => ['month' => '11', 'day' => '23'],
            'end' => ['month' => '12', 'day' => '21']
        ],

        [
            'name' => 'capricorn',
            'start' => ['month' => '12', 'day' => '22'],
            'end' => ['month' => '12', 'day' => '31']
        ],

        [
            'name' => 'capricorn',
            'start' => ['month' => '1', 'day' => '1'],
            'end' => ['month' => '1', 'day' => '20']
        ],

        [
            'name' => 'aquarius',
            'start' => ['month' => '1', 'day' => '21'],
            'end' => ['month' => '2', 'day' => '19']
        ],

        [
            'name' => 'pisces',
            'start' => ['month' => '2', 'day' => '20'],
            'end' => ['month' => '3', 'day' => '20']
        ]
    ];

    /**
     * Construct object
     *
     * @param Translator $translator
     */
    function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Reads mixed date into Carbon object
     *
     * @param mixed $date
     */
    public function setDate($date)
    {
        switch (true) {
            case is_string($date):
                $this->date = Carbon::parse($date);
                break;

            case is_int($date):
                $this->date = Carbon::createFromTimestamp($date);
                break;

            case is_a($date, 'DateTime'):
                $this->date = Carbon::instance($date);
                break;
            
            default:
                throw new Exception\NotReadableException("Unable to read date ({$date})");
        }
    }

    /**
     * Key zodiac name for given date
     *
     * @param  mixed $date
     * @return string
     */
    public function make($date)
    {
        $this->setDate($date);

        foreach ($this->zodiacs as $zodiac) {

            $start = $this->getStartByDate($zodiac['start']['month'], $zodiac['start']['day']);
            $end = $this->getEndByDate($zodiac['end']['month'], $zodiac['end']['day']);

            if ($this->date->between($start, $end)) {
                return $zodiac['name'];
            }
        }
    }

    /**
     * Get zodiac translation for given date
     *
     * @param  mixed $date
     * @return string
     */
    public function makeLocalized($date)
    {
        $key = $this->make($date);

        if ($this->translator->has("zodiacs.{$key}")) {
            // return error message from validation translation file
            $key = "zodiacs.{$key}";
        } else {
            // return packages default message
            $key = "zodiacs::zodiacs.{$key}";
        }

        return $this->translator->get($key);
    }

    /**
     * Format DateTime object for start time from given zodiac name
     *
     * @param  string $name
     * @return DateTime
     */
    private function getStartByName($name)
    {
        $zodiac = $this->getZodiacByName($name);

        return $this->getStartByDate($zodiac['start']['month'], $zodiac['start']['day']);
    }

    /**
     * Format DateTime object for end time from given zodiac name
     *
     * @param  string $name
     * @return DateTime
     */
    private function getEndByName($name)
    {
        $zodiac = $this->getZodiacByName($name);

        return $this->getEndByDate($zodiac['end']['month'], $zodiac['end']['day']);
    }

    /**
     * Fetch zodiac data by name
     *
     * @param  string $name
     * @return array
     */
    private function getZodiacByName($name)
    {
        foreach ($this->zodiacs as $zodiac) {
            if ($zodiac['name'] == $name) {
                return $zodiac;
            }
        }
    }

    /**
     * Format Carbon object for start date from given day and month
     *
     * @param  string $name
     * @return DateTime
     */
    private function getStartByDate($month, $day)
    {
        return Carbon::create(
            $this->date->year,
            $month,
            $day,
            0,
            0,
            0
        );
    }

    /**
     * Format Carbon object for end date from given day and month
     *
     * @param  integer $month
     * @param  integer $day
     * @return DateTime
     */
    private function getEndByDate($month, $day)
    {
        return Carbon::create(
            $this->date->year,
            $month,
            $day,
            0,
            0,
            0
        )->addDay();
    }
}

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
            'start' => ['m' => '3', 'd' => '21'],
            'end' => ['m' => '4', 'd' => '20']
        ],

        [
            'name' => 'taurus',
            'start' => ['m' => '4', 'd' => '21'],
            'end' => ['m' => '5', 'd' => '21']
        ],

        [
            'name' => 'gemini',
            'start' => ['m' => '5', 'd' => '22'],
            'end' => ['m' => '6', 'd' => '21']
        ],

        [
            'name' => 'cancer',
            'start' => ['m' => '6', 'd' => '22'],
            'end' => ['m' => '7', 'd' => '22']
        ],

        [
            'name' => 'leo',
            'start' => ['m' => '7', 'd' => '23'],
            'end' => ['m' => '8', 'd' => '23']
        ],

        [
            'name' => 'virgo',
            'start' => ['m' => '8', 'd' => '24'],
            'end' => ['m' => '9', 'd' => '23']
        ],

        [
            'name' => 'libra',
            'start' => ['m' => '9', 'd' => '24'],
            'end' => ['m' => '10', 'd' => '23']
        ],

        [
            'name' => 'scorpio',
            'start' => ['m' => '10', 'd' => '24'],
            'end' => ['m' => '11', 'd' => '22']
        ],

        [
            'name' => 'sagittarius',
            'start' => ['m' => '11', 'd' => '23'],
            'end' => ['m' => '12', 'd' => '21']
        ],

        [
            'name' => 'capricorn',
            'start' => ['m' => '12', 'd' => '22'],
            'end' => ['m' => '12', 'd' => '31']
        ],

        [
            'name' => 'capricorn',
            'start' => ['m' => '1', 'd' => '1'],
            'end' => ['m' => '1', 'd' => '20']
        ],

        [
            'name' => 'aquarius',
            'start' => ['m' => '1', 'd' => '21'],
            'end' => ['m' => '2', 'd' => '19']
        ],

        [
            'name' => 'pisces',
            'start' => ['m' => '2', 'd' => '20'],
            'end' => ['m' => '3', 'd' => '20']
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

            $start = $this->getStartByDate($zodiac['start']['m'], $zodiac['start']['d']);
            $end = $this->getEndByDate($zodiac['end']['m'], $zodiac['end']['d']);

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
        return $this->translator->get("zodiacs.{$this->make($date)}");
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

        return $this->getStartByDate($zodiac['start']['m'], $zodiac['start']['d']);
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

        return $this->getEndByDate($zodiac['end']['m'], $zodiac['end']['d']);
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
